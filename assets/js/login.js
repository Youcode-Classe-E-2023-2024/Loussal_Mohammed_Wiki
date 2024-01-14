// JavaScript to handle image preview
const imageInput = document.getElementById('imageInput');
const previewImage = document.getElementById('previewImage');

imageInput.addEventListener('change', (event) => {
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = (e) => {
            previewImage.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
});

function togglePassword() {
    var passwordInput = document.getElementById('loginPassword');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
}

// login register request button submit
const login = document.getElementById("loginBtn");
const sign = document.getElementById("signUp");



sign.addEventListener('click', (event) => {
    event.preventDefault();

    // Sign up inputs
    const checkBox = document.getElementById("chk");
    const userName = document.getElementById("signUpName").value;
    const signUpEmail = document.getElementById("signUpEmail").value;
    const signUpPassword = document.getElementById("signUpPassword").value;
    const signUpImage = document.getElementById("imageInput").files[0];

    // Create FormData object
    var formData = new FormData();
    formData.append('username', userName);
    formData.append('email', signUpEmail);
    formData.append('password', signUpPassword);
    formData.append('user_picture', signUpImage);
    formData.append('req', 'signup');

    // AJAX request
    $.ajax({
        type: "POST",
        url: "index.php?page=authentication",
        data: formData,
        contentType: false,
        processData: false,
        success: (response) => {
            const data = JSON.parse(response);
            if (data.success) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: data.success
                });
                setTimeout(() => {
                    checkBox.click();
                }, 1500);

                // Additional success logic (e.g., redirecting to another page)
            } else if (data.errors) {
                console.log(data.errors);
                var error = data.errors
                var mesg = "";
                if (error.username_err !== false) {
                    mesg = error.username_err;
                } else if (error.email_err !== false) {
                    mesg = error.email_err;
                } else if (error.password_err !== false) {
                    mesg = error.password_err;
                } else if (error.userexists_err !== false) {
                    mesg = error.userexists_err;
                } else if (error.picture_err !== false) {
                    mesg = error.picture_err;
                }
                Swal.fire({icon: "error", title: "Error", text: mesg});
            }

        },

        error: (error) => {
            console.log(error);
            Swal.fire({icon: "error", title: "Error", text: "An unexpected error occurred. Please try again."});
        }
    });
});


login.addEventListener('click', (event) => {

    event.preventDefault();
    // login inputs
    const loginForm = document.getElementById("login");
    const spinnerWrapper = document.querySelector(".hourglassBackground"); // Added for the spinner wrapper
    const loginEmail = document.getElementById("loginEmail").value;
    const loginPassword = document.getElementById("loginPassword").value;
    $.ajax({
        type: "POST",
        url: "index.php?page=authentication",
        data: {
            req: "login",
            email: loginEmail,
            password: loginPassword
        },
        success: (response) => {
            const data = JSON.parse(response);
            console.log(data);
            if (data.success) {
                console.log(data.success);
                loginForm.style.display = 'none';
                // spinnerWrapper.style.display = 'block';
                // setTimeout(() => {
                // }, 3000);
                    window.location.href = `index.php?page=${data.success}&success`;

            } else if (data.error) {
                console.log(data.error);
                Swal.fire({icon: "error", title: "Error", text: data.error});
            }

        }, error: (error) => {
            console.log(error);

        }
    })
})


