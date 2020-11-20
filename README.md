# PHP 加密解密

## RSA

公钥加密，私钥解密

### 方法

```java
// 加密
string encrypt(string $data);

// 解密
decrypt(string $encrypt);
```

## AES

默认使用 `aes-256-ecb` 加密方式，为保证接口安全，建议搭配 `RSA` 使用，将随机生成的加密密钥进行 `RSA` 加密。

类中提供了签名算法，后端解密后进行验签操作。

### 方法

```java
// 签名
string signature(array $data)

// 验签
boolean verifySignature(array $data)

// 加密
string encrypt(array $data)

// 解密
decrypt(string $encrypt)
```
