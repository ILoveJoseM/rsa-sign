<?php
namespace JoseChan\RsaSign;

use \phpseclib\Crypt\RSA;

class Signature
{

    /**
     * Sign with RSASS-PSS + MGF1+SHA256
     *
     * @param string $message
     * @param PrivateKey $rsaPrivateKey
     * @return string
     */
    public static function sign($message, PrivateKey $rsaPrivateKey)
    {
        static $rsa = null;
        if (!$rsa) {
            $rsa = new RSA();
            $rsa->setSignatureMode(RSA::SIGNATURE_PSS);
            $rsa->setMGFHash('sha256');
        }

        $rsa->loadKey($rsaPrivateKey->getKey());
        return $rsa->sign($message);
    }

    /**
     * Verify with RSASS-PSS + MGF1+SHA256
     *
     * @param string $message
     * @param string $signature
     * @param PublicKey $rsaPublicKey
     * @return bool
     */
    public static function verify($message, $signature, PublicKey $rsaPublicKey)
    {
        static $rsa = null;
        if (!$rsa) {
            $rsa = new RSA();
            $rsa->setSignatureMode(RSA::SIGNATURE_PSS);
            $rsa->setMGFHash('sha256');
        }

        $rsa->loadKey($rsaPublicKey->getKey());
        return $rsa->verify($message, $signature);
    }
}
