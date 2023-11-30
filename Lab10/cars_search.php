<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lab 10</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="Minh Hoang Duong">
</head>
<body>

<?php
require_once("setting.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    echo "<p>Database connection failure</p>";
} else {
    $sql_table = "cars";
    $make = isset($_POST["make"]) ? trim($_POST["make"]) : "";
    $model = isset($_POST["model"]) ? trim($_POST["model"]) : "";
    $price = isset($_POST["price"]) ? trim($_POST["price"]) : "";
    $yom = isset($_POST["yom"]) ? trim($_POST["yom"]) : "";

    function sanitise_input($data)
    {
        $data = trim($data); #remove leading/trailing spaces 
        $data = stripslashes($data); #remove '\' in front of quotes
        $data = htmlspecialchars($data); #convert < > to &lt and &gt
        return $data;
    }

    $make = sanitise_input($make);
    $model = sanitise_input($model);
    $price = sanitise_input($price);
    $yom = sanitise_input($yom);

    // Check if any search criteria is provided
    if (!empty($make) || !empty($model) || !empty($price) || !empty($yom)) {
        $query = "SELECT make, model, price, yom FROM $sql_table WHERE 1=1";
        if (!empty($make)) {
            $query .= " AND make = '$make'";
        }
        if (!empty($model)) {
            $query .= " AND model = '$model'";
        }
        if (!empty($price)) {
            $query .= " AND price <= $price";
        }
        if (!empty($yom)) {
            $query .= " AND yom = '$yom'";
        }

        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        } else {
            if (mysqli_num_rows($result) > 0) {
                echo "<table border=\"1\">";
                echo "<tr>\n"
                    . "<th scope=\"col\">Make</th>\n"
                    . "<th scope=\"col\">Model</th>\n"
                    . "<th scope=\"col\">Price</th>\n"
                    . "<th scope=\"col\">Year of Manufacture</th>\n"
                    . "</tr>\n";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n"
                        . "<td>" . $row["make"] . "</td>\n"
                        . "<td>" . $row["model"] . "</td>\n"
                        . "<td>" . $row["price"] . "</td>\n"
                        . "<td>" . $row["yom"] . "</td>\n"
                        . "</tr>\n";
                }
                echo "</table>\n";

                // Free up the memory, after using the result pointer
                mysqli_free_result($result);
            } else {
                echo "<h1>No matching records found.</h1>";
            }
        }
    } else {
        echo "<h1>Please provide at least one search criteria.</h1>";
    }

    mysqli_close($conn);
}
?>
</body>
</html>