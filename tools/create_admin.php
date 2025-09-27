<?php
// tools/create_admin.php (jalankan sekali)
require_once __DIR__ . '/../db/db.php';

$db = getConnection();

$username = 'admin';
$password_plain = 'Admin123!'; // ganti kuatnya
$hash = password_hash($password_plain, PASSWORD_DEFAULT);

$stmt = $db->prepare("INSERT INTO tb_admin (username, password) VALUES (?, ?)");
$stmt->bind_param('ss', $username, $hash);
if ($stmt->execute()) {
    echo "Admin created: $username\n";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$db->close();
