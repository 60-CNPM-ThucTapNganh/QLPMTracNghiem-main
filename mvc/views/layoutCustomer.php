<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <meta name="description" content="Bắt nguồn từ đam mê với các loại đồ uống có nguồn gốc từ trà, năm 2013, ông Huỳnh Quang Phúc - một cử nhân tốt nghiệp tại trường Đại học Toulouse 1 Capitole đã trở về quê...">
    <meta name="keywords" content="homita">
    <meta name="news_keywords" content="homita">
    <meta name="author" content="HOMITA Coffee & Tea House - Real love with milktea">
    <meta name="copyright" content="HOMITA Coffee & Tea House - Real love with milktea [support@homitatea.com]">
    <meta name="robots" content="index, archive, follow, noodp">
    <meta name="googlebot" content="index,archive,follow,noodp">
    <meta name="msnbot" content="all,index,follow">
    <meta name="generator" content="NukeViet v4.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="This is the SEO meta description blurb that 
    describes what the page is about. This is a site that helped me improve my 
    programming skills and came into contact with the company I love.">
    <meta property="og:type" content="Website" />
    <meta property="og:title" content="Home" />
    <meta property="og:description" content="Connect & Grow Your Business with the Power 
    of the Encompass Platform" />
    <meta property="og:url" content="http://sagetheme.local/index.php/encompass/" />
    <meta property="og:image" content="https://i.upanh.org/2021/12/23/encompass-share.png" />
    <base href="<?php echo BASE; ?>">


    <link rel="stylesheet" href="public/Client/assets/style/app.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="public/Client/assets/javascript/main.js?v=<?php echo time(); ?>"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="public/Client/assets/build/tailwind.css?v=<?php echo time(); ?>">
</head>

