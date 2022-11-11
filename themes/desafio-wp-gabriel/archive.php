<?php
get_header();
$duration = get_field('duration');
$terms  = get_the_terms( $post->ID, 'tipo' );
$term = array_shift( $terms );
?>
<div class="center wrapper-archive">
    <div class="descriptiom">
        <span class="title"><?php echo $term->name?></span>
        <p><?php echo $term->description;?></p>
    </div>
    <div class="video__archive">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumb_1');?>
        <div class="swiper-modify">
            <?php if(!empty($thumbnail)){
                echo '<img src="'.$thumbnail.'" alt="'.get_the_title().'">';
            } else {
                echo '<img src="'.$blogInfo.'/assets/img/pexels-gabb-tapic-3568544.jpg" alt="'.get_the_title().'">';
            } ?>
            <span class="video__cat--duration"><?php echo $duration;?>M</span>
            <div class="video__content"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></div>
        </div>
        <?php
        endwhile;
        endif;
        ?>
    </div>
</div>
<?php
get_footer(); ?>