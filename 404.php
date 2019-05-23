<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Freeshifter
 */

get_header(); ?>

<main class="content-wrap">
	<section class="container mx-auto relative z-10">
		<h1>Oops! That page can't be found.</h1>
		<p>It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>
		<?php
		get_search_form(); ?>
	</section>
</main>

<?php
get_footer();
