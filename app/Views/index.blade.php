<?php require_once '../app/Views/components/header.blade.php'?>
<?php require_once '../app/Views/components/nav.blade.php'?>

<?php if(!empty($_SESSION['message'])) : ?>
<span class="success-msg mt-10"><?= $_SESSION['message'] ?></span>
<?php endif; ?>
<?php if(isset($_SESSION['user'])) :?>
<section id="createPostForm" class="py-4 md:py-10 md:border-b">
    <div class="heading text-center font-bold text-xl m-5 text-gray-800">Create New Blog Post</div>
    <div class="editor mx-auto w-11/12 md:w-10/12 flex text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl rounded-lg ">
        <form action="../public/php/createPost.php" method="post" class="flex flex-col w-full">
            <input id="title" name="title" class="title bg-gray-50 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Title" type="text">
            <textarea id="body" name="body" class="description bg-gray-50 sec p-3 h-28 border border-gray-300 outline-none" spellcheck="false" placeholder="Describe everything about this post here"></textarea>
            <input type="hidden" name="user_id" value="<?= $_SESSION['user'] ?>">
            <div class="icons flex text-gray-500 m-2">
                <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg>
                <div class="count ml-auto text-gray-400 text-xs font-semibold">0/300</div>
            </div>
            <div class="buttons flex">
                <button type="submit" class="ml-auto btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-100 bg-indigo-500 hover:bg-indigo-700">Post</button>
            </div>
        </form>
    </div>
</section>
<?php endif; ?>
<section class="py-12 ">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <h2 class="font-manrope text-4xl font-bold text-gray-900 text-center mb-16">Our latest blog</h2>
        <div class="grid justify-center gap-12 sm:gap-8 sm:gap-y-12 sm:grid-cols-2 md:grid-cols-3 lg:justify-between lg:gap-8">
            <?php foreach($blogs as $blog): ?>
            <div class="flex flex-col justify-between w-full max-lg:max-w-xl lg:w-full border border-gray-300 rounded-2xl shadow-lg hover:bg-gray-50 hover:shadow-xl">
                <div class="flex items-center">
                    <img src="https://pagedone.io/asset/uploads/1696244317.png" alt="blogs tailwind section" class="rounded-t-2xl w-full">
                </div>
                <div class="px-4 pt-4 lg:px-6 lg:pt-6 transition-all duration-300 rounded-b-2xl">
                    <span class="text-indigo-600 font-medium mb-3 block"><?=$blog['created_at']?></span>
                    <h4 class="text-lg text-gray-900 font-medium leading-8 mb-5"><?=$blog['title']?></h4>
                    <p class="text-gray-500 leading-6 mb-6 line-clamp-2"><?=$blog['body']?></p>
                </div>
                <div class="flex justify-between px-4 pb-4 lg:px-6 lg:pb-6 transition-all duration-300 rounded-b-2xl">
                    <a href="<?= BASE_URL.'single/'.$blog['id']?>" class="cursor-pointer text-lg text-indigo-600 font-semibold">Read more</a>
                        <?php if(isset($_SESSION['user']) && $blog['user_id'] === $_SESSION['user']) :?>
                    <a href="<?= BASE_URL ?>update/<?=$blog['id']?>" class="cursor-pointer text-lg text-yellow-600 font-semibold">Edit</a>
                    <form action="../public/php/deletePost.php" method="POST">
                        <input type="hidden" name="post_id" value="<?= $blog['id'] ?>">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" onclick="return confirm('Are you sure?')" class="cursor-pointer text-lg text-red-500 font-semibold">Delete</button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
</body>
</html>