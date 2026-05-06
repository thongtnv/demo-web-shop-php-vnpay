<?php

require_once 'VnpayGateway.php';
require_once 'EpayGateway.php';

class PaymentFactory {

    public function getGateway() {
        $gateway = getenv('PAYMENT_GATEWAY_LINK_DEFAULT_ACTIVE');
        if (isset($_REQUEST['service_code']) && !empty($_REQUEST['service_code'])) {
            $inputs = array(
                'service_code' => $_REQUEST['service_code'],
            );
            $gateway = $this->__getGateway($inputs);
        }
        switch (trim(strtolower($gateway))) {
            case 'vnpay':
                return new VnpayGateway();
            case 'epay':
                return new EpayGateway();
            default:
                throw new Exception("Gateway không hợp lệ");
        }
    }

    protected function __getGateway($params) {
        if (isset($params['service_code']) && !empty($params['service_code'])) {
            $gateway = getenv('SERVICE_DEFAULT_PAYMENT_GATEWAY');
            if (isset($gateway) && !empty($gateway)) {
                if (!empty(getenv(trim(strtoupper($params['service_code']))))) {
                    $gateway = getenv(trim(strtoupper($params['service_code'])));
                }

                switch ($params['service_code']) {
                    case "TRANSFER":
                        break;
                    case "BILL":
                        break;
                    case "TOPUP":
                        break;
                    default:
                        break;
                }

                return $gateway;
            }
        }

        return false;
    }
}
