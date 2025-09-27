<?php
// core/Utils.php
require_once __DIR__ . '/Session.php';

class Utils {
    public static function generateCsrfToken() {
        Session::init();
        $token = bin2hex(random_bytes(16));
        Session::set('csrf_token', $token);
        return $token;
    }

    public static function verifyCsrfToken($token) {
        Session::init();
        $stored = Session::get('csrf_token');
        // optional: unset token after check for single-use
        Session::remove('csrf_token');
        return !empty($stored) && hash_equals($stored, $token);
    }
}
