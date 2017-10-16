<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
global $post;
?>

<div class="blogpost-entry all-posts-wrapper bs-blog-loop-list">

	<article id="post-<?php the_ID(); ?>" <?php post_class('bs-single-post index-card'); ?>>
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="article-left blog-featured-image">
			<figure><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('bs_blog'); ?></a></figure>
		</div>
		<?php } ?>
		<div class="article-right entry-content">
			<div class="bs-post-title">
				<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
			</div>

			<div class="blog-meta">
				<!-- <p class="bs-post-date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?></p> -->

				<p class="bs-post-byline"><!-- <i class="fa fa-user" aria-hidden="true"></i> -->By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>" title=""><?php the_author_meta( 'display_name' ); ?></a></p>

			</div>

			<div class="bs-post-excerpt"><?php the_excerpt(); ?></div>
		</div>
	</article>
</div>
