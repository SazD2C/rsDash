<!DOCTYPE HTML>
<head>

<style>
.results {
  position: relative;
  background-color: #36393E;
  width: 30%;
  text-align: center !important;
  padding-bottom: 30px;
  padding-top: 10px;
  height: 100%;
  transform: translate(125%,630%);
}
a {
  text-decoration: none;
  color: #C4C4C4;
}
#logo {
  top:40%;
  position: absolute;
  right: 33%;
}
html,body {
  background-color: #282C35;
  color: white;
  margin: 0px;
}
input {
  background-color: #282C35;
}
#rat {
  background-color: white !important;
  border: 0px;
  transform: translate(-50%,-50%);
  position: absolute;
  top: 50%;
  right:30%;
  padding: 20px;
}
#bug {
  border: 0px;
  background-color: white;
  transform: translate(-50%,-50%);
  position: absolute;
  top: 50%;
  padding: 20px;
  width:350px;
}


html,body {
margin: 0px;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

</style>
<title>
  RS search
</title>
</head>
<body>

  <ul>
    <li><a href="">Home</a></li>
    <li><a href="">Achievements</a></li>
    <li><a href="">User list generator</a></li>
    <li><a href="">Add new</a></li>
    <li><a href="">About</a></li>
    <li style="float:right"><a href="">Contact</a></li>
  </ul>


<center>
  <img src="rs.png" id="logo" alt="RS Logo" title="RS user dashboard"/><br />
  <form action="search.php" method="post">
    <input type="text" name="search" id="bug">
    <input type="submit" name="submit" value="search" id="rat">
  </form>
</center>
<?php
require_once('phpsearchcode.php');
?>
</body>
</html>
