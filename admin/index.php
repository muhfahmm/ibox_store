<?php
require_once __DIR__ . '/../core/Auth.php'; // path relatif ke core
Auth::requireAdmin(); // jika bukan admin → redirect ke login
// selanjutnya load dashboard
?>