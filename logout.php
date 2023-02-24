<?php
$http_host = $_SERVER['HTTP_HOST'];

// && : and 연산자 
// ? : 삼항 연산자 --> https가 있고 https가 on 이면 htts 아니면 http 
$host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http").'://'.$http_host.'ez_1';

$host = 'http://localhost/ez_jin';


?>