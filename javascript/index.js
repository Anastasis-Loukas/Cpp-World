
document.getElementById("button-el").onclick = function() {
    // Αφαίρεση element
    document.getElementById("header-el").remove();
    document.getElementById("iframe-el").remove();
    document.getElementById("paragraph-el").remove();

    // Animation script
    var id = null;
    var elem = document.querySelector("body");
    var posx = 0;
    var posy = 0;
    var backgroundWidth = 2800;
    var backgroundHeight = 1575;
    clearInterval(id);
    id = setInterval(frame, 6);

    function frame()
    {
        if(posx == -1000)
        {
            clearInterval(id);
            window.location.assign("register_student.html");
        }
        else
        {
            posx = posx - 4;
            elem.style.backgroundPositionX = posx + 'px';
                
            posy = posy - 2;
            elem.style.backgroundPositionY = posy + 'px';

            backgroundWidth = backgroundWidth + 4;
                backgroundHeight = backgroundHeight + 2;
            elem.style.backgroundSize = backgroundWidth + 'px ' + backgroundHeight + 'px';
        }
    }

    /*var id = null;
    var elem = document.getElementById("bd");
    var posx = 0;
    var posy = 0;
    var backgroundWidth = 2800;
    var backgroundHeight = 1575;
    clearInterval(id);
    id = setInterval(frame, 1);

    function frame()
    {
        if(posx == -1000)
        {
            clearInterval(id);
            window.location.assign("register_student.html");
        }
        else
        {
            posx = posx - 2;
            elem.style.backgroundPositionX = posx + 'px';
                
            posy = posy - 1;
            elem.style.backgroundPositionY = posy + 'px';

            backgroundWidth = backgroundWidth + 2;
            backgroundHeight = backgroundHeight + 1;
            elem.style.backgroundSize = backgroundWidth + 'px ' + backgroundHeight + 'px';
        }
    }*/
};