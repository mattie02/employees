<?php
/*
Template Name: Employees
*/
get_header(); ?>

<div id="primary">
	<div id="content" role="main">
		<?php 
		$mypost = array( 'post_type' => 'employees', );
		$loop = new WP_Query( $mypost ); 
		while ($loop->have_posts() ) : $loop->the_post(); 
		?>
		<div id="post-<?php the_ID(); ?>" <?php post_class() ?>>

		</div><!-- END: post- -->
	</div><!-- END: content -->
</div><!-- END: primary -->





<?php wp_reset_query(); ?>
<?php get_footer(); ?>

