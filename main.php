<?php session_start() ?>

<div data-role="page" id="main">
    <?php include "menu.php" ?>
    <div data-role="main" class="ui-content">
        
        <input data-type="search" placeholder="Search for restaurant..." onchange="searchForRestaurant()" id="restaurantSearch">
        
        <ul data-role="listview" data-inset="true" id="restaurants"></ul>
        
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
                console.log(data);
                if (data.businesses !== undefined && data.businesses.length != 0) {
                    console.log(data.businesses);
                    fillData(data.businesses);
                } else {
                    console.log("No businesses found.");
                }
            }, "json");
            
            //"http://api.yelp.com/v2/search?term=" + encodeURIComponent(restaurant) +"&ll=37.788022,-122.399797"
        }
        
        function fillData(data) {
            var restaurantList = "";
        
            for (var i = 0; i < data.length; i++) {
                restaurantList += "<li><a href=\"#details?id=" + data[i].id + "\">";
                restaurantList += "<img src=\"" + data[i].image_url + "\">";
                restaurantList += "<h2>" + data[i].name + "</h2>";
                restaurantList += "<p>" + data[i].location.display_address[0] + "<br />" + data[i].location.display_address[1] + "</p>";
                restaurantList += "</a></li>";
            }
            
            $("#restaurants").html(restaurantList);
            $("#restaurants").listview("refresh");
        }
        
        getLocation();
    </script>
</div>