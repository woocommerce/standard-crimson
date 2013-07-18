<?php

/*
/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ INSTRUCTIONS /\/\/\/\/\/\/\/\/\/\/\/\/\//\/\/\/\/\

	The following functions in Standard 3 are able to be overridden in your child 
	theme.
	
		standard_page_menu
		standard_add_theme_background
		standard_add_theme_editor_style
		standard_add_theme_menus
		standard_add_theme_sidebars
		standard_add_theme_features
		standard_set_media_embed_size
		standard_set_theme_colors
		standard_header_style
		standard_admin_header_style
		standard_admin_header_image
		standard_process_link_post_format_content
		standard_process_link_post_format_title
		standard_remove_paragraph_on_media
		standard_wrap_embeds
		standard_search_form
		standard_post_format_rss
		standard_modify_widget_titles
		standard_add_title_to_single_post_pagination

	You may also place any functions outlined in our FAQs & tutorials on the support
	forum in this file, as instructed, or any other code you create yourself or find
	from around the web.
	
	Be forewarned that even the simplest mistake within this file can completely
	bring down your website. Please make sure to create backups and have FTP
	access to your server before modifying this file so you amy correct any issues.
	
	Be sure to place any code after these instructions and before the closing 
	PHP tag (ie. "?>").

/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\//\/\/\/\/\/\/\/\/\/\
*/

/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/ DO NOT MODIFY START /\/\/\/\/\/\/\/\/\/\/\/\/\/\/ */

/**
 * Reorders the loading of Standard's styles to ensure that the child theme kit's
 * styles.css gets loaded last. This allows the child theme kit to override all 
 * Standard styles.
 *
 * @since	3.2.1
 * @version	1.0
 */
function standard_child_theme_kit_reorder_styles() {
    wp_dequeue_style( 'theme-responsive' );
} // end standard_child_theme_kit_reorder_styles

add_action( 'wp_enqueue_scripts', 'standard_child_theme_kit_reorder_styles', 1000 );

/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ DO NOT MODIFY END /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ */

/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ CUSTOMIZATIONS /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/ */

function standard_add_additional_theme_menus() {
	
	register_nav_menus(
		array(
			'category_menu'		=> __( 'Category Menu', 'standard' )
		)
	);
	
} // end standard_add_additional_theme_menus
	
add_action( 'init', 'standard_add_additional_theme_menus' );

function get_category_navigation() {
	
	if( has_nav_menu( 'category_menu' ) ) { ?>
		<div id="menu-category" class="menu-navigation navbar navbar-fixed-top">
			<div class="navbar-inner ">
				<div class="container">
	
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".category-nav-collapse">
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					</a>
				
					<div class="nav-collapse category-nav-collapse">													
						<?php
							wp_nav_menu( 
								array(
									'container_class'	=> 'menu-header-container',
									'theme_location'  	=> 'category_menu',
									'items_wrap'      	=> '<ul id="%1$s" class="nav nav-menu %2$s">%3$s</ul>',
									'fallback_cb'	  	=> 'standard_fallback_nav_menu',
									'walker'			=> new Standard_Nav_Walker()
							 	)
							 );
						?>

					</div><!-- /.nav-collapse -->
				</div> <!-- /container -->
			</div><!-- /navbar-inner -->
		</div> <!-- /#menu-above-header -->	
	<?php } // end if
	
} // end get_category_navigation

?>