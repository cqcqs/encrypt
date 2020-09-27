<?php

$random = $_POST['random'];
$encrypt = $_POST['encrypt'];

// 解密
$data = decrypt($encrypt, $random);
if (!$data) {
	echo "请求错误";die;
}
if (abs($data['timestamp'] - time()) > 600) {
	echo "请求过期";die;
}

// 验签
$res = verifySign($data);
print_r($res);die;


function decrypt(string $encrypt, string $random) : array
{
	$method = 'aes-256-ecb';
	$encrypt = base64_decode($encrypt);
	$decrypt = openssl_decrypt($encrypt, $method, $random, OPENSSL_RAW_DATA);
	return $decrypt ? json_decode($decrypt, true) : [];
}

function verifySign(array $data)
{
	$sign = $data['sign'];
	unset($data['sign']);
	ksort($data);

	$query = '';
	foreach ($data as $key => $val) {
		$query .= "{$key}={$val}&";
	}
	$query = trim($query, '&');

	$secret = '82bbc9132affa524151287a28ed4ffcb';
	return md5($secret . $query . $secret) == $sign;
}