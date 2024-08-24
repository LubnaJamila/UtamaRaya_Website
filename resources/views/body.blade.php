<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Utama Raya</title>
    <link href="{{ asset('frontend/assets/img/UR-logo.png') }}" rel="icon">
    <link href="{{ asset('frontend/assets/img/UR-logo.png') }}" rel="logo">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

    <!-- Icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Lora:ital,wght@0,400..700;1,400..700&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quicksand:wght@300..700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/app.css') }}">

</head>

<body>
    @include('navbar')

    <div class="content">
        @yield('content')
    </div>

    @include('footer')
    <!-- Script -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        //scroll
        window.onscroll = function() {
            var navbar = document.querySelector('.navbar');
            if (window.pageYOffset > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        };

        // navbar
        document.addEventListener('DOMContentLoaded', function() {
            var toggler = document.querySelector('.navbar-toggler');
            var icon = toggler.querySelector('i');
            var collapse = document.querySelector('#navbarCollapse');

            toggler.addEventListener('click', function() {
                if (collapse.classList.contains('show')) {
                    icon.classList.remove('fa-xmark');
                    icon.classList.add('fa-bars-staggered');
                } else {
                    icon.classList.remove('fa-bars-staggered');
                    icon.classList.add('fa-xmark');
                }
            });

            collapse.addEventListener('hidden.bs.collapse', function() {
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars-staggered');
            });
        });

        // sliderlandingpage
        var nextBtn = document.querySelector(".next"),
            prevBtn = document.querySelector(".prev"),
            carousel = document.querySelector(".carousel"),
            list = document.querySelector(".list"),
            item = document.querySelector(".item"),
            runningTime = document.querySelector(".timeRunning");

        let timeRunning = 3000;
        let timeAutoNext = 7000;

        nextBtn.onclick = function() {
            showSlider("next");
        };

        prevBtn.onclick = function() {
            showSlider("prev");
        };

        let runTimeOut;
        let runNextAuto = setTimeout(() => {
            nextBtn.click();
        }, timeAutoNext);

        function resetTimeAnimation() {
            runningTime.style.animation = "none";
            runningTime.offsetHeight;
            runningTime.style.animation = null;
            runningTime.style.animation = "runningTime 7s linear 1 forwards";
        }

        function showSlider(type) {
            let sliderItemsDom = list.querySelectorAll(".carousel .list .item");
            if (type === "next") {
                list.appendChild(sliderItemsDom[0]);
                carousel.classList.add("next");
            } else {
                list.prepend(sliderItemsDom[sliderItemsDom.length - 1]);
                carousel.classList.add("prev");
            }

            clearTimeout(runTimeOut);

            runTimeOut = setTimeout(() => {
                carousel.classList.add("next");
                carousel.classList.add("prev");
            }, timeAutoNext);

            clearTimeout(runNextAuto);
            runNextAuto = setTimeout(() => {
                nextBtn.click();
            }, timeAutoNext);

            resetTimeAnimation();
        }

        resetTimeAnimation();

        //umkm
        var swiper = new Swiper('.umkm-swiper-container', {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: '.next-button',
                prevEl: '.prev-button',
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
            },
            loop: true,
        });
        //gallery
        var GallerySlider = new Swiper(".gallery-slider", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            loop: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 2.5,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

</body>

</html>
