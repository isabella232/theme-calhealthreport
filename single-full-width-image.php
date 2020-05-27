<?php
/**
 * Template Name: Full Width Header Image
 * Description: The template for displaying all single posts and attachments with a full width image in the header
 * Template Post Type: post
 *
 */

get_header();

$hide_sidebar = get_field('hide_sidebar');

if( get_theme_mod('internal-title-bar') != '' ) {
  get_template_part( 'template-parts/title-bar' );
} ?>

<?php if( get_theme_mod('internal-breadcrumbs') != '' ) {
  if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<nav class="max-width-twelve-hundred" aria-label="You are here:" role="navigation"> <ul class="breadcrumbs">','</ul></nav>'); }
} ?>
<?php calhealth_photo_header_tag( get_post_thumbnail_id() ); ?>
<div class="featured-image-bg-layer">
</div>
<div class="featured-image-container-content">
    <?php

    if( get_post_thumbnail_id() ) {
        echo '<div class="featured-image-wrapper"><img class="featured-image-container-mobile-image" src="'.wp_get_attachment_url( get_post_thumbnail_id() ).'"></div>';
    }

    ?>
    <figcaption><em><?php the_post_thumbnail_caption(); ?></em></figcaption>
    <h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
    <?php if ( $subtitle = get_post_meta( $post->ID, 'subtitle', true ) ) : ?>
        <h2 class="subtitle"><?php echo $subtitle ?></h2>
    <?php endif; ?>
</div>
</div>
<div id="single-post" class="page-full-width max-width-one-thousand <?php if( isset($hide_sidebar) && $hide_sidebar == 'yes' ) { echo 'no-sidebar'; } ?>" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post();

  $hide_featured_image = get_field('bs_hide_featured_image');?>

	<section <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
    <?php if( get_theme_mod('internal-title-bar') == '' ) { ?>
    <?php } ?>
        <?php do_action( 'foundationpress_post_before_entry_content' ); ?>
        <div class="bottom-header-content">
            <figcaption><em><?php the_post_thumbnail_caption(); ?></em></figcaption>
            <div class="bottom-header-inline-content">
                <?php if( get_theme_mod('about-the-author') != '' ): ?>
                    <div class="post-meta"><p><span class="author-name author-date">By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a> • <?php echo get_the_date( 'M j, Y', $post->ID ); ?></span></p></div>
                <?php endif; ?>
            </div>
        </div>
		<div class="entry-content">

		<?php the_content(); ?>
		</div>

		<?php if( get_theme_mod('show-post-tags') != '' ) {
		$posttags = get_the_tags(); if ($posttags) { ?>
		<div class="the-tags">
			<hr>
			<h6>Post Tags</h6>
			<?php foreach($posttags as $tag) {
				echo '<a href="' . get_bloginfo('url') . '/tag/'  . $tag->slug . '"><span class="tag">#' . $tag->slug . '</a></span>';
			} ?>
		</div>
		<?php } } ?>

		<?php if( get_theme_mod('about-the-author') == '' ) {
		get_template_part( 'template-parts/about-author' );
		} ?>

		<!-- <nav id="nav-single" class="nav-single">
			<div class="nav-single-inner">
				<span class="nav-previous"><?php next_post_link( '%link', '<span class="meta-nav">' . _x( '&laquo;', 'Previous post link', 'allonsy' ) . '</span> %title' ); ?></span>
				<span class="nav-next"><?php previous_post_link( '%link', '%title <span class="meta-nav">' . _x( '&raquo;', 'Next post link', 'allonsy' ) . '</span>' ); ?></span>
			</div>
		</nav> --> <!-- .nav-single -->
		<?php /*
      do_action( 'foundationpress_post_before_comments' );
      comments_template();
      do_action( 'foundationpress_post_after_comments' );
    */ ?>
	</section>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php if( $hide_sidebar != 'yes' ) : get_sidebar('posts'); endif; ?>
<?php 

	// custom article bottom widget area
	// added for https://github.com/INN/theme-calhealthreport/issues/15
	do_action( 'calhealth_post_bottom_widget_area' ); 

?>
</div>
<?php get_template_part( 'template-parts/related-posts' ); ?>
<?php get_footer();
