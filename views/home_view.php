<link rel="stylesheet" href="<?= PATH ?>assets/css/home.css">

<div class="container" id="container">

    <header>

        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative w-full ml-10 overflow-hidden rounded-lg md:h-96" style="height: 500px">
                <?php foreach ($lastWiki as $wiki) { ?>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="<?= PATH ?>assets/img/<?= $wiki["picture"] ?>"
                             class="absolute w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        <div class="relative flex flex-col items-start left-10 top-48 h-full text-center">
                            <!-- Title -->
                            <div class="bg-black bg-opacity-50 text-white text-6xl px-4 py-2 rounded-lg mb-2">
                                <?= $wiki["title"] ?>
                            </div>
                            <!-- Category -->
                            <div class="bg-red-600 text-white text-xl px-4 py-2 rounded-full mb-2">
                                <?= $wiki["category"] ?>
                            </div>
                            <!-- Tags -->
                            <div class="flex flex-row">
                                <?php
                                $tags = Tag::get_wiki_tag($wiki["wiki_id"]);
                                foreach ($tags as $tag) { ?>
                                    <div class="bg-green-500 text-white text-xl px-4 py-2 rounded-full mb-2">
                                        <?= $tag["tag"] ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                        data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                        data-carousel-slide-to="4"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
            </button>
            <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
            </button>
        </div>


    </header>

    <h1 class="text-6xl ml-40 mt-10 font-bold">All wikis:</h1>
    <div class="main-content">

        <div class="blog" id="Blog">
            <!--
            Include Tailwind JIT CDN compiler
            More info: https://beyondco.de/blog/tailwind-jit-compiler-via-cdn
            -->
            <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>

            <!-- Snippet -->
            <div class="max-w-6xl mx-auto p-4 sm:px-6 h-full">
                <!-- Blog post -->
                <?php foreach ($wikis as $wiki) { ?>
                    <article class="mt-10 grid md:grid-cols-2 gap-6 md:gap-8 lg:gap-12 xl:gap-16 items-center">
                        <a class="relative ml-[-85px] block group" href="#0">
                            <div class="absolute inset-0 w-[400px] h-[260px] bg-gray-800 hidden md:block transform md:translate-y-2 md:translate-x-4 xl:translate-y-4 xl:translate-x-8 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-700 ease-out pointer-events-none"
                                 aria-hidden="true"></div>
                            <figure class="relative w-[400px] h-[260px] h-0 pb-[56.25%] md:pb-[75%] lg:pb-[56.25%] overflow-hidden transform md:-translate-y-2 xl:-translate-y-4 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-700 ease-out">
                                <img class="absolute inset-0 w-full h-full object-cover transform hover:scale-105 transition duration-700 ease-out"
                                     src="<?= PATH ?>assets/img/<?= $wiki["picture"] ?>" width="540" height="303"
                                     alt="Blog post">
                            </figure>
                        </a>
                        <div class="bg-gray-200 flex flex-col items-center justify-center">
                            <header class="flex flex-col mt-20 items-center justify-center text-center">
                                <h3 class="text-2xl lg:text-5xl mb-5 font-bold leading-tight mb-2">
                                    <a class="hover:text-gray-100 transition duration-150 ease-in-out"
                                       href="#0"> <?= $wiki["title"] ?></a>
                                </h3>
                                <div class="mb-20">
                                    <ul class="flex flex-wrap justify-center text-xl font-medium -m-1">
                                        <li class="m-1">
                                            <a class="inline-flex items-center justify-center text-gray-100 py-1 px-3 rounded-full bg-purple-600 hover:bg-purple-700 transition duration-150 ease-in-out"
                                               href="#0"> <?= $wiki["category"] ?></a>
                                        </li>
                                        <li class="m-1 flex flex-wrap">
                                            <?php
                                            $tags = Tag::get_wiki_tag($wiki["wiki_id"]);
                                            foreach ($tags as $tag) {
                                                ?>
                                                <a class="inline-flex items-center justify-center text-gray-100 py-1 px-3 rounded-full bg-blue-500 hover:bg-blue-600 transition duration-150 ease-in-out m-1"
                                                   href="#0"> <?= $tag["tag"] ?></a>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                </div>
                            </header>
                            <p class="text-lg text-gray-400 flex-grow text-center px-4"><?= $wiki["content"] ?></p>
                            <div class="flex">
                                <a href="index.php?page=wiki&wiki_id=<?= $wiki["wiki_id"] ?>">
                                    <div class="w-full flex items-center justify-center cursor-pointer p-4">
                                        <div
                                                class="relative inline-flex items-center justify-start py-3 pl-4 pr-12 overflow-hidden font-semibold shadow text-indigo-600 transition-all duration-150 ease-in-out rounded hover:pl-10 hover:pr-6 bg-gray-50 dark:bg-gray-700 dark:text-white dark:hover:text-gray-200 dark:shadow-none group"
                                        >
                                    <span
                                            class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-indigo-600 group-hover:h-full"
                                    ></span>
                                            <span
                                                    class="absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12"
                                            >
                                      <svg
                                              xmlns="http://www.w3.org/2000/svg"
                                              viewBox="0 0 24 24"
                                              stroke="currentColor"
                                              fill="none"
                                              class="w-5 h-5 text-green-400"
                                      >
                                        <path
                                                d="M14 5l7 7m0 0l-7 7m7-7H3"
                                                stroke-width="2"
                                                stroke-linejoin="round"
                                                stroke-linecap="round"
                                        ></path>
                                      </svg>
                                    </span>
                                            <span
                                                    class="absolute left-0 pl-2.5 -translate-x-12 group-hover:translate-x-0 ease-out duration-200"
                                            >
                                      <svg
                                              xmlns="http://www.w3.org/2000/svg"
                                              viewBox="0 0 24 24"
                                              stroke="currentColor"
                                              fill="none"
                                              class="w-5 h-5 text-green-400"
                                      >
                                        <path
                                                d="M14 5l7 7m0 0l-7 7m7-7H3"
                                                stroke-width="2"
                                                stroke-linejoin="round"
                                                stroke-linecap="round"
                                        ></path>
                                      </svg>
                                        </span>
                                            <span
                                                    class="relative w-full text-left transition-colors duration-200 ease-in-out group-hover:text-white dark:group-hover:text-gray-200"
                                            >See more</span
                                            >
                                        </div>
                                    </div>
                                </a>
                                <?php if (!empty($_SESSION["admin"])) { ?>
                                    <a href="index.php?page=home&wiki_archive=<?= $wiki["wiki_id"] ?>" class="mt-5">
                                        <button
                                                class="inline-flex items-center px-4 py-2 bg-red-600 transition ease-in-out delay-75 hover:bg-red-700 text-white text-sm font-medium rounded-md hover:-translate-y-1 hover:scale-110"
                                        >
                                            <svg
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    class="h-5 w-5 mr-2"
                                                    xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                        stroke-width="2"
                                                        stroke-linejoin="round"
                                                        stroke-linecap="round"
                                                ></path>
                                            </svg>

                                            Archive
                                        </button>

                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </article>
                <?php } ?>
            </div>


            <div class="pagination-blog">
                <div class="active">1</div>
                <div>2</div>
                <div>NEXT</div>
            </div>

        </div>

        <div class="sidebar">

            <div class="popular-posts-side">
                <h2>Last categories:</h2>
                <?php foreach ($lastCategories as $category) { ?>
                    <div class="popular-posts">
                        <div class="popular-post">
                            <div class="popular-post-content">
                                <h1 class="text-2xl font-bold">Category <?= $category["category_id"] ?> </h1>
                                <a href="#" class="text-xl"><?= $category["category"] ?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="social-side">
                <h2>LETS GET SOCIAL!</h2>
                <div>
                    <a href="#"><img src="<?= PATH ?>assets/images/social/twitter.png" alt="Twitter Logo" loading="lazy"></a>
                    <a href="#"><img src="<?= PATH ?>assets/images/social/facebook.png" alt="Facebook Logo" loading="lazy"></a>
                    <a href="#"><img src="<?= PATH ?>assets/images/social/pinterest.png" alt="Pinterest Logo" loading="lazy"></a>
                    <a href="#"><img src="<?= PATH ?>assets/images/social/linkedin.png" alt="Linkedin Logo" loading="lazy"></a>
                </div>
            </div>

            <div class="advertisement-side">
                <h2>ADVERTISEMENT</h2>
                <div class="my-advertisement-box">
                    <p>Banner Ad 300x300</p>
                </div>
            </div>

        </div>

    </div>

</div>
<?php foreach ($wikis as $wiki) { ?>

    <div id="results"
         class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10">

    </div>
<?php } ?>
<script src="<?= PATH ?>assets/js/home.js"></script>
