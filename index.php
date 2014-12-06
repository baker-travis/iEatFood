<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.css">
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.js"></script>
</head>
<body>
    <?php 
        include "preferences.php";
        include "main.php";
        include "details.php"
    ?>
  <div data-role="page" id="mainPage">
    <?php include "menu.php" ?>  

    <div data-role="main" class="ui-content">
      <p>Some Content</p>
    </div>

    <div data-role="footer">
      <h1>Footer Text</h1>
    </div>
  </div>
    <script>
        $.mobile.pageContainer.pagecontainer("change", "#preferences");
    </script>
</body>
</html>
