<?php



get_header();

?>


	<section id="section" class="content-area">

	<?php

// Start the Loop.
while ( have_posts() ) :
the_post();

get_template_part( 'template-parts/content/content', 'page' );

// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) {
	comments_template();
}

endwhile; // End the loop.
?>

	
			<section id="oversigt"></section>
		</main><!-- #main -->
		
		

	</section><!-- #section -->


<?php

get_footer();