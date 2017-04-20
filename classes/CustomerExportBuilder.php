<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 02.04.17
 */
class CustomerExportBuilder extends BuilderAbstract
{
    protected function createStructure(ArrayObject $dataObj)
    {
        $dom = $this->_dom;

        $sales_orders = $dom->appendChild($dom->createElement('SALES_ORDERS'));

        $sales_orders_attr = $sales_orders->appendChild($dom->createAttribute('xmlns:xsi'));
        $sales_orders_attr->nodeValue = 'http://www.w3.org/2001/XMLSchema-instance';
        
        $sales_orders_attrib = $sales_orders->appendChild($dom->createAttribute('xsi:noNamespaceSchemaLocation'));
        $sales_orders_attrib->nodeValue = 'http://www.keystonesoftware.co.uk/xml/KSDXMLImportFormat.xsd';
        $provider_id = $sales_orders->appendChild($dom->createElement('provider_id'));
        $provider_id->appendChild($dom->createTextNode('khaos'));

        $sales_order = $sales_orders->appendChild($dom->createElement('SALES_ORDER'));

        $customer_detail = $sales_order->appendChild($dom->createElement('CUSTOMER_DETAIL'));
        $payments = $sales_order->appendChild($dom->createElement('PAYMENTS'));
        $order_items = $sales_order->appendChild($dom->createElement('ORDER_ITEMS'));
        $order_header = $sales_order->appendChild($dom->createElement('ORDER_HEADER'));

        $is_new_customer = $customer_detail->appendChild($dom->createElement('IS_NEW_CUSTOMER'));
        $is_new_customer->appendChild($dom->createTextNode($dataObj->offsetGet('is_new_customers')));
        $other_ref = $customer_detail->appendChild($dom->createElement('OTHER_REF'));
        $other_ref->appendChild($dom->createTextNode($dataObj->offsetGet('other_ref')));
        $company_name = $customer_detail->appendChild($dom->createElement('COMPANY_NAME'));
        $company_name->appendChild($dom->createTextNode($dataObj->offsetGet('company_name')));
        $web_user = $customer_detail->appendChild($dom->createElement('WEB_USER'));
        $web_user->appendChild($dom->createTextNode($dataObj->offsetGet('web_user')));
        $mailing_status = $customer_detail->appendChild($dom->createElement('MAILING_STATUS'));
        $mailing_status->appendChild($dom->createTextNode($dataObj->offsetGet('mailing_status')));
        $company_class = $customer_detail->appendChild($dom->createElement('COMPANY_CLASS'));
        $company_class->appendChild($dom->createTextNode($dataObj->offsetGet('company_class')));
        $company_type = $customer_detail->appendChild($dom->createElement('COMPANY_TYPE'));
        $company_type->appendChild($dom->createTextNode($dataObj->offsetGet('company_type')));
        $company_code = $customer_detail->appendChild($dom->createElement('COMPANY_CODE'));
        $company_code->appendChild($dom->createTextNode($dataObj->offsetGet('company_code')));
        $optin_newsletter = $customer_detail->appendChild($dom->createElement('OPTIN_NEWSLETTER'));
        $optin_newsletter->appendChild($dom->createTextNode('-1'));
        $addresses = $customer_detail->appendChild($dom->createElement('ADDRESSES'));

        $deladdr = $addresses->appendChild($dom->createElement('DELADDR'));
        $invaddr = $addresses->appendChild($dom->createElement('INVADDR'));

        $daddress1 = $deladdr->appendChild($dom->createElement('DADDRESS1'));
        $daddress1->appendChild($dom->createTextNode('qwerqwer'));
        $daddress2 = $deladdr->appendChild($dom->createElement('DADDRESS2'));
        $daddress2->appendChild($dom->createTextNode('qwerqwer'));
        $daddress3 = $deladdr->appendChild($dom->createElement('DADDRESS3'));
        $dtown = $deladdr->appendChild($dom->createElement('DTOWN'));
        $dtown->appendChild($dom->createTextNode('qwerqewr'));
        $dcounty = $deladdr->appendChild($dom->createElement('DCOUNTY'));
        $dcounty->appendChild($dom->createTextNode('weqrqwer'));
        $dpostcode = $deladdr->appendChild($dom->createElement('DPOSTCODE'));
        $dpostcode->appendChild($dom->createTextNode('03038'));
        $dorganisation = $deladdr->appendChild($dom->createElement('DORGANISATION'));
        $dtel = $deladdr->appendChild($dom->createElement('DTEL'));
        $dtel->appendChild($dom->createTextNode('123412341234'));
        $dcountry_code = $deladdr->appendChild($dom->createElement('DCOUNTRY_CODE'));
        $dcountry_code->appendChild($dom->createTextNode('GB'));
        $dtitle = $deladdr->appendChild($dom->createElement('DTITLE'));
        $dforename = $deladdr->appendChild($dom->createElement('DFORENAME'));
        $dforename->appendChild($dom->createTextNode('Alex'));
        $dsurname = $deladdr->appendChild($dom->createElement('DSURNAME'));
        $dsurname->appendChild($dom->createTextNode('Slovinskiy'));
        $dmobile = $deladdr->appendChild($dom->createElement('DMOBILE'));
        $demail = $deladdr->appendChild($dom->createElement('DEMAIL'));
        $demail->appendChild($dom->createTextNode('mailalexslv@gmail.com'));

        $iaddress1 = $invaddr->appendChild($dom->createElement('IADDRESS1'));
        $iaddress1->appendChild($dom->createTextNode('qwerqwer'));
        $iaddress2 = $invaddr->appendChild($dom->createElement('IADDRESS2'));
        $iaddress2->appendChild($dom->createTextNode('qwerqwer'));
        $iaddress3 = $invaddr->appendChild($dom->createElement('IADDRESS3'));
        $itown = $invaddr->appendChild($dom->createElement('ITOWN'));
        $itown->appendChild($dom->createTextNode('qwerqewr'));
        $icounty = $invaddr->appendChild($dom->createElement('ICOUNTY'));
        $icounty->appendChild($dom->createTextNode('weqrqwer'));
        $ipostcode = $invaddr->appendChild($dom->createElement('IPOSTCODE'));
        $ipostcode->appendChild($dom->createTextNode('03038'));
        $iorganisation = $invaddr->appendChild($dom->createElement('IORGANISATION'));
        $itel = $deladdr->appendChild($dom->createElement('DTEL'));
        $itel->appendChild($dom->createTextNode('123412341234'));
        $icountry_code = $invaddr->appendChild($dom->createElement('ICOUNTRY_CODE'));
        $icountry_code->appendChild($dom->createTextNode('GB'));
        $ititle = $invaddr->appendChild($dom->createElement('ITITLE'));
        $iforename = $invaddr->appendChild($dom->createElement('IFORENAME'));
        $iforename->appendChild($dom->createTextNode('Alex'));
        $isurname = $invaddr->appendChild($dom->createElement('ISURNAME'));
        $isurname->appendChild($dom->createTextNode('Slovinskiy'));
        $imobile = $invaddr->appendChild($dom->createElement('IMOBILE'));
        $iemail = $invaddr->appendChild($dom->createElement('IEMAIL'));
        $iemail->appendChild($dom->createTextNode('mailalexslv@gmail.com'));

        $payment_detail = $payments->appendChild($dom->createElement('PAYMENT_DETAIL'));

        $payment_amount = $payment_detail->appendChild($dom->createElement('PAYMENT_AMOUNT'));
        $payment_amount->appendChild($dom->createTextNode('25.94'));
        $payment_type = $payment_detail->appendChild($dom->createElement('PAYMENT_TYPE'));
        $payment_type->appendChild($dom->createTextNode('2'));
        $card_type = $payment_detail->appendChild($dom->createElement('CARD_TYPE'));
        $card_type->appendChild($dom->createTextNode('Visa'));
        $card_number = $payment_detail->appendChild($dom->createElement('CARD_NUMBER'));
        $card_number->appendChild($dom->createTextNode('************1111'));
        $card_start = $payment_detail->appendChild($dom->createElement('CARD_START'));
        $card_expire = $payment_detail->appendChild($dom->createElement('CARD_EXPIRE'));
        $card_expire->appendChild($dom->createTextNode('****'));
        $card_issue = $payment_detail->appendChild($dom->createElement('CARD_ISSUE'));
        $card_cv2 = $payment_detail->appendChild($dom->createElement('CARD_CV2'));
        $card_name = $payment_detail->appendChild($dom->createElement('CARD_NAME'));
        $card_name->appendChild($dom->createTextNode('qwerqwrqewr'));
        $auth_code = $payment_detail->appendChild($dom->createElement('AUTH_CODE'));
        $auth_code->appendChild($dom->createTextNode('STRIPE'));
        $pre_auth = $payment_detail->appendChild($dom->createElement('PRE_AUTH'));
        $pre_auth->appendChild($dom->createTextNode('0'));
        $transaction_id = $payment_detail->appendChild($dom->createElement('TRANSACTION_ID'));
        $transaction_id->appendChild($dom->createTextNode('ch_1A0WsFCwrM4DOQojXRRqEtU0'));
        $security_ref = $payment_detail->appendChild($dom->createElement('SECURITY_REF'));
        $security_ref->appendChild($dom->createTextNode('cus_ALDIhLOHGGaWnM'));
        $preauth_ref = $payment_detail->appendChild($dom->createElement('PREAUTH_KEY'));
        $preauth_ref->appendChild($dom->createTextNode('ehBrYrUjC4mW9hB5'));
        $account_number = $payment_detail->appendChild($dom->createElement('ACCOUNT_NUMBER'));
        $account_number->appendChild($dom->createTextNode('11'));
        $account_name = $payment_detail->appendChild($dom->createElement('ACCOUNT_NAME'));
        $account_name->appendChild($dom->createTextNode('Bank - GBP Cards Stripe'));
        $security_token = $payment_detail->appendChild($dom->createElement('SECURITY_TOKEN'));
        $security_token_attr = $security_token->appendChild($dom->createAttribute('Last4Digits'));
        $security_token_attr->nodeValue = '1111';
        $security_token->appendChild($dom->createTextNode('cus_ALDIhLOHGGaWnM'));
        //COMMENT
        $order_item = $order_items->appendChild($dom->createElement('ORDER_ITEM'));
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

        $associated_ref = $order_header->appendChild($dom->createElement('ASSOCIATED_REF'));
        $associated_ref->appendChild($dom->createTextNode('ASSOCIATED_REF'));
        $order_date = $order_header->appendChild($dom->createElement('ORDER_DATE'));
        $order_date->appendChild($dom->createTextNode('2017-03-23 14:25:08'));
        $order_amount = $order_header->appendChild($dom->createElement('ORDER_AMOUNT'));
        $order_amount->appendChild($dom->createTextNode('25.94'));
        $order_currency_code = $order_header->appendChild($dom->createElement('ORDER_CURRENCY_CODE'));
        $order_currency_code->appendChild($dom->createTextNode('GBP'));
        $order_note = $order_header->appendChild($dom->createElement('ORDER_NOTE'));
        $sales_source = $order_header->appendChild($dom->createElement('SALES_SOURCE'));
        $sales_source->appendChild($dom->createTextNode('3.2 IDS Shop'));
        $courier_code = $order_header->appendChild($dom->createElement('COURIER_CODE'));
        $courier_note = $order_header->appendChild($dom->createElement('COURIER_NOTE'));
        $inv_priority = $order_header->appendChild($dom->createElement('INV_PRIORITY'));
        $inv_priority->appendChild($dom->createTextNode('Web Drop Ship'));
        $agent = $order_header->appendChild($dom->createElement('AGENT'));
        $agent_attr = $agent->appendChild($dom->createAttribute('DataType'));
        $agent_attr->nodeValue = 'String';
        $agent->appendChild($dom->createTextNode('1JENK'));
        $delivery_net = $order_header->appendChild($dom->createElement('DELIVERY_NET'));
        $delivery_net->appendChild($dom->createTextNode('3.99'));
        $delivery_tax = $order_header->appendChild($dom->createElement('DELIVERY_TAX'));
        $delivery_tax->appendChild($dom->createTextNode('0.00'));
   }

    public function buildXml($name, ArrayObject $dataObj)
    {
        $this->_getDom();
        $this->createStructure($dataObj);
        $this->save($name);
    }
}
