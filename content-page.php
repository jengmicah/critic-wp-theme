<div <?php post_class(); ?>>
	<?php do_action( 'page_before' ); ?>
	<?php ct_critic_featured_image(); ?>
	<article>
		<div class='post-header'>
			<h1 class='post-title'><?php the_title(); ?></h1>
		</div>
		<div class="post-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array(
				'before' => '<p class="singular-pagination">' . __( 'Pages:', 'critic' ),
				'after'  => '</p>',
			) ); ?>
		</div>
	</article>
	<?php do_action( 'page_after' ); ?>
	<?php comments_template(); ?>
</div>
