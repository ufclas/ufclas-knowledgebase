<?php
/**
 * The template file for archives.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UFCLAS_UFL_2015
 */
get_header(); ?>

<?php ufclas_knowledgebase_header(); ?>

<div id="main" class="container main-content">

<div class="row">
  <div class="col-md-12">
    <div class="kbe_content">
    <div class="row">
		<?php
            get_template_part( 'inc/wp-knowledgebase/kb', 'content-home');
        ?>
    </div>
    </div><!-- .kbe_content -->
  </div>
</div>
</div>

<?php get_footer(); ?>
