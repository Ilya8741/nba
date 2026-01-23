<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package project-london
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title page-title-error"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'project-london' ); ?></h1>
			</header><!-- .page-header -->

				<div class="page-content-404">
					<h1 class="error-404-title">
						404
					</h1>
					<a href="/" class="main-button error-button">
						Back to home
					</a>
				</div>
				
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
