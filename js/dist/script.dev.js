"use strict";

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }

/* JS - Responsive Menu 
let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

/*Search Form*/
var searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = function () {
  searchForm.classList.toggle('active');
  navbar.classList.remove('active');
  accountForm.classList.remove('active');
};
/*Account*/


var accountForm = document.querySelector('.dropdown-menu');

document.querySelector('#account_btn').onclick = function () {
  accountForm.classList.toggle('active');
  searchForm.classList.remove('active');
  navbar.classList.remove('active');
};
/*Product Slider*/


var productContainers = _toConsumableArray(document.querySelectorAll('.product-container'));

var nxtBtn = _toConsumableArray(document.querySelectorAll('.nxt-btn'));

var preBtn = _toConsumableArray(document.querySelectorAll('.pre-btn'));

productContainers.forEach(function (item, i) {
  var containerDimensions = item.getBoundingClientRect();
  var containerWidth = containerDimensions.width;
  nxtBtn[i].addEventListener('click', function () {
    item.scrollLeft += containerWidth;
  });
  preBtn[i].addEventListener('click', function () {
    item.scrollLeft -= containerWidth;
  });
});
/* JS - Contact Us */

function send_message() {
  var name = jQuery("#name").val();
  var message = jQuery("#message").val();

  if (name == "") {
    alert('Fields cannot be empty!');
  } else if (message == "") {
    alert('Fields cannot be empty!');
  } else {
    jQuery.ajax({
      url: 'send_message.php',
      type: 'post',
      data: 'name=' + name + '&message=' + message,
      success: function success(result) {
        alert(result);
        document.getElementById("form").reset();
      }
    });
  }
}
/* JS - Register */


function register() {
  var fname = jQuery("#fname").val();
  var mname = jQuery("#mname").val();
  var lname = jQuery("#lname").val();
  var gender = jQuery("#gender").val();
  var bdate = jQuery("#bdate").val();
  var age = jQuery("#age").val();
  var address = jQuery("#address").val();
  var studno = jQuery("#studno").val();
  var course = jQuery("#course").val();
  var mobile = jQuery("#mobile").val();
  var email = jQuery("#email").val();
  var username = jQuery("#username").val();
  var password = jQuery("#password").val();
  var cpassword = jQuery("#cpassword").val();

  if (fname == "") {
    alert('Fields cannot be empty!');
  } else if (mname == "") {
    alert('Fields cannot be empty!');
  } else if (lname == "") {
    alert('Fields cannot be empty!');
  } else if (gender == "") {
    alert('Fields cannot be empty!');
  } else if (bdate == "") {
    alert('Fields cannot be empty!');
  } else if (age == "") {
    alert('Fields cannot be empty!');
  } else if (address == "") {
    alert('Fields cannot be empty!');
  } else if (studno == "") {
    alert('Fields cannot be empty!');
  } else if (course == "") {
    alert('Fields cannot be empty!');
  } else if (mobile == "") {
    alert('Fields cannot be empty!');
  } else if (email == "") {
    alert('Fields cannot be empty!');
  } else if (username == "") {
    alert('Fields cannot be empty!');
  } else if (password == "") {
    alert('Fields cannot be empty!');
  } else if (cpassword == "") {
    alert('Fields cannot be empty!');
  }

  if (password != cpassword) {
    alert('Password does not match, please try again...');
    document.getElementById("password").reset();
    document.getElementById("cpassword").reset();
  } else {
    jQuery.ajax({
      url: 'user_register.php',
      type: 'post',
      data: '&fname=' + fname + '&mname=' + mname + '&lname=' + lname + '&gender=' + gender + '&bdate=' + bdate + '&age=' + age + '&address=' + address + '&studno=' + studno + '&course=' + course + '&mobile=' + mobile + '&email=' + email + '&username=' + username + '&password=' + password,
      success: function success(result) {
        alert(result);
        window.location.href = window.location.href;
      }
    });
  }
}
/* JS - Log in */


function user_login() {
  jQuery('.field_error').html('');
  var email = jQuery("#login_email").val();
  var password = jQuery("#login_password").val();
  var is_error = '';

  if (email == "") {
    jQuery('#login_email_error').html('Please Enter Email');
    is_error = 'yes';
  }

  if (password == "") {
    jQuery('#login_password_error').html('Please Enter Password');
    is_error = 'yes';
  }

  if (is_error == '') {
    jQuery.ajax({
      url: 'user_login.php',
      type: 'post',
      data: 'email=' + email + '&password=' + password,
      success: function success(result) {
        if (result == 'wrong') {
          alert('Incorrect Email and Password!');
          document.getElementById("form_login").reset();
          document.getElementById("login_email").reset();
          document.getElementById("login_password").reset();
        }

        if (result == 'valid') {
          alert('Log in Successfully!');
          window.location.href = window.location.href;
        }
      }
    });
  }
}
/* JS - Add to Cart */


function manage_cart(pid, type) {
  if (type == 'update') {
    var qty = jQuery("#" + pid + "qty").val();
  } else {
    var qty = jQuery("#qty").val();
  }

  jQuery.ajax({
    url: 'manage_cart.php',
    type: 'post',
    data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
    success: function success(result) {
      result = result.trim();

      if (type == 'update' || type == 'remove') {
        window.location.href = window.location.href;
      }

      if (result == 'not_available') {
        alert(' Qty Not Available');
      } else {
        jQuery('.htc__qua').html(result);

        if (is_checkout == 'yes') {
          window.location.href = 'checkout.php';
        }
      }
    }
  });
}
/*No Negative Number Input - Checkout */


var number = document.getElementById('qty'); // Listen for input event on numInput.

number.onkeydown = function (e) {
  if (!(e.keyCode > 95 && e.keyCode < 106 || e.keyCode > 47 && e.keyCode < 58 || e.keyCode == 8)) {
    return false;
  }
};
//# sourceMappingURL=script.dev.js.map
