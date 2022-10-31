<?php

namespace goodcom\GcOrderPrinter\Traits;

trait GcAPI
{

    public $m_gcOrder = array(
        'nul0' => array('id' => '#', 'val' => ''),
        'ResId' => array('id' => '*', 'val' => ''),
        'DeliveryType' => array('id' => '*', 'val' => ''),
        'OrderId' => array('id' => '*', 'val' => ''),
        'order' => array('id' => '*', 'val' => ''),
        'TotalFees' => array('id' => ';', 'val' => ''),
        'SubTotal' => array('id' => ';', 'val' => ''),
        'Fee' => array('id' => ';', 'val' => ''),
        'DiscountAmt' => array('id' => ';', 'val' => ''),
        'DiscountTaxes' => array('id' => ';', 'val' => ''),
        'DeliveryCharges' => array('id' => ';', 'val' => ''),
        'DeliveryTaxes' => array('id' => ';', 'val' => ''),
        'ExtraFeeAmt' => array('id' => ';', 'val' => ''),
        'TotalTaxes' => array('id' => ';', 'val' => ''),
        'nul1' => array('id' => '*', 'val' => ''),
        'Total' => array('id' => ';', 'val' => ''),
        'VerifyType' => array('id' => ';', 'val' => ''),
        'PaymentStatus' => array('id' => ';', 'val' => ''),
        'CustName' => array('id' => ';', 'val' => ''),
        'CustInfo' => array('id' => ';', 'val' => ''),
        'CustPhone' => array('id' => ';', 'val' => ''),
        'RequestTime' => array('id' => ';', 'val' => ''),
        'PreviousOrder' => array('id' => ';', 'val' => ''),
        'PaidType' => array('id' => ';', 'val' => ''),
        'PaymentInfo' => array('id' => ';', 'val' => ''),
        'nul2' => array('id' => '*', 'val' => ''),
        'PaymentCash' => array('id' => ';', 'val' => ''),
        'Comment' => array('id' => ';', 'val' => ''),
        'nul3' => array('id' => '#', 'val' => ''),
    );

    /*
     * initialize function
     * call this function first before use other api function
     */

    public function GcApi_Init()
    {
        $this->m_gcOrder['ResId']['val'] = '';
        $this->m_gcOrder['DeliveryType']['val'] = '';
        $this->m_gcOrder['OrderId']['val'] = '';
        $this->m_gcOrder['order']['val'] = '';
        $this->m_gcOrder['TotalFees']['val'] = '';
        $this->m_gcOrder['SubTotal']['val'] = '';
        $this->m_gcOrder['Fee']['val'] = '';
        $this->m_gcOrder['DiscountAmt']['val'] = '';
        $this->m_gcOrder['DiscountTaxes']['val'] = '';
        $this->m_gcOrder['DeliveryCharges']['val'] = '';
        $this->m_gcOrder['DeliveryTaxes']['val'] = '';
        $this->m_gcOrder['ExtraFeeAmt']['val'] = '';
        $this->m_gcOrder['TotalTaxes']['val'] = '';
        $this->m_gcOrder['Total']['val'] = '';
        $this->m_gcOrder['VerifyType']['val'] = '';
        $this->m_gcOrder['PaymentStatus']['val'] = '';
        $this->m_gcOrder['CustName']['val'] = '';
        $this->m_gcOrder['CustInfo']['val'] = '';
        $this->m_gcOrder['CustPhone']['val'] = '';
        $this->m_gcOrder['RequestTime']['val'] = '';
        $this->m_gcOrder['PreviousOrder']['val'] = '';
        $this->m_gcOrder['PaidType']['val'] = '';
        $this->m_gcOrder['PaymentInfo']['val'] = '';
        $this->m_gcOrder['PaymentCash']['val'] = '';
        $this->m_gcOrder['Comment']['val'] = '';
    }

    /*
     * GcApi_getOrder()
     * call this function at the end to get the order string
     * the order string had been format to like as follow:
     * #13*1*10003*1;chicken;3.00;.....#
     */

    public function GcApi_getOrder()
    {
        $str = "";

        foreach ($this->m_gcOrder as $key => $value) {
            $str .= $this->m_gcOrder[$key]['val'] . $this->m_gcOrder[$key]['id'];
        }

        return $str . "\r\n";
    }

    /*
     * GcApi_setOrderContent($oNum,$name,$oAmt)
     * can be call many times,call one time to add one Food
     * Example:
     * GcApi_setOrderContent('1','Chiken','3.00');
     */

