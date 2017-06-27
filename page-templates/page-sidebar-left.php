<?php
/*
Template Name: Left Sidebar
*/
get_header(); ?>

<?php if( get_theme_mod('internal-title-bar') != '' ) {
  get_template_part( 'template-parts/title-bar' );
} ?>

<div id="page-sidebar-left" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
  <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
    <?php if( get_theme_mod('internal-breadcrumbs') != '' ) {
      if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<nav aria-label="You are here:" role="navigation"> <ul class="breadcrumbs">','</ul></nav>'); }
    } ?>
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
    <?php do_action( 'foundationpress_page_before_comments' ); ?>
    <?php comments_template(); ?>
    <?php do_action( 'foundationpress_page_after_comments' ); ?>
  </article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php get_sidebar(); ?>

</div>

<?php get_footer();
