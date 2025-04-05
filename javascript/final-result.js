function animation()
{
    var id = null;
    var textCloud = document.getElementById("text-cloud");
    var posx = 110;
    
    clearInterval(id);
    id = setInterval(frame, 2);

    function frame()
    {
        if(Math.round(posx) == 80)
        {
            clearInterval(id);
            cloud();
        }
        else
        {
            posx-=0.2;
            console.log(posx)
        }
    }

    function cloud()
    {
        textCloud.style.background = "white";
        textCloud.style.fontSize = '16' + 'pt';
    }
}

animation();