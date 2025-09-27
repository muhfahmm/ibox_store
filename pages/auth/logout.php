<?php
// user/auth/logout.php
require_once __DIR__ . '/../../core/Auth.php';
Auth::logout();
header('Location: /user/auth/login.php');
exit;
