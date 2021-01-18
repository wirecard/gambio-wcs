<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcs/blob/master/LICENSE
*/

$t_language_text_section_content_array = array(
	'about'                           => '<br/><img src="images/wirecard-logo.png" alt="Wirecard CEE" /><br /><h3>Wirecard CEE - Your Full Service Payment Provider - Comprehensive solutions from one single source</h3>Wirecard AG is one of the world´s leading providers of outsourcing and white label solutions for electronic payment transactions.<br /><br /> As independent provider of payment solutions, we accompany our customers along the entire business development. Our payment solutions are perfectly tailored to suit e-Commerce requirements and have made us Austria´s leading payment service provider. Customization, competence, and commitment. <br /><br /> <a href="https://www.wirecard.at/" target="_blank">www.wirecard.at</a><br /><br />',
	'title'                           => 'Wirecard Checkout Seamless',
	'about_support'                   => '<br/><img src="images/wirecard-logo.png" alt="Wirecard CEE" /><br /><h3>Wirecard CEE - Your Full Service Payment Provider - Comprehensive solutions from one single source</h3><br /><br />',
	'title_support'                   => 'Support Request',
	'title_transferfund'              => 'Fund Transfer',
	'about_transferfund'              => '<br/><img src="images/wirecard-logo.png" alt="Wirecard CEE" /><br /><h3>Wirecard CEE - Your Full Service Payment Provider - Comprehensive solutions from one single source</h3><br /><br />',
	'configure'                       => 'Wirecard Checkout Seamless configuration',
	'config_group_basedata'           => 'Basic data',
	'config_group_options'            => 'Options',
	'config_group_order'              => 'Order',
	'config_group_ccard'              => 'Credit card options',
	'paymentmethods'                  => 'Payment methods',
	'config_prod'                     => 'Production',
	'configtype'                      => 'Configuration',
	'configtype_desc'                 => 'For integration, select predefined configuration settings or "production" for live systems.',
	'config_demo'                     => 'Demo',
	'config_test_no3d'                => 'Test without 3-D Secure',
	'config_test_3d'                  => 'Test with 3-D Secure',
	'param_invalid'                   => 'Parameter %s has an invalid value!',
	'param_required'                  => 'Parameter %s is mandatory!',
	'requestsupport'                  => 'Request support from Wirecard',
	'support_request'                 => 'Support request',
	'support_description'             => 'Problem description',
	'support_request_send'            => 'Send support request',
	'support_reply_to'                => 'Reply to',
	'support_to'                      => 'To',
	'support_from'                    => 'From',
	'support_subject'                 => 'Support request via Gambio online shop',
	'support_send_ok'                 => 'Support request sent successfully!',
	'support_pluginconfig'            => 'Plugin configuration:',
	'support_installed_wcs'           => 'Installed modules:',
	'support_installed_modules'       => 'External modules:',
	'email_invalid'                   => '%s is not a valid e-mail address',
	'customer_id'                     => 'Customer ID',
	'customer_id_desc'                => 'Your Wirecard customer number.',
	'shop_id'                         => 'Shop ID',
	'shop_id_desc'                    => 'Unique ID of your online shop within your customer ID.',
	'secret'                          => 'Secret',
	'secret_desc'                     => 'Secret string for signing and validating data to prove their authenticity.',
	'backendpw'                       => 'Backend password',
	'backendpw_desc'                  => 'Password for backend operations (Toolkit).',
	'service_url'                     => 'Service URL',
	'service_url_desc'                => 'URL which leads to the imprint page containing contact information.',
	'saveconfig'                      => 'Save configuration',
	'testconfig'                      => 'Test configuration',
	'configtest_ok'                   => 'Configuration test ok',
	'field_required'                  => '* mandatory',
	'active'                          => 'Active',
	'sort_order'                      => 'Display order',
	'allowed'                         => 'Allowed zones',
	'allowed_desc'                    => 'Enter allowed zones (e.g. AT, DE)',
	'send_additional_data'            => 'Send detailed customer data',
	'send_additional_data_desc'       => 'Billing and shipping address data are sent to Wirecard Checkout Seamless.',
	'send_basket'                     => 'Send basket information',
	'send_basket_desc'                => 'Shopping basket information is sent to Wirecard Checkout Seamless.',
	'zone'                            => 'Payment zone',
	'zone_desc'                       => 'Selected payment method is available for this zone only.',
	'min_amount'                      => 'Minimum order amount',
	'max_amount'                      => 'Maximum order amount',
	'datastorage_initerror'           => 'An error occurred during the initialization of the payment process. Please try again or choose a different payment method.',
	'docref_title'                    => 'See documentation.',
    'button_continue'                 => 'CONTINUE',
    'button_close'                    => 'CLOSE',
	'confirm_title'                   => 'Payment process',
	'status_init'                     => 'Payment has been initialized',
	'status_init_desc'                => '',
	'status_success'                  => 'Payment successful',
	'status_success_desc'             => '',
	'status_pending'                  => 'Payment pending',
	'status_pending_desc'             => '',
	'status_cancel'                   => 'Payment canceled',
	'status_cancel_desc'              => '',
	'status_error'                    => 'Payment failed',
	'status_error_desc'               => '',
	'checkout_cancel_title'           => 'Payment process has been canceled',
	'checkout_cancel_content'         => 'You have canceled the payment process!',
	'checkout_failure_title'          => 'Payment process failed',
	'checkout_failure_content'        => 'A general error occurred!',
	'checkout_noconfirm_title'        => 'Payment process failed (confirm missing)',
	'checkout_noconfirm_content'      => 'An error occurred during the initialization of the payment process. Please try again or choose a different payment method.',
	'payment_pending_title'           => 'Payment confirmation pending',
	'payment_pending_info'            => 'Your financial institution has not yet approved your payment.',
	'fraud_alert'                     => 'Possible fraud attempt, basket contents changed during payment process!',
	'shop_name'                       => 'Shop name',
	'shop_name_desc'                  => 'Additional text on invoice, max. 9 characters.',
	'send_confirm_email'              => 'Send confirmation e-mail',
	'send_confirm_email_desc'         => 'E-mail address of merchant for receiving payment information details regarding the orders of the consumers in your online shop.',
	'auto_deposit'                    => 'Auto deposit',
	'auto_deposit_desc'               => 'Automated deposit of approved payments.',
	'pci3_dss_saq_a_enable'           => 'PCI DSS SAQ A compliance',
	'pci3_dss_saq_a_enable_desc'      => 'Whether Wirecard Checkout Seamless is PCI DSS SAQ A compliant or not.',
	'iframe_css_url'                  => 'Iframe CSS-URL',
	'iframe_css_url_desc'             => 'URL pointing to CSS file to be included into iframe.',
	'creditcard_cardholder'           => 'Card holder',
	'creditcard_cvc'                  => 'Card Verification Code',
	'creditcard_pan'                  => 'Primary Account Number',
	'creditcard_expiry'               => 'Expiration date',
	'creditcard_issuedate'            => 'Card issue date',
	'creditcard_issuenumber'          => 'Card issue number',
	'creditcard_showcardholder'       => 'Display card holder',
	'creditcard_showcardholder_desc'  => 'Display input field for card holder in your credit card form in the online shop.',
	'creditcard_showcvc'              => 'Display CVC field',
	'creditcard_showcvc_desc'         => 'Display input field for CVC in your credit card form in the online shop.',
	'creditcard_showissuedate'        => 'Display credit card issue date',
	'creditcard_showissuedate_desc'   => 'Display input field for issue date in your credit card form in the online shop. Some credit cards do not have an issue date.',
	'creditcard_showissuenumber'      => 'Display credit card issue number',
	'creditcard_showissuenumber_desc' => 'Display input field for issue number in your credit card form in the online shop. Some credit cards do not have an issue number.',
	'voucher_voucherid'               => 'Voucher code',
	'paybox_payernumber'              => 'paybox number',
	'sepa_bic'                        => 'BIC',
	'sepa_iban'                       => 'IBAN',
	'sepa_accountowner'               => 'Account owner',
	'giropay_banknumber'              => 'Bank number',
	'giropay_accountowner'            => 'Account owner',
	'giropay_bankaccount'             => 'Bank account number',
	'financialinstitution'            => 'Financial institution',
    'birthdate'                       => 'Birthdate',
    'birthdate_too_young'             => 'You have to be 18 years or older to use this payment.',
	'paymentnumber'                   => 'Payment number',
	'approveamount'                   => 'Approved',
	'depositamount'                   => 'Deposited',
	'orderstate'                      => 'Status',
	'timecreated'                     => 'Created',
	'operation'                       => 'Operation',
    'payolution_mid'                  => 'payolution mID',
    'payolution_mid_desc'             => 'Your payolution merchant ID, non-base64-encoded.',
    'payolution_terms_error'          => 'Please accept the consent terms!',
    'payolution_terms'                => 'payolution terms',
    'payolution_terms_desc'           => 'Consumer must accept payolution terms during the checkout process.',
    'consent_text'                    => 'I agree that the data which are necessary for the liquidation of invoice payments and which are used to complete the identity and credit check are transmitted to payolution.  My _consent_ can be revoked at any time with future effect.',
	'payment_approved'                => 'Approved',
	'payment_deposited'               => 'Deposited',
	'payment_closed'                  => 'Closed',
	'payment_approvalexpired'         => 'Approval expired',
	'credit_refunded'                 => 'Refunded',
	'credit_closed'                   => 'Closed',
	'approvereversal'                 => 'Approve reversal',
	'deposit'                         => 'Deposit',
	'depositreversal'                 => 'Deposit reversal',
	'refund'                          => 'Refund',
	'refundreversal'                  => 'Refund reversal',
	'transferfund'                    => 'Fund transfer',
	'credits'                         => 'Credits',
	'credit_add'                      => 'Add credit',
	'payments'                        => 'Payments',
	'creditnumber'                    => 'Credit number',
	'amount'                          => 'Amount',
	'creditstate'                     => 'Status',
	'amount_invalid'                  => 'Amount is invalid',
	'invoiceinstallment_provider'     => 'Financial service provider',
	'currency'                        => 'Currency',
	'currencies'                      => 'Allowed currencies',
    'equal_address'                   => 'Billing/shipping address must be identical',
	'customergroup'                   => 'Customer group',
	'customergroup_desc'              => 'Payment method is available for this customer group only',
	'transfer_type'                   => 'Type',
	'transfer_existingorder'          => 'Existing order',
	'transfer_skrillwallet'           => 'Skrill Digital Wallet',
	'transfer_moneta'                 => 'moneta.ru',
	'transfer_sepact'                 => 'SEPA-CT',
	'transfer_execute'                => 'Execute fund transfer',
	'sourceordernumber'               => 'Source order number',
	'ordernumber'                     => 'Order number',
	'orderdescription'                => 'Order description',
	'orderreference'                  => 'Order reference',
	'customerstatement'               => 'Customer statement',
	'consumeremail'                   => 'Consumer e-mail address',
	'consumerwalletid'                => 'Consumer wallet ID',
	'bankaccountowner'                => 'Bank account owner',
	'bankbic'                         => 'BIC',
	'bankaccountiban'                 => 'IBAN',
	'transferfund_ok'                 => 'Fund transfer ok!',
	'delete_failure'                  => 'Delete orders if payment fails',
	'delete_failure_desc'             => 'If enabled, pending orders will be deleted in the order list if payment fails.',
	'delete_cancel'                   => 'Delete orders if payment is canceled',
	'delete_cancel_desc'              => 'If enabled, pending orders will be deleted in the order list if payment is canceled.',
);


