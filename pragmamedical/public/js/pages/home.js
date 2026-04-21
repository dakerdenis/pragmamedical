// MAIN SLIDER
new Swiper('.mainSwiper', {
    loop: true,
    autoplay: {
        delay: 3000,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

// PRODUCT SLIDER
new Swiper('.productSwiper', {
    loop: true,
    speed: 8000,
    autoplay: {
        delay: 0,
        disableOnInteraction: false,
    },
    slidesPerView: 4,
    spaceBetween: 30,
    centeredSlides: true,
    grabCursor: true,
    watchSlidesProgress: true,
    slideActiveClass: 'product-slide-active',

    breakpoints: {
        320: {
            slidesPerView: 1.2,
        },
        768: {
            slidesPerView: 2.5,
        },
        1024: {
            slidesPerView: 3.5,
        },
        1400: {
            slidesPerView: 4,
        }
    }
});