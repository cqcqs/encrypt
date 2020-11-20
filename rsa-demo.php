<?php

require_once 'src/RSA.php';

$content = "Stephen";

// 加密
$encrypt = RSA::encrypt($content);
print_r($encrypt);

echo "<br/>";

// 解密
$data = RSA::decrypt($encrypt);
print_r($data);
