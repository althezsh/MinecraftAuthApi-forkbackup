<?php

function http_post_json($url, $jsonStr)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($jsonStr)
        )
    );
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
 
    return $response;
}

function mojang_auth($username, $password) {
    $apiurl = "https://authserver.mojang.com/authenticate";
    $clientToken = time();
    $jsondata = json_encode(array('agent' => array('name' => 'Minecraft', 'version' => 1), 'username' => $username, 'password' => $password, 'clientToken' => $clientToken, 'requestUser' => 'true'));
    return http_post_json($apiurl, $jsondata);
}

?>