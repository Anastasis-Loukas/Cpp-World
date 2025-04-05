function animation()
{
    var id = null;
    var gmele = document.getElementById("gmele");
    var textCloud = document.getElementById("text-cloud");
    var posx = 2000;
    
    clearInterval(id);
    id = setInterval(frame, 2);

    function frame()
    {
        if(posx == 1500)
        {
            clearInterval(id);
            cloud();
        }
        else
        {
            posx--;
            gmele.style.left = posx + 'px';
        }
    }

    function cloud()
    {
        textCloud.style.background = "white";
        textCloud.style.fontSize = '16' + 'pt';
    }
}

animation();