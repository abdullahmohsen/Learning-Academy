$(window).scroll(function () {
    let usersroll = $(window).scrollTop();
    let abt =$("#about").offset().top;
    if (usersroll >="50") {
        if(usersroll>abt)
        {
            $("#btnup").fadeIn(500);
        }
    }
    else
    {
        $("#btnup").fadeOut(500);
    }
});

$("#btnup").click(function ()
{
    $("body,html").animate({ scrollTop: "0" }, 1000)
});

