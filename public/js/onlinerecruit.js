function openForm(evt, formName) {
    var i, tabcontent, tablinks;
  
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
  
    document.getElementById(formName).style.display = "block";
    evt.currentTarget.className += " active";
  }

document.getElementById("defaultOpen").click();

// select search
$(document).ready(function(){
  $('.search_select_box select').selectpicker();
})

// validation form
const form = document.getElementById('form');
const noic = document.getElementById('noic');
const email = document.getElementById('email');
const phone_num = document.getElementById('phone');
const zipcode = document.getElementById('zipcode');

form.addEventListener('submit', (e) => {
  e.preventDefault();

  checkInputs();
})

function checkInputs() {
  // need to get the value from the input first
  const noicValue = noic.value.trim()
  const emailValue = email.value.trim()
  const zipcodeValue = zipcode.value.trim()

  if (noicValue === "") {
    setFourErrorFor(noic, "NOIC cannot be blank.");
  } else if (!isNOIC(noicValue)) {
    setFourErrorFor(noic, "NOIC is not valid.");
  } else {
    setFourSuccessFor(noic);
  }

  if (emailValue === "") {
    setSixErrorFor(email, 'Email cannot be blank.');
  } else if (!isEmail(emailValue)) {
    setSixErrorFor(email, 'Email is not valid.');
  } else {
    setSixSuccessFor(email);
  }
  
  if (zipcodeValue === "") {
    setTwoErrorFor(zipcode, "Zip Code cannot be blank.");
  } else if (!isZipcode(zipcodeValue)) {
    setTwoErrorFor(zipcode, "Zip Code is not valid");
  } else {
    setTwoSuccessFor(zipcode);
  }

}

function isNOIC() {
  return /^\d{6}-\d{2}-\d{4}$/.test(noic);
}

function isEmail() {
  return /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function isZipcode() {
  return /^[0-9]$/.test(zipcode);
}

function setSixErrorFor(input, message) {
  const formGroup = input.parentElement;
  const small = formGroup.querySelector('small');
  small.innerText = message;
  formGroup.className = 'form-group col-md-6 error';
}

function setSixSuccessFor(input) {
  const formGroup = input.parentElement;
  formGroup.className = 'form-group col-md-6 success';
}

function setFourErrorFor(input, message) {
  const formGroup = input.parentElement;
  const small = formGroup.querySelector('small');
  small.innerText = message;
  formGroup.className = 'form-group col-md-4 error';
}

function setFourSuccessFor(input) {
  const formGroup = input.parentElement;
  formGroup.className = 'form-group col-md-4 success';
}

function setTwoErrorFor(input, message) {
  const formGroup = input.parentElement;
  const small = formGroup.querySelector('small');

  small.innerText = message;

  formGroup.className = 'form-group col-md-2 error';
}

function setTwoSuccessFor(input) {
  const formGroup = input.parentElement;
  formGroup.className = 'form-group col-md-2 success';
}

// submit button
(function() {
  $('form input').keyup(function() {

      var empty = false;
      $('form input').each(function() {
          if ($(this).val() == '') {
              empty = true;
          }
      });

      if (empty) {
          $('#submit').attr('disabled', 'disabled'); 
      } else {
          $('#submit').removeAttr('disabled');
      }
  });
})()
