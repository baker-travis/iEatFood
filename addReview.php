<?php

$dbAddress = "db556496731.db.1and1.com";
$dbUser = "dbo556496731";
$dbPass = "WeEatFood";
$dbName = "db556496731";

$con = mysqli_connect($dbAddress, $dbUser, $dbPass, $dbName);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$restaurantID = $_POST["restaurant-id"];
$userName = $_POST["user-name"];
$recommendedDish = $_POST["dish"];
echo "before optional";
$recommeded = $_POST["recommended"] == "on" ? 1 : 2;
$reviewText = $_POST["review"];

echo "before prepare";

if ($stmt = $con->prepare("INSERT INTO review (restaurant_id, the_user, recommended_dish, recommended, review_text)
VALUES (?, ?, ?, ?, ?)")) {
    echo "inside statement";
    $stmt->bind_param("sssis", $restaurantID, $userName, $recommendedDish, $recommeded, $reviewText);
    $stmt->execute();

    $stmt->close();
}

echo "1 review added";

?>