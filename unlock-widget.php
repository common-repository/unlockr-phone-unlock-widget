<?php
/*
Plugin Name: Unlockr - Unlock Widget
Description: Allows the insertion of your Unlockr.ca Unlock Store in any pages. The tag to insert the code is: <code>[unlock_widget src="//unlockr.ca/widget/?storeId=XXXXXXXXXXXXXXXX" width="100%" height="100%"]</code>
Version: 0.1
Author: Unlockr.ca
Author URI: https://unlockr.ca

0.1   - Initial release
*/

add_shortcode( 'unlock_widget', function( $atts ) {

	// Use wp_parse_args rather than shortcode_atts so we can add
	// any and all HTML attribs
    // NOTE : We cannot use wp_enqueue_style here because the html attributes are variables defined by the user in the shortcode.

	$atts = wp_parse_args($atts, array(
        'id' => 'widgetAPP',
        'onload' => "iFrameResize({autoResize:!0,checkOrigin:!1,heightCalculationMethod:'lowestElement'},'#widgetAPP')",
		'src' => '',
		'width' => '100%',
		'height' => '100%',
		'frameborder' => 0,
	));

	$html = '<iframe ';
	foreach ( $atts as $name=>$val )
		$html .= $name . '="' . str_replace('"', "'", $val) . '" ';
	$html .= '></iframe>';

    wp_enqueue_script( 'iframe_resizer_js', plugins_url( '/scripts/iframeResizer.min.js', __FILE__ ), array( 'jquery' ) );

	return $html;
});

?>
