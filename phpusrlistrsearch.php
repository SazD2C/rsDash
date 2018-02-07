<?php
error_reporting(E_ALL ^ E_NOTICE);
if (empty($user_name)) $user_name = '';
    $connection = @mysqli_connect("localhost","root","","RS");
    if($connection->connect_error){//show error if connection failed
        die("Connection failed: " . $connection->connect_error);
    }
    $sql="SELECT INFORMATION_SCHEMA.COLUMNS FROM userinfo WHERE INFORMATION_SCHEMA.COLUMNS LIKE '%" . $_POST['search'] . "%';";
    $res=$connection->query($sql);
    while($row=$res->fetch_assoc()){
        echo "<div class='results'><p> Username: <a href='profile.php?user=" . $row['username'] . "'> " . $row['username'] . "</a></p></div>";
    }
    mysqli_close($connection);
?>
