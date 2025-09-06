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
                    width: auto;
                    /* default desktop */
                }

                .menu a {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    /* teks kiri, icon kanan */
                    gap: 8px;
                    text-decoration: none;
                    color: #000;
                    font-weight: bold;
                    transition: background 0.2s;
                    padding: 12px 16px;
                }

                .menu a:hover {
                    background: #f5f5f5;
                }

                /* Chevron icon */
                .chevron {
                    font-size: 12px;
                    transition: transform 0.2s;
                }

                .dropdown.open>a .chevron {
                    transform: rotate(180deg);
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
                    padding: 10px 14px;
                    justify-content: flex-start;
                }

                .dropdown.open>.dropdown-menu {
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

                    .menu li {
                        width: 100%;
                        /* full width menu items */
                    }

                    .menu a {
                        padding: 10px 12px;
                        width: 100%;
                    }

                    .dropdown-menu {
                        position: static;
                        border: none;
                        box-shadow: none;
                        width: 100%;
                        margin-left: 10px;
                    }

                    .nav-search {
                        display: block;
                    }

                    .divider {
                        display: none !important;
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
                        <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                            Mac <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Lihat Semua Mac</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                            iPad <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Lihat Semua iPad</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                            iPhone <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Lihat Semua iPhone</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                            Watch <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Lihat Semua Watch</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                            Music <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Lihat Semua Music</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                            Aksesori <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Lihat Semua Aksesori</a></li>
                        </ul>
                    </li>

                    <div class="divider"></div>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                            Layanan <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Layanan 1</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                            Edukasi <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Edukasi 1</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                            Bisnis <i class="bi bi-chevron-down"></i>
                        </a>
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

            function toggleDropdown(el) {
                const parent = el.parentElement;
                parent.classList.toggle("open");
            }
        </script>



    </header>

    <section class="container mb-5 pb-3">
        <div class="slider">
            <div class="slides" id="slides">
                <div class="slide">
                    <a href=""><img src="./assets/img/img slider/img 1.webp" alt="Slide 1"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="./assets/img/img slider/img 2.webp" alt="Slide 2"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="./assets/img/img slider/img 3.webp" alt="Slide 3"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="./assets/img/img slider/img 4.webp" alt="Slide 4"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="./assets/img/img slider/img 5.webp" alt="Slide 5"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="./assets/img/img slider/img 6.webp" alt="Slide 6"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="./assets/img/img slider/img 7.webp" alt="Slide 7"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="./assets/img/img slider/img 7.webp" alt="Slide 7"></a>
                </div>
            </div>
            <!-- Manual Navigation -->
            <div class="navigation-manual">
                <div class="ps-3 pe-3 pt-2 pb-2 glass-card rounded-3">
                    <label class="manual-btn" onclick="moveToSlide(0)"></label>
                    <label class="manual-btn" onclick="moveToSlide(1)"></label>
                    <label class="manual-btn" onclick="moveToSlide(2)"></label>
                    <label class="manual-btn" onclick="moveToSlide(3)"></label>
                    <label class="manual-btn" onclick="moveToSlide(4)"></label>
                    <label class="manual-btn" onclick="moveToSlide(5)"></label>
                    <label class="manual-btn" onclick="moveToSlide(6)"></label>
                    <label class="manual-btn" onclick="moveToSlide(7)"></label>
                </div>

                <!-- css button slider-->
                <style>
                    .slider {

                        overflow: hidden;
                        position: relative;
                    }

                    .slides {
                        display: flex;
                        transition: transform 0.6s ease-in-out;
                    }

                    .slide {
                        min-width: 100%;
                        transition: 0.5s;
                    }

                    .slide img {
                        width: 100%;
                        /* height: auto; */
                        max-height: 590px;
                        border-radius: 10px;
                        object-fit: contain;
                    }

                    .navigation-manual {
                        position: absolute;
                        width: 100%;
                        display: flex;
                        justify-content: center;
                        bottom: 10px;
                        padding-bottom: 30px;
                    }

                    .manual-btn {
                        border: 1px solid wheat;
                        padding: 4px;
                        border-radius: 50%;
                        cursor: pointer;
                        transition: 0.4s;
                    }

                    .manual-btn:not(:last-child) {
                        margin-right: 10px;
                    }

                    .manual-btn:hover,
                    .manual-btn.active {
                        background: grey;
                    }
                </style>

                <!-- js button slider -->
                <script>
                    let slides = document.getElementById("slides");
                    let currentIndex = 0;
                    let forward = true;
                    const totalSlides = document.querySelectorAll(".slide").length;

                    function moveToSlide(index) {
                        slides.style.transform = "translateX(" + -index * 100 + "%)";
                        currentIndex = index;
                        updateActiveButton();
                    }

                    function updateActiveButton() {
                        let buttons = document.querySelectorAll(".manual-btn");
                        buttons.forEach((button, index) => {
                            if (index === currentIndex) {
                                button.classList.add("active");
                            } else {
                                button.classList.remove("active");
                            }
                        });
                    }

                    function autoSlide() {
                        if (forward) {
                            if (currentIndex < totalSlides - 1) {
                                currentIndex++;
                            } else {
                                forward = false;
                                currentIndex--;
                            }
                        } else {
                            if (currentIndex > 0) {
                                currentIndex--;
                            } else {
                                forward = true;
                                currentIndex++;
                            }
                        }
                        moveToSlide(currentIndex);
                    }

                    setInterval(autoSlide, 3000);
                    updateActiveButton();
                </script>

                <!-- glassmorism -->
                <style>
                    .glass-card {
                        width: 240px;
                        background: rgba(255, 255, 255, 0.05);
                        backdrop-filter: blur(5px);
                        -webkit-backdrop-filter: blur(5px);
                        border-radius: 20px;
                        border: 1px solid rgba(255, 255, 255, 0.3);
                        box-shadow:
                            0 8px 32px rgba(0, 0, 0, 0.1),
                            inset 0 1px 0 rgba(255, 255, 255, 0.5),
                            inset 0 -1px 0 rgba(255, 255, 255, 0.1),
                            inset 0 0 0px 0px rgba(255, 255, 255, 0);
                        position: relative;
                        overflow: hidden;
                    }

                    .glass-card::before {
                        content: '';
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        height: 1px;
                        background: linear-gradient(90deg,
                                transparent,
                                rgba(255, 255, 255, 0.8),
                                transparent);
                    }

                    .glass-card::after {
                        content: '';
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 1px;
                        height: 100%;
                        background: linear-gradient(180deg,
                                rgba(255, 255, 255, 0.8),
                                transparent,
                                rgba(255, 255, 255, 0.3));
                    }
                </style>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>