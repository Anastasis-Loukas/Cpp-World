<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Εμφάνιση Βαθμών Μαθητή</title>

   <!-- <link rel="stylesheet" href="styles/main-menu-style.css">-->
    <link rel="stylesheet" href="styles/statistics.css">

</head>
<body>
      <header>
            <a href="main_menu.php"><img id="logo" src="images/logo2.jpg"></a>
            <h1 id="title"> Ο Κόσμος της C++</h1>
            <div id="menu" class="top-menu">
   
                <a href="logout.php" id="disconnect">Αποσύνδεση</a>
            </div>

            
        </header>


    <div class="container">
        <h1>Βαθμοί Μαθητή</h1>

       
        <?php
            //Υποθέτουμε ότι έχετε τους βαθμούς διαθέσιμους στις μεταβλητές PHP
            $average = NULL;
            $grade1 = $_SESSION["grade1"];//15% η καθε ασκ κεφαλαιου
            $grade2 = $_SESSION["grade2"];
            $grade3 = $_SESSION["grade3"];
            $grade4 = $_SESSION["grade4"];
            $grade5 = $_SESSION["grade5"];
            $final_grade = $_SESSION["final_grade"];// 100 - 10*5 = 100-50 = 50% η τελικη ασκ
            if($grade1 && $grade2 && $grade3 && $final_grade)
                $average = $grade1*0.1 + $grade2*0.1 + $grade3*0.1 + $grade4*0.1 + $grade5*0.1 +  $final_grade*0.5;
            
        ?>

        <table>
            <tr>
                <th>Άσκηση 1</th>
                <td><?php 
                if($grade1 != NULL)
                    echo number_format($grade1,2) . '/10'; 
                else
                   echo "-";
                ?></td>
            </tr>
            <tr>
                <th>Άσκηση 2</th>
                <td><?php 
                if($grade2 != NULL)
                    echo number_format($grade2,2) . '/10'; 
                else
                   echo "-"; ?></td>
            </tr>
            <tr>
                <th>Άσκηση 3</th>
                <td><?php 
                if($grade3 != NULL)
                    echo number_format($grade3,2) . '/10'; 
                 else
                    echo "-";
                
                ?></td>
            </tr>
            <tr>
                <th>Άσκηση 4</th>
                <td><?php 
                if($grade4 != NULL)
                    echo number_format($grade4,2) . '/10'; 
                 else
                    echo "-";
                
                ?></td>
            </tr>
            <tr>
                <th>Άσκηση 5</th>
                <td><?php 
                if($grade5 != NULL)
                    echo number_format($grade5,2) . '/10'; 
                 else
                    echo "-";
                
                ?></td>
            </tr>
            <tr>
                <th>Τελική άσκηση</th>
                <td><?php 
                    if($final_grade != NULL)
                        echo number_format($final_grade,2) . '/10'; 
                    else
                        echo "-";
                
                
                ?></td>
            </tr>
            <tr>
                <th>Μέσος Όρος</th>
                <td>
                    <?php 
                    if($average != NULL)
                        echo number_format($average, 2) . '/10'; 
                    else
                      echo "-";
                    
                ?>
                
            </td> <!--μέσος όρος με 2 δεκαδικά ψηφία-->



            </tr>
        </table>

        <p>
           <?php
            if($average == NULL){
                echo "";
            }else if ($average < 5) {
                echo "Λυπάμε αλλά κόπηκες.";
            } else {
                echo "Καλά τα πήγες. Μπράβο σου!";
            }

           ?>
           
        </p>

    </div>
</body>
</html>