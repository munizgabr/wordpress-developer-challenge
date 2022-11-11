<?php
get_header(); ?>

<?php
$terms = get_terms('tipo');
foreach ($terms as $term) :
?>
    <?php $posts = get_posts(array(
        'post_type' => 'video',
        'taxonomy' => $term->taxonomy,
        'orderby' => 'name',
        'term' => $term->slug,
        'order' => 'DESC'
    ));
    foreach ($posts as $post) :
        setup_postdata($post);
        $duration = get_field('duration');
    ?>
    <?php endforeach; ?>
<?php endforeach; ?>
<div class="video" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>'); height: 75vh;">
    <div class="video__wrapper center">
        <div class="video__cat">
            <span class="video__cat--cat"><?php echo $term->name; ?></span>
            <span class="video__cat--duration">130M</span>
        </div>
        <div class="video__content"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
        <div class="video__btn"><a href="<?php the_permalink(); ?>">Mais informações</a></div>
    </div>
    <?php $terms = get_terms('tipo'); ?>
</div>
<?php foreach ($terms as $term) : ?>
    <div class="swiper-content">
        <span class="swiper-title"><?php echo $term->name; ?></span>
        <div class="swiper filme">
            <div class="swiper-wrapper swiper-position">
                <?php
                $posts = get_posts(array(
                    'post_type' => 'video',
                    'taxonomy' => $term->taxonomy,
                    'term' => $term->slug
                ));
                foreach ($posts as $post) :
                    setup_postdata($post);
                    $duration = get_field('duration');
                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'thumb_1'); ?>
                    <div class="swiper-slide swiper-modify">
                        <?php if(!empty($thumbnail)){
                            echo '<a href="'.get_the_permalink().'" title="'.get_the_title().'"><img src="'.$thumbnail.'" alt="'.get_the_title().'"></a>';
                        } else {
                            echo '<a href="'.$link.'" title="'.$title.'"><img src="'.$blogInfo.'/assets/img/pexels-gabb-tapic-3568544.jpg" alt="'.get_the_title().'"></a>';
                        } ?>
                        <span class="video__cat--duration"><?php echo $duration; ?>M</span>
                        <div class="video__content"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

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