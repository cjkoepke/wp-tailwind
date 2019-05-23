<?php
/**
 * The article template.
 *
 * @author Freeshifter LLC
 * @since 1.0.0
 */

namespace WP_Tailwind;

?>
<article <?php post_class( 'bg-white border-2 border-gray-400 p-8' ); ?> itemscope itemtype="https://schema.org/CreativeWork">
	<header>
		<h2 class="m-0">
			<?php

			if ( is_archive() || is_home() ) {
				printf( '<a href="%s" rel="bookmark">%s</a>',
					esc_url( get_the_permalink() ),
					esc_html( get_the_title() )
				);
			} else {
				echo get_the_title();
			} ?>
		</h2>
		<p class="text-sm">Published on <?= get_the_date(); ?></p>
	</header>

	<div class="article">
		<?php
		if ( has_post_thumbnail() ) {
			echo get_the_post_thumbnail( get_the_ID(), 'large', ['class' => 'rounded shadow-lg'] );
		}

		the_content(); ?>
	</div>

	<footer>
		Categorized under: <?= get_the_category_list( ',' ); ?>
	</footer>
</article>
