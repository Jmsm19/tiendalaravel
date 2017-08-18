<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $products = Product::orderBy('name', 'asc')->paginate(8);
        $categories = Category::orderBy('name', 'asc')->get();
        $sorted = false;
        return view('admin.product.index', compact('products', 'categories', 'sorted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->except('image');
        
        // Validate request
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required',
            'image' => 'image | mimes:jpg,jpeg,png | dimensions:min_width=238,min_height=200 | max:300', // Max is in Kb
            'category_id' => 'required|integer',
        ]);

        // Handle File Upload
        if ($request->hasFile('image')) {
            
            // Get filename with the extension
            $filenameWithExt = $request->image->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->image->getClientOriginalExtension();
            // Filename to Store
            $imageName = $filename.'_'.time().'.'.$extension;
            // Upload image to S3 AWS
            $image = $request->file('image');
            $s3 = Storage::disk('s3');
            $filePath = '/img/' . $imageName;
            $s3->put($filePath, file_get_contents($image), 'public');
            // Save url in DB
            $formInput['image'] = 'https://s3.amazonaws.com/laraveltienda/img/'.$imageName;
        } else {
            $formInput['image'] = 'https://s3.amazonaws.com/laraveltienda/img/noimage.jpg';
        }

        Product::create($formInput);
        return redirect('admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Category::find($id)->products;
        $categories = Category::orderBy('name', 'asc')->get();
        $sorted = true;
        return view('admin.product.index', compact('products', 'categories', 'sorted'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::pluck('name', 'id');
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formInput = $request->except(['image', '_method', '_token']);

        // Validate request
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required',
            'image' => 'image | mimes:jpg,jpeg,png | dimensions:min_width=238,min_height=200 | max:300', // Max is in Kb
            'category_id' => 'required|integer',
        ]);

        // Handle File Upload
        if ($request->hasFile('image')) {
            // Get filename with the extension
            $filenameWithExt = $request->image->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->image->getClientOriginalExtension();
            // Filename to Store
            $imageName = $filename.'_'.time().'.'.$extension;
            // Delete previous image from S3 AWS
            $s3 = Storage::disk('s3');
            $previousImage = Product::find($id)->image;
            $previousImageName = substr($previousImage, 43);
            $previousImageFilePath = '/img/' . $previousImageName;
            // If previous image was "noimage.jpg", DO NOT delete it from S3 Bucket
            if ($previousImageName  !== "noimage.jpg") {
                $s3->delete($previousImageFilePath);
            }
            // Upload new image
            $image = $request->file('image');
            $filePath = '/img/' . $imageName;
            $s3->put($filePath, file_get_contents($image), 'public');
            // Save url in DB
            $formInput['image'] = 'https://s3.amazonaws.com/laraveltienda/img/'.$imageName;
        } else {
            $formInput['image'] = Product::find($id)->image;
        }

        Product::where('id', $id)->update($formInput);
        return redirect()->to('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return back();
    }
}
