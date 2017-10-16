<?php
/**
* The template for displaying pages
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages and that
* other "pages" on your WordPress site will use a different template.
*
* @package FoundationPress
* @since FoundationPress 1.0.0
*/

get_header(); ?>

<?php if( get_theme_mod('internal-title-bar') != '' ) {
  get_template_part( 'template-parts/title-bar' );
} ?>

<?php if( get_theme_mod('internal-breadcrumbs') != '' ) {
  if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<nav class="max-width-twelve-hundred" aria-label="You are here:" role="navigation"> <ul class="breadcrumbs">','</ul></nav>'); }
} ?>

<div id="page" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
  <section <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
    <?php if( get_theme_mod('internal-title-bar') == '' ) { ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php } ?>
    <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
      <p><?php the_tags(); ?></p>
    </footer>
  </section>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php get_sidebar(); ?>

</div>

<?php get_footer();
