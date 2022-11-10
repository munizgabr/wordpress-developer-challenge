<?php
get_header();
$category = array(
    'taxonomy' => 'tipo',
    'orderby' => 'name',
    'order'   => 'ASC'
);
$cats = get_categories($category);


$args = [
    'posts_per_page' => 10,
    'post_type' => 'video',
    'tax_query' => array(
        array(
        'taxonomy' => 'tipo',
        'field'    => 'name',
        'terms'    => array(
            'filme',
            'serie',
            'documentario'
        ),
        )
    )
];
    $blogInfo = get_bloginfo('template_url');
$video = new WP_Query( $args );
if($video->have_posts()) :
    ?>
<div class="video" style="background-image: url('<?php echo get_bloginfo('template_url'); ?>/assets/img/tower.jpg'); height: 75vh;">
    <div class="video__wrapper center">
        <div class="video__cat">
            <span class="video__cat--cat">Filmes</span>
            <span class="video__cat--duration">130M</span>
        </div>
        <div class="video__content"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></div>
        <div class="video__btn"><a href="#">Mais informações</a></div>
    </div>
</div>
    <?php
    while ( $video->have_posts() ) :
        $video->the_post();
        $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumb_1');
        // var_dump($video);
    foreach($cats as $cat) {?>
    <div class="swiper-content">
        <span class="swiper-title"><?php echo $cat->name?></span>
        <div class="swiper filme">
            <div class="swiper-wrapper swiper-position">
                <div class="swiper-slide swiper-modify">
                    <?php if(!empty($thumbnail)){
                        echo '<img src="'.$thumbnail.'" alt="'.get_the_title().'">';
                    } else {
                        echo '<img src="'.$blogInfo.'/assets/img/pexels-gabb-tapic-3568544.jpg" alt="'.get_the_title().'">';
                    } ?>
                    <!-- <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/pexels-gabb-tapic-3568544.jpg" alt="Título"> -->
                    <span class="video__cat--duration">130M</span>
                    <div class="video__content"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></div>
                </div>
               
            </div>
        </div>
    </div>
    <?php }
    endwhile; ?>
<?php endif; ?>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".filme", {
            spaceBetween: 25,
            breakpoints: {
                350: {
                    slidesPerView: 2,
                    spaceBetween: 25,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                },
                1100: {
                    slidesPerView: 6,
                    spaceBetween: 25,
                },
            },
        });

        var swiper = new Swiper(".documentario", {
            spaceBetween: 25,
            breakpoints: {
                768: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                },
                1100: {
                    slidesPerView: 6,
                    spaceBetween: 25,
                },
            },
        });

        var swiper = new Swiper(".serie", {
            spaceBetween: 25,
            breakpoints: {
                768: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                },
                1100: {
                    slidesPerView: 6,
                    spaceBetween: 25,
                },
            },
        });
    </script>
    <?php
    get_footer(); ?>