<?php

if (!defined('ABSPATH')) {
    exit;
}

class Hertwill
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'hertwill_add_plugin_page'));
        add_action('admin_enqueue_scripts', array( $this, 'enqueue_styles' ));
        // Add action to display cost price on product options pricing
        add_action('woocommerce_product_options_inventory_product_data', array($this, 'add_woo_cost_price_field'));
        // Show notice if WooCommerce is not activated
        if (!$this->is_woocommerce_activated()) {
            add_action('admin_notices', array($this, 'woocommerce_required_notice'));
        }
    }

    private function is_woocommerce_activated()
    {
        return in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')));
    }

    public function hertwill_add_plugin_page()
    {
        add_menu_page(
            'Hertwill', // page_title
            'Hertwill', // menu_title
            'manage_options', // capability
            'hertwill', // menu_slug
            array(
                $this,
                'settings_auth'
            ),
            HERTWILL_ICON,
        );
        add_filter('plugin_action_links_' . HERTWILL_BASENAME, array( $this, 'plugin_settings_link' ));
    }

    /* Settings page content for new authentication process. */
    public function settings_auth()
    {
        include_once(HERTWILL_PATH . '/admin/partials/wc_v1_auth_settings.php');
    }

    public function enqueue_styles($hook)
    {
        wp_enqueue_style('whw-admin', HERTWILL_URL . 'admin/css/whw-admin.css', array(), HERTWILL_CURRENT_VERSION);
    }

    public function plugin_settings_link($links)
    {
        $settings_link = '<a href="' . HERTWILL_ADMIN . 'admin.php?page=hertwill">Settings</a>';
        array_unshift($links, $settings_link);

        return $links;
    }

    /** Add cost price field to product options pricing */
    public function add_woo_cost_price_field()
    {
        global $post;

        // Check if 'hw' metadata exists for the product
        $hw_metadata = get_post_meta($post->ID, '_hw_product_cost', true);

        // Check if 'cost_price' field exists within 'hw' metadata
        $cost_price_value = isset($hw_metadata) ? $hw_metadata : '';

        // Display cost price field only if 'cost_price' exists in 'hw' metadata
        if (!empty($cost_price_value)) {
            woocommerce_wp_text_input(array(
                'id'                 => 'hw_cost_price',
                'class'              => 'short wc_input_price',
                'label'              => 'Cost (€)',
                'data_type'          => 'price',
                'value'              => $cost_price_value,
                'custom_attributes'  => array(
                    'readonly' => 'readonly',
                ),
            ));
        }
    }

    /* Display notice if WooCommerce is not activated */
    public function woocommerce_required_notice()
    {
        echo "<div class='error'><p>Hertwill plugin requires WooCommerce to be installed</p></div>";
    }

}

if (is_admin()) {
    $hertwill = new Hertwill();
}
