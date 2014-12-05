<?php session_start() ?>

<div data-role="page" id="main">
    <?php include "menu.php" ?>
    <div data-role="main" class="ui-content">
        
        <input data-type="search" placeholder="Search for restaurant..." onchange="searchForRestaurant()" id="restaurantSearch">
        
    </div>
    <script>
        var latitude;
        var longitude;
        
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
        
        function showPosition(position) {
            latitude = position.coords.latitude;
            longitude = position.coords.longitude;
            
            console.log(latitude + ", " + longitude)
        }
        
        function searchForRestaurant() {
            var restaurant = $("#restaurantSearch").val();
            
            console.log(restaurant);
            
            $.get("yelpRequests.php", {location: latitude + "," + longitude, searchTerm: restaurant, locationType: "ll", action: "search"},
                  function(data) {
                if (data.businesses !== undefined && data.businesses.length != 0) {
                    console.log(data.businesses);
                } else {
                    console.log("No businesses found.");
                }
            }, "json");
            
            //"http://api.yelp.com/v2/search?term=" + encodeURIComponent(restaurant) +"&ll=37.788022,-122.399797"
        }
        
        getLocation();
    </script>
</div>