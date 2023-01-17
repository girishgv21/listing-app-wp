<?php
    get_header();
    ?>
    <div class="container">
        <?php
        if (have_posts()) {
            ?>
            <div class="listing-grid">
                <?php
                while (have_posts()) {
                    the_post();
                    ?>
                    <div class="listing-column">
                        <div class="post-img">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Featured Image">
                        </div>
                        <h4><?php the_title(); ?></h4>
                        <div><?php the_excerpt(); ?></div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
    get_footer();
?>