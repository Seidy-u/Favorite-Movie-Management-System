$(document).ready(function() {
    $('.dc-menu-trigger').click(function() {
        $('nav').toggleClass("dc-menu-open");
        $('.menu-overlay').toggleClass("open");
        $('header').toggleClass("shownav");
    });
});