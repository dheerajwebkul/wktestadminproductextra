<?php
/**
* 2010-2018 Webkul.
*
* NOTICE OF LICENSE
*
* All right is reserved,
* Please go through this link for complete license : https://store.webkul.com/license.html
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade this module to newer
* versions in the future. If you wish to customize this module for your
* needs please refer to https://store.webkul.com/customisation-guidelines/ for more information.
*
*  @author    Webkul IN <support@webkul.com>
*  @copyright 2010-2018 Webkul IN
*  @license   https://store.webkul.com/license.html
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class WkTestAdminProductExtra extends Module
{
    public function __construct()
    {
        $this->name = 'wktestadminproductextra';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Webkul';
        $this->need_instance = 1;
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->bootstrap = true;
        $this->secure_key = Tools::encrypt($this->name);
        parent::__construct();
        $this->displayName = $this->l('Test displayAdminProductExtra hook');
        $this->description = $this->l('Test displayAdminProductExtra hook: This module have a form here but not display below.');
        $this->confirmUninstall = $this->l('Are you sure?');
    }

    public function hookDisplayAdminProductsExtra($params)
    {
        $idProduct = (int) $params['id_product'];
        return $this->display(__FILE__, 'displayadminproductextra.tpl');
    }

    public function install()
    {
        if (!parent::install()
            || !$this->registerHook('displayAdminProductsExtra')) {
            return false;
        }

        return true;
    }
}
