<?php
/**
 * Template part for displaying general content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UFCLAS_UFL_2015
 */
?>
<!-- content -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( is_archive() ): ?>
        
        <header class="entry-header">
            <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
        </header><!-- .entry-header -->
		
		<?php if ( has_post_thumbnail() ): ?>
            <div class="entry-thumbnail">
                <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) ); ?>
            </div>
    	<?php endif; ?>
        
	<?php endif; ?>
    
    <div class="entry-content">
        <?php
			if ( is_singular() ):
				the_content();
			endif;
		?>
	</div><!-- .entry-content -->
    
    <footer class="entry-footer">
		<?php
			ufclas_knowledgebase_entry_meta();
			
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ufclas-knowledgebase' ),
				'after'  => '</div>',
			) );
			
			edit_post_link(
				sprintf(
					esc_html__( 'Edit %s', 'ufclas-knowledgebase' ),
					the_title( '<span class="sr-only">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
    
</article><!-- #post-## -->
