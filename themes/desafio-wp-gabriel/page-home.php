<?php
get_header();
?>
<div class="video" style="background-image: url('<?php echo get_bloginfo('template_url'); ?>/assets/img/tower.jpg'); height: 75vh;">
    <div class="video__wrapper center">
        <div class="video__cat">
            <span class="video__cat--cat">Filmes</span>
            <span class="video__cat--duration">130M</span>
        </div>
        <div class="video__content">Lorem ipsum dolor</div>
        <div class="video__btn"><a href="#">Mais informações</a></div>
    </div>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">Slide 1</div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
            <div class="swiper-slide">Slide 4</div>
            <div class="swiper-slide">Slide 5</div>
            <div class="swiper-slide">Slide 6</div>
            <div class="swiper-slide">Slide 7</div>
            <div class="swiper-slide">Slide 8</div>
            <div class="swiper-slide">Slide 9</div>
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 6,
            spaceBetween: 20,
            centeredSlides: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
    <?php
    get_footer(); ?>