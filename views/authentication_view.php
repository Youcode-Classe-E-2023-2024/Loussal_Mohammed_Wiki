<link rel="stylesheet" href="<?=PATH?>assets/css/login.css">


<div id="login">

    <div class="main" id="login-section">
        <!-- Checkbox for triggering animations -->
        <input type="checkbox" id="chk" aria-hidden="true">

        <!-- Eye icons for password visibility -->
        <div class="eyes">
            <img id="OpenEye" src="pictures/open.jpg" alt="" class="open">
            <img id="CloseEye" src="pictures/close.jpg" alt="" class="close">
        </div>

        <!-- Login form -->
        <div class="signup">
            <form class="form" autocomplete="off">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" id="loginEmail" placeholder="Email" name="email" class="input" autocomplete="off">
                <div class="password-container">
                    <input type="password" id="loginPassword" placeholder="Password" name="password" class="input"
                           autocomplete="off">
                </div>
                <div class="toggle-label" >Show Password
                    <input id="toggleBtn" onclick="togglePassword()" type="checkbox">
                </div>
                <button id="loginBtn" class="btn">
                    <svg height="40" width="40" fill="#FFFFFF" data-name="Layer 1" id="Layer_1" class="sparkle" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M10.8447 8.09467C10.5518 8.38756 10.5518 8.86244 10.8447 9.15533L12.5643 10.875H4.375C3.96079 10.875 3.625 11.2108 3.625 11.625C3.625 12.0392 3.96079 12.375 4.375 12.375H12.5643L10.8447 14.0947C10.5518 14.3876 10.5518 14.8624 10.8447 15.1553C11.1376 15.4482 11.6124 15.4482 11.9053 15.1553L14.9053 12.1553C15.1982 11.8624 15.1982 11.3876 14.9053 11.0947L11.9053 8.09467C11.6124 7.80178 11.1376 7.80178 10.8447 8.09467Z"
                                  fill="#9a9ca2"></path>
                            <path d="M12.375 5.87745C12.375 6.3254 12.6492 6.71725 12.966 7.03401L15.966 10.034C16.8447 10.9127 16.8447 12.3373 15.966 13.216L12.966 16.216C12.6492 16.5327 12.375 16.9246 12.375 17.3726V19.625C16.7933 19.625 20.375 16.0433 20.375 11.625C20.375 7.20672 16.7933 3.625 12.375 3.625V5.87745Z"
                                  fill="#9a9ca2"></path>
                        </g>
                    </svg>
                    <span class="text">Sign in</span>
                </button>
            </form>
        </div>
        <div class="login">
            <form autocomplete="off" enctype="multipart/form-data">
                <label for="chk" class="mb-28" aria-hidden="true">Register</label>
                <input class="login-input" name="user_picture" type="file" accept="image/*" id="imageInput"
                       style="display: none">

                <!-- Circular image container -->
                <label for="imageInput" class="absolute top-2 left-20 cursor-pointer flex justify-center">
                    <div class="w-16 h-16 rounded-full overflow-hidden border-2 border-gray-300">
                        <img id="previewImage"
                             src="<?=PATH?>assets/img/pngtree-cartoon-color-simple-male-avatar-png-image_1934459-removebg-preview.png"
                             alt="User Picture">
                    </div>
                </label>
                <input type="text" id="signUpName" placeholder="Username" name="username" class="input">
                <input id="signUpEmail" type="email" placeholder="Email" name="email" class="input">
                <input id="signUpPassword" type="password" placeholder="Password" name="password" class="input">
<!--                <button type="button" id="signUp" name="sign">Sign up</button>-->
                <button id="signUp" class="cssbuttons-io-button">
                    Sign up
                    <div class="icon">
                        <svg
                                height="24"
                                width="24"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                        >
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                    d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                                    fill="currentColor"
                            ></path>
                        </svg>
                    </div>
                </button>

            </form>
        </div>
    </div>
    <div class="section1" id="psswd-rec-section" style="display: none">
        <div class="signup">
            <form>
                <label for="chk" aria-hidden="true" style="font-size: 30px">Forget Password</label>
                <input type="email" id="requestEmail" placeholder="Enter your Email" name="email" class="input">
                <button type="button" id="request" name="request">Send Email</button>
                <a id="login-btn" class="forget_btn" href="#">Return to login?</a>
            </form>
        </div>
    </div>
</div>


<script src="<?= PATH ?>assets/js/login.js"></script>


