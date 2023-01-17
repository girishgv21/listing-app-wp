<?php
    get_header();
    ?>
    <div class="container">
        <?php
        if (have_posts()) {
            ?>
            <div class="page-wrap">
                <?php
                while (have_posts()) {
                    the_post();
                    ?>
                    <h1><?php the_title(); ?></h1>
                    <div class="page-content"><?php the_content(); ?></div>
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