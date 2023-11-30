<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Rohirrim Tour Booking Confirmation</h1>
    <!-- Begin processing-->
    <?php

        function sanitise_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }       
        //Input_Validation

        //First_name
        if (isset ($_POST["firstname"]))  {
            $firstname = $_POST["firstname"];
            // echo ("<p>This is a test: You first name is $firstname</p>");
        } else {
            header ("location: register.html");

        }

        //Last_name
        if (isset ($_POST["lastname"]))  {
            $lastname = $_POST["lastname"];
            // echo ("<p>This is a test: You last name is $lastname</p>");
        } else {
            header ("location: register.html");
        }
        
        //Age
        if (isset ($_POST["age"])) {
            $age = $_POST["age"];
            // echo ("<p>This is a test: You age is $age</p>");
        } else {
            header ("location: register.html");
        }

        //food
        if (isset ($_POST["food"])) {
            $food = $_POST["food"];
            // echo ("<p>This is a test: You food is $food</p>");
        } else {
            header ("location: register.html");
        }

        //party_size
        if (isset ($_POST["partySize"])) {
            $partySize = $_POST["partySize"];
            // echo ("<p>This is a test: You party size is $partySize</p>");
        } else {
            header ("location: register.html");
        }
        
        //species-radio_check_box
        if (isset ($_POST["species"])) {
            $species = $_POST["species"];
        } else {
            $species = "Unknow species";
        }
        //tour-selection_check_box
        $tour = "";
        $count = 0;
        if (isset($_POST["1day"])) {
            $tour .= "One-day tour";
            $count += 1;
        }
        if (isset($_POST["4day"])) {
            if ($count > 0) {
                $tour .= " and Four-day tour";
            } else {
                $tour .= "Four-day tour";
            }
            $count += 1;
        }
        if (isset($_POST["10day"])) {
            if ($count > 0) {
                $tour .= " and Ten-day tour";
            } else {
                $tour .= "Ten-day tour";
            }
            $count += 1;
        }

        //Data_sanitation
        $firstname = sanitise_input($firstname);
        $lastname = sanitise_input($lastname);
        $tour = sanitise_input($tour);
        $species = sanitise_input($species);
        $age = sanitise_input($age);
        $food = sanitise_input($food);
        $partySize = sanitise_input($partySize);

        //Input_Validation_by_Regrex
        $errorMsg = "";
        //first_name
        if ($firstname =="") {
            $errorMsg .= "<p>You must enter your first name.</p>";
        } else if ( !preg_match("/^[a-zA-Z]*$/", $firstname)) {
            $errorMsg .= "<p>Only alpha letters allowed in your first name.</p>";
        }
        //last_name
        if ($lastname == "") {
            $errorMsg .= "<p>You must enter your last name.</p>";
        } else if (!preg_match("/^[a-zA-Z\-]*$/", $lastname)) {
            $errorMsg .= "<p>Only alpha letters and hyphen allowed in your last name.</p>";
        }
        //age
        if (!is_numeric($age) || $age < 10 || $age > 10000) {
            $errorMsg .= "<p>You are not old enough</p>.";
        }

        if ($errorMsg != ""){
            echo ("<p>$errorMsg</p>");
        } else {
            echo("
            <p>
                Welcome $firstname $lastname! <br>
                Your are now booked on the $tour. <br>
                Species: $species <br>
                Age: $age <br>
                Meal Preference: $food <br>
                Number of travellers: $partySize <br>
            </p>
        ");
        }
    ?>
</body>
</html>