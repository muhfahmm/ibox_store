<?php
// admin/auth/login.php
require_once __DIR__ . '/../../core/Auth.php';
require_once __DIR__ . '/../../core/Utils.php';
Session::init();

$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF check
    $token = $_POST['csrf_token'] ?? '';
    if (!Utils::verifyCsrfToken($token)) {
        $error = 'Invalid request (CSRF).';
    } else {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        if (Auth::attemptAdmin($username, $password)) {
            header('Location: /admin/index.php');
            exit;
        } else {
            $error = 'Login gagal — cek username & password';
        }
    }
}

// generate new CSRF token for form
$csrf = Utils::generateCsrfToken();
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Admin Login</title></head>
<body>
    <h2>Admin Login</h2>
    <?php if ($error): ?><div style="color:red;"><?=htmlspecialchars($error)?></div><?php endif; ?>
    <form method="post">
        <input type="hidden" name="csrf_token" value="<?=htmlspecialchars($csrf)?>">
        <label>Username<br><input type="text" name="username" required></label><br>
        <label>Password<br><input type="password" name="password" required></label><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
