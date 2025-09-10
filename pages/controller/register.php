<?php
require '../../db/db.php';

if (isset($_POST['register'])) {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $nomor_hp = htmlspecialchars($_POST['nomor_hp']);
    $email = htmlspecialchars($_POST['email']);
    $password1 = htmlspecialchars($_POST['password1']);
    $password2 = htmlspecialchars($_POST['password2']);

    // cek input ada yang kosong atau tidak
    if ($firstname === "") {
        echo "input nama pertama tidak boleh kosong";
    } elseif ($lastname === "") {
        echo "input nama terakhir tidak boleh kosong";
    } elseif ($nomor_hp === "") {
        echo "input nomor hp tidak boleh kosong";
    } elseif ($email === "") {
        echo "input email tidak boleh kosong";
    } elseif ($password1 === "") {
        echo "input password pertama tidak boleh kosong";
    } elseif ($password2 ==="") {
        echo "input password kedua tidak boleh kosong";
    } elseif ($password1 !== $password2) {
        echo "kedua password tidak sama";
    } else {
        // enkripsi password
        $password1 = password_hash($password1, PASSWORD_BCRYPT);

        // tambahkan user ke db
        mysqli_query($conn, "INSERT INTO tb_users
        (firstname,lastname,no_hp,gmail,password1)
        VALUES
        ('', '$firstname', '$lastname', '$nomor_hp', '$email', '$password1', '$password2')");
        // alert konfirmasi jika berhasil ditambahkan
        if (mysqli_affected_rows($conn) > 0 ) {
            echo "<script>
                alert('User berhasil mendaftar');
                window.location.href = 'login.php';
            </script>";
        } else {
            echo "<script>
                alert('User belum berhasil mendaftar');
                window.location.href = 'login.php';
            </script>";
        }
    }
        
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        header {
            background: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .top-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
        }

        .logo img {
            height: 100px;
        }

        .nav-search input {
            border-radius: 20px;
            padding: 6px 15px;
            border: 1px solid #ddd;
            width: 100%;
            transition: all 0.3s ease;
        }

        .nav-search input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.4);
        }

        .nav-icons i {
            font-size: 1.3rem;
            margin-left: 15px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .nav-icons i:hover {
            color: #007bff;
        }

        .menu-bar {
            border-top: 1px solid #eee;
        }

        .navbar-nav .nav-item .dropdown-menu {
            border-radius: 0;
            border: none;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav .nav-item {
            flex: 1;
            text-align: center;
        }
    </style>
</head>

<body>


    <secton class="container mt-5">
        <div class="wrapper mt-3">
            <h1 class="text-center fw-semibold">Daftar</h1>
            <div class="form-container">
                <div class="form-wrapper text-center">
                    <form action="" method="post">
                        <div class="input-box">
                            <input type="text" placeholder="firstname" name="firstname">
                            <input type="text" placeholder="lastname" name="lastname">
                        </div>
                        <div class="input-box">
                            <input type="number" placeholder="nomor handpone" name="nomor_hp">
                            <input type="email" placeholder="email" name="email">
                        </div>
                        <div class="input-box">
                            <input type="password" placeholder="Password" name="password1">
                            <input type="password" placeholder="Konfirmasi Password" name="password2">
                        </div>
                        <div class="input-box">
                            <button type="submit" name="register">Daftar</button>
                        </div>
                        <a href="login.php">Masuk ke akun</a>
                    </form>
                </div>
            </div>
        </div>
    </secton>
</body>

</html>