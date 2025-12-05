<?php
namespace App\Services;

class JwtService {

    private static $secret = "segredo_muito_forte_aqui";

    // ========== GERAR TOKEN ==========
    public static function generate($payload) {

        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
        $payload = json_encode($payload);

        $header = self::base64url_encode($header);
        $payload = self::base64url_encode($payload);

        $signature = hash_hmac('sha256', "$header.$payload", self::$secret, true);
        $signature = self::base64url_encode($signature);

        return "$header.$payload.$signature";
    }

    // ========== VALIDAR TOKEN ==========
    public static function validate($token) {

        $parts = explode('.', $token);

        if (count($parts) !== 3) return false;

        list($header, $payload, $signature) = $parts;

        $check = hash_hmac('sha256', "$header.$payload", self::$secret, true);
        $check = self::base64url_encode($check);

        if ($check !== $signature) return false;

        return json_decode(self::base64url_decode($payload), true);
    }

    private static function base64url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    private static function base64url_decode($data) {
        return base64_decode(strtr($data, '-_', '+/'));
    }
}
