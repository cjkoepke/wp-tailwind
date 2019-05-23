<?php
/**
 * The default single page template.
 *
 * @author Freeshifter LLC
 * @since 1.0.0
 */

namespace WP_Tailwind;

get_header(); ?>
	<div class="container mx-auto relative z-10 mb-16 lg:mb-32 flex flex-wrap items-start">
		<div class="w-full lg:w-4/6 lg:pr-10 mb-8">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					echo get_template_part( 'content-templates/content', 'article' );
				}
			} ?>
		</div>
		<?php
		if ( is_active_sidebar( 'sidebar' ) ) : ?>
			<aside class="w-full lg:w-2/6 bg-white border-gray-400 border-2 p-8">
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</aside>
		<?php
		endif; ?>
	</div>
	<?php
get_footer();
