<?php
require_once __DIR__ . '/../../core/Auth.php';
Auth::requireUser(); // jika bukan user, redirect ke halaman login user
