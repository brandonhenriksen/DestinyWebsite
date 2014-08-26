<?php
$errors=[];
$submission = json_decode($app->request->getBody());

$query=$db->query("select count(id) as `exists` from user where psn_name ='".$submission->psn_name."'");
$exists=$query->fetch();

if(!$exists["exists"]) {
$errors[]="PSN ID Already Exists";

}


if($submission->psn_name==""){
    $errors[]="PSN ID is Required";
}


if(empty($errors)){
    $db->exec("insert into user (psn_name) VALUES ('" . $submission->psn_name . "')");
    $query = $db->query("select id from user where psn_name = '" . $submission->psn_name . "'");
    $user = $query->fetch();
    $id = $user["id"];


    foreach ($submission->days as $day) {
        $db->exec("insert into user_days (user_id,days_id) VALUES ('" . $id . "','" . $day . "')");
    }
    foreach ($submission->times as $time) {
        $db->exec("insert into user_times (user_id,times_id) VALUES ('" . $id . "','" . $time . "')");
    }
    echo json_encode(array("success"=>"1"));
}else{
    echo json_encode(array("errors"=>$errors));
}






