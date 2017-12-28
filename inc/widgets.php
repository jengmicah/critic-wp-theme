<?php 
/* @package critic */
/*====================================
=            WIDGET CLASS            =
====================================*/

/*Add span tag to category items for styling the numbers */
function critic_list_categories_output_change( $links ) {
	$links = str_replace('</a> (', '</a> <span>', $links);
	$links = str_replace(')', '</span>', $links);
	
	return $links;
}
add_filter( 'wp_list_categories', 'critic_list_categories_output_change' );
?>


