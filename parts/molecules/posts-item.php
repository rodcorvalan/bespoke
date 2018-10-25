<article class="posts-item">
	<div class="social-share">
		<ul>
			<?php wp_enqueue_script('armix.facebook-share'); ?>
			<li><a href="<?php the_permalink(); ?>" class="facebook-share"><i class="fab fa-facebook"></i></a></li>

			<?php wp_enqueue_script('armix.twitter-share'); ?>
			<li><a href="http://twitter.com/share" class="twitter-share" data-title="<?php the_title(); ?>"><i class="fab fa-twitter"></i></a></li>
			
			<?php wp_enqueue_script('armix.linkedin-share'); ?>
			<li><a href="<?php the_permalink(); ?>" class="linkedin-share" data-title="<?php the_title(); ?>"><i class="fab fa-linkedin"></i></a></li>
		</ul>
	</div>
	<?php if ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>">
		<picture>
			<source media="(min-width: 1440px)" srcset="<?php echo get_the_post_thumbnail_url(get_the_ID(),'post-item-xl'); ?>">
			<source media="(min-width: 1024px)" srcset="<?php echo get_the_post_thumbnail_url(get_the_ID(),'post-item-l'); ?>">
			<source media="(min-width: 640px)" srcset="<?php echo get_the_post_thumbnail_url(get_the_ID(),'post-item-m'); ?>">
			<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'post-item-s'); ?>">
		</picture>
	</a>
	<?php endif; ?>
	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	<div class="excerpt"><?php the_excerpt(); ?></div>
	<div class="date">Fecha: <?php the_date(); ?></div>
	<div class="author">Autor: <?php the_author(); ?></div>
	<div class="views">Vistas: <?php armix_get_post_count_views(get_the_ID()); ?></div>
	<nav class="tags"><?php armix_get_terms(get_the_ID(),'post_tag',3); ?></nav>
	<nav class="category"><?php armix_get_terms(get_the_ID(),'category',3); ?></nav>
	<div class="comments_number"><?php comments_number( __('Sin Comentarios','armix'), __('1 Comentario','armix'), __('% Comentarios','armix') ); ?></div>
	<a href="<?php the_permalink(); ?>"><?php _e('Leer Más', 'armix'); ?></a>
</article>