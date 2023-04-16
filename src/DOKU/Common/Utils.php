<?php

namespace DOKU\Common;

class Utils
{
    /**
     * Generate Signature
     * @param array $header (Client-Id, Request-Id, Request-Timestamp)
     * @param string $targetPath
     * @param string $body
     * @param string $secret
     * @return string HMACSHA256=signature
     */
    public static function generateSignature($header, $targetPath, $body, $secret)
    {
        $digest = base64_encode(hash('sha256', $body, true));
        $rawSignature = "Client-Id" . $header['Client-Id'] . "\n"
            . "Request-Id:" . $header['Request-Id'] ."\n"
            . "Request-Timestamp" . $header['Request-Timestamp'] . "\n"
            . "Request-Target" . $targetPath . "\n"
            . "Digest" . $digest;

        $signature = base64_encode(hash_hmac('sha256', $rawSignature, $secret, true));
        return 'HMACSHA256=' . $signature;
     }
}