<body>
    <header class="header-info flex h-14 py-3 px-6 bg-blue-400">
        <div class="header-contact text-white">
            <i class="">
                <ion-icon class="call w-5 h-5" name="call" />
                </ion-icon> Liên hệ : 0358405987 &nbsp;
                <ion-icon class="mail w-5 h-5" name="mail"></ion-icon> Email : sonhoang.070400@gmail.com
            </i>
        </div>
        <div class="header-login absolute right-10">
            <?php if (isset($_SESSION['userClient'])) {
            ?>
                <div class="absolute w-48 right-0 header-login">
                    <button onclick="myFunction()" class="dropbtn flex">
                        <p class="mt-1 pr-2 font-bold"><?php if (isset($_SESSION["userClient"])) echo $_SESSION["userClient"]["tenSV"]; ?></p>
                        <div class=" block h-8 w-8 rounded-full overflow-hidden border-2 border-gray-600 forcus:outline-none forcus:border-white">
                            <?php
                            if (isset($_SESSION["userClient"])) {
                                $hinhAnh = $_SESSION["userClient"]["hinhAnh"];
                                echo "<img alt='ImgSV' class='w-full h-full object-cover' src='public/upload/nguoidung/$hinhAnh'>";
                            }
                            ?>
                        </div>
                    </button>
                    <div id="myDropdown" class="absolute dropdown-content hidden mt-2 w-48 z-50 bg-white rounded-lg shadow-xl py-2">
                        <a href="./personal.php" class="block px-4 py-2 text-gray-800 hover:text-white">
                            <div class=" block h-40 w-40 rounded-full overflow-hidden border-2 border-gray-600 forcus:outline-none forcus:border-white">
                                <?php
                                if (isset($_SESSION["userClient"])) {
                                    $hinhAnh = $_SESSION["userClient"]["hinhAnh"];
                                    echo "<img alt='ImgSV' class='w-full h-full object-cover' src='public/upload/nguoidung/$hinhAnh'>";
                                }
                                ?>
                            </div>
                            <br>
                            <hr>
                        </a>
                        <a href="./personal.php" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Cài đặt</a>
                        <hr>
                        <a href="loginClient/logout" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Đăng xuất</a>
                        <hr>
                    </div>
                </div>

            <?php
            } else {
            ?>
                <div class="text-white">
                    Bạn chưa đăng nhập?
                    <a class="hover:text-gray-600" href="loginClient/Index.php">(Đăng nhập)</a>
                </div>
            <?php } ?>

        </div>
    </header>
    <nav class="nav-pc relative z-40 flex row py-3 px-3 border-2">
        <div class="nav-logo">
            <a href="./home.php">
                <img src="public/Client/assets/images/page-free.png" alt="" width="50px" height="50px">
            </a>
        </div>
        <div class="nav-search relative pl-3 my-auto">
            <label for="search">
                <span class="absolute right-3 top-3">
                    <ion-icon id="icon1" name="search"></ion-icon>
                </span>
                <input type="text" class="border-2 w-56 h-11 px-1 py-1 rounded-3xl" name="search" id="search" placeholder="Tìm kiếm...">
            </label>
        </div>
        <ul class="nav-list-pc text-xl text-gray-800 flex md:absolute md:right-0 md:top-6 px-5 ">
            <li class="nav-link-pc px-5 hover:text-gray-500">
                <a href="./home.php">Trang chủ</a>
            </li>
            <li class="nav-link-pc px-5 hover:text-gray-500">
                <a href="MonHocClient/Index">Môn học</a>
            </li>
            <li class="nav-link-pc px-5 hover:text-gray-500">
                <a href="KyThiClient/Index">Kỳ thi</a>
            </li>
            <li class="nav-link-pc px-5 hover:text-gray-500">
                <a href="KetQua/Index">Kết quả</a>
            </li>
            <li class="nav-link-pc px-5 hover:text-gray-500">
                <a href="CaNhanClient/Index">Trang cá nhân</a>
            </li>
        </ul>
        <label for="nav-mobile-input" class="nav__bars_btn cursor-pointer">
            <ion-icon id="hide" class="lg:hidden absolute right-5 pt-2 w-10 h-10  hover:text-gray-400" name="reorder-four-sharp"></ion-icon>
        </label>
    </nav>
    <!-- Nav Mobile -->
    <div>
        <script>
            $("#hide").click(function() {
                $('.nav-list-mobile').toggle(400);
            });
        </script>
        <ul class="z-50 nav-list-mobile bg-blue-300 text-xl text-gray-800 float-right text-right px-5">
            <li class="nav-link-mobile px-5 py-2 hover:text-gray-500">
                <a href="./home.php">Trang chủ</a>
            </li>
            <li class="nav-link-mobile px-5 py-2 hover:text-gray-500">
                <a href="MonHocClient/Index">Môn học</a>
            </li>
            <li class="nav-link-pc px-5 hover:text-gray-500">
                <a href="KyThiClient/Index">Kỳ thi</a>
            </li>
            <li class="nav-link-mobile px-5 py-2 hover:text-gray-500">
                <a href="KetQua/Index">Kết quả</a>
            </li>
            <li class="nav-link-mobile px-5 py-2 hover:text-gray-500">
                <a href="CaNhanClient/Index">Trang cá nhân</a>
            </li>
        </ul>
    </div>
    <?php
    require_once "./mvc/views/pages/" . $data["page"] . ".php";
    ?>
    <footer>
        <div class="p-10 bg-gray-800 text-gray-200">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
                    <div class="mb-5">
                        <h4 class="text-2xl pb-4">Địa chỉ liên hệ</h4>
                        <p class="text-gray-500">
                            A122 Trần Phú Street <br>
                            Sơn Hoàng, FB 99999 <br>
                            Việt Nam <br><br>
                            <strong>Phone: </strong>035 8405 987 <br>
                            <strong>Email: </strong>sonhoang.070400@gmail.com <br>
                        </p>
                    </div>
                    <div class="mb-5">
                        <h4 class="pb-4">Liên kểt</h4>
                        <ul class="text-gray-500">
                            <li class="pb-4">
                                <ion-icon name="chevron-forward-sharp" class="text-yellow-500"></ion-icon><a href="http://google.com/" class="hover:text-yellow-300">Trang chủ</a>
                            </li>
                            <li class="pb-4">
                                <ion-icon name="chevron-forward-sharp" class="text-yellow-500"></ion-icon><a href="http://google.com/" class="hover:text-yellow-300">Thông tin</a>
                            </li>
                            <li class="pb-4">
                                <ion-icon name="chevron-forward-sharp" class="text-yellow-500"></ion-icon><a href="http://google.com/" class="hover:text-yellow-300">Dịch vụ</a>
                            </li>
                            <li class="pb-4">
                                <ion-icon name="chevron-forward-sharp" class="text-yellow-500"></ion-icon><a href="http://google.com/" class="hover:text-yellow-300">Điều khoản</a>
                            </li>
                            <li class="pb-4">
                                <ion-icon name="chevron-forward-sharp" class="text-yellow-500"></ion-icon><a href="http://google.com/" class="hover:text-yellow-300">Chính sách bảo mật</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-5">
                        <h4 class="pb-4">Dịch vụ của chúng tôi</h4>
                        <ul class="text-gray-500">
                            <li class="pb-4">
                                <ion-icon name="chevron-forward-sharp" class="text-yellow-500"></ion-icon><a href="http://google.com/" class="hover:text-yellow-300">Thiết kế Web</a>
                            </li>
                            <li class="pb-4">
                                <ion-icon name="chevron-forward-sharp" class="text-yellow-500"></ion-icon><a href="http://google.com/" class="hover:text-yellow-300">Phát triển Web</a>
                            </li>
                            <li class="pb-4">
                                <ion-icon name="chevron-forward-sharp" class="text-yellow-500"></ion-icon><a href="http://google.com/" class="hover:text-yellow-300">Quản lý sản phẩm</a>
                            </li>
                            <li class="pb-4">
                                <ion-icon name="chevron-forward-sharp" class="text-yellow-500"></ion-icon><a href="http://google.com/" class="hover:text-yellow-300">Quản lý</a>
                            </li>
                            <li class="pb-4">
                                <ion-icon name="chevron-forward-sharp" class="text-yellow-500"></ion-icon><a href="http://google.com/" class="hover:text-yellow-300">Thiết kế đồ họa</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-5">
                        <h4 class="pb-4">Tham gia ngay</h4>
                        <p class="text-gray-500 pb-2">Tham gia ngay để biết thêm thông tin chi tiết và nhiều ưu đãi khác</p>
                        <form action="" class="flex flex-row flex-wrap">
                            <input type="text" name="" id="" class="text-gray-500 w-2/3 p-2 focus:border-yellow-500" placeholder="email@gmail.com">
                            <button class="p-2 w-1/3 bg-yellow-500 text-white hover:bg-yellow-600">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full bg-gray-900 text-gray-500 px-10">
            <div class="max-w-7xl flex flex-col md:flex-row py-4  mx-auto justify-between items-center">
                <div class="text-center">
                    <div>
                        Bản quyền <strong><span>Nhóm</span></strong>. Thực tập chuyên ngành
                    </div>
                    <div>
                        Được thiết kế bằng <a href="#" class="text-yellow-500">TailWindCss</a>
                    </div>
                </div>
                <div class="text-center text-xl text-white mb-2">
                    <ion-icon name="logo-facebook"></ion-icon>
                    <ion-icon name="logo-github"></ion-icon>
                    <ion-icon name="logo-skype"></ion-icon>
                    <ion-icon name="logo-twitter"></ion-icon>
                    <ion-icon name="logo-linkedin"></ion-icon>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>