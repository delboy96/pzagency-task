<?php require_once '../app/Views/components/header.blade.php'?>
<?php require_once '../app/Views/components/nav.blade.php'?>

<section>
    <?php require_once '../app/Views/components/session-messsage.blade.php'?>

    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <article class="max-w-2xl px-6 py-12 md:py-24 mx-auto space-y-12 dark:bg-gray-800 dark:text-gray-50">
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
                <div class="flex justify-between">
                    <div class="flex space-y-4 md:space-y-0  md:flex-row items-center space-x-6">
                        <img src="https://icons.iconarchive.com/icons/diversity-avatars/avatars/256/charlie-chaplin-icon.png" alt="" class="self-center flex-shrink-0 w-24 h-24 border rounded-full md:justify-self-start dark:bg-gray-500 dark:border-gray-700">
                        <div class="flex flex-col">
                            <h4 class="text-lg font-semibold"><?= $comm['user_name']?></h4>
                            <p class="dark:text-gray-400"><?= $comm['comment']?></p>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <?php if(isset($_SESSION['user']) && $comm['user_id'] === $_SESSION['user']) :?>
                        <a href="<?= BASE_URL ?>comment-update/<?=$comm['id']?>" class="cursor-pointer text-lg text-yellow-600 font-semibold">Edit</a>
                        <form action="../../public/php/deleteComment.php" method="POST">
                            <input type="hidden" name="comment_id" value="<?= $comm['id'] ?>">
                            <input type="hidden" name="post_id" value="<?= $comm['post_id'] ?>">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" onclick="return confirm('Are you sure?')" class="cursor-pointer text-lg text-red-500 font-semibold">Delete</button>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php if(empty($comments)) :?>
                <span class="italic text-gray-400">No comments yet.</span>
                <?php endif; ?>
                <?php if(isset($_SESSION['user'])) :?>
                <div class="editor w-full flex text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl rounded-lg ">
                    <form action="../../public/php/createComment.php" method="post" class="flex flex-col w-full">
                        <textarea id="comment" name="comment" class="description bg-gray-50 sec p-3 h-16 border border-gray-300 outline-none" spellcheck="false" placeholder="Leave your comment here"></textarea>
                        <input type="hidden" name="post_id" value="<?= $blog['id']?>">
                        <input type="hidden" name="user_id" value="<?= $_SESSION['user'] ?>">
                        <div class="buttons flex mt-3">
                            <button type="submit" class="ml-auto btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-100 bg-indigo-500 hover:bg-indigo-700">Comment</button>
                        </div>
                    </form>
                </div>
                <?php endif;?>
            </div>
        </article>
    </div>
</section>
<?php require_once '../app/Views/components/footer.blade.php'?>
