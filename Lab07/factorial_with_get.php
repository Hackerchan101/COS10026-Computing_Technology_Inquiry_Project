<?php
    include ("mathfunctions.php")
?>
<h1> Factiorial </h1>
<?php
    if (isset ($_GET["number"])) {
        $numb = $_GET["number"];
    }
    if (isPositiveInteger($numb)) {
        echo "<p>", $numb,"! is ", factorial($numb), ".</p>";
    } else {
        echo "<p>Please enter a positive integer.</p>";
    }
    echo "<p><a href='factorial.html'>Return to the Entry Page</a></p>"
?>