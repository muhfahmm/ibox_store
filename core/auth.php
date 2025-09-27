<?php
// core/Auth.php
require_once __DIR__ . '/../db/db.php';
require_once __DIR__ . '/Session.php';

class Auth {
    // ---------- Admin login ----------
    public static function attemptAdmin($username, $password) {
        $db = getConnection();
        $stmt = $db->prepare("SELECT id, username, password FROM tb_admin WHERE username = ? LIMIT 1");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->bind_result($id, $uname, $hash);
        $ok = false;
        if ($stmt->fetch()) {
            if (password_verify($password, $hash)) {
                Session::init();
                Session::regenerate();
                Session::set('user_id', $id);
                Session::set('username', $uname);
                Session::set('role', 'admin'); // role = admin
                $ok = true;
            }
        }
        $stmt->close();
        $db->close();
        return $ok;
    }

    // ---------- User login ----------
    // identifier bisa email atau nomor hp
    public static function attemptUser($identifier, $password) {
        $db = getConnection();
        $stmt = $db->prepare("SELECT id, firstname, email, no_handphone, password FROM tb_users WHERE email = ? OR no_handphone = ? LIMIT 1");
        $stmt->bind_param('ss', $identifier, $identifier);
        $stmt->execute();
        $stmt->bind_result($id, $firstname, $email, $phone, $hash);
        $ok = false;
        if ($stmt->fetch()) {
            if (password_verify($password, $hash)) {
                Session::init();
                Session::regenerate();
                Session::set('user_id', $id);
                Session::set('username', $firstname);
                Session::set('role', 'user'); // role = user
                $ok = true;
            }
        }
        $stmt->close();
        $db->close();
        return $ok;
    }

    // ---------- Logout ----------
    public static function logout() {
        Session::destroy();
    }

    // ---------- Helpers ----------
    public static function isLoggedIn() {
        Session::init();
        return (bool) Session::get('user_id');
    }

    public static function isAdmin() {
        Session::init();
        return Session::get('role') === 'admin';
    }

    public static function isUser() {
        Session::init();
        return Session::get('role') === 'user';
    }

    // redirect ke login admin jika bukan admin
    public static function requireAdmin() {
        Session::init();
        if (!self::isAdmin()) {
            header('Location: /admin/auth/login.php');
            exit;
        }
    }

    // redirect ke login user jika bukan user
    public static function requireUser() {
        Session::init();
        if (!self::isUser()) {
            header('Location: /user/auth/login.php');
            exit;
        }
    }

    // optional: ambil data user/admin (basic)
    public static function currentUserId() {
        Session::init();
        return Session::get('user_id');
    }
}