    public function GcApi_setOrderContent($oNum, $name, $oAmt)
    {
        $cnt = array(
            'o_oNum' => array('id' => ';', 'val' => ''),
            'o_name' => array('id' => ';', 'val' => ''),
            'o_oAmt' => array('id' => ';', 'val' => ''),
        );

        if (isset($this->m_gcOrder['order'])) {
            $strOrder = $this->m_gcOrder['order']['val'];
            $cnt['o_oNum']['val'] = $this->GcApi_KeyStrReplace($oNum);
            $cnt['o_name']['val'] = $this->GcApi_KeyStrReplace($name);
            $cnt['o_oAmt']['val'] = $this->GcApi_KeyStrReplace($oAmt);
            $str = '';

            foreach ($cnt as $key => $value) {
                $str .= $cnt[$key]['val'] . $cnt[$key]['id'];
            }

            $strOrder .= $str;
            $this->m_gcOrder['order']['val'] = $strOrder;
        }
    }

    /*
     * GcApi_setOrderOption($oNum,$oAmt)
     * can be call many times,this function be used to add option or comment for one Food
     * Example:
     * GcApi_setOrderOption('test0','test2');
     */

    public function GcApi_setOrderOption($oNum, $oAmt)
    {
        $cnt = array(
            'o_oNum' => array('id' => ';', 'val' => ''),
            'o_name' => array('id' => ';', 'val' => ''),
            'o_oAmt' => array('id' => ';', 'val' => ''),
        );

        if (isset($this->m_gcOrder['order'])) {
            $strOrder = $this->m_gcOrder['order']['val'];
            $cnt['o_oNum']['val'] = $this->GcApi_KeyStrReplace($oNum);
            $cnt['o_oAmt']['val'] = $this->GcApi_KeyStrReplace($oAmt);
            $str = '';
            foreach ($cnt as $key => $value) {
                $str .= $cnt[$key]['val'] . $cnt[$key]['id'];
            }
            $strOrder .= $str;
            $this->m_gcOrder['order']['val'] = $strOrder;
        }
    }

    /*
     * GcApi_setResId($val)
     * Example:
     * GcApi_setResId('13');
     */

