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
    <div class="flex flex-col w-full lg:w-1/2 justify-center items-center bg-gray-100 space-y-8">
        <?php require_once '../app/Views/components/session-messsage.blade.php'?>
        <div class="w-full px-8 md:px-32 lg:px-24">
            <form action="../public/php/login.php" method="post" class="bg-white rounded-md shadow-2xl p-5">
                <h1 class="text-gray-800 font-bold text-2xl mb-1">Hello again!</h1>
                <p class="text-sm font-normal text-gray-600 mb-8">Welcome Back</p>
                <div class="flex items-center border-2 mb-8 py-2 px-3 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                              d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                    </svg>
                    <input id="email" class=" pl-2 w-full outline-none border-none" type="email" name="email"
                           placeholder="Email Address" required/>
                </div>
                <div class="flex items-center border-2 mb-12 py-2 px-3 rounded-2xl ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fillRule="evenodd"
                              d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                              clipRule="evenodd"/>
                    </svg>
                    <input class="pl-2 w-full outline-none border-none" type="password" name="password" id="password" placeholder="Password" maxlength="30" required/>
                </div>
                <button type="submit" class="block w-full bg-indigo-600 mt-5 py-2 rounded-2xl hover:bg-indigo-700 hover:-translate-y-1 transition-all duration-500 text-white font-semibold mb-2">
                    Login
                </button>
                <div class="flex justify-between mt-4">
                    <a href="<?= BASE_URL ?>register" class="text-sm ml-2 hover:text-blue-500 cursor-pointer hover:-translate-y-1 duration-500 transition-all">Don't have an account yet?</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>