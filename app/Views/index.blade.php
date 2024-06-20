<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/output.css" rel="stylesheet">
    <title>PZAgency - task</title>
</head>
<body>
<section class="py-24 ">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <h2 class="font-manrope text-4xl font-bold text-gray-900 text-center mb-16">Our latest blog</h2>
        <div class="grid justify-center gap-8 md:grid-cols-3 lg:justify-between lg:gap-8">
            <?php foreach($blogs as $blog): ?>
            <div class="group w-full max-lg:max-w-xl lg:w-full border border-gray-300 rounded-2xl">
                <div class="flex items-center">
                    <img src="https://pagedone.io/asset/uploads/1696244317.png" alt="blogs tailwind section" class="rounded-t-2xl w-full">
                </div>
                <div class="p-4 lg:p-6 transition-all duration-300 rounded-b-2xl group-hover:bg-gray-50">
                    <span class="text-indigo-600 font-medium mb-3 block"><?=$blog['created_at']?></span>
                    <h4 class="text-lg text-gray-900 font-medium leading-8 mb-5"><?=$blog['title']?></h4>
                    <p class="text-gray-500 leading-6 mb-6"><?=$blog['body']?></p>
                    <a href="javascript:;" class="cursor-pointer text-lg text-indigo-600 font-semibold">Read more..</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
</body>
</html>