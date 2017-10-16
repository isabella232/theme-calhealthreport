<?php
  global $post;
  $term_list = wp_get_post_terms($post->ID, 'category', array('fields' => 'ids'));
  // print_r($term_list);
  $currentID = get_the_ID();
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 4,
    'post_status' => 'publish',
    'orderby' => 'date',
		'order' => 'ASC',
    'post__not_in' => array($currentID),
    'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'term_id',
				'terms' => $term_list,
			),
		),
  );
  $related = new WP_Query( $args );

  if ( $related->have_posts() ) : ?>
  <div class="clear clearfix"></div>
  <div class="bs-related-posts">
    <div class="bs-related-posts-inner">
      <h2>Related Stories</h2>
      <div class="bs-related-posts-carousel">
        <?php while ( $related->have_posts() ) : $related->the_post(); ?>
        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
          <section class="entry-content <?php $terms = get_the_terms( $post->ID , 'category' ); foreach ( $terms as $term ) { echo $term->slug . ' '; } ?>">
            <h4 class="bs-post-title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title(); ?></a></h4>
            <?php /* if( has_post_thumbnail() ) { the_post_thumbnail('large'); } */ ?>
            <p><a class="read-more" href="<?php the_permalink();?>" title="<?php the_title();?>">Read More &raquo;</a></p>
          </section>
        </article>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
