let questions;
let pickedQuestions = [];
const xhtpp = new XMLHttpRequest();
xhtpp.onload = function() {
    questions = JSON.parse(this.response);

    loadQuestion();
   
}
xhtpp.open("GET", "questions.json", true);
xhtpp.send();

let correct = 0;
let lost = 0;
let countdownID = null;
let remainingTime = 20;
let buttons = [document.getElementById("button1"), document.getElementById("button2"), document.getElementById("button3"), document.getElementById("button4")];
let bar = 100;
let barID = null;

function loadQuestion() {
    let index;
    let found;

    do
    {
        index = Math.floor(Math.random() * 20);
        found = false;

        for(let i = 0; i < pickedQuestions.length; i++)
        {
            if(questions[index].question === pickedQuestions[i].question)
            {
                found = true;
            }
        }

    }while(found);

    pickedQuestions.push(questions[index]);

    document.getElementById("question").textContent = pickedQuestions[pickedQuestions.length - 1].question;
    buttons[0].textContent = pickedQuestions[pickedQuestions.length - 1].answers[0];
    buttons[1].textContent = pickedQuestions[pickedQuestions.length - 1].answers[1];
    buttons[2].textContent = pickedQuestions[pickedQuestions.length - 1].answers[2];
    buttons[3].textContent = pickedQuestions[pickedQuestions.length - 1].answers[3];

    remainingTime = 20;
    bar = 100;
    document.getElementById("inner").style.width = "100%";
    document.getElementById("inner").style.backgroundColor = "green";
    document.getElementById("time").textContent = remainingTime;
    clearInterval(countdownID);
    countdownID = setInterval(countdown, 1000);
    clearInterval(barID);
    barID = setInterval(decreaseBar, 25);
}

function decreaseBar()
{
    if(remainingTime >= 0)
    {
        bar -= 0.155;
        document.getElementById("inner").style.width = bar + "%";

        if(bar <= 15)
        {
            document.getElementById("inner").style.backgroundColor = "red";
        }
    }
    else
    {
        clearInterval(barID);
    }
}

function countdown() {
    remainingTime--;
    
    if(remainingTime > 0)
    {
        document.getElementById("time").textContent = remainingTime;
        /*bar = bar - 40;
        document.getElementById("inner").style.width = bar + "px";

        if(bar <= 200)
        {
            document.getElementById("inner").style.backgroundColor = "red";
        }*/
    }
    else
    {
        lost = 1;
        clearInterval(countdownID);
        showResult();
    }

}

for(let i = 0; i < buttons.length; i++)
{
    buttons[i].onclick = function() {
        clearInterval(countdownID);
        clearInterval(barID);
    
        if(buttons[i].textContent === pickedQuestions[pickedQuestions.length - 1].solution)
        {
            correct++;
            document.getElementById("score").textContent = "score: " + correct;
    
            if(correct === 20)
            {
                showResult();
            }
            else
            {
                loadQuestion();
            }
        }
        else
        {
            lost = 1;
            showResult();
        }
    }
}

function showResult() {
    for(let i = 0; i < buttons.length; i++)
    {
        buttons[i].onclick = null;
        if(buttons[i].textContent === pickedQuestions[pickedQuestions.length - 1].solution)
        {
            buttons[i].style.backgroundColor = "rgb(160, 255, 160)";
        }
        else
        {
            buttons[i].style.backgroundColor = "rgb(255, 123, 123)";
        }
    }

    if(remainingTime === 0)
    {
        document.getElementById("time").textContent = "Έληξε ο χρόνος! Απάντησες σωστά σε " + correct + " ερωτήσεις";
    }
    else if(lost === 1)
    {
        document.getElementById("time").textContent = "Λάθος απάντηση! Απάντησες σωστά σε " + correct + " ερωτήσεις";
    }
    else
    {
        document.getElementById("time").textContent = "Συγχαρητήρια απάντησες σωστά σε όλες τις ερωτήσεις";
    }

    document.getElementById("outer").remove();

    

    playAgainButton = document.createElement("button");

    //playAgainButton.style.position = "fixed";
    playAgainButton.style.width = "100px";
    playAgainButton.style.height = "40px";
    //playAgainButton.style.left = "910px";
    //playAgainButton.style.bottom = "150px";
    playAgainButton.textContent = "Παίξε ξανά";

    playAgainButton.setAttribute("id", "playAgainButton");
    document.body.appendChild(playAgainButton);

    document.getElementById("playAgainButton").onclick = function() {
        window.location.assign("quiz.html");
    }


    mainMenuButton = document.createElement("button");

    //mainMenuButton.style.position = "fixed";
    mainMenuButton.style.width = "120px";
    mainMenuButton.style.height = "40px";
    //mainMenuButton.style.left = "910px";
    //mainMenuButton.style.bottom = "100px";
    mainMenuButton.textContent = "Αρχικό Μενού";

    mainMenuButton.setAttribute("id", "mainMenuButton");
    document.body.appendChild(mainMenuButton);

    document.getElementById("mainMenuButton").onclick = function() {
        window.location.assign("../main_menu.php");
    }
}