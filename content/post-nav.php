<?php

global $post;

$previous_post = get_adjacent_post( false, '', true );
$previous_text = __( '&#x2190;', 'critic' );

if ( $previous_post == '' ) {
	$previous_text  = __( 'No Older Posts', 'critic' );
	if ( get_option( 'show_on_front' ) == 'page' ) {
		$previous_url = get_permalink( get_option( 'page_for_posts' ) );
	} else {
		$previous_url = get_home_url();
	}
	$previous_link = '<a href="' . esc_url( $previous_url ) . '">' . esc_html__( 'Return to Blog', 'critic' ) . '</a>';
}

$next_post  = get_adjacent_post( false, '', false );
$next_text  = __( '&#x2192;', 'critic' );

if ( $next_post == '' ) {
	$next_text  = __( '', 'critic' );
	if ( get_option( 'show_on_front' ) == 'page' ) {
		$next_url = get_permalink( get_option( 'page_for_posts' ) );
	} else {
		$next_url = get_home_url();
	}
	$next_link = '<a href="' . esc_url( $next_url ) . '">' . esc_html__( 'Return to Blog', 'critic' ) . '</a>';
}

?>
<nav class="further-reading">
	<div class="previous">
		<span><?php echo esc_html( $previous_text ); ?></span>
		<?php
		if ( $previous_post == '' ) {
			echo $previous_link;
		} else {
			previous_post_link('%link');
		}
		?>
	</div>
	<div class="next">
		<?php
		if ( $next_post == '' ) {
			echo $next_link;
		} else {
			next_post_link('%link');
		}
		?>
		<span><?php echo esc_html( $next_text ); ?></span>
	</div>
</nav>
