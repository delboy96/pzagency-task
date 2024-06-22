<?php
require '../config/config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
        <!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/output.css" rel="stylesheet">
    <title>PZAgency - task</title>
    <style>
        .login_img_section {
            background: linear-gradient(rgba(2, 2, 2, .7), rgba(0, 0, 0, .7)), url(https://images.unsplash.com/photo-1650825556125-060e52d40bd0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80) center center;
        }
    </style>
</head>
<body>
<div class="h-screen flex">
    <div class="hidden lg:flex w-full lg:w-1/2 login_img_section justify-around items-center">
        <div class="bg-black opacity-20 inset-0 z-0">
        </div>
        <div class="w-full mx-auto px-20 flex-col items-center space-y-6">
            <h1 class="text-white font-bold text-4xl font-sans">Simple App</h1>
            <p class="text-white mt-1">The simplest app to use</p>
            <div class="flex justify-center lg:justify-start mt-6">
                <a href="<?= BASE_URL ?>" class="hover:bg-indigo-700 hover:text-white hover:-translate-y-1 transition-all duration-500 bg-white text-indigo-800 mt-4 px-4 py-2 rounded-2xl font-bold mb-2">Home</a>
            </div>
        </div>
    </div>
    <div class="flex w-full lg:w-1/2 justify-center items-center bg-white space-y-8">
        <div class="w-full px-8 md:px-32 lg:px-24">
            <form action="../public/php/register.php" method="post" class="bg-white rounded-md shadow-2xl p-5">
                <h1 class="text-gray-800 font-bold text-2xl mb-6">Hello, welcome!</h1>
                <div class="flex items-center border-2 mb-8 py-2 px-3 rounded-2xl">
                    <input id="name" class=" pl-2 w-full outline-none border-none" type="text" name="name"
                           placeholder="Name"/>
                </div>
                <div class="flex items-center border-2 mb-8 py-2 px-3 rounded-2xl">
                    <input id="email" class=" pl-2 w-full outline-none border-none" type="email" name="email"
                           placeholder="Email Address"/>
                </div>
                <div class="flex items-center border-2 mb-12 py-2 px-3 rounded-2xl ">
                    <input class="pl-2 w-full outline-none border-none" type="password" name="password" id="password" placeholder="Password"/>
                </div>
                <button type="submit" class="block w-full bg-indigo-600 mt-5 py-2 rounded-2xl hover:bg-indigo-700 hover:-translate-y-1 transition-all duration-500 text-white font-semibold mb-2">
                    Register
                </button>
                <div class="flex justify-between mt-4">
                    <a href="<?= BASE_URL ?>login" class="text-sm ml-2 hover:text-blue-500 cursor-pointer hover:-translate-y-1 duration-500 transition-all">Already have an account?</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>