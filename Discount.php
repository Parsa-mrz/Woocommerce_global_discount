<?php
/*
Plugin Name: Discount Plugin
Version: 1.0.0
Description: A plugin to apply discounts to all products
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
    }
}
new Discount();
