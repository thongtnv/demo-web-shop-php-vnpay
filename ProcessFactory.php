<?php

require_once 'config.php';
require_once 'payments/PaymentFactory.php';

class ProcessFactory {

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
}
