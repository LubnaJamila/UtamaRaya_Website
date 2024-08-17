var nextBtn = document.querySelector(".next"),
    prevBtn = document.querySelector(".prev"),
    carousel = document.querySelector(".carousel"),
    list = document.querySelector(".list"),
    item = document.querySelector(".item"),
    runningTime = document.querySelector(".timeRunning");

let timeRunning = 3000;
let timeAutoNext = 7000;

nextBtn.onclick = function () {
    showSlider("next");
};

prevBtn.onclick = function () {
    showSlider("prev");
};

let runTimeOut
let runNextAuto = setTimeout(() => {
    nextBtn.click()
}, timeAutoNext)


function resetTimeAnimation(){
    runningTime.style.animation = 'none'
    runningTime.offsetHeight
    runningTime.style.animation = null
    runningTime.style.animation = 'runningTime 7s linear 1 forwards'
}

function showSlider(type) {
    let sliderItemsDom = list.querySelectorAll('.carousel .list .item')
    if (type === "next") {
        list.appendChild(sliderItemsDom[0]);
        carousel.classList.add('next');
    } else {
        list.prepend(sliderItemsDom[sliderItemsDom.length - 1]);
        carousel.classList.add('prev');
    }

    clearTimeout(runTimeOut)

    runTimeOut = setTimeout(()=>{
        carousel.classList.add('next');
        carousel.classList.add('prev');
    }, timeAutoNext)

    clearTimeout(runNextAuto)
    runNextAuto = setTimeout(()=>{
        nextBtn.click()
    }, timeAutoNext) 

    resetTimeAnimation()
}

resetTimeAnimation()

/*--------------------------------------------------------------
# Gallery
--------------------------------------------------------------*/
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