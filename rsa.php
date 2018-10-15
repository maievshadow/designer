<?php
ini_set('error_reporting', -1);
ini_set('display_errors', -1);

header('Content-Type: text/html; charset=utf-8');


# openssl genrsa -out rsa_private_key.pem 1024
# openssl rsa -in rsa_private_key.pem -pubout -out rsa_public_key.pem


$private_key = file_get_contents("/home/redredmaple/test/rsa_private_key.pem");
$public_key = file_get_contents("/home/redredmaple/test/rsa_public_key.pem");

$pi_key =  openssl_pkey_get_private($private_key);// 可用返回资源id
$pu_key = openssl_pkey_get_public($public_key);


// 加密数据
$data = array(
    'id' => '1234567890',
    'name' => '小明',
    'mobile' => '123456',
);

$data = json_encode($data);
$encrypted = '';
$decrypted = '';

#openssl_public_encrypt($data, $encrypted, $pu_key);//公钥加密
#$encrypted = base64_encode($encrypted);// base64传输
#openssl_private_decrypt(base64_decode($encrypted), $decrypted, $pi_key);//私钥解密
#print_r(json_decode($decrypted, true));

openssl_private_encrypt($data, $encrypted, $pi_key);//公钥加密
$encrypted = base64_encode($encrypted);// base64传输
openssl_public_decrypt(base64_decode($encrypted), $decrypted, $pu_key);//私钥解密
print_r(json_decode($decrypted, true));
