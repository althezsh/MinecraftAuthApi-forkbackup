<?php

header('content-type:application/json;charset=utf-8');

include 'src/mojang_auth_post.php';

$email = $_GET["email"];
$password = $_GET["password"];

if(isset($email)&&isset($password)){
    $data = json_decode(mojang_auth($email, $password));
    if(isset($data->error)){
        echo json_encode(array('status' => "error", 'msg' => "账户或密码输入错误"), JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
    }else{
        echo json_encode(array('status' => "success", 'info' => array('user' => $data->user->username, 'regcountry' => $data->user->properties[1]->value, 'selectedProfile' => $data->selectedProfile, 'availableProfiles' => $data->availableProfiles)), JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
    }
}else{
    echo "非法访问";
}

?>