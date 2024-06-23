<?php require_once '../app/Views/components/header.blade.php'?>

<div class="h-screen flex">
    <div class="hidden lg:flex w-full lg:w-1/2 login_img_section justify-around items-center">
        <div class="bg-black opacity-20 inset-0 z-0">
        </div>
        <div class="w-full mx-auto px-20 flex-col items-center space-y-6">
            <h1 class="text-gray-100 font-bold text-4xl font-sans">Simple App</h1>
            <p class="text-gray-100 mt-1">The simplest app to use</p>
            <div class="flex justify-center lg:justify-start mt-6">
                <a href="<?= BASE_URL ?>" class="hover:bg-indigo-700 hover:text-white hover:-translate-y-1 transition-all duration-500 bg-gray-100 text-indigo-800 mt-4 px-4 py-2 rounded-2xl font-bold mb-2">Home</a>
            </div>
        </div>
    </div>
    <div class="flex w-full lg:w-1/2 justify-center items-center bg-gray-100 space-y-8">
        <div class="w-full px-8 md:px-32 lg:px-24">
            <form action="../public/php/register.php" method="post" class="bg-white rounded-md shadow-2xl p-5">
                <h1 class="text-gray-800 font-bold text-2xl mb-6">Hello, welcome!</h1>
                <div class="flex items-center border-2 mb-8 py-2 px-3 rounded-2xl">
                    <input id="name" class=" pl-2 w-full outline-none border-none" type="text" name="name"
                           placeholder="Name" minlength="3" maxlength="30" required/>
                </div>
                <div class="flex items-center border-2 mb-8 py-2 px-3 rounded-2xl">
                    <input id="email" class=" pl-2 w-full outline-none border-none" type="email" name="email"
                           placeholder="Email Address" required/>
                </div>
                <div class="flex items-center border-2 mb-12 py-2 px-3 rounded-2xl ">
                    <input class="pl-2 w-full outline-none border-none" type="password" name="password" id="password" placeholder="Password" minlength="6" maxlength="30" required/>
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