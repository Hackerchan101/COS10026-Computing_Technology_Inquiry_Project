<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
        function sanitise_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }  

        require_once("setting.php"); //connection_info

        $conn = @mysqli_connect(
            $host,
            $user,
            $pwd,
            $sql_db
        );
    
        // Check If connection is successful
        if (!$conn) {
            //Display an error message
            echo ("<p>Database connection failure</p>");
        }   else {
            // upon successful connection

            $sql_table = "cars";
            
            //Get data from the form
            $make = trim($_POST["carmake"]);
            $model = trim($_POST["carmodel"]);
            $price = trim($_POST["price"]);
            $yom = trim($_POST["yom"]);

            //Input data validation
            $make = sanitise_input($make);
            $model = sanitise_input($model);
            $price = sanitise_input($price);
            $yom = sanitise_input($yom);
            
            $query = "insert into $sql_table (make, model, price, yom) values ('$make', '$model', '$price', '$yom')";
            //Execute query -we should really check to see if the database exist first.
            $result = mysqli_query($conn, $query);
            //Check if the execution was successful
            if (!$result) {
                echo "<p class\"wrong\>Something is wrong with ", $query,"</p>";
                //Would not show in a production script
            } else {
                //Display an operation successful message
                echo "<p class\"ok\">Successfully added New Car record </p>";
            } // If successful query operation

            //close the database connection
            mysqli_close($conn);
        }

        
    ?>

</body>
</html>