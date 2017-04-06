<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 02.04.17
 */
class CustomerExportBuilder extends BuilderAbstract
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createStructure()
    {
        $dom = $this->_dom;
        $salesOrders = $dom->appendChild($dom->createElement('SALES_ORDERS'));
        $salesOrder = $salesOrders->appendChild($dom->createElement('SALES_ORDER'));
        $salesOrderAttrXmlns=$salesOrders->appendChild($dom->createAttribute('xmlns:xsi'));
        $salesOrderAttrXmlns->nodeValue = 'http://www.w3.org/2001/XMLSchema-instance';
        $salesOrderAttrXsi=$salesOrders->appendChild($dom->createAttribute('xsi:noNamespaceSchemaLocation'));
        $salesOrderAttrXsi->nodeValue = 'http://www.keystonesoftware.co.uk/xml/KSDXMLImportFormat.xsd';
        $providerId = $salesOrders->appendChild($dom->createElement('provider_id'));

        $customerDetail = $salesOrder->appendChild($dom->createElement('CUSTOMER_DETAIL'));
        $payments = $salesOrder->appendChild($dom->createElement('PAYMENTS'));
        $orderItems = $salesOrder->appendChild($dom->createElement('ORDER_ITEMS'));
        $orderHeader = $salesOrder->appendChild($dom->createElement('ORDER_HEADER'));

        $isNewCustomer = $customerDetail->appendChild($dom->createElement('IS_NEW_CUSTOMER'));
        $otherRef = $customerDetail->appendChild($dom->createElement('OTHER_REF'));
        $companyName = $customerDetail->appendChild($dom->createElement('COMPANY_NAME'));
        $web_user = $customerDetail->appendChild($dom->createElement('WEB_USER'));
        $mailing_status = $customerDetail->appendChild($dom->createElement('MAILING_STATUS'));
        $company_class = $customerDetail->appendChild($dom->createElement('COMPANY_CLASS'));
        $company_type = $customerDetail->appendChild($dom->createElement('COMPANY_TYPE'));
        $companyCode = $customerDetail->appendChild($dom->createElement('COMPANY_CODE'));
        $optinNewsletter = $customerDetail->appendChild($dom->createElement('OPTIN_NEWSLETTER'));
        $addresses = $customerDetail->appendChild($dom->createElement('ADDRESSES'));

        $deladdr = $addresses->appendChild($dom->createElement('DELADDR'));
        $invaddr = $addresses->appendChild($dom->createElement('INVADDR'));

        $daddress1 = $deladdr->appendChild($dom->createElement('DADDRESS1'));
        $daddress2 = $deladdr->appendChild($dom->createElement('DADDRESS2'));
        $daddress3 = $deladdr->appendChild($dom->createElement('DADDRESS3'));
        $dtown = $deladdr->appendChild($dom->createElement('DTOWN'));
        $dcounty = $deladdr->appendChild($dom->createElement('DCOUNTY'));
        $dpostcode = $deladdr->appendChild($dom->createElement('DPOSTCODE'));
        $dorganisation = $deladdr->appendChild($dom->createElement('DORGANISATION'));
        $dtel = $deladdr->appendChild($dom->createElement('DTEL'));
        $dcountry_code = $deladdr->appendChild($dom->createElement('DCOUNTRY_CODE'));
        $dtitle = $deladdr->appendChild($dom->createElement('DTITLE'));
        $dforename = $deladdr->appendChild($dom->createElement('DFORENAME'));
        $dsurname = $deladdr->appendChild($dom->createElement('DSURNAME'));
        $dmobile = $deladdr->appendChild($dom->createElement('DMOBILE'));
        $demail = $deladdr->appendChild($dom->createElement('DEMAIL'));

        $iaddress1 = $invaddr->appendChild($dom->createElement('IADDRESS1'));
        $iaddress2 = $invaddr->appendChild($dom->createElement('IADDRESS2'));
        $iaddress3 = $invaddr->appendChild($dom->createElement('IADDRESS3'));
        $itown = $invaddr->appendChild($dom->createElement('ITOWN'));
        $icounty = $invaddr->appendChild($dom->createElement('ICOUNTY'));
        $ipostcode = $invaddr->appendChild($dom->createElement('IPOSTCODE'));
        $iorganisation = $invaddr->appendChild($dom->createElement('IORGANISATION'));
        $itel = $deladdr->appendChild($dom->createElement('DTEL'));
        $icountry_code = $invaddr->appendChild($dom->createElement('ICOUNTRY_CODE'));
        $ititle = $invaddr->appendChild($dom->createElement('ITITLE'));
        $iforename = $invaddr->appendChild($dom->createElement('IFORENAME'));
        $isurname = $invaddr->appendChild($dom->createElement('ISURNAME'));
        $imobile = $invaddr->appendChild($dom->createElement('IMOBILE'));
        $iemail = $invaddr->appendChild($dom->createElement('IEMAIL'));

        $paymentDetail = $payments->appendChild($dom->createElement('PAYMENT_DETAIL'));

        $paymentAmount = $paymentDetail->appendChild($dom->createElement('PAYMENT_AMOUNT'));
        $paymentType = $paymentDetail->appendChild($dom->createElement('PAYMENT_TYPE'));
        $cardType = $paymentDetail->appendChild($dom->createElement('CARD_TYPE'));
        $cardNumber = $paymentDetail->appendChild($dom->createElement('CARD_NUMBER'));
        $cardStart = $paymentDetail->appendChild($dom->createElement('CARD_START'));
        $cardExpire = $paymentDetail->appendChild($dom->createElement('CARD_EXPIRE'));
        $cardIssue = $paymentDetail->appendChild($dom->createElement('CARD_ISSUE'));
        $cardCv2 = $paymentDetail->appendChild($dom->createElement('CARD_CV2'));
        $cardName = $paymentDetail->appendChild($dom->createElement('CARD_NAME'));
        $authCode = $paymentDetail->appendChild($dom->createElement('AUTH_CODE'));
        $preAuth = $paymentDetail->appendChild($dom->createElement('PRE_AUTH'));
        $transactionId = $paymentDetail->appendChild($dom->createElement('TRANSACTION_ID'));
        $securityRef = $paymentDetail->appendChild($dom->createElement('SECURITY_REF'));
        $preauth_ref = $paymentDetail->appendChild($dom->createElement('PREAUTH_KEY'));
        $preauth_ref->appendChild($dom->createTextNode('ehBrYrUjC4mW9hB5'));
        $account_number = $paymentDetail->appendChild($dom->createElement('ACCOUNT_NUMBER'));
        $account_number->appendChild($dom->createTextNode('11'));
        $account_name = $paymentDetail->appendChild($dom->createElement('ACCOUNT_NAME'));
        $account_name->appendChild($dom->createTextNode('Bank - GBP Cards Stripe'));
        $security_token = $paymentDetail->appendChild($dom->createElement('SECURITY_TOKEN'));
        $security_token_attr = $security_token->appendChild($dom->createAttribute('Last4Digits'));
        $security_token_attr->nodeValue = '1111';
        $security_token->appendChild($dom->createTextNode('cus_ALDIhLOHGGaWnM'));

        $order_item = $orderItems->appendChild($dom->createElement('ORDER_ITEM'));
        $stock_code = $order_item->appendChild($dom->createElement('STOCK_CODE'));
        $stock_code->appendChild($dom->createTextNode('Q32AQ-00'));
        $mapping_type = $order_item->appendChild($dom->createElement('MAPPING_TYPE'));
        $mapping_type->appendChild($dom->createTextNode('1'));
        $stock_desc = $order_item->appendChild($dom->createElement('STOCK_DESC'));
        $stock_desc->appendChild($dom->createTextNode('1st Position Helena Ruched Lined Leotard (Matt Nylon)Aqua Child Small #Some-id#'));
        $order_qty = $order_item->appendChild($dom->createElement('ORDER_QTY'));
        $order_qty->appendChild($dom->createTextNode('1'));
        $price_net = $order_item->appendChild($dom->createElement('PRICE_NET'));
        $price_net->appendChild($dom->createTextNode('21.95'));

        $associated_ref = $orderHeader->appendChild($dom->createElement('ASSOCIATED_REF'));
        $associated_ref->appendChild($dom->createTextNode('ASSOCIATED_REF'));
        $order_date = $orderHeader->appendChild($dom->createElement('ORDER_DATE'));
        $order_date->appendChild($dom->createTextNode('2017-03-23 14:25:08'));
        $order_amount = $orderHeader->appendChild($dom->createElement('ORDER_AMOUNT'));
        $order_amount->appendChild($dom->createTextNode('25.94'));
        $order_currency_code = $orderHeader->appendChild($dom->createElement('ORDER_CURRENCY_CODE'));
        $order_currency_code->appendChild($dom->createTextNode('GBP'));
        $order_note = $orderHeader->appendChild($dom->createElement('ORDER_NOTE'));
        $sales_source = $orderHeader->appendChild($dom->createElement('SALES_SOURCE'));
        $sales_source->appendChild($dom->createTextNode('3.2 IDS Shop'));
        $courier_code = $orderHeader->appendChild($dom->createElement('COURIER_CODE'));
        $courier_note = $orderHeader->appendChild($dom->createElement('COURIER_NOTE'));
        $inv_priority = $orderHeader->appendChild($dom->createElement('INV_PRIORITY'));
        $inv_priority->appendChild($dom->createTextNode('Web Drop Ship'));
        $agent = $orderHeader->appendChild($dom->createElement('AGENT'));
        $agent_attr = $agent->appendChild($dom->createAttribute('DataType'));
        $agent_attr->nodeValue = 'String';
        $agent->appendChild($dom->createTextNode('1JENK'));
        $delivery_net = $orderHeader->appendChild($dom->createElement('DELIVERY_NET'));
        $delivery_net->appendChild($dom->createTextNode('3.99'));
        $delivery_tax = $orderHeader->appendChild($dom->createElement('DELIVERY_TAX'));
        $delivery_tax->appendChild($dom->createTextNode('0.00'));



    }

    public function buildXml()
    {
        $this->_getDom();
        $this->createStructure();
        $this->save();
    }

}
