<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Αποτέλεσμα 2ης Άσκησης</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="../images/logo.png">
        <link rel="stylesheet" href="../styles/exercises-style.css">
        <link rel="stylesheet" href="../styles/results-style.css">
    </head>
    <body>
        <header>
            <h1 id="title">Άσκηση 2η</h1><br><br>
            <a href="../main_menu.php"><img id="logo" src="../images/logo2.jpg"></a>
            <button id="disconnect">Αποσύνδεση</button>
        </header>
        <?php
            
            $grade = 0;
            
            $answers = $_POST["answers"];
            $correctAnswerGrade = 10 / count($answers);
            $solutions = array("e", "C", "+", "W", "l", "d", "e", "a", "c", "b", "3", "2", "0", "4", "5", "5", "-1", "11", "23", "4");

            for($i = 0; $i < count($answers); $i++)
            {
                if($answers[$i] == $solutions[$i])
                {
                    $grade = $grade + $correctAnswerGrade;
                }
            }
            
            $conn = mysqli_connect("localhost", "pada_admin", "admin", "pada_students");
            if(!$conn)
            {
                die("Connection failed: " . mysqli_connect_error());
            }
            else
            {
                $command = "UPDATE students SET grade2=$grade WHERE am='".$_SESSION["am"]."' ";
                $update = mysqli_query($conn,$command);

                
                if(!$update)
                {
                    echo "Σφάλμα κατά την επεξεργασία των απαντήσεων";
                }
                else
                {
                    echo "Βαθμός δεύτερης άσκησης: $grade";
                }

                mysqli_close($conn);

                $_SESSION["grade2"] = $grade;
            }
        ?>
        <br><br><br><button id="return-button">Επιστροφή</button>

        <script src="../javascript/disconnect-button.js" type="text/javascript"></script>
        <script src="../javascript/return-button.js" type="text/javascript"></script>
        
        <?php
            exit;
        ?>
    </body>
</html>