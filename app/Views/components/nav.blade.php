<nav class="w-full flex h-20 px-6 py-2 border-b border-gray-300 justify-between shadow-lg font-semibold">
    <div class="flex items-center">
        <span><a href="<?= BASE_URL ?>">Home</a></span>
    </div>
    <div class="flex space-x-4 items-center">
        <?php if(isset($_SESSION['user'])) :?>
        <span class="text-gray-400 italic font-normal">Hi, <?= $_SESSION['user_name']?></span>
        <span><a href="<?= BASE_URL ?>php/logout.php">Logout</a> </span>
        <?php else: ?>
        <span><a href="<?= BASE_URL ?>login">Login</a> </span>
        <span><a href="<?= BASE_URL ?>register">Register</a> </span>
        <?php endif; ?>
    </div>
</nav>