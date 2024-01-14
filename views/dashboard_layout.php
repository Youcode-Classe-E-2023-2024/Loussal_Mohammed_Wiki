<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.x/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="<?= PATH ?>assets/css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= ucfirst($page) ?></title>
</head>
<body>


<!-- Header -->
<div class="fixed w-full flex items-center  justify-between h-14 text-white z-10">
    <div
            class="flex items-center justify-start md:justify-center pl-3 z-20 w-14 md:w-64 h-28 bg-gray-900 border-none">
        <img src="<?= PATH ?>assets/img/Group%202.png" alt="">
    </div>
    <div class="flex items-center mt-6 h-20 bg-gray-800 header-right">
        <!-- component -->
        <div class=' mx-auto'>
            <div class="relative flex items-center h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden"
                 style="width: 600px">
                <div class="grid place-items-center h-full w-12 text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>

                <input class="peer h-full w-full outline-none text-sm text-gray-700 pr-2" type="text"
                       id="search"
                       placeholder="Search something.."/>
            </div>
        </div>
        <ul class="flex items-center justify-between">
            <li>
                <div class="block w-px h-6 mx-3 bg-gray-700"></div>
            </li>
            <li>
                <form action="index.php?page=dashboard" method="POST">
                    <a class="flex items-center mr-4 hover:text-blue-100">
                                <span class="inline-flex mr-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                </span>
                        <button type="submit" name="logout">Logout</button>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>
<!-- ./Header -->

<!-- Sidebar -->
<div
        class="fixed flex flex-col mt-6 top-14 left-0 w-14 hover:w-64 md:w-64 bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
    <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
        <ul class="flex flex-col z-0 py-4 space-y-1">
            <li class="px-5 hidden md:block">
                <div class="flex mt-6 mb-6 flex-row items-center justify-center h-8">
                    <div class="text-sm font-light  tracking-wide text-gray-400 uppercase">Main</div>
                </div>
            </li>
            <li>
                <a id="dashboard"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                        </path>
                                    </svg>
                                </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                </a>
            </li>
            <li>
                <a id="user"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Tags</span>
                    <span
                            class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span>
                </a>
            </li>
            <li>
                <a id="product"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/>
                                    </svg>

                                </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Category</span>
                </a>
            </li>
            <li>
                <a href="index.php?page=home" id="product"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/>
                                    </svg>

                                </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Home</span>
                </a>
            </li>
            <li class="px-5 hidden md:block">
                <div class="flex mb-6 flex-row items-center justify-center mt-5 h-8">
                    <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Profile</div>
                </div>
            </li>
            <div class="space-y-6 hidden md:block">
                <div class="flex flex-col items-center gap-x-2">
                    <img class="object-cover w-16 h-16 rounded-lg"
                         src="<?= PATH ?>assets/img/<?= $userData["user_picture"] ?>"
                         alt="">
                    <div class="flex flex-col items-center justify-center">
                        <h1 class="text-xl font-semibold  capitalize text-white"><?= $userData["username"] ?></h1>
                        <p class="text-base text-gray-400"><?= $userData["email"] ?></p>
                    </div>
                </div>
            </div>

        </ul>
        <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2021</p>
    </div>
</div>
<!-- ./Sidebar -->

<main>
    <?php include_once 'views/dashboard_view.php'; ?>
</main>

<footer></footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>