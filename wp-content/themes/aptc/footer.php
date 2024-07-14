<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aptc
 */

?>

	</div><!-- #content -->
	<?php 
		/**
		 * aptc_before_footer hook
		 */
		do_action( 'aptc_before_footer' );
	?>
<a class="btn-download-black">
 <div class="box-btn">
 <p class="unlock-text">Unlock <br> knowledge!</p> 
 <p class="download-new">Download our new <br> E-Book on Connected Packaging <br> for FREE.</p>
</div>
<div class="hover-icon"></div>
</a>
	<footer class="aptc-footer">
		<!-- Widgets -->
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-6 foo-content-colume-1">
					<div class="foo-content-first"><?php dynamic_sidebar( 'footer-widget-1' ); ?></div>
				</div>
				<div class="col-md-3 col-sm-6 foo-colume-2">
					<div class="get-in-touch-circle"><?php dynamic_sidebar( 'footer-widget-2' ); ?></div>
				</div>
				<div class="col-md-4 col-sm-6 foo-colume-3">
					<div class="subscripe-content"><?php dynamic_sidebar( 'footer-widget-3' ); ?></div>
				</div>
				
			</div>
		</div>
		<!-- Copyright -->
		<div class="container bottom-foo-comtent">
			<div class="row">
				<div class="col-md-2 copy-right-content">
					<?php dynamic_sidebar( 'copyright-widget-1' ); ?>
				</div>
				<div class="col-md-10 col-sm-6 footer-right-content">
					<?php dynamic_sidebar( 'footer-widget-4' ); ?>
				</div>
				<div class="col-md-10 col-sm-6 footer-right-content">
					<?php dynamic_sidebar( 'copyright-widget-2' ); ?>
				</div>
			</div>
		</div>
	</footer>

	<?php  
		/**
		 * aptc_after_footer hook
		 */
		do_action( 'aptc_after_footer' );
	?>
</div><!-- #page -->





<style>
  .alm-listing {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
    padding: 20px;
  }
  .alm-listing li {
    list-style-type: none;
    position: relative;
    overflow: hidden;
    background-size: cover;
    background-position: center;
    height: 300px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
  }
  .alm-listing li h2 {
    position: absolute;
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 10px;
    border-radius: 10px;
    transition: transform 0.3s ease-out, background-color 0.3s ease-out, color 0.3s ease-out;
    max-width: 90%;
    text-align: center;
    box-sizing: border-box;
  }
  .alm-listing li:hover h2 {
    background-color: white;
    color: black;
  }
  @media (min-width: 1024px) {
    .alm-listing {
      grid-template-columns: repeat(2, 1fr);
    }
  }
</style>   


<!-- <script>
	jQuery(document).ready(function($){
  // Function to handle scroll events
  function handleScroll() {
    // Get the current scroll position
    const scrollY = window.scrollY || window.pageYOffset;

    // Iterate through each h2 element inside .alm-listing li
    $('.alm-listing li h2').each(function() {
      // Calculate the translateY based on the data-scroll-speed attribute
      const scrollSpeed = parseFloat($(this).attr('data-scroll-speed')) || 1;
      const translateY = -scrollY * scrollSpeed * 0.1; // Adjust scroll speed factor here

      // Apply the transform
      $(this).css('transform', `translateY(${translateY}px)`);
    });
  }

  // Attach scroll event listener using jQuery's on() method with event delegation
  $(window).on('scroll', function() {
    handleScroll();
  });

  // Initial call to set the initial transform based on the initial scroll position
  handleScroll();

  // Listen for DOM changes and re-bind the scroll event handler
  $(document).on('DOMSubtreeModified', function() {
    handleScroll(); // Call handleScroll() whenever DOM changes occur
  });
  });
</script> -->



<script>
  jQuery(document).ready(function($) {
    // Variables to store the previous scroll position
    let lastScrollTop = 0;

    // Function to handle scroll events
    function handleScroll() {
      // Get the current scroll position
      const scrollY = window.scrollY || window.pageYOffset;

      // Check if .alm-listing li elements are visible on window
      $('.alm-listing li').each(function() {
        if (isElementInViewport($(this))) {
          // Calculate translateY based on scroll direction
          let translateY = 0;
          if (scrollY > lastScrollTop) {
            // Scrolling down
            translateY = 20; // Adjust this value for downward movement
          } else {
            // Scrolling up
            translateY = -20; // Adjust this value for upward movement
          }

          // Apply the transform to h2 elements within the current li
          $(this).find('h2').css('transform', `translateY(${translateY}px)`);
        }
      });

      // Update last scroll position
      lastScrollTop = scrollY;
    }

    // Function to check if element is in viewport
    function isElementInViewport(el) {
      var rect = el[0].getBoundingClientRect();

      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
      );
    }

    // Attach scroll event listener using jQuery's on() method with event delegation
    $(window).on('scroll', function() {
      handleScroll();
    });

    // Initial call to set the initial state based on the initial scroll position
    handleScroll();

    // Listen for DOM changes and re-bind the scroll event handler
    $(document).on('DOMSubtreeModified', function() {
      handleScroll(); // Call handleScroll() whenever DOM changes occur
    });
  });
</script>





<?php wp_footer(); ?>

</body>
</html>
