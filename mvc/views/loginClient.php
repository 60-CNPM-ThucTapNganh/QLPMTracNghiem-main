<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <base href="<?php echo BASE; ?>">


    <link rel="stylesheet" href="public/Client/assets/style/app.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="public/Client/assets/javascript/main.js?v=<?php echo time(); ?>"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="public/Client/assets/build/tailwind.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="min-h-screen flex items-center justify-center bg-blue-400">
        <div class="bg-white max-w-lg mx-auto p-8 md:p-12 lg:w-1/2 my-10 rounded shadow-2xl">
            <h2 class="text-3xl font-bold mb-10 text-gray-800">Đăng nhập</h2>
            <form action="loginClient/loginClient" method="POST" class="space-y-5">
                <?php
                if (isset($data["result"])) {
                    if ($data["result"] == true) {

                    } else {
                        echo "<div class= 'alert-danger' style='text-align: center; margin: 0 auto;height: 35px;'>
                        Tên đăng nhập hoặc mật khẩu không đúng.
                        </div>";
                    }
                }
                ?>
                <div>
                    <label class="block mb-1 font-bold text-gray-500">Email</label>
                    <input type="text" placeholder="Nhập email sinh viên..." name="email"
                        class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500"
                        value="<?php if (isset($_SESSION['loginClient']['Email'])) echo $_SESSION['loginClient']['Email'];unset($_SESSION['loginClient']['Email']); ?>">
                    <span class="text-red-500"><?php if (isset($_SESSION['error']['Email'])) {
                        echo $_SESSION['error']['Email'];
                        unset($_SESSION['error']['Email']);
                        } ?></span>
                </div>
                <div class="form-group">
                    <label class="block mb-1 font-bold text-gray-500">Mật khẩu</label>
                    <input type="password" placeholder="Mật khẩu" name="password"
                        class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500">
                    <span class="text-red-500"><?php if (isset($_SESSION['error']['Password'])) {
                        echo $_SESSION['error']['Password'];
                        unset($_SESSION['error']['Password']);
                        } ?></span>
                </div>
                <button type="submit" name="submit"
                    class="font-bold block w-full bg-purple-600 hover:bg-purple-700 p-4 rounded text-white transition duration-300">Đăng
                    nhập</button>
                <div class=""> <a class="text-red-500 underline underline-offset-1" href="Password/index">Quên mật khẩu?</a>
                </div>

            </form>
        </div>
    </div>
</body>

</html>