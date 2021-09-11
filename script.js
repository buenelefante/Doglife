new Swiper('.swiper', {
   
    loop: true,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      dynamicBullets: true,
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  autoplay: {
      delay: 2000,
    //   stopOnLastSlide: true,
      disableOnInteraction: false
  }
  });