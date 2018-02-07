<!DOCTYPE HTML>
<head>
<link rel="stylesheet" type="text/css" href="css/search.css"/>
<title>
  RS search
</title>
</head>
<body>

  <ul>
    <li><a href="">Home</a></li>
    <li><a href="">Achievements</a></li>
    <li><a href="usrlister.php">User list generator</a></li>
    <li><a href="">Add new</a></li>
    <li><a href="">About</a></li>
    <li style="float:right"><a href="">Contact</a></li>
  </ul>


<center>
  <img src="rs.png" id="logo" alt="RS Logo" title="RS user dashboard"/><br />
  <form action="index.php" method="post">
    <input type="text" name="search" id="bug">
    <input type="submit" name="submit" value="search" id="rat">
  </form>
</center>

<?php
require_once('phpsearchcode.php');
?>
</body>
</html>
