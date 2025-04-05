<?php
    session_start();

    if($_SESSION == NULL)
    {
        header("Location: index.html");
        exit;
    }  

    $_SESSION["grade1"] = NULL;
    $_SESSION["grade2"] = NULL;
    $_SESSION["grade3"] = NULL;
    $_SESSION["grade4"] = NULL;
    $_SESSION["grade5"] = NULL;
    $_SESSION["final_grade"] = NULL;

    
    $conn = mysqli_connect("localhost", "pada_admin", "admin", "pada_students");
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        $command = "UPDATE students SET grade1 = NULL , grade2 = NULL , grade3 = NULL , grade4 = NULL, grade5 = NULL, final_grade = NULL WHERE am='".$_SESSION["am"]."' ";
        $update = mysqli_query($conn,$command);
        mysqli_close($conn);
    }

    header("Location: main_menu.php");
    
    exit;
?>