<?php

require_once 'PaymentInterface.php';

class VnpayGateway implements PaymentInterface {

    protected $_vnpTmnCode = '';
    protected $_vnpHashSecret = '';
    protected $_vnpApiUrl = '';
    protected $_vnp_Returnurl = '';
    protected $_vnpTimeExpired;

    public function __construct() {
        $this->_vnpTmnCode = getenv('VNPAY_TMN_CODE');
        $this->_vnpHashSecret = getenv('VNPAY_HASH_SECRET');
        $this->_vnpApiUrl = getenv('VNPAY_API_URL');
        $this->_vnp_Returnurl = getenv('VNPAY_RETURN_URL');
        $this->_vnpTimeExpired = date('YmdHis', strtotime("+ " . getenv('VNPAY_TIME_EXPIRED') . ' minute'));
    }

    public function createPayment($params = array()) {
        $vnp_TxnRef = $params['tranId']; //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $params['amount']; // Số tiền thanh toán
        $vnp_Locale = $params['language']; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = $params['bankCode']; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $this->_vnpTmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
            "vnp_OrderType" => 'billpayment',//"other",
            "vnp_ReturnUrl" => $this->_vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $this->_vnpTimeExpired,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

//echo $this->_vnpApiUrl;
        $this->_vnpApiUrl = $this->_vnpApiUrl . "?" . $query;
        if (isset($this->_vnpHashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $this->_vnpHashSecret); //  
            $this->_vnpApiUrl .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return $this->_vnpApiUrl;
    }

    public function handleReturn($request) {
        // verify checksum, xử lý kết quả
        return $request;
    }
}
