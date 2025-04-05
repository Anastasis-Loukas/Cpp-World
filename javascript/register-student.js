function animation() {
    var id = null;
    var textCloud = document.getElementById("text-cloud");
    var posx = window.innerWidth + 50; 
    var textPos = posx;

   
   var targetLeft = (window.innerWidth - textCloud.offsetWidth) / 2 + 450;

    textCloud.style.left = posx + 'px';
    textCloud.style.display = "block";

    clearInterval(id);
    id = setInterval(frame, 10);

    function frame() {
        if (posx <= targetLeft) {
            clearInterval(id);
            cloud();
        } else {
            posx -= 2;
            textCloud.style.left = posx + 'px';
        }
    }

    function cloud() {
        textCloud.style.background = "white";
        textCloud.style.fontSize = '16pt';
        setTimeout(leave, 5000);
    }

    function leave() {
        textCloud.textContent = "Καλωσόρισες στο Πανεπιστήμιο Δυτικής Αττικής. Ώρα για C++";

        clearInterval(id);
        id = setInterval(frame2, 10);
    }

    function frame2() {
        if (posx >= window.innerWidth + 300) {
            clearInterval(id);
        } else {
            posx ++;
            textCloud.style.left = posx + 'px';
        }
    }
}