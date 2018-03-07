<!DOCTYPE HTML>
<head>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- <link rel="stylesheet" type="text/css" href="css/search.css"/> -->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<title>
  RS search
</title>
</head>
<body>
  <span id="colour"> </span>
<script>
if (document.cookie.indexOf("theme[light]=") != -1) {
    document.getElementById('colour').innerHTML = '<link rel="stylesheet" type="text/css" href="css/light/search.css"/>';
} else if (document.cookie.indexOf("theme[light]=") == -1) {
  document.getElementById('colour').innerHTML = '<link rel="stylesheet" type="text/css" href="css/search.css"/>';
}
</script>
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script>
function load() {
    $("#paste").load("settings.php");
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
    <li><a href="adduser.php">Add new user</a></li>
    <li ><a href="#" onclick="load(); return false;">Settings</a></li>
    <li><a href="about.html">About</a></li>
    <li style="float:right"><a href="mailto:saz@cerberusbyte.com">Contact</a></li>
  </ul>

<div id="paste"></div>
<br /><br /><br /><br /><br /><br />
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
  <img src="rs.png" id="logo" alt="RS Logo" title="RS user dashboard"/><br /><br /><br />
  <form action="index.php" method="post" id="searchbar">
    <input type="text" name="search" id="bug">
    <input type="submit" name="submit" value="search" id="rat">
  </form>
  <?php
  require_once('php/phpsearchcode.php');
  ?>
</div>
  <div class="col-md-4"></div>
</div>
</body>
</html>
