<?php

class ucf_college_huge_title_shortcode {
    const shortcode_slug = 'ucf_college_huge_title'; // the shortcode text entered by the user (inside square brackets)
    const shortcode_name = 'Huge Title (deprecated - use blocks)';
    const shortcode_description = 'Huge title with content below';
    //const get_param_group = 'people_group'; // group or category person is in

    function __construct() {
//        add_action( 'init', array( $this, 'add_shortcode' ) );
//        add_filter( 'query_vars', array($this, 'add_query_vars_filter' )); // tell wordpress about new url parameters
//        add_filter( 'ucf_college_shortcode_menu_item', array($this, 'add_ckeditor_shortcode'));
    }

    /**
     * Adds the shortcode to wordpress' index of shortcodes
     */
    static function add_shortcode() {
        if ( ! ( shortcode_exists( self::shortcode_slug ) ) ) {
            add_shortcode( self::shortcode_slug, array('ucf_college_huge_title', 'replacement' ));
        }
    }

    /**
     * Adds the shortcode to the ckeditor dropdown menu
     */
    static function add_ckeditor_shortcode($shortcode_array){
        $shortcode_array[] = array(
            'slug' => self::shortcode_slug,
            'name' => self::shortcode_name,
            'description' => self::shortcode_description
        );
        return $shortcode_array;
    }

    /**
     * Tells wordpress to listen for the 'people_group' parameter in the url. Used to filter down to specific profiles.
     * @param $vars
     *
     * @return array
     */
    static function add_query_vars_filter($vars){
        //$vars[] = self::get_param_group;
        return $vars;
    }

    /**
     * Returns the replacement html that WordPress uses in place of the shortcode
     *
     * @return mixed
     */
    static function replacement( ) {
        $replacement_data = ''; //string of html to return

        $title_text = get_field('title_text');
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

	static function replacement_print() {
		echo self::replacement();
	}

    /**
     * Only run this on plugin activation, as it's stored in the database
     */
    static function insert_shortcode_term(){
        $taxonomy = new ucf_college_shortcode_taxonomy;
        $taxonomy->create_taxonomy();
        wp_insert_term(
            self::shortcode_name,
            ucf_college_shortcode_taxonomy::taxonomy_slug,
            array(
                'description' => self::shortcode_description,
                'slug' => self::shortcode_slug
            )
        );
    }

    /**
     * Run when plugin is disabled and/or uninstalled. This removes the shortcode from the list of shortcodes in the taxonomy.
     */
    static function delete_shortcode_term(){
        $taxonomy = new ucf_college_shortcode_taxonomy;
        $taxonomy->create_taxonomy();
        wp_delete_term(get_term_by('slug', self::shortcode_slug)->term_id, ucf_college_shortcode_taxonomy::taxonomy_slug);
    }




}

add_action( 'init', array( 'ucf_college_huge_title_shortcode', 'add_shortcode' ) );
add_filter( 'query_vars', array( 'ucf_college_huge_title_shortcode', 'add_query_vars_filter' ) ); // tell wordpress about new url parameters
add_filter( 'ucf_college_shortcode_menu_item', array( 'ucf_college_huge_title_shortcode', 'add_ckeditor_shortcode' ) );


//new ucf_college_huge_title_shortcode();
