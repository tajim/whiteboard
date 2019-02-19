<?php
/**
 * Template Name: Snowfall
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package setopati
 */

get_header('snowfall');
$snowfallcode = get_field('page_code');
?>
<?php echo $snowfallcode; ?>
<?php get_footer('snowfall'); ?>
