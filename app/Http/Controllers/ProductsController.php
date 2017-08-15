<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            // Move Image To Img Folder
            $request->image->move('img', $imageName);

            $formInput['image'] = $imageName;
        } else {
            $formInput['image'] = 'noimage.png';
        }

        Product::create($formInput);
        return redirect()->route('admin');
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
            // Move Image To Img Folder
            $request->image->move('img', $imageName);

            $formInput['image'] = $imageName;
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
