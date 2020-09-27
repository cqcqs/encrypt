<?php

$random = uniqid();
$data = [
	'username' => 15923866130,
	'password' => '123456',
	'timestamp' => time(),
	'random' => $random,
	'appkey' => '4rf4tyv90fd32j9k'
];
// 签名
$data['sign'] = sign($data);

// 加密
$encrypt = encrypt($data, $random);

echo "encrypt={$encrypt}&random={$random}";


function sign(array $data)
{
	ksort($data);
	$query = '';
	foreach ($data as $key => $val) {
		$query .= "{$key}={$val}&";
	}
	$query = trim($query, '&');

	$secret = '82bbc9132affa524151287a28ed4ffcb';
	return md5($secret . $query . $secret);
}

function encrypt(array $data, string $random)
{
	$data = json_encode($data);
	$method = 'aes-256-ecb';
	$encrypt = openssl_encrypt($data, $method, $random, OPENSSL_RAW_DATA);
	return base64_encode($encrypt);
}


/**
 * 两个参数，先解密identity获得随机数，再对随机数进行data解密，获得具体请求参数
 * @param string identity 非对称加密（时间戳+随机数）
 * @param string data     对称加密（具体参数json+随机数）
 *
 */