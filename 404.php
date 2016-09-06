<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="row">
	<div class="small-12 large-8 columns" role="main">

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title">הדף לא נמצא</h1>
			</header>
			<div class="entry-content">
				<div class="error">
					<p class="bottom">הדף שחיפשתם אינו זמין כעת.</p>
				</div>
				<p>תוכלו לנסות:</p>
				<ul>
					<li>לוודא שהקלדתם נכונה</li>
					<li>לחזור ל<a href="<?= home_url() ?>">עמוד הראשי</a></li>
					<li>לחזור <a href="javascript:history.back()">אחורה</a></li>
				</ul>
			</div>
		</article>

	</div>
</div>
<?php get_footer();
