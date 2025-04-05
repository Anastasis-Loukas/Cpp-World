<?php
session_start();

if ($_SESSION == NULL) {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Αρχικό Μενού</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="styles/main-menu-style.css">

</head>

<body>

    <header>
        <img id="logo" src="images/logo2.jpg">
        <h1 id="title"> Ο Κόσμος της C++</h1>
        <!-- <button id="statistics">Στατιστικά</button>
            <button id="disconnect">Αποσύνδεση</button>-->
        <div id="menu" class="top-menu">

            <a href="statistics.php" id="statistics">Στατιστικά</a>
            <a href="logout.php" id="disconnect">Αποσύνδεση</a>
        </div>


    </header>

    <?php
    echo "<b>Αριθμός Μητρώου:</b> " . $_SESSION["am"] . "<br><b>Ονοματεπώνυμο:</b> " . $_SESSION["firstName"] . " " . $_SESSION["lastName"];
    ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-auto col-md-auto col-sm-auto">
                    <section>
                        <br><br>
                        <h2>Θεωρία</h2><br>
                        <a class="chapters" id="chapter1" href="chapter1/chapter1.html">Κεφάλαιο 1ο</a><br><br>
                        <a class="chapters" id="chapter2" href="chapter2/chapter2.html">Κεφάλαιο 2ο</a><br><br>
                        <a class="chapters" id="chapter3" href="chapter3/chapter3.html">Κεφάλαιο 3ο</a><br><br>
                        <a class="chapters" id="chapter4" href="chapter4/chapter4.html">Κεφάλαιο 4ο</a><br><br>
                        <a class="chapters" id="chapter5" href="chapter5/chapter5.html">Κεφάλαιο 5ο</a><br><br>
                        <!--<a class="chapters" id="chapter5" href="chapter5/chapter5.html">Κεφάλαιο 5ο</a><br><br>-->
                    </section>
                    <section>
                        <h2>Ασκήσεις</h2><br>

                        <?php

                        if ($_SESSION["grade1"] != NULL)
                            echo "<a class=\"finished_exercises\" id=\"exercise1\">Άσκηση 1η</a><br><br>";
                        else
                            echo "<a class=\"exercises\" id=\"exercise1\" href=\"chapter1/exercise1.html\">Άσκηση 1η</a><br><br>";

                        if ($_SESSION["grade2"] != NULL)
                            echo "<a class=\"finished_exercises\" id=\"exercise2\" >Άσκηση 2η</a><br><br>";
                        else
                            echo "<a class=\"exercises\" id=\"exercise2\" href=\"chapter2/exercise2.html\">Άσκηση 2η</a><br><br>";


                        if ($_SESSION["grade3"] != NULL)
                            echo "<a class=\"finished_exercises\" id=\"exercise3\" >Άσκηση 3η</a><br><br>";
                        else
                            echo "<a class=\"exercises\" id=\"exercise3\" href=\"chapter3/exercise3.html\">Άσκηση 3η</a><br><br>";

                        if ($_SESSION["grade4"] != NULL)
                            echo "<a class=\"finished_exercises\" id=\"exercise4\" >Άσκηση 4η</a><br><br>";
                        else
                            echo "<a class=\"exercises\" id=\"exercise4\" href=\"chapter4/exercise4.html\">Άσκηση 4η</a><br><br>";

                        if ($_SESSION["grade5"] != NULL)
                            echo "<a class=\"finished_exercises\" id=\"exercise5\" >Άσκηση 5η</a><br><br>";
                        else
                            echo "<a class=\"exercises\" id=\"exercise5\" href=\"chapter5/exercise5.html\">Άσκηση 5η</a><br><br>";

                        if ($_SESSION["final_grade"] != NULL)
                            echo "<a class=\"finished_exercises\" id=\"exerciseFinal\" >Τελική Άσκηση</a><br><br>";
                        else
                            echo "<a class=\"exercises\" id=\"exerciseFinal\" href=\"final/final_exercise.html\">Τελική Άσκηση</a><br><br>";


                        //<a class="exercises" id="exercise4" href="chapter4/exercise4.html">Άσκηση 4η</a><br><br>
                        //<a class="exercises" id="exercise5" href="chapter5/exercise5.html">Άσκηση 5η</a><br><br>
                        ?>

                        <button id="reset_grades">Εκκαθάριση βαθμών ασκήσεων </button>

                    </section>
                    <section>
                        <h2>Παιχνίδια</h2><br>
                        <!--
                        <a class="" id="" href="games/game1.html">Game 1</a><br><br>
                        <a class="" id="" href="games/game2.html">Game 2</a><br><br>
                        -->
                        <a class="quiz" href="games/quiz.html">Quiz</a><br><br>



                    </section>
                </div>
            </div>
        </div>

    </main>

    <script src="javascript/main-menu.js" type="text/javascript"></script>

</body>

</html>

<?php
exit;
?>