<?php
/*
Plugin Name: ShortcodeTwitter
Version: 1.0
Description: Shortcode to share on Twitter
Author: Pinto
Author URI: http://bitado.com
Plugin URI: http://bitado.com
Text Domain: shortcodetwitter
Domain Path: /languages
*/

/*
 *  Shortcode share on Twitter. [sct_sharetwitter]
 *  Attributes:
 * 
 *  - text. Default is empty
 *  - size. Default is small. Other value is big
 *
 *  Example: [sct_sharetwitter text="Compartir en Twitter" size="big"]
 */
function shortcodetwitter_sharetwitter( $atts, $content = null ) {
    $atts_sharetwitter = shortcode_atts( array(
        'text' => '',
        'size' => 'small',
    ), $atts );

	$link_twitter = 'http://twitter.com/intent/tweet?url=' . urlencode( get_permalink() ) . '&amp;text=' . urlencode( get_the_title() );
	
	$bigclass = '';
	if ( $atts_sharetwitter['size'] == 'big' )
		$bigclass = 'sct-twitter-big';
	
	$output = '<a class="sct-twitter ' . $bigclass . '" target="_blank" href="' . $link_twitter . '" title="Compartir en Twitter">' . $atts_sharetwitter['text'] . '</a>';
	
	return $output;
}
add_shortcode( 'sct_sharetwitter', 'shortcodetwitter_sharetwitter' );


/*
 *  Enqueue css, javascript, and fonts files needed
 */
function shortcodetwitter_css() {

	wp_enqueue_style( 'shortcodetwitter-style', plugins_url( '/shortcodetwitter.css', __FILE__ ) );
    wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'shortcodetwitter_css' );
