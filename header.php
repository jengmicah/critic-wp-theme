<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<?php wp_head(); ?>
</head>

<body id="<?php print get_stylesheet(); ?>" <?php body_class(); ?>>
	<?php do_action( 'body_top' ); ?>
	<a class="skip-content" href="#main"><?php _e( 'Skip to content', 'critic' ); ?></a>
		<div id="overflow-container" class="overflow-container">
			<div class="max-width">
				<div id="main-sidebar" class="main-sidebar">
					<?php do_action( 'before_main_sidebar' ); ?>
					<header class="site-header" id="site-header" role="banner">
						<div id="title-container" class="title-container">
							<?php
							$avatar_method = get_theme_mod( 'avatar_method' );
							$avatar        = get_theme_mod( 'avatar' );
							if ( $avatar_method == 'gravatar' || ( $avatar_method == 'upload' && ! empty( $avatar ) ) ) { ?>
								<div id="site-avatar" class="site-avatar"
								     style="background-image: url('<?php echo esc_url( ct_critic_output_avatar() ); ?>')"
								     title="<?php echo esc_html( get_bloginfo( 'title' ) ) . ' ' . __( 'avatar', 'critic' ); ?>"></div>
							<?php } ?>
													<?php ct_critic_social_icons_output(); ?>

							<div class="container">
								<?php get_template_part( 'logo' ) ?>
								<?php
								if ( get_bloginfo( 'description' ) ) {
									echo '<p class="tagline">' . esc_html( get_bloginfo( "description" ) ) . '</p>';
								} ?>
							</div>
						</div>
						<button id="toggle-navigation" class="toggle-navigation" aria-expanded="false">
							<span class="screen-reader-text"><?php _e( 'open primary menu', 'critic' ); ?></span>
							<i class="fa fa-bars"></i>
						</button>
						<?php get_template_part( 'menu', 'primary' ); ?>
					</header>
					<?php do_action( 'after_header' ); ?>
					<?php get_sidebar( 'primary' ); ?>
					<?php do_action( 'after_sidebar' ); ?>
				</div>
				<?php do_action( 'before_main' ); ?>
				<section id="main" class="main" role="main">
					<?php do_action( 'main_top' );
					if ( function_exists( 'yoast_breadcrumb' ) ) {
						yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
					}
