<?php
if ( get_theme_mod( 'comments_link' ) != 'yes' ) {
	return;
}
?>
<span class="comments-link">
	<?php
	if ( ! comments_open() && get_comments_number() < 1 ) :
		?><i class="fa fa-comment" title="<?php esc_attr_e( 'comment icon', 'critic' ); ?>" aria-hidden="true"></i><?php
		comments_number( __( 'Comments closed', 'critic' ), __( '1 Comment', 'critic' ), _x( '% Comments', 'noun: 5 comments', 'critic' ) );
	else :
		echo '<a href="' . esc_url( get_comments_link() ) . '">';
		?><i class="fa fa-comment" title="<?php esc_attr_e( 'comment icon', 'critic' ); ?>" aria-hidden="true"></i><?php
		comments_number( __( 'Leave a Comment', 'critic' ), __( '1 Comment', 'critic' ), _x( '% Comments', 'noun: 5 comments', 'critic' ) );
		echo '</a>';
	endif;
	?>
</span>
