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



	$url_post = urlencode( get_permalink() );
	$title_post = urlencode( get_the_title() );
	$link_twitter = 'http://twitter.com/intent/tweet?url=' . $url_post . '&amp;text=' . $title_post; 
	$class = '';
	
	$output = '<a class="' . $class . '" target="_blank" href="' . $link_twitter . '" title="Compartir en Twitter">' . $atts_sharetwitter['text'] . '</a>';
	
	return $output;
}
add_shortcode( 'sct_sharetwitter', 'shortcodetwitter_sharetwitter' );