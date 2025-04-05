<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Αποτέλεσμα Τελικής Άσκησης</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        

        <link rel="icon" href="../images/logo.png">
        <link rel="stylesheet" href="../styles/exercises-style.css">
        <link rel="stylesheet" href="../styles/results-style.css">
        <link rel="stylesheet" href="../styles/final-result-style.css">
    </head>
    <body>
        <header>

            <h1 id="title">Τελική Άσκηση</h1><br><br>
            <a href="../main_menu.php"><img id="logo" src="../images/logo2.jpg"></a>
            <button id="disconnect">Αποσύνδεση</button>

            <button id="text-cloud">Κόπηκες</button>
        </header>
        <?php
            
            $grade = 0;
            
            $answers = $_POST["answers"];
            $correctAnswerGrade = 10 / count($answers);
            $solutions = array("d", "e", "b", "a", "c",
                                "3", "2", "2", "1.5", "1", "0",
                                "d", "e", "a", "c", "b",
                                "3", "2", "0", "4", "5", "5", "-1", "11", "23", "4",
                                "e", "a", "d", "c", "b",
                                "7", "4", "7", "7", "4", "7", "1000", "1004", "1008", "1000", "1012", "1000", "1020", "1004", "1000",
                                "5", "10", "10", "5", "10", "5",
                                "b", "c", "e", "a", "d");

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
                $command = "UPDATE students SET final_grade=$grade WHERE am='".$_SESSION["am"]."' ";
                $update = mysqli_query($conn,$command);

                
                if(!$update)
                {
                    echo "Σφάλμα κατά την επεξεργασία των απαντήσεων";
                }
                else
                {
                    echo "Βαθμός τελικής άσκησης: $grade";
                }

                

                mysqli_close($conn);

                $_SESSION["final_grade"] = $grade;

                
                if($grade < 5)
                {
                    ?>
                    <script src="../javascript/final-result.js" type="text/javascript"></script>
                    <?php
                }
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