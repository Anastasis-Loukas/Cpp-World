<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Είσοδος φοιτητή</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                $command = "SELECT * FROM students WHERE am='" . $_POST["am"] . "' && password='" . $_POST["password"] . "' ";
                $select = mysqli_query($conn,$command);

                $arr = mysqli_fetch_array($select);
                if($arr == NULL)
                {
                    mysqli_close($conn);
                    header("Location: iframes/login_retry.html");
                    exit;
                }
                else
                {
                    mysqli_close($conn);

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
                    
                    echo "<script>top.window.location.assign(\"main_menu.php\") </script>";

                    exit;

                }
            }
        ?>
    </body>
</html>