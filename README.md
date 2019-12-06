## rsa签名算法

签名算法采用SHA256进行哈希，并使用私钥对哈希值进行加密获得签名<br/>验证签名时，使用公钥解密后获得哈希值和参数哈希后的字符串进行对比验签

> 建议使用长度为2048以上的公私钥对，各个长度的保密年限对比下表附出，超过保密年限的密钥长度不保证安全性

| 密钥长度 | 保密年限 |
|:---:|:---:|
| 1024 | 2010 |
| 2048 | 2030 |
| 3072 | 2040 |
| 7680 | 2080 |
| 15360 | 2120 |

#### 安装

````
composer require "json-chan:rsa-sign"
````


#### 签名

````php

require "vendor/autoload.php";

use JoseChan\RsaSign\PrivateKey;
use JoseChan\RsaSign\Signature;

$private_key = new PrivateKey($key_string);

$sign = Signature::sign($string, $private_key);

````

#### 验签

````php

require "vendor/autoload.php";

use JoseChan\RsaSign\PublicKey;
use JoseChan\RsaSign\Signature;

$public_key = new PublicKey($key_string);

$result = Signature::verify($string, $sign, $public_key);

````


