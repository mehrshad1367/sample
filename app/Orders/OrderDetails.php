<?php


namespace App\Orders;


use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGatewayContract;

class OrderDetails
{
    /**
     * @var BankPaymentGateway
     */
    private $paymentGateway;

    public function __construct(PaymentGatewayContract $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function all()
    {
        $this->paymentGateway->setDiscount(500);

        return [
            'name'=> 'Mehrshad',
            'address'=> 'Tehran-Iran'
        ];
    }
}
