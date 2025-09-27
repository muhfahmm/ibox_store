<?php
// db/db.php
// Koneksi database global (dipakai oleh admin & user)
// Ganti credential sesuai environment

function getConnection() {
    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASS = '';
    $DB_NAME = 'db_ibox';

    $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

    if ($mysqli->connect_errno) {
        // catat error di log, jangan tampilkan pada user di produksi
        error_log('DB connect error: ' . $mysqli->connect_error);
        throw new Exception('Database connection failed');
    }

    // pastikan charset utf8mb4 untuk dukung emoji & multibyte
    $mysqli->set_charset('utf8mb4');

    return $mysqli;
}

// optional: helper tutup koneksi (tidak wajib)
function closeConnection($conn) {
    if ($conn instanceof mysqli) {
        $conn->close();
    }
}
