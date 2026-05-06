<?php

interface PaymentInterface {

    public function createPayment($order);

    public function handleReturn($request);
}
