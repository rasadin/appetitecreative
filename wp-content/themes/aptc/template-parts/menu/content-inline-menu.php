<header id="masthead" class="aptc-header aptc-inline-menu">
		<nav id="site-navigation" class="aptc-navbar">
		    <div class="container">
				<div class="aptc-menu-wrap">
					<div class="aptc-brand-wrap">
						<?php  
							/**
							 * aptc_before_logo hook
							 */
							do_action( 'aptc_before_logo' );
						?>
						<a class="aptc-navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php aptc_custom_logo(); ?>
						</a>
						<?php  
							/**
							 * aptc_after_logo hook
							 */
							do_action( 'aptc_after_logo' );
						?>
						<span class="aptc-navbar-toggler js-show-nav">
							<i class="fas fa-bars"></i>
						</span>
					</div>
					<?php
						if( has_nav_menu( 'primary' ) ) :
							wp_nav_menu( array(
								'theme_location'	=> 'primary',
								'container'			=> false,
								'menu_class'		=> 'aptc-main-menu aptc-inline-menu',
								'menu_id'			=> false,
							) );
						endif;
					?>
				</div>
		    </div>
		</nav>
	</header><!-- #masthead -->