<?php
include 'header.php';
include "database.php";
$users = $db->query("SELECT * FROM `user`");
while($user = $users->fetch())
{
    echo $user["name"]."<br>";
}
include 'footer.php';