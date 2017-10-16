<?php
/*
Template Name: Full Width
*/
get_header(); ?>

<?php if( get_theme_mod('internal-title-bar') != '' ) {
  get_template_part( 'template-parts/title-bar' );
} ?>

<?php if( get_theme_mod('internal-breadcrumbs') != '' ) {
  if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<nav class="max-width-twelve-hundred" aria-label="You are here:" role="navigation"> <ul class="breadcrumbs">','</ul></nav>'); }
} ?>

<div id="page-full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
  <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
    <?php if( get_theme_mod('internal-title-bar') == '' ) { ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php } ?>
      <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
      <div class="entry-content">
          <?php the_content(); ?>
      </div>
  </article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer();
