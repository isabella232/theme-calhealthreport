<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
		<?php if( !is_front_page() ) : ?>

			<?php if( is_active_sidebar('pre-footer-widgets-1') ) : ?>
			<div id="pre-footer-1" class="pre-footer-widgets">
				<div class="pre-footer-inner max-width-twelve-hundred">
					<?php dynamic_sidebar( 'pre-footer-widgets-1' ); ?>
				</div>
			</div>
			<?php endif; ?>

		<?php endif; ?>

		</section>
		<div id="footer-container">
			<footer id="footer">
				<?php do_action( 'foundationpress_before_footer' ); ?>
				<?php dynamic_sidebar( 'footer-widgets' ); ?>
				<?php do_action( 'foundationpress_after_footer' ); ?>
			</footer>
		</div>
		<div id="copyright-container">
			<footer id="copyright" <?php if( get_theme_mod('social-copyright') != '' ) { ?>class="has-social"<?php } ?>>
				<?php if( get_theme_mod('social-copyright') != '') { ?><div class="small-12 large-9"><?php } ?>
				<?php if( get_theme_mod('copyright')): ?>
					<p>&copy; <?php echo date('Y'); ?> <?php echo get_theme_mod('copyright','default'); ?></p>
				<?php else: ?>
					<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
				<?php endif; ?>
				<?php if( get_theme_mod('social-copyright') != '' ) { ?></div><div class="small-12 large-3"><?php echo do_shortcode('[bs_social_urls]');?></div><?php } ?>
			</footer>
		</div>
		<div id="back-top">
  		<a href="#" title="Back to top"><i class="fa fa-chevron-up"></i></a>
		</div>

		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->
<?php endif; ?>

<?php if( get_theme_mod('modal')): ?>
<div class="custom-modal">
	<div class="custom-modal-overlay">
		<div class="custom-modal-inner">
			<a class="close" href="#">X Close</a>
			<?php echo do_shortcode( get_theme_mod('modal-content','default') ); ?>
		</div>
	</div>
</div>
<?php endif; ?>

<?php wp_footer(); ?>

<script type="text/javascript">

	var windowWidth;
	var headerHeight;
	var topScrollOffset;
	var windowWidth = jQuery(window).width();
	var headerHeight = jQuery('#masthead').height();
	if(windowWidth > 640) {
		var topScrollOffset = '112';
	} else {
		var topScrollOffset = '0';
	}

	jQuery(document).ready(function($) {

		$('button.search-toggle').click(function() {
			$('.social-media-wrapper.has-search .menu-search-wrapper').toggleClass('show');
		});
		$('li.modal-button a').click(function() {
			$('.custom-modal').addClass('active');
			$('body').addClass('modal-active');
			return false;
		});
		$('.custom-modal-inner a.close').click(function() {
			$('.custom-modal.active').removeClass('active');
			$('body').removeClass('modal-active');
			return false;
		});
		$(document).keyup(function(e) {
    	if (e.keyCode == 27) {
				$('.custom-modal.active').removeClass('active');
				$('body').removeClass('modal-active');
    	}
		});

		$(window).imagesLoaded(function() {

			// Site Preloader
			$('#preloader').addClass('loaded')
			$('#preloader.loaded').delay(250).fadeOut(1000, function() {
				$(this).hide();
			});

		});

		// Show/Hide Search Form
		$('button.search-toggle').click(function() {
			$('nav.top-bar.has-search .menu-search-wrapper form#searchform').toggleClass('show');
		});

	  // Back to top script
	  $('#back-top').hide();
	  $(function () {
	    $(window).scroll(function () {
	      if ($(this).scrollTop() > 800) {
	        $('#back-top').fadeIn();
	      } else {
	        $('#back-top').fadeOut();
	      }
	    });
			if($('body').hasClass('mobile')) {
				// do nothing
			} else {
		    $('#back-top a').click(function () {
		      $('body,html').animate({ scrollTop: '0px' }, 'slow');
		      return false;
		    });
			}
	  });

		// Float Labels
		function floatLabel(inputType) {
			$(inputType).each(function(){
					var $this = $(this);
					$this.focus(function(){
						$this.closest('li.gfield').find('label').attr("data-attr","active");
					});
					$this.blur(function(){
						if($this.val() === '' || $this.val() === 'blank'){
							$this.closest('li.gfield').find('label').attr("data-attr","");
						}
					});
			});
		}
		floatLabel(".floatLabel input");
		floatLabel(".floatLabel textarea");

	});

	jQuery(function($) {
		// Scroll to hash on click
	  $('a[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
				console.log(target);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: target.offset().top - topScrollOffset
	        }, 1000);
	        return false;
	      }
	    }
	  });

	});
	<?php if( get_theme_mod( 'sticky-header' ) != '') { ?>
	// Sticky Header Classie script
	function init() {
		window.addEventListener('scroll', function(e){
      var distanceY = window.pageYOffset || document.documentElement.scrollTop,
        stickPrep = jQuery('#masthead').height() + 35,
				topBarHeight = jQuery('.top-bar-bottom').height(),
        header = document.querySelector("body");
      if (distanceY > stickPrep) {
        classie.add(header,"sticky-prep");
				$('#sticky-header-placeholder').css({'height' : topBarHeight });
      } else {
        if (classie.has(header,"sticky-prep")) {
          classie.remove(header,"sticky-prep");
					$('#sticky-header-placeholder').css({'height' : '0' });
        }
      }
  	});
    window.addEventListener('scroll', function(e){
      var distanceY = window.pageYOffset || document.documentElement.scrollTop,
        stickOn = jQuery('#masthead').height() + jQuery('.top-bar-bottom').height(),
        header = document.querySelector("body");
      if (distanceY > stickOn) {
        classie.add(header,"sticky-header");

      } else {
        if (classie.has(header,"sticky-header")) {
          classie.remove(header,"sticky-header");
        }
      }
  	});
	}
	window.onload = init();
	<?php } ?>
	$('.bs-carousel').slick({
	  dots: false,
	  infinite: false,
	  speed: 300,
	  slidesToShow: 3,
	  slidesToScroll: 1,
		arrows: true,
		prevArrow: '<button aria-hidden="true" role="presentation" type="button" class="slick-prev"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/prev-arrow.svg" alt="Previous Arrow" width="20" /></button>',
		nextArrow: '<button aria-hidden="true" role="presentation" type="button" class="slick-next"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/next-arrow.svg" alt="Next Arrow" width="20" /></button>',
	  responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
      }
    },{
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },{
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
	});

	$('.bs-blog-loop-carousel').slick({
	  dots: false,
	  infinite: true,
		autoplay: true,
		autoplaySpeed: 7000,
	  speed: 300,
	  slidesToShow: 1,
	  slidesToScroll: 1,
		arrows: false,
	});

	;( function( $ ) {
		$( '.swipebox' ).swipebox( {
			useCSS : true, // false will force the use of jQuery for animations
			useSVG : true, // false to force the use of png for buttons
			initialIndexOnArray : 0, // which image index to init when a array is passed
			hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
			removeBarsOnMobile : true, // false will show top bar on mobile devices
			hideBarsDelay : 3000000, // delay before hiding bars on desktop
			videoMaxWidth : 1140, // videos max width
			beforeOpen: function() {}, // called before opening
			afterOpen: null, // called after opening
			afterClose: function() {}, // called after closing
			loopAtEnd: false // true will return to the first image after the last image is reached
		} );
	} )( jQuery );

	//Light header switch Waypoint script
	shrinkOn = jQuery('#masthead').height() * 2;

</script>

<?php do_action( 'foundationpress_before_closing_body' ); ?>
</body>
</html>
