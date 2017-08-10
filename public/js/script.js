var box = document.querySelectorAll('.outer');
for (var i = 0; i < box.length; i++) {
  box[i].addEventListener('mouseenter', (event) => {
    event.target.children[1].children[0].style.bottom = '44px'
  })

  box[i].addEventListener('mouseleave', (event) => {
    event.target.children[1].children[0].style.bottom = '0';
  })
}