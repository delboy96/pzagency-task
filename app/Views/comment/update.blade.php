<?php
require '../config/config.php';
$uri = $_SERVER['REQUEST_URI'];
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
        <span class="text-gray-400 italic">Hi, <?= $_SESSION['user']?></span>
        <span><a href="<?= BASE_URL ?>php/logout.php">Logout</a> </span>
        <?php else: ?>
        <span><a href="<?= BASE_URL ?>login">Login</a> </span>
        <span><a href="<?= BASE_URL ?>register">Register</a> </span>
        <?php endif; ?>
    </div>
</nav>
<?php if(!empty($_SESSION['message'])) : ?>
<span class="success-msg mt-10"><?= $_SESSION['message'] ?></span>
<?php endif; ?>
<?php if(isset($_SESSION['user'])) :?>
<div class="editor mx-auto mt-10 w-full flex text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl rounded-lg ">
    <form action="../../public/php/updateComment.php" method="post" class="flex flex-col w-full">
        <textarea id="comment" name="comment" class="description bg-gray-100 sec p-3 h-16 border border-gray-300 outline-none" spellcheck="false" placeholder="Leave your comment here"><?= $comment['comment']?></textarea>
        <input type="hidden" name="comment_id" value="<?= $comment['id']?>">
        <input type="hidden" name="post_id" value="<?= $comment['post_id']?>">
        <input type="hidden" name="_method" value="PATCH">
        <div class="buttons flex mt-3">
            <button type="submit" class="ml-auto btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-100 bg-indigo-500 hover:bg-indigo-700">Update</button>
        </div>
    </form>
</div>
<?php endif;?>
</body>
</html>
