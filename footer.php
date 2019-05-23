<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Freeshifter
 */

namespace WP_Tailwind;

?>
		</main>
		<footer class="footer relative bg-dark-1 text-light-2 pt-8 pb-16">
			<div class="relative z-10">
				<div class="container mx-auto">
					<div class="lg:flex lg:justify-between">
						<div class="lg:w-1/4 text-center lg:text-left">
							<div class="text-xl">
								<p class="text-sm">WP Tailwind is a utility-first starter theme for WordPress by <a href="https://www.freeshifter.com">Freeshifter LLC</a> and is totally free! <a href="https://www.github.com/freeshifter/wp-tailwind">Contribute on GitHub</a></a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>
