<?php require_once '../app/Views/components/header.blade.php'?>
<?php require_once '../app/Views/components/nav.blade.php'?>

<?php if(!empty($_SESSION['message'])) : ?>
<span class="success-msg mt-10"><?= $_SESSION['message'] ?></span>
<?php endif; ?>
<?php if(isset($_SESSION['user'])) :?>
<div class="editor mx-auto mt-10 w-full flex text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl rounded-lg ">
    <form action="../../public/php/updateComment.php" method="post" class="flex flex-col w-full">
        <textarea id="comment" name="comment" class="description bg-gray-50 sec p-3 h-16 border border-gray-300 outline-none" spellcheck="false" placeholder="Leave your comment here"><?= $comment['comment']?></textarea>
        <input type="hidden" name="comment_id" value="<?= $comment['id']?>">
        <input type="hidden" name="post_id" value="<?= $comment['post_id']?>">
        <input type="hidden" name="_method" value="PATCH">
        <div class="buttons flex mt-3">
            <button type="submit" class="ml-auto btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-100 bg-indigo-500 hover:bg-indigo-700">Update</button>
        </div>
    </form>
</div>
<?php endif;?>
<?php require_once '../app/Views/components/footer.blade.php'?>