    public function GcApi_setResId($val)
    {
        $this->m_gcOrder['ResId']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setDeliveryType($val)
     * $val:
     * the parameter can be:
     * '1','2','3','4','5','6','7'
     * the parameter also can be:
     * 'Consegna','Collection','Reservation','Verified','Not verified','Order Paid','Order Not Paid'
     * Example: GcApi_setDeliveryType('1');
     */

    public function GcApi_setDeliveryType($val)
    {
        if (strlen($val) < 2) {
            $this->m_gcOrder['DeliveryType']['val'] = $this->GcApi_KeyStrReplace($val);
        } else {
            $translate = array(
                '1' => 'Consegna',
                '2' => 'Collection',
                '3' => 'Reservation',
                '4' => 'Verified',
                '5' => 'Not verified',
                '6' => 'Order Paid',
                '7' => 'Order Not Paid');
            foreach ($translate as $key => $value) {
                if (stripos($value, $val)) {
                    $this->m_gcOrder['DeliveryType']['val'] = $this->GcApi_KeyStrReplace($val);
                }
            }
        }
    }

    /*
     * GcApi_setOrderId($val)
     * Example: GcApi_setOrderId('10006');
     */

    public function GcApi_setOrderId($val)
    {
        $this->m_gcOrder['OrderId']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setTotalFees($val)
     * Example: GcApi_setTotalFees('2.00');
     */

    public function GcApi_setTotalFees($val)
    {
        $this->m_gcOrder['TotalFees']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setSubTotal($val)
     * Example: GcApi_setSubTotal('0.00');
     */

    public function GcApi_setSubTotal($val)
    {
        $this->m_gcOrder['SubTotal']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setFee($val)
     * Example: GcApi_setFee('0.00');
     */

    public function GcApi_setFee($val)
    {
        $this->m_gcOrder['Fee']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setDiscountAmt($val)
     * Example: GcApi_setDiscountAmt('0.00');
     */

    public function GcApi_setDiscountAmt($val)
    {
        $this->m_gcOrder['DiscountAmt']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setDiscountTaxes($val)
     * Example: GcApi_setDiscountTaxes('0.00');
     */

    public function GcApi_setDiscountTaxes($val)
    {
        $this->m_gcOrder['DiscountTaxes']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setDeliveryCharges($val)
     * Example: GcApi_setDeliveryCharges('0.00');
     */

    public function GcApi_setDeliveryCharges($val)
    {
        $this->m_gcOrder['DeliveryCharges']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setDeliveryTaxes($val)
     * Example: GcApi_setDeliveryTaxes('0.00');
     */

    public function GcApi_setDeliveryTaxes($val)
    {
        $this->m_gcOrder['DeliveryTaxes']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setExtraFeeAmt($val)
     * Example: GcApi_setExtraFeeAmt('0.00');
     */

    public function GcApi_setExtraFeeAmt($val)
    {
        $this->m_gcOrder['ExtraFeeAmt']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setTotalTaxes($val)
     * Example: GcApi_setTotalTaxes('0.00');
     */

    public function GcApi_setTotalTaxes($val)
    {
        $this->m_gcOrder['TotalTaxes']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setTotal($val)
     * Example: GcApi_setTotal('29.10');
     */

    public function GcApi_setTotal($val)
    {
        $this->m_gcOrder['Total']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setVerifyType($val)
     * Example: GcApi_setVerifyType('');
     */

    public function GcApi_setVerifyType($val)
    {
        $this->m_gcOrder['VerifyType']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setPaymentStatus($val)
     * Example: GcApi_setPaymentStatus('');
     */

    public function GcApi_setPaymentStatus($val)
    {
        $this->m_gcOrder['PaymentStatus']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setCustName($val)
     * Example: GcApi_setCustName('Tom');
     */

    public function GcApi_setCustName($val)
    {
        $this->m_gcOrder['CustName']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setCustInfo($val)
     * Example: GcApi_setCustInfo('Address of the Customer');
     */

    public function GcApi_setCustInfo($val)
    {
        $this->m_gcOrder['CustInfo']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setCustPhone($val)
     * Example: GcApi_setCustPhone('00861234567890');
     */

    public function GcApi_setCustPhone($val)
    {
        $this->m_gcOrder['CustPhone']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setRequestTime($val)
     * Example: GcApi_setRequestTime('15:47 16-08-2018');
     */

    public function GcApi_setRequestTime($val)
    {
        $this->m_gcOrder['RequestTime']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setPreviousOrder($val)
     * Example: GcApi_setPreviousOrder('1005');
     */

    public function GcApi_setPreviousOrder($val)
    {
        $this->m_gcOrder['PreviousOrder']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setPaidType($val)
     * $val:
     * the parameter can be:
     * '1','2','3','4','5','6','7'
     * the parameter also can be:
     * 'Consegna','Collection','Reservation','Verified','Not verified','Order Paid','Order Not Paid'
     * Example: GcApi_setPaidType('7');
     */

    public function GcApi_setPaidType($val)
    {
        if (strlen($val) < 2) {
            $this->m_gcOrder['PaidType']['val'] = $this->GcApi_KeyStrReplace($val);
        } else {
            $translate = array(
                '1' => 'Consegna',
                '2' => 'Collection',
                '3' => 'Reservation',
                '4' => 'Verified',
                '5' => 'Not verified',
                '6' => 'Order Paid',
                '7' => 'Order Not Paid');
            foreach ($translate as $key => $value) {
                if (stripos($value, $val)) {
                    $this->m_gcOrder['PaidType']['val'] = $this->GcApi_KeyStrReplace($val);
                }
            }
        }
    }

    /*
     * GcApi_setPaymentInfo($val)
     * $val:
     * Example: GcApi_setPaymentInfo('cod:');
     */

    public function GcApi_setPaymentInfo($val)
    {
		if(isset($this->m_gcOrder['PaymentInfo'])){
		$this->m_gcOrder['PaymentInfo']['val']=$this->GcApi_KeyStrReplace($val);
		}
    }

    /*
     * GcApi_setPaymentCash($val)
     * Example: GcApi_setPaymentCash('3.00');
     */

    public function GcApi_setPaymentCash($val)
    {
        $this->m_gcOrder['PaymentCash']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    /*
     * GcApi_setComment($val)
     * Example: GcApi_setComment('comment');
     */

    public function GcApi_setComment($val)
    {
        $this->m_gcOrder['Comment']['val'] = $this->GcApi_KeyStrReplace($val);
    }

    public function GcApi_KeyStrReplace($str)
    {
        $newStr = str_replace(array("\r\n", "\r", "\n"), "%%", $str);
		return str_replace(array('#','*',';','\\','/'),array("\xEF\xB9\x9F","\xEF\xB9\xA1","\xEF\xB9\x94","\xEF\xB9\xA8","\xEF\xBC\x8F"), $newStr); 
    }


	public function GcApi_formatAmt($val,$currency)
	{
		$negative = $val<0;
		$float=floatval( $negative ? $val * -1 : $val );
		return $currency.number_format($float, 2);
	}
	public function GcApi_HttpC_Display($val,$bigfont)
	{
		$bigchar='';
		if($bigfont==1){
			$bigchar.="\\3";
		}
		return '#!*D*'.$bigchar.$val."\r\n";
		
	}
	public function GcApi_HttpC_Print($val,$bigfont)
	{
		$bigchar='';
		if($bigfont==1){
			$bigchar.="\\3";
		}
		return '#!*P*'.$bigchar.$val."\r\n";
		
	}
    //function do nothing
    public function GcApi_setDiscountCmmt($val)
    {
    }
}
