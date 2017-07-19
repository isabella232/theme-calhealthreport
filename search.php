<?php
/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php if( get_theme_mod('internal-title-bar') != '' ) {
  get_template_part( 'template-parts/search-title-bar' );
} ?>

<div id="page" class="search-results row">
	<section class="main-content">
		<?php if( get_theme_mod('internal-breadcrumbs') != '' ) {
      if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<nav aria-label="You are here:" role="navigation"> <ul class="breadcrumbs">','</ul></nav>'); }
    } ?>
    <?php if( get_theme_mod('internal-title-bar') == '' ) { ?>
      <h1 class="entry-title"><?php _e( 'Search Results' ); ?></h1>
    <?php } ?>
  	<div class="entry-content">
			<h2><?php _e( 'Search Results for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"</h2>
  	  <?php if ( have_posts() ) : ?>

    		<?php /* Start the Loop */ ?>
    		<?php while ( have_posts() ) : the_post(); ?>
    			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
    		<?php endwhile; ?>

  		<?php else : ?>

        <?php get_template_part( 'template-parts/content', 'none' ); ?>

  		<?php endif; // End have_posts() check. ?>
  		<nav class="prev-next-posts">
  			<div class="prev-posts-link">
  				<?php echo get_next_posts_link( '&laquo; Older Posts', $wp_query->max_num_pages ); // display older posts link ?>
  			</div>
  			<div class="next-posts-link">
  				<?php echo get_previous_posts_link( 'Newer Posts &raquo;' ); // display newer posts link ?>
  			</div>
  		</nav>
    </div>

	</section>
	<?php get_sidebar(); ?>
</div>
<?php get_footer();
