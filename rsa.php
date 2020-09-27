<?php

$public = "-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzyxcFC/vC1jqpkQxgLR2
++DGIY+9LVB+FOfwYGFQQXotScDoXY7eES8kfpjj4U+wJ29TVoH0HD3I1/+zc7N9
rvrfMzdaL+/iXOakX4tV/W8BiA8ARtwYpi+JMyp3HDUrmtvUtxsxKO4HJSd8JUEM
Mg3q/n6ICf19wv83v+y+cDCpw+mqd5sFSAjDU8gQByX2BZ+TiEorXOaVwVT+/8Tp
K8js6uU5pxto8uG1JT7FVoYveOLZEoh9AywmSvRUU6vBticSvyHY7SPRhwOHmEC0
B4GEdYW5cFUJuRGDfrV5CYSluZJ5oLkhCO2U5kRxymrNWGkgEB3i8rIZQO7ahe23
RQIDAQAB
-----END PUBLIC KEY-----";

$private = "-----BEGIN PRIVATE KEY-----
MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDPLFwUL+8LWOqm
RDGAtHb74MYhj70tUH4U5/BgYVBBei1JwOhdjt4RLyR+mOPhT7Anb1NWgfQcPcjX
/7Nzs32u+t8zN1ov7+Jc5qRfi1X9bwGIDwBG3BimL4kzKnccNSua29S3GzEo7gcl
J3wlQQwyDer+fogJ/X3C/ze/7L5wMKnD6ap3mwVICMNTyBAHJfYFn5OISitc5pXB
VP7/xOkryOzq5TmnG2jy4bUlPsVWhi944tkSiH0DLCZK9FRTq8G2JxK/IdjtI9GH
A4eYQLQHgYR1hblwVQm5EYN+tXkJhKW5knmguSEI7ZTmRHHKas1YaSAQHeLyshlA
7tqF7bdFAgMBAAECggEARQyg5+2N+7c4BhCGe0IqwgqJntf8kmTYkPk5CbaFfD1P
aNyN1djvNMUEodktYoQfzxTwrs2DYgJJtYw48GArjK16xOQ2//Ew/gu1T07uaxib
ZxCw4+0pngIL9Wy65EDodqW8QQckHGMxKHX/j58dhHVVFFtx1fqR9vL/Ts2GL3e+
2JJiaNorCGBRO+LzywCxeGEJanZNvttRXLDAok/8PazIAaWRL4d6EQf8P2rG29Ap
wZQUoW0IR/2EAieIjp0NDeGwXT0CQtUImsYO6qA8ZNxfVNChZhfIlVLWoIag8ei0
Zrq9UEQ0b5pi8OWkkgrYKSQTtriNO20KCjR86852gQKBgQD1knjqM5+M1JKjJk+S
DT8CFwHTXl+K8Me7m1Cgw9QvVHJV+p4zVdi5QxMxlgXUU5IYOC0zJGp/6rMtYp2x
ym9flGFD5GtxPoBLJz3q/XIHJjtfLMcASYgvpadFmQD5iT9KPD4jfOaDmG97S8ox
J/cMEbszfV1Rhsi6agwvoVkA5QKBgQDX+HeAgYdrn3pHde7qLP7kKvfhPlMGp29I
sQPTPvHzNu0jAtLPpHn5aUxuKm4co2BpgbvqeXjPdSgds1WPX0VpYCxI60S9E3Nl
v3U9ViZXN6Q1R57Ooze0+BQ6sYZN00ytwkbMpAuQ47nImml/xh98XNbRIJumjY55
9OTnk1tW4QKBgBdSYclcPbrSNVrpOIVWXLWGGdZJECnR1CYtCes6rdwQ2QrxUjTt
4jc194yuAr+3cBh8vU4uFy8uyvV0eCV6ZDlfjh00hD+s/+IjR+4ZQ8sKBnlzdzK/
yP89bDVf4ofQUQJr1jrokbvNrki3WexxLzUmOfEZ5tLnSgjqKV4cpKdBAoGAc5Ks
aKFoVaiXKCytOLXxhSqVUf0nMxVg0RahRGeX1J6dEjJNm/6Zo2W9F+su17Z6PpvF
cvmkM+ivGg3BCKNkIrrrl+4G7+O7ykRFuhgjFmNZRYXZLx1bD0X+lVYw1+7uRsID
XzmeUt/6qKYxNMZSTRvlfS4k/WEdUJhD8sUBiSECgYEAull5mIZLNj1EJgMrvsty
W24IfxE7BzlOcT5iVJo7s0JfVWilz+Ftpv5tBIUQ7dHs01/6mDCYZ/n0ixdvDD7i
GzQcJG8tX/T7oTdfpvhTUom1+dZzSNaDmLHURvkwkjHH+J+fytp6RYrH5eabIrFD
iamx0K9FdrDsNdYrqdlobRM=
-----END PRIVATE KEY-----
";

$publicKey = openssl_pkey_get_public($public);
$privateKey = openssl_pkey_get_private($private);

$content = 'Stephen';

// 加密
openssl_public_encrypt($content, $encrypt, $publicKey);
$encrypt = base64_encode($encrypt);
echo "<p>密文：</p>";
print_r($encrypt);

// 解密
$encrypt = base64_decode($encrypt);
openssl_private_decrypt($encrypt, $decrypt, $privateKey);
echo "<p>明文：</p>";
print_r($decrypt);
