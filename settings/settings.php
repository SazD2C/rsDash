<link rel="stylesheet" type="text/css" href="../css/settings.css"/>
<link rel="stylesheet" type="text/css" href="../css/settingsPage.css"/>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<title>
  rsDash Settings
</title>
<style>
input[type=checkbox]{
	height: 0;
	width: 0;
	visibility: hidden;
}

label {
	cursor: pointer;
	text-indent: -9999px;
	width: 70px;
	height: 30px;
	background: grey;
	display: block;
	position: relative;
}

label:after {
	content: '';
	position: absolute;
	top: 5px;
	left: 5px;
	width: 20px;
	height: 20px;
	background: #fff;
	transition: 0.3s;
}

input:checked + label {
	background: #bada55;
}

input:checked + label:after {
  left: calc(100% - 5px);
	transform: translateX(-100%);
}

label:active:after {
	width: 43.3px;
}

body {
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
}
</style>

<script type="text/javascript">
function alertCookie() {
if (document.cookie.indexOf("theme[light]=") >= 0) {
      alert("Dark"); // remove once fully tested, see note below
      document.cookie = "theme[light]" + "=" + "" + ";" +" expires=Thu, 18 Dec 2013 12:00:00 UTC; path=/;";
  } else {
      document.cookie = "theme[light]=1; path=/;";
      alert("Light"); // remove once fully tested, see note below
  }
}
</script>
<div id="red">
<ul>
  <li><a href="#main">Main - <span class="light">  Usercount, stats and other information </span></a></li>
  <li><a href="#" onclick="loadSkill(); return false;">Skills - <span class="light"> Add or remove more user skills </span></a></li>
  <li><a href="#">Settings - <span class="light"> rsChat settings </span></a></li>
  <li><a href="../about.html">About - <span class="light"> About rsDash </span></a></li>
  <br />
  <li><a href="/">Exit</a></li>
</ul>
<div id="mainSettingsContent">
  <br />
  <span class="settingsItemTitle">
    Light Theme
  </span>
<!-- Change this so it uses cookie existance to determine if active -->
<input type="checkbox" id="switch" /><label for="switch"  onclick="alertCookie();">Toggle</label>
</div>
</div>
