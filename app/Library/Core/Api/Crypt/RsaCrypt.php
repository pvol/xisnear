<?php

namespace Core\Api\Crypt;

use Core\Api\Models\ApiKey;
use Core\Api\Exception\ApiException;

class RsaCrypt extends Crypt {

    protected $our_side;
    protected $other_side;
    
    /** @var 公钥 */
    const KEY_TYPE_PUBLIC = 1;
    
    /** @var 私钥 */
    const KEY_TYPE_PRIVATE = 2;

    public function __construct($business, $partner) {
        $this->our_side = ApiKey::where('name', $business)->first();
        if (!$this->our_side) {
            throw new ApiException("business:$business not exists");
        }
        $this->other_side = ApiKey::where('name', $partner)->first();
        if (!$this->other_side) {
            throw new ApiException("partner:$partner not exists");
        }
    }

    /**
     * 用对方公钥加密
     */
    public function encrypt($data) {
        return $this->rsaEncrypt($data, $this->other_side->public_key, self::KEY_TYPE_PUBLIC);
    }

    /**
     * 用我方私钥解密
     */
    public function decrypt($data) {
        return $this->rsaDecrypt($data, $this->our_side->private_key, self::KEY_TYPE_PRIVATE);
    }

    /**
     * 用我方私钥加签
     */
    public function sign($data) {
        return $this->rsaEncrypt($data, $this->our_side->private_key, self::KEY_TYPE_PRIVATE);
    }

    /**
     * 用对方公钥验签
     */
    public function checkSign($data, $sign) {
        $un_sign = $this->rsaDecrypt($sign, $this->other_side->public_key, self::KEY_TYPE_PUBLIC);
        if ($un_sign === $data) {
            return true;
        }
        return false;
    }

    /**
     * 使用公钥对内容进行RSA加密
     * @param $ary
     * @param $key
     * @return string
     */
    private function rsaEncrypt($ary, $key, $type = self::KEY_TYPE_PUBLIC) {
        $rawData = json_encode($ary);
        $keyContent = file_get_contents(_base_path() . '/openssl/' . $key);
        $encryptedList = array();
        $step = 117;
        for ($i = 0, $len = strlen($rawData); $i < $len; $i+=$step) {
            $data = substr($rawData, $i, $step);
            $encrypted = '';
            if($type === self::KEY_TYPE_PUBLIC){
                openssl_public_encrypt($data, $encrypted, $keyContent);
            }
            if($type === self::KEY_TYPE_PRIVATE){
                openssl_private_encrypt($data, $encrypted, $keyContent);
            }
            $encryptedList[] = ($encrypted);
        }
        $data = base64_encode(join('', $encryptedList));
        return $data;
    }

    /**
     * RSA解密
     * @param $ary
     * @param $key
     * @return string
     */
    private function rsaDecrypt($ary, $key, $type = self::KEY_TYPE_PRIVATE) {
        $encryptedData = base64_decode($ary);
        $keyContent = file_get_contents(_base_path() . '/openssl/' . $key);
        $decryptedList = array();
        $step = 128;
        if (strlen($key) > 1000) {
            $step = 256;
        }
        for ($i = 0, $len = strlen($encryptedData); $i < $len; $i+=$step) {
            $data = substr($encryptedData, $i, $step);
            $decrypted = '';
            if($type === self::KEY_TYPE_PUBLIC){
                openssl_public_decrypt($data, $decrypted, $keyContent);
            }
            if($type === self::KEY_TYPE_PRIVATE){
                openssl_private_decrypt($data, $decrypted, $keyContent);
            }
            $decryptedList[] = $decrypted;
        }
        return join('', $decryptedList);
    }
}
