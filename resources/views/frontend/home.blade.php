<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Our Gallery</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <style>
        .carousel {
            width: 100vw;
            height: 100vh;
            margin-top: -50px;
            overflow: hidden;
            position: relative;
        }

        .carousel .list .item {
            width: 180px;
            height: 250px;
            top: 80%;
            transform: translateY(-70%);
            position: absolute;
            left: 70%;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            background-position: 50% 50%;
            background-size: cover;
            z-index: 100;
            transition: 1s;
        }

        .carousel .list .item:nth-child(1),
        .carousel .list .item:nth-child(2) {
            top: 0;
            left: 0;
            transform: translate(0, 0);
            border-radius: 0;
            width: 100%;
            height: 100%;
        }

        .carousel .list .item:nth-child(3) {
            left: 67%;
        }

        .carousel .list .item:nth-child(4) {
            left: calc(67% + 200px);
        }

        .carousel .list .item:nth-child(5) {
            left: calc(67% + 400px);
        }

        .carousel .list .item:nth-child(6) {
            left: calc(67% + 600px);
        }

        .carousel .list .item:nth-child(n + 7) {
            left: calc(67% + 800px);
            opacity: 0;
        }

        .list .item .content {
            position: absolute;
            top: 50%;
            left: 100px;
            transform: translateY(-50%);
            width: 400px;
            text-align: left;
            color: white;
            display: none;
        }

        .list .item:nth-child(2) .content {
            display: block;
        }

        .content .title {
            font-size: 100px;
            text-transform: uppercase;
            color: var(--color-primary);
            font-weight: bold;
            line-height: 1;

            opacity: 0;
            animation: animate 1s ease-in-out 0.3s 1 forwards;
        }

        .content .name {
            font-size: 100px;
            text-transform: uppercase;
            font-weight: bold;
            line-height: 1;
            text-shadow: 3px 4px 4px rgba(255, 255, 255, 0.8);

            opacity: 0;
            animation: animate 1s ease-in-out 0.6s 1 forwards;
        }

        .content.des {
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 18px;
            margin-left: 5px;

            opacity: 0;
            animation: animate 1s ease-in-out 0.9s 1 forwards;
        }

        .content .btn {
            margin-left: 5px;

            opacity: 0;
            animation: animate 1s ease-in-out 1.2s 1 forwards;
        }

        .content .btn button {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        @keyframes animate {
            from {
                opacity: 0;
                transform: translate(0, 100px);
                filter: blur(33px);
            }

            to {
                opacity: 1;
                transform: translate(0);
                filter: blur(0);
            }
        }

        .carousel .timeRunning {
            position: absolute;
            z-index: 1000;
            width: 0%;
            height: 4px;
            background-color: var(--color-primary);
            left: 0;
            top: 0;
            animation: runningTime 7s linear 1 forwards;
        }

        @keyframes runningTime {
            from {
                width: 0%;
            }

            to {
                width: 100%;
            }
        }

        @media screen and (max-width: 999px) {
            .list .item .content {
                left: 50px;
            }

            .content .title,
            .content .name {
                font-size: 70px;
            }

            .content .des {
                font-size: 16px;
            }
        }

        @media screen and (max-width: 690px) {
            .list .item .content {
                top: 40%;
            }

            .content .title,
            .content .name {
                font-size: 45px;
            }

            .content .btn button {
                padding: 10px 15px;
                font-size: 14px;
            }
        }

        /*--------------------------------------------------------------
# arrows
--------------------------------------------------------------*/
        .arrows {
            position: absolute;
            top: 80%;
            right: 52%;
            z-index: 100;
            width: 300px;
            max-width: 30%;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .arrows button {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: green;
            color: white;
            border: none;
            outline: none;
            font-size: 16px;
            font-family: var(--font-primary);
            font-weight: 900;
            transition: 0.5s;
            cursor: pointer;
        }

        .arrows button:hover {
            background: #000000;
            color: white;
        }
    </style>
</head>

<body>
    <div class="carousel">
        <div class="list">
            <div class="item" style="background-image: url('{{ asset('frontend/assets/img/BACKGROUNDUR.jpg') }}');">

            </div>

            <div class="item"
                style="background-image: url('{{ asset('frontend/assets/img/ballroomwedding.png') }}');">
                <div class="content">
                    <div class="title">SLIDER</div>
                    <div class="name">EAGLE</div>
                    <div class="des">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, totam possimus
                        omnis soluta quibusdam officiis nihil blanditiis modi assumenda harum reprehenderit officia
                        placeat minus quisquam voluptate, quaerat veniam corporis voluptas.</div>
                    <div class="btn">
                        <button>See More</button>
                        <button>Subscribe</button>
                    </div>
                </div>
            </div>

            <div class="item" style="background-image: url('{{ asset('frontend/assets/img/akomodasi.png') }}');">
                <div class="content">
                    <div class="title">SLIDER</div>
                    <div class="name">EAGLE</div>
                    <div class="des">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, totam possimus
                        omnis soluta quibusdam officiis nihil blanditiis modi assumenda harum reprehenderit officia
                        placeat minus quisquam voluptate, quaerat veniam corporis voluptas.</div>
                    <div class="btn">
                        <button>See More</button>
                    </div>
                </div>
            </div>

            <div class="item" style="background-image: url('{{ asset('frontend/assets/img/BACKGROUNDUR.jpg') }}');">
                <div class="content">
                    <div class="title">SLIDER</div>
                    <div class="name">ole</div>
                    <div class="des">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, totam possimus
                        omnis soluta quibusdam officiis nihil blanditiis modi assumenda harum reprehenderit officia
                        placeat minus quisquam voluptate, quaerat veniam corporis voluptas.</div>
                    <div class="btn">
                        <button>See More</button>
                    </div>
                </div>
            </div>

            <div class="item" style="background-image: url('{{ asset('frontend/assets/img/akomodasi.png') }}');">
                <div class="content">
                    <div class="title">SLIDER</div>
                    <div class="name">EAG</div>
                    <div class="des">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, totam possimus
                        omnis soluta quibusdam officiis nihil blanditiis modi assumenda harum reprehenderit officia
                        placeat minus quisquam voluptate, quaerat veniam corporis voluptas.</div>
                    <div class="btn">
                        <button>See More</button>
                    </div>
                </div>
            </div>

            <div class="item" style="background-image: url('{{ asset('frontend/assets/img/akomodasi.png') }}');">
                <div class="content">
                    <div class="title">SLIDER</div>
                    <div class="name">E</div>
                    <div class="des">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, totam possimus
                        omnis soluta quibusdam officiis nihil blanditiis modi assumenda harum reprehenderit officia
                        placeat minus quisquam voluptate, quaerat veniam corporis voluptas.</div>
                    <div class="btn">
                        <button>See More</button>
                    </div>
                </div>
            </div>

            <div class="item" style="background-image: url('{{ asset('frontend/assets/img/akomodasi.png') }}');">
                <div class="content">
                    <div class="title">SLIDER</div>
                    <div class="name">GLE</div>
                    <div class="des">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, totam possimus
                        omnis soluta quibusdam officiis nihil blanditiis modi assumenda harum reprehenderit officia
                        placeat minus quisquam voluptate, quaerat veniam corporis voluptas.</div>
                    <div class="btn">
                        <button>See More</button>
                    </div>
                </div>
            </div>

            <div class="item" style="background-image: url('{{ asset('frontend/assets/img/akomodasi.png') }}');">
                <div class="content">
                    <div class="title">SLIDER</div>
                    <div class="name">EALE</div>
                    <div class="des">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, totam possimus
                        omnis soluta quibusdam officiis nihil blanditiis modi assumenda harum reprehenderit officia
                        placeat minus quisquam voluptate, quaerat veniam corporis voluptas.</div>
                    <div class="btn">
                        <button>See More</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="arrows">
            <div class="prev">
                << /div>
                    <div class="next">></div>
            </div>

            <div class="timeRunning">

            </div>
        </div>

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
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
        </script>
        <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
