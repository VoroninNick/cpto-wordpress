<?php get_header();?>

<div id="colLeft" class="page_posts">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1> 
				<div class="page">
					<?php the_content(__('Читати дальше')); ?> 
				</div>
	<?php endwhile; else: ?>
		<p>Вибачте, але за вашим запитом нічого не знайдено.</p>
	<?php endif; ?>	
<?php get_footer(); ?>