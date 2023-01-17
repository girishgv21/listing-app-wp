<?php
// Template name: Listing Template

get_header();

// The Query
?>
<div class="page-wrap">
	<section class="page-hero">
		<div class="container">
			<h1><?php the_title(); ?></h1>
		</div>
	</section>
	<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
		'post_type' => 'listing',
		'status' => 'published',
	    'posts_per_page' => 5, 
	    'paged' => get_query_var('paged') ? get_query_var('paged') : 1, 
		'orderby'  => array( 'meta_value_num' => 'DESC' ),
		'meta_key' => 'wpc_post_editor'
	);
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {
		echo '<div class="container">';
			echo '<div class="listing-grid">';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				?>
				<div class="listing-column">
					<a href="<?php the_permalink(); ?>" class="link-overlay"></a>
					<div class="listing-thumb">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
					</div>
					<div class="listing-title">
						<?php the_title(); ?>
					</div>
					<div class="listing-order">
						Order: <?php if(get_post_meta( get_the_ID(), 'wpc_post_editor', true )) { echo get_post_meta( get_the_ID(), 'wpc_post_editor', true ); } ?>
					</div>
				</div>
				<?php
			}
			echo '</div>';

			?>
			<div class="post-pagination">
				<?php
				$big = 999999999; // need an unlikely integer
				 echo paginate_links( array(
				    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
				    'format' => '?paged=%#%',
				    'current' => max( 1, get_query_var('paged') ),
				    'total' => $the_query->max_num_pages
				) );
				?>
			</div>
			<?php

		echo '</div>';
	}

	/* Restore original Post Data */
	wp_reset_postdata();
	?>
</div>
<?php
get_footer();
?>