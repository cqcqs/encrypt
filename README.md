# PHP 加密解密

## client.php

客户端进行 `aes` 加密

### 生成签名

- 按照参数名升序排列（空值不进行加密）
- 按url请求形式拼接字符串，并对其进行url编码
- MD5加密，加密方式：app_secret + 参数拼接后的字符串 + app_secret

```php
$queryStr = 'app_key=123456&nonce_str=qwerasdf&sign_type=md5&timestamp=1100999988&username=stephen';
md5(url_encode($queryStr))
```

### 加密

将生成签名后参数，转为json对象，并采用 `aes-256-ecb` 方式加密，加密密钥为生成的随机字符串 `nonce_str`

### 示例

```php
$appKey = 'appkey';
$appSecret = 'appsecret';
$nonceStr = substr(uniqid(), 0, 8);

//请求所需要的参数
$data = [
    'nonce_str' => $nonceStr,
    'timestamp' => time(),
    'app_key' => $appKey,
    'sign_type' => 'MD5',
    'username' => 'stephen'
];

//签名
ksort($data);
$queryStr = build_query($data);
$data['sign'] = md5($appSecret . $queryStr . $appSecret);

//加密
$method = 'aes-256-ecb';
$data = json_encode($data);
$encrypt = base64_encode(openssl_encrypt($data, $method, $nonceStr, OPENSSL_RAW_DATA));

return [
    'nonce_str' => $nonceStr,
    'certificate' => $encrypt
];
```

## server.php

服务器端进行 `aes` 解密

## rsa.php

`rsa` 加密，公钥加密，私钥解密
