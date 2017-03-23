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

<div id="main" class="container main-content">

<div class="row">
  <div class="col-sm-12">
    <?php ufclas_knowledgebase_breadcrumbs();	?>
    <header class="entry-header">
    	<h1 class="page-title">
      <?php 
	  	if ( !is_search() ){
			single_term_title();
		}
		else {
			printf( __( 'Search Results for: %s', 'ufclas-knowledgebase' ), '<span>' . get_search_query() . '</span>' );
		}
		?>
        </h1>
    </header>
  </div> 
</div>

<div class="row">
  <div class="col-md-12">
  	<div class="entry-content kbe_content">
	<?php
		include UFCLAS_KB_PLUGIN_DIR . '/templates/content-archive.php';
	?>
    </div><!-- .kbe_content -->
  </div>
</div>
</div>

<?php get_footer(); ?>
