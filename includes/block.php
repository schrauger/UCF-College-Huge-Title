<?php

namespace ucf_college_huge_title_shortcode\block;

const shortcode_slug = 'ucf_college_huge_title'; // the shortcode text entered by the user (inside square brackets)

/**
 * Adds the shortcode to wordpress' index of shortcodes
 */
function add_shortcode() {
	if ( ! ( shortcode_exists( shortcode_slug ) ) ) {
		\add_shortcode( shortcode_slug, __NAMESPACE__ . '\\replacement' );
	}
}
add_action( 'init', __NAMESPACE__ . '\\add_shortcode' );

/**
 * Returns the replacement html that WordPress uses in place of the shortcode
 *
 * @return mixed
 */
function replacement( ) {
    $replacement_data = ''; //string of html to return

    $title_text = get_field('title_text');
//        $title_text = $title_text ? $title_text : "Fill in title on right hand side";
    $button_text = get_field('button_text');
    $button_url = get_field('button_url');
    $background_image_url = get_field('background_image_url');
    $button_hider = "";
    if (!$button_text) {
        $button_hider = "button-hidden"; // hide the button if no text
    }

    $replacement_data .= "
<div class='generic-divider full-width' style='background-image: url(\"{$background_image_url}\"); background-size: cover;'>
<div class='container'>
    <div class='generic-cta'>{$title_text}</div>
    <a class='large-button {$button_hider}' href={$button_url}>{$button_text}</a>
</div>
</div>
    ";
    return $replacement_data;
}

function replacement_print() {
	echo replacement();
}

