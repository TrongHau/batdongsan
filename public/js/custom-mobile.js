$('.dropdown-navigative-menu').find('li').one( "click", function(e) {
    e.preventDefault();
    var timeout;
    var url = $(this).find('a').attr('href');
    clearTimeout(timeout);
    timeout = setTimeout(function()
    {
        window.location.href = url;
    }, 3000);
})