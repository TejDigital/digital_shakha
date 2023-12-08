$(function () {
  var navbar = $(".header-inner");
  var top_nav = $(".top_nav");
  var logo1 = $(".logo1");
  var logo2 = $(".logo2");
  var togel1 = $(".toggel_btn1");
  var togel2 = $(".toggel_btn2");
  $(window).scroll(function () {
    if ($(window).scrollTop() <= 40) {
      top_nav.css("display", "block");
      togel1.css("display", "block");
      togel2.css("display", "none");
      logo1.css("display", "block");
      logo2.css("display", "none");
      navbar.removeClass("navbar-scroll");
    } else {
      top_nav.css("display", "none");
      togel1.css("display", "none");
      togel2.css("display", "block");
      logo1.css("display", "none");
      logo2.css("display", "block");
      navbar.addClass("navbar-scroll");
    }
  });
});

const currentlink = location.href;
const menuitems = document.getElementsByClassName("nav-link");
for (let i = 0; i < menuitems.length; i++) {
  if (menuitems[i].href === currentlink) {
    menuitems[i].className = "current";
  }
}

//*************************************************MODAL************************ */

var loginModal = document.getElementById("loginModal");
var loginBtns = document.querySelectorAll(".login_popup");
var closeLoginBtn = document.getElementById("close_login_btn");

loginBtns.forEach(function(loginBtn) {
  loginBtn.onclick = function() {
    loginModal.style.display = "block";
  }
});

closeLoginBtn.onclick = function() {
  loginModal.style.display = "none";
}


var registerModal = document.getElementById("registerModal");
var registerBtn = document.querySelector(".signup_popup");
var closeRegisterBtn = document.getElementById("close_signup_btn");

registerBtn.onclick = function() {
  registerModal.style.display = "block";
}

closeRegisterBtn.onclick = function() {
  registerModal.style.display = "none";
}

var forgetPassModal = document.getElementById("forgetPassModal");
var closeForgetBtn = document.getElementById("close_forgetPass_btn");

closeForgetBtn.onclick = function() {
  forgetPassModal.style.display = "none";
}

var forgetPassLink = loginModal.querySelector(".form a");

forgetPassLink.onclick = function(event) {
  event.preventDefault(); 
  loginModal.style.display = "none";
  forgetPassModal.style.display = "block";
}




var loginLink = registerModal.querySelector(".page_link a");

loginLink.onclick = function(event) {
  event.preventDefault(); 
  registerModal.style.display = "none";
  loginModal.style.display = "block";
}

var forgetPass_login_Link = forgetPassModal.querySelector(".page_link a");

forgetPass_login_Link.onclick = function(event) {
  event.preventDefault(); 
  forgetPassModal.style.display = "none";
  loginModal.style.display = "block";

}



var registerLink = loginModal.querySelector(".page_link a");

registerLink.onclick = function(event) {
  event.preventDefault(); 
  loginModal.style.display = "none";
  registerModal.style.display = "block";
}

window.onclick = function(event) {
  if (event.target == loginModal) {
    loginModal.style.display = "none";
  } else if (event.target == registerModal) {
    registerModal.style.display = "none";
  }else if(event.target == forgetPassModal){
    forgetPassModal.style.display = "none";
  }
}


// ---------------------------------Program-view-testimonial--------------
$(".testimonial_program_view").owlCarousel({
  autoplay: true,
  slideSpeed: 1000,
  autoplayTimeout:2000,
  autoplayHoverPause:true,
  items: 1,
  loop: true,
  nav: true,
  navText: ["<img src='././assets/images/arrow_left.svg'>", "<img src='././assets/images/arrow_right.svg'>"],
  dots: true,
  responsive: {
      320: {
          items: 1
      },
      767: {
          items: 1
      },
      600: {
          items: 1
      },
      1000: {
          items: 1
      }
  }

});

$(".testimonial_slider").owlCarousel({
  autoplay: true,
  slideSpeed: 1000,
  autoplayTimeout:2000,
  autoplayHoverPause:true,
  items: 1,
  loop: true,
  nav: true,
  navText: ["<img src='././assets/images/arrow_left.svg'>", "<img src='././assets/images/arrow_right.svg'>"],
  dots: true,
  responsive: {
      320: {
          items: 1
      },
      767: {
          items: 1
      },
      600: {
          items: 1
      },
      1000: {
          items: 1
      }
  }

});

$(".story_slider").owlCarousel({
  autoplay: true,
  slideSpeed: 1000,
  autoplayTimeout:2000,
  autoplayHoverPause:true,
  items: 1,
  loop: true,
  center:true,
  nav: true,
  navText: ['<i class="fa-solid fa-caret-left"></i>', '<i class="fa-solid fa-caret-right"></i>'],
  dots: true,
  responsive: {
      320: {
          items: 1
      },
      767: {
          items: 1
      },
      600: {
          items: 1
      },
      1000: {
          items: 1
      }
  }

});