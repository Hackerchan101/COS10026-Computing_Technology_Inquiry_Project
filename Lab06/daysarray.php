<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP DAY</title>
</head>
<body>
<?php
        $days = array ( "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"); //declare and initialise array
        echo ("<p>The Days of the week in English are: ");
        for ($i = 0; $i < count($days); $i++) {
            echo( $days[$i]);

            if ($days[$i] == "Saturday")
                echo (".");
            else
                echo (", ");
          }

        $days = array ("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"); //declare and initialise array
        echo ("<p>The Days of the week in French are: ");
        for ($i = 0; $i < count($days); $i++) {
            echo( $days[$i]);

            if ($days[$i] == "Samedi")
                echo (".");
            else
                echo (", ");
          }
        echo "</p>";
    ?>
</body>
</html>