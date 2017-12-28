<?php get_header(); ?>
	<div class="entry">
		<article>
			<div class='post-header'>
				<h1 class='post-title'><?php _e( '404: Page Not Found', 'critic' ); ?></h1>
			</div>
			<div class="post-content">
				<?php _e( 'Looks like nothing was found on this url.', 'critic' ); ?>
			</div>
			<?php get_search_form(); ?>
		</article>
	</div>
<?php get_footer(); ?>
