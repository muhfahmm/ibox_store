<?php
// admin/auth/logout.php
require_once __DIR__ . '/../../core/Auth.php';
Auth::logout();
header('Location: /admin/auth/login.php');
exit;
