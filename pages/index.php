<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Navbar</title>
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
    <header>
        <!-- Bagian atas: logo + search + icon -->
        <div class="container top-bar">
            <a class="logo" href="#">
                <img src="assets/img/logo/logo.png" alt="Logo">
            </a>

            <!-- Search bar versi desktop -->
            <form class="d-none d-md-flex nav-search ms-3">
                <input type="text" placeholder="Cari produk...">
            </form>

            <div class="nav-icons d-flex">
                <!-- User hanya tampil di md ke atas -->
                <a href="" class="d-none d-md-block"><i class="bi bi-person"></i></a>
                <!-- Cart tetap tampil di semua ukuran -->
                <a href=""><i class="bi bi-bag me-2"></i></a>
            </div>

        </div>

        <!-- Menu bar di bawah header -->
        <div class="menu-bar">
            <style>
                .menu-bar {
                    background: #fff;
                    border-bottom: 1px solid #ddd;
                }

                nav {
                    max-width: 1200px;
                    margin: auto;
                    padding: 0 16px;
                    position: relative;
                }

                /* Hamburger */
                .menu-toggle {
                    display: none;
                    font-size: 24px;
                    cursor: pointer;
                    background: none;
                    border: none;
                    padding: 12px;
                }

                /* Menu */
                .menu {
                    display: flex;
                    flex-wrap: wrap;
                    align-items: center;
                    list-style: none;
                    padding: 0;
                    margin: 0;
                }

                .menu li {
                    position: relative;
                }

                .menu a {
                    display: block;
                    padding: 12px 16px;
                    text-decoration: none;
                    color: #000;
                    font-weight: bold;
                }

                .menu a:hover {
                    background: #f5f5f5;
                }

                /* Dropdown */
                .dropdown-menu {
                    display: none;
                    position: absolute;
                    top: 100%;
                    left: 0;
                    background: #fff;
                    border: 1px solid #ddd;
                    min-width: 200px;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
                    z-index: 100;
                }

                .dropdown-menu li a {
                    font-weight: normal;
                }

                .menu li:hover>.dropdown-menu {
                    display: block;
                }

                /* Search bar (hidden in desktop) */
                .nav-search {
                    display: none;
                    width: 100%;
                    padding: 12px 16px;
                    box-sizing: border-box;
                }

                .nav-search input {
                    width: 100%;
                    padding: 8px;
                    border: 1px solid #ddd;
                    border-radius: 4px;
                }

                /* Divider */
                .divider {
                    display: none;
                    width: 1px;
                    background: #ddd;
                    margin: 0 8px;
                }

                /* Responsive */
                @media (max-width: 768px) {
                    .menu-toggle {
                        display: block;
                    }

                    .menu {
                        display: none;
                        flex-direction: column;
                        align-items: flex-start;
                        width: 100%;
                    }

                    .menu.show {
                        display: flex;
                    }

                    .menu a {
                        padding: 12px;
                        width: 100%;
                    }

                    .divider {
                        display: none !important;
                    }

                    .nav-search {
                        display: block;
                    }
                }

                @media (min-width: 769px) {
                    .menu {
                        justify-content: space-between;
                    }

                    .divider {
                        display: block;
                    }
                }
            </style>
            <nav>
                <!-- Hamburger -->
                <button class="menu-toggle" onclick="toggleMenu()">☰</button>

                <!-- Menu -->
                <ul class="menu" id="menuNavbar">
                    <!-- Search bar versi mobile -->
                    <form class="nav-search">
                        <input type="text" placeholder="Cari produk...">
                    </form>

                    <li class="nav-item dropdown">
                        <a href="#">Mac ▼</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Lihat Semua Mac</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#">iPad ▼</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Lihat Semua iPad</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#">iPhone ▼</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Lihat Semua iPhone</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#">Watch ▼</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Lihat Semua Watch</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#">Music ▼</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Lihat Semua Music</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#">Aksesori ▼</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Lihat Semua Aksesori</a></li>
                        </ul>
                    </li>

                    <div class="divider"></div>

                    <li class="nav-item dropdown">
                        <a href="#">Layanan ▼</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Layanan 1</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#">Edukasi ▼</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Edukasi 1</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#">Bisnis ▼</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Bisnis 1</a></li>
                        </ul>
                    </li>

                    <!-- Login khusus mobile -->
                    <li class="nav-item d-mobile">
                        <a href="#"><b>Login</b></a>
                    </li>
                </ul>
            </nav>
        </div>

        <script>
            function toggleMenu() {
                document.getElementById("menuNavbar").classList.toggle("show");
            }
        </script>

    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>