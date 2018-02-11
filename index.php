<!DOCTYPE HTML>
<head>
<link rel="stylesheet" type="text/css" href="css/search.css"/>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<title>
  RS search
</title>
</head>
<body>
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script>
function load() {
    $("#paste").load("settings.html");
    $("#logo").css("display", "none");
    $("#searchRes").css("display", "none");
    $(".results").hide();
    $("#nav").hide();
    $("#searchbar").hide();
}
</script>
  <ul id="nav">
    <li><a href="">Home</a></li>
    <li><a href="">Achievements</a></li>
    <li><a href="usrlister.php">User list generator</a></li>
    <li><a href="newuser.php">Add new user</a></li>
    <li ><a href="#" onclick="load(); return false;">Settings</a></li>
    <li><a href="">About</a></li>
    <li style="float:right"><a href="">Contact</a></li>
  </ul>

<div id="paste"></div>
<center>

  <img src="rs.png" id="logo" alt="RS Logo" title="RS user dashboard"/><br />
  <form action="index.php" method="post" id="searchbar">
    <input type="text" name="search" id="bug">
    <input type="submit" name="submit" value="search" id="rat">
  </form>
</center>

<?php
require_once('php/phpsearchcode.php');
?>
</body>
</html>
