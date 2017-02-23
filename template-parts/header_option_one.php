	<?php
	  /* This template file arranges the header with the logo on the left, menu
		on right, and social icons above the menu */
		$search_position = get_theme_mod('search-position');
		$hide_social = get_theme_mod('hide_header_social');
		$alt_nav = get_theme_mod('show_alt_nav');
	?>

	<header id="masthead" class="site-header header-option-one <?php if( get_theme_mod( 'sticky-header' ) != '') { ?>sticky-header<?php } ?>" role="banner">
		<div id="header-inner" class="max-width-eleven-seventy">
			<div class="logo-wrapper hide-for-small-only">
				<?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>
			</div>
			<div class="title-bar" data-responsive-toggle="site-navigation">
				<div class="title-bar-title">
					<?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>
				</div>
				<button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
			</div>

			<nav id="site-navigation" class="main-navigation top-bar <?php if( $search_position == 'search-menu' ) { ?>has-search<?php } ?>" role="navigation">
				<div class="top-bar-right">
					<?php if( get_theme_mod('hide_header_social') == '' ): ?>
					<?php if( get_theme_mod('facebook') || get_theme_mod('twitter') || get_theme_mod('linkedin') || get_theme_mod('instagram') || get_theme_mod('youtube') || get_theme_mod('pinterest') || get_theme_mod('rss') || get_theme_mod('vimeo') || get_theme_mod('contact') ) { ?>
					<div class="top-bar-social">
						<?php get_template_part('template-parts/social-media'); ?>
						<?php if( $search_position == 'search-above-menu' ) { ?>
						<div class="above-menu-search-wrapper">
							<?php get_search_form(); ?>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
					<?php endif; ?>

					<?php if( $hide_social != '' && $search_position == 'search-above-menu' ): ?>
						<div class="top-bar-social">
							<div class="above-menu-search-wrapper">
								<?php get_search_form(); ?>
							</div>
						</div>
					<?php endif; ?>

					<?php if( $alt_nav != '' ): foundationpress_top_bar_alt(); endif; ?>
						
					<?php foundationpress_top_bar_r(); ?>
					<?php if( $search_position == 'search-menu' ) { ?>
					<div class="menu-search-wrapper">
						<button class="search-toggle"><i class="fa fa-search" aria-hidden="true"></i></button>
						<?php get_search_form(); ?>
					</div>
					<?php } ?>

					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
						<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
					<?php endif; ?>
				</div>
			</nav>
		</div>
	</header>
