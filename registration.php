<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Εγγραφή Φοιτητή</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="styles/registration-style.css">
    </head>
    <body>
        <?php

            $_SESSION = array();
            
            $conn = mysqli_connect("localhost", "pada_admin", "admin", "pada_students");
            if(!$conn)
            {
                die("Connection failed: " . mysqli_connect_error());
            }
            else
            {
                $command = "SELECT * FROM students WHERE email='" . $_POST["email"] . "' ";
                $select = mysqli_query($conn,$command);
                
                if(mysqli_num_rows($select) != 0)
                {
                    mysqli_close($conn);
                    header("Location: iframes/register_retry.html");
                    exit;
                }

                //hashing email , password

                $command = "INSERT INTO students(firstname, lastName, email, password) 
                    VALUES ('" . $_POST["firstName"] . "', '" . $_POST["lastName"] . "', '" . $_POST["email"] . "', '" . $_POST["password"] . "' )";
                $insert = mysqli_query($conn,$command);
                
                if(!$insert)
                {
                    echo "Σφάλμα κατά την εγγραφή του φοιτητή: " . mysqli_error($conn) . "<br>";
                    mysqli_close($conn);
                    exit;
                }
                else
                {
                    $command = "SELECT * FROM students ORDER BY am DESC LIMIT 1";
                    $select = mysqli_query($conn,$command);

                    $arr = mysqli_fetch_array($select);

                    $_SESSION["am"] = $arr["am"];
                    $_SESSION["firstName"] = $arr["firstName"];
                    $_SESSION["lastName"] = $arr["lastName"];
                    $_SESSION["email"] = $arr["email"];
                    $_SESSION["grade1"] = $arr["grade1"];
                    $_SESSION["grade2"] = $arr["grade2"];
                    $_SESSION["grade3"] = $arr["grade3"];
                    $_SESSION["grade4"] = $arr["grade4"];
                    $_SESSION["grade5"] = $arr["grade5"];
                    $_SESSION["final_grade"] = $arr["final_grade"];

                    mysqli_close($conn);

                    echo "Η εγγραφή σας ολοκληρώθηκε με επιτυχία. Ο αριθμός μητρώου που σας ανατέθηκε είναι ο: " . $_SESSION["am"] . ". Σε μελλοντικές συνδέσεις σας θα πρέπει να εισάγεται τον αριθμό μητρώου και τον κωδικό σας";
                    ?>

                    <br><br><button id="button-el"><span>Συνέχεια</span></button>

                    <script src="javascript/registration.js" type="text/javascript"></script>

                    <?php
                    exit;

                }
            }
        ?>
    </body>
</html>