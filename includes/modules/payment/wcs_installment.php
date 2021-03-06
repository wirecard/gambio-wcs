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
class wcs_installment_ORIGIN extends WirecardCheckoutSeamless
{
	protected $_defaultSortOrder = 24;
	protected $_paymenttype      = WirecardCEE_Stdlib_PaymentTypeAbstract::INSTALLMENT;
	protected $_logoFilename     = 'installment.jpg';


	public function __construct()
	{
		parent::__construct();
		$c = strtoupper($this->code);
		define("MODULE_PAYMENT_{$c}_MIN_AMOUNT_TITLE", $this->_seamless->getText('min_amount'));
		define("MODULE_PAYMENT_{$c}_MIN_AMOUNT_DESC", '');
		define("MODULE_PAYMENT_{$c}_MAX_AMOUNT_TITLE", $this->_seamless->getText('max_amount'));
		define("MODULE_PAYMENT_{$c}_MAX_AMOUNT_DESC", '');
		define("MODULE_PAYMENT_{$c}_PROVIDER_TITLE", $this->_seamless->getText('invoiceinstallment_provider'));
		define("MODULE_PAYMENT_{$c}_PROVIDER_DESC", '');
        define("MODULE_PAYMENT_{$c}_EQUAL_ADDRESS_TITLE", $this->_seamless->getText('equal_address'));
        define("MODULE_PAYMENT_{$c}_EQUAL_ADDRESS_DESC", '');
		define("MODULE_PAYMENT_{$c}_CURRENCIES_TITLE", $this->_seamless->getText('currencies'));
		define("MODULE_PAYMENT_{$c}_CURRENCIES_DESC", '');
        define("MODULE_PAYMENT_{$c}_PAYOLUTION_MID_TITLE", $this->_seamless->getText('payolution_mid'));
        define("MODULE_PAYMENT_{$c}_PAYOLUTION_MID_DESC", $this->_seamless->getText('payolution_mid_desc'));
        define("MODULE_PAYMENT_{$c}_PAYOLUTION_CONSENT_TITLE", $this->_seamless->getText('payolution_terms'));
        define("MODULE_PAYMENT_{$c}_PAYOLUTION_CONSENT_DESC", $this->_seamless->getText('payolution_terms_desc'));
	}


	/**
	 * @return bool
	 */
	function _preCheck()
	{
		return $this->invoiceInstallmentPreCheck();
	}

