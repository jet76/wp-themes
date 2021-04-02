<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Blogstrap
 * @since Blogstrap 1.0
 */

get_header();
if (have_posts()) {
	$post_count = 0;
	while (have_posts()) {
		the_post();
		if (is_sticky() && $post_count == 0) {
			get_template_part('template-parts/content/content-sticky');
		}
		else {
			echo ($post_count % 2 == 0) ? '<div class="row">' : '';
			get_template_part('template-parts/content/content-excerpt');
			$post_count++;
			echo ($post_count % 2 == 0) ? '</div><!-- /.row -->' : '';
		}
	}
	echo ($post_count % 2 != 0) ? '</div><!-- /.row -->' : '';
	get_template_part('template-parts/pagination');
}
else {
	get_template_part('template-parts/content/content-none');
}
get_footer();
?>