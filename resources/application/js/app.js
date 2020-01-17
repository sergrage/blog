// Variables
var navbarToggler = $('.classy-navbar-toggler');
var closeIcon = $('.classycloseIcon');
var navToggler = $('.navbarToggler');
var classyMenu = $('.classy-menu');

navbarToggler.on('click', function () {
    navToggler.toggleClass('active');
    classyMenu.toggleClass('menu-on');
});

// close icon
closeIcon.on('click', function () {
    classyMenu.removeClass('menu-on');
    navToggler.removeClass('active');
});