    function selection()
    {
        $content = parent::selection();
        if($content === false)
        {
            return false;
        }

        $years = range(date("Y")-10, date("Y")-80);
        $years_options = "";
        foreach ($years as $year) {
            $years_options .= "<option value='$year'>$year</option>";
        }

        $months = array(
            1 => _JANUARY,
            2 => _FEBRUARY,
            3 => _MARCH,
            4 => _APRIL,
            5 => _MAY,
            6 => _JUNE,
            7 => _JULY,
            8 => _AUGUST,
            9 => _SEPTEMBER,
            10 => _OCTOBER,
            11 => _NOVEMBER,
            12 => _DECEMBER
        );
        $months_options = "";

        $days = range(1, 31);
        $days_options = "";
        foreach ($days as $day) {
            $days_options .= "<option value='$day'>$day</option>";
        }

        foreach ($months as $number => $word) {
            $months_options .= "<option value='$number'>$word</option>";
        }

        $script = "<script>
    function wcsCheckBirthdate(element) {
        var el = $(element);
        
        var day = (el.attr('name').indexOf(\"_day\")!==-1?el:$('select[name$=_birthdate_day]',el.parent())).val();
        var month = (el.attr('name').indexOf(\"_month\")!==-1?el:$('select[name$=_birthdate_month]',el.parent())).val();
        var year = (el.attr('name').indexOf(\"_year\")!==-1?el:$('select[name$=_birthdate_year]',el.parent())).val();
        
        var dob = new Date();
        dob.setDate(day);
        dob.setMonth(month-1);
        dob.setYear(year);
        dob.setHours(12,0,0,0);
        
        var error = '<div class=\"col-xs-12 wcsAgeError alert alert-danger\" style=\"margin-bottom:0\">" . $this->_seamless->getText('birthdate_too_young') . "</div>';
       
            if (Math.abs(new Date(Date.now() - dob.getTime()).getUTCFullYear() - 1970) < 18) {
                if (el.closest('.form-group').find('.wcsAgeError').length == 0) {
                    el.closest('.form-group').append(error);
                } else {
                    el.closest('.form-group').find('.wcsAgeError').show();
                }
            } else {
                el.closest('.form-group').find('.wcsAgeError').hide();
            }
    }
</script>";


        $field = "$script<div class='form-inline'>
        <select class='wcs_eps input-select form-control' name='wcs_installment_birthdate_day' onchange='wcsCheckBirthdate(this)'>
            $days_options
        </select>
        <select class='wcs_eps input-select form-control' name='wcs_installment_birthdate_month' onchange='wcsCheckBirthdate(this)'>
            $months_options
        </select>
        <select class='wcs_eps input-select form-control' name='wcs_installment_birthdate_year' onchange='wcsCheckBirthdate(this)'>
            $years_options
        </select>
    </div>";

        $field .= '</select>';
        $content['fields'][] = array(
            'title' => $this->_seamless->getText('birthdate'),
            'field' => $field
        );
        if (MODULE_PAYMENT_WCS_INSTALLMENT_PAYOLUTION_CONSENT == "on" && MODULE_PAYMENT_WCS_INSTALLMENT_PROVIDER == 'Payolution') {
            $content['fields'][] = $this->consentCheckbox();
        }

        return $content;
    }

    function consentCheckbox()
    {
        $field = "<input class='form-control' type='checkbox' name='wcs_installment_payolution_terms' style='height: 13px; width: 13px;'/>";

        $consent_message = preg_replace_callback("/_(.*)_/", function ($matches) {
            if (strlen(MODULE_PAYMENT_WCS_INSTALLMENT_PAYOLUTION_MID)) {
                return "<a style='color:white;mix-blend-mode:difference;' href='https://payment.payolution.com/payolution-payment/infoport/dataprivacyconsent?mId=" . base64_encode(MODULE_PAYMENT_WCS_INSTALLMENT_PAYOLUTION_MID) . "' target='_blank'>$matches[1]</a>";
            } else {
                return $matches[1];
            }
        }, $this->_seamless->getText('consent_text'));

        return array(
            'title' => $consent_message,
            'field' => $field
        );
    }

    /**
     * check if dob is at least 18 years ago + possible consent check
     */
    public function pre_confirmation_check()
    {
        if ($_POST['payment'] == 'wcs_installment') {
            $day = $_POST['wcs_installment_birthdate_day'];
            $month = $_POST['wcs_installment_birthdate_month'];
            $year = $_POST['wcs_installment_birthdate_year'];
            $_SESSION['wcs_birthdate'] = $year . '-' . $month . '-' . $day;

            $age = (date("md", date("U", mktime(0, 0, 0, $month, $day, $year))) > date("md")
                ? ((date("Y") - $year) - 1)
                : (date("Y") - $year));

            if ($age < 18) {
                $_SESSION['gm_error_message'] = $this->_seamless->getText('birthdate_too_young');
                xtc_redirect(GM_HTTP_SERVER . DIR_WS_CATALOG . 'checkout_payment.php');
                die;
            }

            if (MODULE_PAYMENT_WCS_INSTALLMENT_PAYOLUTION_CONSENT == "on" && $_POST['wcs_installment_payolution_terms'] !== 'on' && MODULE_PAYMENT_WCS_INSTALLMENT_PROVIDER == 'Payolution') {
                $_SESSION['gm_error_message'] = $this->_seamless->getText('payolution_terms_error');
                xtc_redirect(GM_HTTP_SERVER . DIR_WS_CATALOG . 'checkout_payment.php');
                die;
            }
        }
    }

	/**
	 * module config
	 * @return mixed
	 */
	protected function _configuration()
	{
		$config = parent::_configuration();

		$config['PROVIDER']   = array(
			'configuration_value' => '',
			'set_function'        => "wcs_cfg_pull_down_installment_provider( "
		);
		$config['CURRENCIES'] = array(
			'configuration_value' => 'EUR'
		);
        $config['EQUAL_ADDRESS'] = array(
            'configuration_value' => 'on',
            'set_function'        => "wcs_cfg_installment_checkbox("
        );
		$config['MIN_AMOUNT'] = array(
			'configuration_value' => '150'
		);
		$config['MAX_AMOUNT'] = array(
			'configuration_value' => '3500'
		);
        $config['PAYOLUTION_MID'] = array(
            'configuration_value' => ''
        );
        $config['PAYOLUTION_CONSENT'] = array(
            'configuration_value' => 'off',
            'set_function'        => "wcs_cfg_installment_terms_checkbox("
        );

		return $config;
	}

}

MainFactory::load_origin_class('wcs_installment');