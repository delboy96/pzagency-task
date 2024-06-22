<?php
require '../config/config.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/css/output.css" rel="stylesheet">
    <title>PZAgency - task</title>
</head>
<body>
<nav class="w-full flex h-20 px-6 py-2 border-b border-gray-300 justify-between shadow-lg">
    <div class="flex items-center">
        <span><a href="<?= BASE_URL ?>">Home</a></span>
    </div>
    <div class="flex space-x-4 items-center">
        <?php if(isset($_SESSION['user'])) :?>
        <span><a href="<?= BASE_URL ?>php/logout.php">Logout</a> </span>
        <?php else: ?>
        <span><a href="<?= BASE_URL ?>login">Login</a> </span>
        <span><a href="<?= BASE_URL ?>register">Register</a> </span>
        <?php endif; ?>
    </div>
</nav>
<section class="py-24 ">
    <?php if(!empty($_SESSION['message'])) : ?>
    <span class="success-msg mt-10"><?= $_SESSION['message'] ?></span>
    <?php endif; ?>
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <article class="max-w-2xl px-6 py-24 mx-auto space-y-12 dark:bg-gray-800 dark:text-gray-50">
            <div class="w-full mx-auto space-y-4 text-center">
                <h1 class="text-4xl font-bold leadi md:text-5xl"><?= $blog['title']?></h1>
                <p class="text-sm dark:text-gray-400">by
                    <a rel="noopener noreferrer" href="#" target="_blank" class="underline dark:text-violet-400">
                        <span itemprop="name"><?= $blog['user_name']?></span>
                    </a>on
                    <time datetime="2021-02-12 15:34:18-0200"><?= $blog['created_at']?></time>
                </p>
            </div>
            <div class="dark:text-gray-100">
                <p><?= $blog['body']?></p>
            </div>
            <div class="pt-12 border-t dark:border-gray-700 space-y-6">
                <?php foreach ($comments as $comm) : ?>
                <div class="flex flex-col space-y-4 md:space-y-0 md:space-x-6 md:flex-row">
                    <img src="https://icons.iconarchive.com/icons/diversity-avatars/avatars/256/charlie-chaplin-icon.png" alt="" class="self-center flex-shrink-0 w-24 h-24 border rounded-full md:justify-self-start dark:bg-gray-500 dark:border-gray-700">
                    <div class="flex flex-col">
                        <h4 class="text-lg font-semibold"><?= $comm['user_name']?></h4>
                        <p class="dark:text-gray-400"><?= $comm['comment']?></p>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php if(empty($comments)) :?>
                <span>No comments yet.</span>
                <?php endif; ?>
            </div>
        </article>
    </div>
</section>
</body>
</html>