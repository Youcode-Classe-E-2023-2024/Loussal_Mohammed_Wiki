// burger menu config

document.addEventListener('DOMContentLoaded', function () {

    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    const close = document.querySelectorAll('.navbar-close');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener('click', function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }
});

const searchInput = document.getElementById("search-input").value;


$("#search-input").on("input", function () {
    var searchInput = $(this).val();
    $("#container").hide();
    $("#results").show();
    // Clear previous results
    $("#results").empty();

    if (searchInput !== "") {
        $.ajax({
            url: "index.php?page=home",
            type: "GET",
            data: {
                req: "search_bar",
                search_type: $("#search-dropdown").val(),
                input_value: searchInput
            },
            success: function (data) {
                let response = JSON.parse(data);
                let tags= "";

                if (response.length > 0) {
                    response.forEach(item => {

                        item.tags.forEach((tag) => {
                            tags += ` 
                                            <div
                                                class="bg-green-500 w-fit mb-10 rounded-full text-white px-3 py-1 text-xs uppercase font-medium">
                                                ${tag.tag}
                                             
                                            </div>
                                        `;
                        })

                        $("#results").append(`  

                            <div class="rounded overflow-hidden shadow-lg">
                    
                                
                                <div class="relative h-96">
                                    <a href="index.php?page=wiki&wiki_id=<?= $wiki['wiki_id'] ?>">
                                        <img class="w-full h-full object-cover"
                                            src="./assets/img/${item.wiki_infos.picture}"
                                            alt="Sunset in the mountains">
                                        <div
                                            class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                                        </div>
                                    </a>
                                    <div style="margin-top: -18px; margin-left: 5px"
                                                class="bg-red-500 w-fit mb-10 rounded-full text-white px-3 py-1 text-xs uppercase font-medium">
                                                ${item.wiki_infos.category}
                                             
                                            </div>
                                    <div class="flex flex-row" style="margin-top: -18px; margin-left: 5px">
                                        ${tags}
                                    </div>
                    
                                    <a href="!#">
                                        <div
                                            class="text-sm absolute top-0 right-0 bg-indigo-600 px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                            <span class="font-bold">15</span>
                                            <small>April</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="px-6 py-4">
                    
                                    <a href="#"
                                        class="font-semibold text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out">${item.wiki_infos.title}</a>
                                    <p class="text-gray-500 text-sm">
                                        ${item.wiki_infos.content}
                                    </p>
                                </div>
                                <div class="px-6 py-4 flex flex-row items-center">
                                    <span href="#"
                                        class="py-1 text-sm font-regular text-gray-900 mr-1 flex flex-row justify-between items-center">
                                        <svg height="13px" width="13px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                            style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path
                                                        d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="ml-1">${item.wiki_infos.created_at}</span></span>
                                </div>
                            </div>
   `);
                    });
                } else {
                    // Display "no results" message
                    $("#results").append(`  
                         <div class="flex justify-center items-center">
                          <section class="flex items-center text-center h-full sm:p-16 dark:bg-gray-900 dark:text-gray-100">
                            <div class="container flex flex-col items-center justify-center px-5 mx-auto my-8 space-y-8 text-center sm:max-w-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-40 h-40 dark:text-gray-600">
                                    <path fill="currentColor" d="M256,16C123.452,16,16,123.452,16,256S123.452,496,256,496,496,388.548,496,256,388.548,16,256,16ZM403.078,403.078a207.253,207.253,0,1,1,44.589-66.125A207.332,207.332,0,0,1,403.078,403.078Z"></path>
                                    <rect width="176" height="32" x="168" y="320" fill="currentColor"></rect>
                                    <polygon fill="currentColor" points="210.63 228.042 186.588 206.671 207.958 182.63 184.042 161.37 162.671 185.412 138.63 164.042 117.37 187.958 141.412 209.329 120.042 233.37 143.958 254.63 165.329 230.588 189.37 251.958 210.63 228.042"></polygon>
                                    <polygon fill="currentColor" points="383.958 182.63 360.042 161.37 338.671 185.412 314.63 164.042 293.37 187.958 317.412 209.329 296.042 233.37 319.958 254.63 341.329 230.588 365.37 251.958 386.63 228.042 362.588 206.671 383.958 182.63"></polygon>
                                </svg>
                                <p class="text-3xl">Looks like no result found</p>
                                <a rel="noopener noreferrer" href="index.php?page=home" class="px-8 py-3 font-semibold rounded dark:bg-violet-400 dark:text-gray-900">Back to homepage</a>
                            </div>
                        </section>
                        </div>
`);
                }
            },
            error: function (error) {
                console.error("Error in search: ", error);
            }
        });
    } else {
        // If search input is empty, show the main container and hide results
        $("#container").show();
        $("#results").hide();
    }
});





