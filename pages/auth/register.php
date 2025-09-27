<?php
// user/auth/register.php
require_once __DIR__ . '/../../db/db.php';
require_once __DIR__ . '/../../core/Utils.php';
require_once __DIR__ . '/../../core/Session.php';
Session::init();

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Utils::verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        $errors[] = 'Invalid request.';
    } else {
        $firstname = trim($_POST['firstname'] ?? '');
        $lastname = trim($_POST['lastname'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['no_handphone'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        if (empty($firstname) || empty($email) || empty($password)) {
            $errors[] = 'Lengkapi field yang wajib.';
        }
        if ($password !== $confirm) {
            $errors[] = 'Password dan konfirmasi tidak cocok.';
        }

        if (empty($errors)) {
            $db = getConnection();
            // cek email / phone
            $stmt = $db->prepare("SELECT id FROM tb_users WHERE email = ? OR no_handphone = ? LIMIT 1");
            $stmt->bind_param('ss', $email, $phone);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $errors[] = 'Email atau Nomor HP sudah terdaftar.';
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $ins = $db->prepare("INSERT INTO tb_users (firstname, lastname, no_handphone, email, password) VALUES (?, ?, ?, ?, ?)");
                $ins->bind_param('sssss', $firstname, $lastname, $phone, $email, $hash);
                if ($ins->execute()) {
                    // redirect ke halaman login
                    header('Location: /user/auth/login.php?registered=1');
                    exit;
                } else {
                    $errors[] = 'Gagal menyimpan data: ' . $ins->error;
                }
                $ins->close();
            }
            $stmt->close();
            $db->close();
        }
    }
}
$csrf = Utils::generateCsrfToken();
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Register</title></head>
<body>
<h2>Register</h2>
<?php foreach ($errors as $e): ?><div style="color:red;"><?=htmlspecialchars($e)?></div><?php endforeach; ?>
<form method="post">
    <input type="hidden" name="csrf_token" value="<?=htmlspecialchars($csrf)?>">
    <label>First name: <input type="text" name="firstname" required></label><br>
    <label>Last name: <input type="text" name="lastname"></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>No HP: <input type="text" name="no_handphone"></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <label>Confirm: <input type="password" name="confirm_password" required></label><br>
    <button type="submit">Register</button>
</form>
</body>
</html>
