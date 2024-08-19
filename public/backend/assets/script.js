const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
});


document.addEventListener("DOMContentLoaded", function () {
    var dropdowns = document.querySelectorAll(
        '.sidebar-link[data-bs-toggle="collapse"]'
    );

    dropdowns.forEach(function (dropdown) {
        dropdown.addEventListener("click", function () {
            var target = document.querySelector(
                this.getAttribute("data-bs-target")
            );
            var isActive = target.classList.contains("show");

            document
                .querySelectorAll(".sidebar-dropdown")
                .forEach(function (dropdown) {
                    dropdown.classList.remove("show");
                });

            if (!isActive) {
                target.classList.add("show");
            }
        });
    });
});






