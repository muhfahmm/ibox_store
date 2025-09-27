<?php
// core/Session.php
// Helper sederhana untuk session management

class Session {
    public static function init() {
        if (session_status() === PHP_SESSION_NONE) {
            // secure cookie params (fallback untuk versi PHP < 7.3)
            $secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
            $cookieParams = session_get_cookie_params();
            if (PHP_VERSION_ID >= 70300) {
                session_set_cookie_params([
                    'lifetime' => 0,
                    'path' => '/',
                    'domain' => $cookieParams['domain'] ?? '',
                    'secure' => $secure,
                    'httponly' => true,
                    'samesite' => 'Lax'
                ]);
            } else {
                // fallback: samesite tidak tersedia di PHP lawas
                session_set_cookie_params(0, '/', $cookieParams['domain'] ?? '', $secure, true);
            }

            session_start();
        }
    }

    public static function regenerate() {
        // regenerate id to prevent fixation
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
        }
    }

    public static function set($key, $val) {
        self::init();
        $_SESSION[$key] = $val;
    }

    public static function get($key, $default = null) {
        self::init();
        return $_SESSION[$key] ?? $default;
    }

    public static function remove($key) {
        self::init();
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public static function destroy() {
        self::init();
        // clear all session data
        $_SESSION = [];
        // delete cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']
            );
        }
        session_destroy();
    }
}
