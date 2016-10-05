<?php
	// If a feature image is set, get the id, so it can be injected as a css background property
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	$image = $image[0];
	if ( has_post_thumbnail( $post->ID ) ) :
?>
	<header id="featured-hero" role="banner" style="background: url('<?php echo $image; ?>') no-repeat center bottom; background-size: cover;"><h2 class="page-header-tagline"><?php bloginfo('description'); ?></h2></header>
	<div id="init-header-change"></div>
<?php else: ?>
	<header id="featured-hero" role="banner" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/title-bar-image.jpg') no-repeat center bottom; background-size: cover;"><h2 class="page-header-tagline"><?php bloginfo('description'); ?></h2></header>
	<div id="init-header-change"></div>
<?php endif; ?>
