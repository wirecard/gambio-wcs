<?php
/**
 * Shop System Plugins - Terms of use
 *
 * This terms of use regulates warranty and liability between Wirecard
 * Central Eastern Europe (subsequently referred to as WDCEE) and it's
 * contractual partners (subsequently referred to as customer or customers)
 * which are related to the use of plugins provided by WDCEE.
 *
 * The Plugin is provided by WDCEE free of charge for it's customers and
 * must be used for the purpose of WDCEE's payment platform integration
 * only. It explicitly is not part of the general contract between WDCEE
 * and it's customer. The plugin has successfully been tested under
 * specific circumstances which are defined as the shopsystem's standard
 * configuration (vendor's delivery state). The Customer is responsible for
 * testing the plugin's functionality before putting it into production
 * enviroment.
 * The customer uses the plugin at own risk. WDCEE does not guarantee it's
 * full functionality neither does WDCEE assume liability for any
 * disadvantage related to the use of this plugin. By installing the plugin
 * into the shopsystem the customer agrees to the terms of use. Please do
 * not use this plugin if you do not agree to the terms of use!
 */

require_once DIR_FS_DOCUMENT_ROOT . 'includes/classes/WirecardCheckoutSeamless.php';

/**
 * @see WirecardCheckoutSeamless_ORIGIN
 */
class wcs_ccard_ORIGIN extends WirecardCheckoutSeamless_ORIGIN
{
	protected $_defaultSortOrder = 1;
	protected $_paymenttype      = WirecardCEE_Stdlib_PaymentTypeAbstract::CCARD;
	protected $_logoFilename     = 'ccard.png';


	function selection()
	{
		$content = parent::selection();
		if($content === false)
		{
			return false;
		}

		if($this->_seamless->getConfigValue('pci3_dss_saq_a_enable'))
		{
			$content['fields'][] = array(
				'title' => '',
				'field' => sprintf('<div id="wcsIframeContainer%s"></div>', $this->code)
			);

			return $content;
		}

		$cssClass = $this->code;

		if($this->_seamless->getConfigValue('creditcard_showcardholder'))
		{
			$content['fields'][] = array(
				'title' => $this->_seamless->getText('creditcard_cardholder'),
				'field' => sprintf('<input type="text" class="%s input-text" name="wcs_cardholder" data-wcs-fieldname="cardholdername" autocomplete="off" value=""/>',
				                   $cssClass)
			);
		}
		$content['fields'][] = array(
			'title' => $this->_seamless->getText('creditcard_pan'),
			'field' => sprintf('<input type="text" class="%s input-text" name="wcs_cardnumber" data-wcs-fieldname="pan" autocomplete="off" value=""/>',
			                   $cssClass)
		);

		$field = sprintf('<select name="wcs_expirationmonth" class="%s wcs_expirationmonth" data-wcs-fieldname="expirationMonth">',
		                 $cssClass);
		for($m = 1; $m <= 12; $m++)
		{
			$field .= sprintf('<option value="%d">%02d</option>', $m, $m);
		}
		$field .= '</select>&nbsp;';

		$field .= sprintf('<select name="wcs_expirationyear" class="%s wcs_expirationyear" data-wcs-fieldname="expirationYear">',
		                  $cssClass);
		foreach($this->getCreditCardYears() as $y)
		{
			$field .= sprintf('<option value="%d">%s</option>', $y, $y);
		}
		$field .= '</select>';

		if($this->_seamless->getConfigValue('creditcard_showcvc'))
		{
			$field .= sprintf('<div class="label wcs_label_cvc">CVC</div><input type="text" class="%s wcs_cvc input-text" name="wcs_cvc" data-wcs-fieldname="cardverifycode" autocomplete="off" value="" maxlength="4"/>',
			                  $cssClass);
		}
		$content['fields'][] = array(
			'title' => $this->_seamless->getText('creditcard_expiry'),
			'field' => $field
		);

		if($this->_seamless->getConfigValue('creditcard_showissuedate'))
		{
			$field = sprintf('<select name="wcs_issuemonth" class="%s wcs_issuemonth" data-wcs-fieldname="issueMonth">',
			                 $cssClass);
			for($m = 1; $m <= 12; $m++)
			{
				$field .= sprintf('<option value="%d">%02d</option>', $m, $m);
			}
			$field .= '</select>&nbsp;';

			$field .= sprintf('<select name="wcs_issueyear" class="%s wcs_issueyear" data-wcs-fieldname="issueYear">',
			                  $cssClass);
			foreach($this->getCreditCardIssueYears() as $y)
			{
				$field .= sprintf('<option value="%d">%s</option>', $y, $y);
			}
			$field .= '</select>';
			$content['fields'][] = array(
				'title' => $this->_seamless->getText('creditcard_issuedate'),
				'field' => $field
			);
		}

		if($this->_seamless->getConfigValue('creditcard_showissuenumber'))
		{
			$content['fields'][] = array(
				'title' => $this->_seamless->getText('creditcard_issuenumber'),
				'field' => sprintf('<input type="text" class="%s wcs_issuenumber input-text" name="wcs_issuenumber" data-wcs-fieldname="issueNumber" autocomplete="off" value="" maxlength="2"/>',
				                   $cssClass)
			);
		}

		return $content;
	}

}

MainFactory::load_origin_class('wcs_ccard');