<?php require_once '../app/Views/components/header.blade.php'?>
<?php require_once '../app/Views/components/nav.blade.php'?>

<?php require_once '../app/Views/components/session-messsage.blade.php'?>

<?php if(isset($_SESSION['user'])) :?>
<section id="createPostForm" class="py-4 md:py-10">
    <div class="heading text-center font-bold text-xl m-5 text-gray-800">Update Blog Post</div>
    <div class="editor mx-auto w-11/12 md:w-10/12 flex text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl rounded-lg ">
        <form action="../php/updatePost.php" method="post" class="flex flex-col w-full">
            <input id="title" name="title" class="title bg-gray-50 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Title" type="text" value="<?= $blog['title']?>" minlength="3" maxlength="40" required>
            <textarea id="body" name="body" class="description bg-gray-50 sec p-3 h-28 border border-gray-300 outline-none" spellcheck="false" placeholder="Describe everything about this post here" minlength="4" required><?= $blog['body']?></textarea>
            <input type="hidden" name="post_id" value="<?= $blog['id'] ?>">
            <input type="hidden" name="_method" value="PATCH">
            <div class="icons flex text-gray-500 m-2">
                <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg>
                <div class="count ml-auto text-gray-400 text-xs font-semibold">0/300</div>
            </div>
            <div class="buttons flex">
                <button type="submit" class="ml-auto btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-100 bg-indigo-500 hover:bg-indigo-700">Update</button>
            </div>
        </form>
    </div>
</section>
<?php endif; ?>
<?php require_once '../app/Views/components/footer.blade.php'?>

