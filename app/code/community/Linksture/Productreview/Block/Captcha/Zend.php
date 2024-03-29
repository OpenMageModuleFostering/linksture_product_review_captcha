<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Captcha
 * @copyright   Copyright (c) 2013 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Captcha block
 *
 * @category   Core
 * @package    Mage_Captcha
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Linksture_Productreview_Block_Captcha_Zend extends Mage_Captcha_Block_Captcha_Zend
{    
    /**
     * Renders captcha HTML (if required)
     *
     * @return string
     */
    protected function _toHtml()
    {
        /**
         * Functionality : To differenciate condition for 'review-form' form id. No need to chek is required for it.
         * Developer     : Developer 919
         * Created Date  : 2014-08-22 
         * Updated Date  : 2014-08-22
         */
        if($this->getFormId() == 'review-form')
        {
            $this->getCaptchaModel()->generate();
            return Mage_Core_Block_Template::_toHtml();
        }
        else 
        {
            if ($this->getCaptchaModel()->isRequired()) {
                $this->getCaptchaModel()->generate();
                return parent::_toHtml();
            }
            return '';
        }
    }
}
