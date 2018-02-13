<link rel="stylesheet" type="text/css" href="css/settings.css"/>
<!-- The following jQuery is non functional -->
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script>
function return() {
    $("#logo").css("display", "visible");
    $("#searchRes").css("display", "visible");
    $(".results").show();
    $("#nav").show();
    $("#searchbar").show();
    $("#red").hide();
}
function loadSkill() {
  $("#mainSettingsContent").load("settingsSkils.php");
  $("#nav").hide();
}
</script>
<div id="red">
<ul>
  <li><a href="#main">Main - <span class="light">  Usercount, stats and other information </span></a></li>
  <li><a href="#" onclick="loadSkill(); return false;">Skills - <span class="light"> Add or remove more user skills </span></a></li>
  <li><a href="#">Settings - <span class="light"> rsChat settings </span></a></li>
  <li><a href="#">About - <span class="light"> About rsDash </span></a></li>
  <br />
  <li><a href="" onclick="return(); return false;">Exit</a></li>
</ul>
<div id="mainSettingsContent">  <iframe id="frame" src="settings/mainSettingsSandbox.php" width="100%" height="100%"  frameBorder="0" class="frame"></iframe></div>
</div>
