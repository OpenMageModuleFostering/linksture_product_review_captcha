<?php

class Linksture_Productreview_Model_Observer extends Mage_Captcha_Model_Observer
{
   

    public function checkProductReview($observer)
    {
        $productId = $observer->getControllerAction()->getRequest()->getParam('id');
        $returnUrl =  Mage::getUrl('review/product/list', array('id'=> $productId));        
        $formId = 'review-form';
        $captchaModel = Mage::helper('captcha')->getCaptcha($formId);
       
        $controller = $observer->getControllerAction();
        if (!$captchaModel->isCorrect($this->_getCaptchaString($controller->getRequest(), $formId))) {           
            Mage::getSingleton('core/session')->addError(Mage::helper('captcha')->__('Incorrect CAPTCHA.'));
            Mage::app()->getResponse()->setRedirect($returnUrl)->sendResponse();
            exit;
            
        }        
    }
    
}


