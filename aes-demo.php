<?php

require_once 'src/AES.php';

$random = uniqid();
$data = [
    'username' => 'cqcqs',
    'password' => '123456',
    'timestamp' => time(),
    'random' => $random,
    'appkey' => '4rf4tyv90fd32j9k'
];

$aes = new AES();
$aes->setEncryptKey($random);
$aes->setSignSecret('82bbc9132affa524151287a28ed4ffcb');

// 加密
$data['sign'] = $aes->signature($data);
$encrypt = $aes->encrypt($data);
print_r($encrypt);

echo "<br/>";

// 解密
$data = $aes->decrypt($encrypt);
if (abs($data['timestamp'] - time()) > 600) {
    echo '请求已经过期';
    die;
}

$res = $aes->verifySignature($data);
if (!$res) {
    echo '签名验证失败';
    die;
}
