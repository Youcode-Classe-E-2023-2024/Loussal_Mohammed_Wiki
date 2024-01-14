<link rel="stylesheet" href="<?= PATH ?>assets/css/home.css">

<div class="max-w-screen-xl mx-auto">
    <!-- delete section -->
    <?php if( isset($_SESSION["login"]) && $_SESSION["user_id"] == $singleWiki["creator"] ) { ?>
        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
            <p class="bg-black">delete</p>
        </button>

        <div id="popup-modal" tabindex="-1"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                            delete this product?</h3>

                        <a href="index.php?page=wiki&wikiId=<?= $singleWiki['wiki_id'] ?>">
                            <button data-modal-hide="popup-modal" type="submit" name="delete_wiki"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Yes, I'm sure
                            </button>
                        </a>
                        <button data-modal-hide="popup-modal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            No, cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!--Edit section -->
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
            Edit
        </button>

        <!-- Main modal -->
        <div id="authentication-modal" tabindex="-1" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Sign in to our platform
                        </h3>
                        <button type="button"
                                class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form action="index.php?page=wiki" method="post" class="p-4 md:p-5">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <input type="hidden" name="wiki_id" value="<?= $singleWiki["wiki_id"] ?>">

                                    <label for="name"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" name="title" id="name" value="<?= $singleWiki["title"] ?>"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                           placeholder="Type product name" required="">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="price"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                                    <select name="tag[]"
                                            data-te-select-init
                                            data-te-select-placeholder="Select tags"
                                            multiple>
                                        <?php
                                        foreach ($allTags as $tag) {
                                            ?>
                                            <option value="<?= $tag["tag_id"] ?>"><?= $tag["tag"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categories</label>
                                    <select id="category" name="category"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <?php foreach ($categories as $category) { ?>
                                            <option value="<?= $category["category_id"] ?>"><?= $category["category"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-span-2">
                                    <label for="description"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                        Description</label>
                                    <input id="description" name="description" rows="4"
                                           value="<?= $singleWiki["content"] ?>"
                                           class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           placeholder="Write product description here"></input>
                                </div>
                            </div>
                            <button type="submit" name="create_wiki"
                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                Add new product
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <main class="mt-10">

        <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
            <div class="absolute left-0 bottom-0 w-full h-full z-10"
                 style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
            <img src="<?= PATH ?>assets/img/<?= $singleWiki["picture"] ?>"
                 class="absolute left-0 top-0 w-full h-full z-0 object-cover"/>
            <div class="p-4 absolute bottom-0 left-0 z-20">
                <a href="#"
                   class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2"><?= $singleWiki["category"] ?></a>
                <br>
                <?php foreach ($tags as $tag) { ?>
                    <a href="#"
                       class="px-4 py-1 bg-red-500 rounded-full text-gray-200 inline-flex items-center justify-center mb-2"><?= $tag["tag"] ?></a>
                <?php } ?>
                <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                    <?= $singleWiki["title"] ?>
                </h2>
                <div class="flex mt-3">
                    <img src="<?= PATH ?>assets/img/<?= $singleWiki["user_picture"] ?>"
                         class="h-10 w-10 rounded-full mr-2 object-cover"/>
                    <div>
                        <p class="font-semibold text-gray-200 text-sm"><?= $singleWiki["username"] ?></p>
                        <p class="font-semibold text-gray-400 text-xs"><?= $singleWiki["created_date"] ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
            <p class="pb-6">
                <?= $singleWiki["content"] ?>.
            </p>

        </div>
    </main>
    <!-- main ends here -->

</div>

<script src="<?= PATH ?>assets/js/home.js"></script>