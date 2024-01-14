const dashboard = document.getElementById("dashboard");
const user = document.getElementById("user");
const product = document.getElementById("product");
const usersSection = document.getElementById("user_section");
const product_section = document.getElementById("product_section");
const dashboard_section = document.getElementById("dashboard_section");

// Function to hide all sections
function hideAllSections() {
    usersSection.classList.add('hidden');
    product_section.classList.add('hidden');
    dashboard_section.classList.add('hidden');
}

// Initially display the dashboard section
hideAllSections();
dashboard_section.classList.remove('hidden');

// Show only dashboard section
dashboard.addEventListener("click", () => {
    hideAllSections();
    dashboard_section.classList.remove('hidden');
});

// Show only user section
user.addEventListener("click", () => {
    hideAllSections();
    user_section.classList.remove('hidden');
});

// Show only product section
product.addEventListener("click", () => {
    hideAllSections();
    product_section.classList.remove('hidden');
});


// // for tags crud
//
const addTagBtn = document.getElementById("addTagBtn");
const addTagInput = document.getElementById("tag-input");

addTagBtn.addEventListener("click", (event) => {
    console.log("test");
    event.preventDefault();
    if (addTagInput.value.length !== 0) {
        $.ajax({
            type: "post",
            url: "index.php?page=dashboard",
            data: {
                add_tag: true,
                tag: addTagInput.value
            },
            success: (data) => {
                const response = JSON.parse(data);
                if (response.success) {
                    console.log(response.success);
                    document.querySelector("#modal_body").classList.add("hidden");
                    addTagInput.style.border = "";
                    addTagInput.value = "";
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
                        title: response.success
                    });
                    setTimeout(() => {
                        window.location.href = "index.php?page=dashboard&add_tag=true";
                    }, 3000);

                }
            },
            error: (error) => {
                var data = JSON.parse(error.responseText);
                console.log(data);
                Swal.fire({icon: "error", title: "Error", text: data.error});
            }
        })
    } else
        addTagInput.style.border = "2px solid red";
})

const addCategoryBtn = document.getElementById("addCategoryBtn");
const addCategoryInput = document.getElementById("category-input");

addCategoryBtn.addEventListener("click", (event) => {
    event.preventDefault();
    console.log("test");
    if (addCategoryInput.value.length !== 0) {
        $.ajax({
            type: "post",
            url: "index.php?page=dashboard",
            data: {
                add_category: true,
                category: addCategoryInput.value
            },
            success: (data) => {
                const response = JSON.parse(data);
                console.log(response);
                addCategoryInput.style.border = ""
                addCategoryInput.value = "";
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
                    title: response.success
                });
                setTimeout(() => {
                    window.location.href = "index.php?page=dashboard&add_category=true";
                }, 3000);
            },
            error: (error) => {
                var data = JSON.parse(error.responseText);
                console.log(data);
                Swal.fire({icon: "error", title: "Error", text: data.error});
            }
        })
    } else
        addCategoryInput.style.border = "3px solid red";
})


const editBtn = document.querySelectorAll(".editBtn");
const inputTag = document.getElementById("editInput");
const inputTagId = document.getElementById("editTagId");

editBtn.forEach(function (button) {
    button.addEventListener("click", function () {
        inputTag.value = this.getAttribute("data-tag-name");
        inputTagId.value = this.getAttribute("data-tag-id");
    });
});


const categoryEditBtn = document.querySelectorAll(".categoryEditBtn");
const inputCategory = document.getElementById("categoryEditInput");
const inputCategoryId = document.getElementById("editCategoryId");


categoryEditBtn.forEach(function (button) {
    button.addEventListener("click", function () {
        console.log(this.getAttribute("data-category-name"));
        inputCategory.value = this.getAttribute("data-category-name");
        inputCategoryId.value = this.getAttribute("data-category-id");
    });
});