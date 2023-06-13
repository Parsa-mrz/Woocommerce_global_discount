<?php
/*
Plugin Name:  Global Discount For Woocommerce
Plugin URI: #
Description: This plugin allows you add a global discount.
Author: Eskano
Version: 1.0.0
Author URI: https://eskanogroup.ir
Text Domain: wc-global-discount
License: GPL2
Developers :
 Parsa Mirzaie => senior PHP Developer  => https://github.com/Parsa-mrz
*/

defined('ABSPATH') || exit;

class Discount
{

    public function __construct()
    {
        $this->init();
    }
    public function activation()
    {
    }
    public function deactivation()
    {
    }
    public function init()
    {
        register_activation_hook(__FILE__, [$this, 'activation']);
        register_deactivation_hook(__FILE__, [$this, 'deactivation']);
        $this->addCore();
    }
    private function addCore()
    {
        include_once( plugin_dir_path(__FILE__ ) . 'Core.php');
        include_once( plugin_dir_path(__FILE__) . 'AddMenu.php');
    }
}
new Discount();
