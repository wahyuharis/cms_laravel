$(document).ready(function () {

    $('#scroll-top').click(function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });


});

$(document).scroll(function () {
    var top = $(document).scrollTop() + " px";

    console.log(top);
    // if (top < 150) {
    //     $('#scroll-top').hide('slow');
    // } 
    if (top > 150) {
        $('#scroll-top').show();
    } 
});