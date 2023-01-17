<?php
get_header();

if (have_posts()) {
    the_post();
    ?>
    <div class="container">
        <div class="page-wrap">
            <div class="thumb">
                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="Listing Image">
            </div>
            <div class="post-title">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="order">
                <p>Order: <?php if(get_post_meta( get_the_ID(), 'wpc_post_editor', true )) { echo get_post_meta( get_the_ID(), 'wpc_post_editor', true ); } ?></p>
            </div>
        </div>
    </div>
    <?php
}

get_footer();
?>