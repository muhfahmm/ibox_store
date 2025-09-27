<?php
// user/auth/login.php
require_once __DIR__ . '/../../core/Auth.php';
require_once __DIR__ . '/../../core/Utils.php';
Session::init();

$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Utils::verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        $error = 'Invalid request.';
    } else {
        $identifier = trim($_POST['identifier'] ?? ''); // email or phone
        $password = $_POST['password'] ?? '';
        if (Auth::attemptUser($identifier, $password)) {
            header('Location: /user/index.php');
            exit;
        } else {
            $error = 'Login gagal — cek email/nomor & password';
        }
    }
}
$csrf = Utils::generateCsrfToken();
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>User Login</title></head>
<body>
<h2>Login</h2>
<?php if ($error): ?><div style="color:red;"><?=htmlspecialchars($error)?></div><?php endif; ?>
<?php if (isset($_GET['registered'])): ?><div style="color:green">Registrasi berhasil. Silakan login.</div><?php endif; ?>
<form method="post">
    <input type="hidden" name="csrf_token" value="<?=htmlspecialchars($csrf)?>">
    <label>Email or Phone: <input type="text" name="identifier" required></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <button type="submit">Login</button>
</form>
</body>
</html>
