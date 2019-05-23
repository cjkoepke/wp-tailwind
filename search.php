<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Freeshifter
 */

get_header(); ?>

<main class="py-8 lg:py-24" style="min-height: 100vh;">
	<section class="container mx-auto relative z-10">
		<?php
		if ( have_posts() ) :

			printf( '<h1 class="text-center mb-8">Search Results for: %s</h1>',
				esc_html( get_search_query() )
			);

			echo '<div class="lg:flex justify-start flex-wrap lg:-mx-4">';
				while ( have_posts() ) {
					the_post(); ?>
					<div class="lg:w-1/3 lg:px-4 mb-8">
						<article <?php post_class( 'h-full' ); ?> itemscope itemtype="https://schema.org/CreativeWork">
							<a class="card-link h-full bg-light-2" rel="bookmark" href="<?= esc_url( get_the_permalink() ); ?>">
								<header>
									<?php
									if( has_post_thumbnail() ) {
										the_post_thumbnail( 'thumbnail', [
											'class' => 'shadow-lg rounded-full float-right ml-2 mb-2 w-1/4'
										]);
									}
									?>
									<div class="text-left relative z-10">
										<h2 class="card-title text-h4 font-bold m-0" itemprop="headline"><?= get_the_title(); ?></h2>
										<p class="text-sm italic mt-2">
											<time class="<?= is_singular('page') ? 'hidden' : ''; ?>" itemprop="datePublished" datetime="<?= get_the_date( 'c' ); ?>">Published on <?= get_the_date( 'F j, Y'); ?></time>
										</p>
									</div>
								</header>
								<?php
								printf( '<div class="article text-sm text-left">%s</div>',
									get_the_excerpt()
								); ?>
							</a>
						</article>
					</div>
					<?php
				}
			echo '</div>';

			the_posts_navigation();

		else :

			printf( 'Sorry, no results for %s',
				esc_html( get_search_query() )
			);

		endif; ?>
	</section>
</main>

<?php
get_footer();
