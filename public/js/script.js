var box = document.querySelectorAll('.outer');
for (var i = 0; i < box.length; i++) {
  box[i].addEventListener('mouseenter', (event) => {
    event.target.children[1].children[0].style.bottom = '44px';
  })

  box[i].addEventListener('mouseleave', (event) => {
    event.target.children[1].children[0].style.bottom = '0';
  })
}

if (document.querySelector('.new-address-btn') !== null) {
  document.querySelector('.new-address-btn').addEventListener('click', function () {
    document.querySelector('.hidden.form').classList.remove('hidden');
    document.querySelector('.addresses').classList.add('hidden');
  })
}
if (document.querySelector('.credit-text') !== null) {
  document.querySelector('.credit-text').addEventListener('keyup', function () {
    let val = document.querySelector('.credit-text').value;
    if ((/5[1-5]\d{14}/g).test(val)) 
    {
      document.querySelector('.credit-type').textContent = 'MASTERCARD';
    } 
    else if ((/(4)\d{12}/g).test(val) || (/(4)\d{15}/g).test(val)) 
    {
      document.querySelector('.credit-type').textContent = 'VISA';
    } 
    else if ((/3[47]\d{13}/g).test(val)) 
    {
      document.querySelector('.credit-type').textContent = 'AMEX ';
    } 
    else 
    {
      document.querySelector('.credit-type').textContent = 'Invalid';
    }
  })
}