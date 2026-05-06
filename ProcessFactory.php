<?php

require_once 'config.php';
require_once 'payments/PaymentFactory.php';

class ProcessFactory {

    protected $_dataCallback;
    protected $_dataReturn = array();

    public function getLink() {
        $tranId = 'DH' . date('ymdHi') . rand(100000, 999999);
        $params = array(
            'tranId' => $tranId,
            'amount' => $_POST['amount'], // Số tiền thanh toán
            'language' => $_POST['language'], //Ngôn ngữ chuyển hướng thanh toán
            'bankCode' => $_POST['bankCode'], //Mã phương thức thanh toán
        );
        $gateway = (new PaymentFactory)->getGateway();
        $paymentUrl = $gateway->createPayment($params);

        return $paymentUrl;
    }

    public function callback($pCode, $params) {
        $pCode = !empty($pCode) ? trim(strtoupper($pCode)) : '';
        $this->_dataCallback = !empty($params) ? $params : array();
        switch ($pCode) {
            case 'VNPAY':
                $this->_dataReturn = $this->_vnptCallback();
                break;
            default :
                break;
        }

        return $this->_dataReturn;
    }

    protected function _vnptCallback() {
        $vnp_HashSecret = getenv('VNPAY_HASH_SECRET');

        $vnp_SecureHash = $this->_dataCallback['vnp_SecureHash'];
        $inputData = array();
        foreach ($this->_dataCallback as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        if ($secureHash == $vnp_SecureHash) {
            return $inputData;
        }

        return false;
    }
}
