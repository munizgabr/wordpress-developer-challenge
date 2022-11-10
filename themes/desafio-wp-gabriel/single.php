<?php
/**
 * @package SOMA Dev
 * @since 0.0.1
 */
?>
<?php get_header();

if(have_posts()) : the_post();
    $sinopse = get_field('sinopse');
    $embed = get_field('embed');
    $duration = get_field('duration');
    ?>
    <div class="center single">
        <div class="single video__cat">
            <div class="single wraper-duration">
                <span class="video__cat--cat">Filmes</span>
                <span class="video__cat--duration"><?php echo $duration;?>M</span>
            </div>
            <span class="single video__content"><?php echo get_the_title();?></span>
        </div>
        <iframe width="100%" height="500px" src="<?php echo $embed;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <div class="single_description"><?php echo $sinopse;?></div>
    </div>
    <?php
endif; ?>
<?php get_footer(); ?>