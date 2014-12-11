<?php

$dbAddress = "db556496731.db.1and1.com";
$dbUser = "dbo556496731";
$dbPass = "WeEatFood";
$dbName = "db556496731";

$con = mysqli_connect($dbAddress, $dbUser, $dbPass, $dbName);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$restaurantID = $_GET["restaurantid"];

$reviews = array();

if ($stmt = $con->prepare("SELECT reviewd_on, the_user, recommended_dish, recommended, review_text FROM review WHERE restaurant_id=?")) {
    $stmt->bind_param("s", $restaurantID);
    $stmt->execute();
    $stmt->bind_result($reviewDate, $user, $dish, $recommended, $text);
    
    while ($stmt->fetch()) {
        $reviews[] = array("reviewDate"=>$reviewDate, "user"=>$user, "dish"=>$dish, "recommended"=>$recommended, "review"=>$text);
    }

    $stmt->close();
}

echo json_encode($reviews);

?>