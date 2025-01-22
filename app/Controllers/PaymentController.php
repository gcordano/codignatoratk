<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

interface PaymentStrategy {
    public function pay(float $amount): string;
}

class CreditCardPayment implements PaymentStrategy {
    public function pay(float $amount): string {
        return "Paid $amount using Credit Card.";
    }
}

class PayPalPayment implements PaymentStrategy {
    public function pay(float $amount): string {
        return "Paid $amount using PayPal.";
    }
}

class PaymentContext {
    private PaymentStrategy $strategy;

    public function __construct(PaymentStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executePayment(float $amount): string {
        return $this->strategy->pay($amount);
    }
}

class PaymentController extends BaseController {
    public function pay() {
        $method = $this->request->getPost('method');
        $amount = (float)$this->request->getPost('amount');

        try {
            $strategy = match (strtolower($method)) {
                'creditcard' => new CreditCardPayment(),
                'paypal' => new PayPalPayment(),
                default => throw new \InvalidArgumentException("Payment method not supported."),
            };

            $context = new PaymentContext($strategy);
            return $this->response->setJSON([
                'message' => $context->executePayment($amount)
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'error' => $e->getMessage()
            ], ResponseInterface::HTTP_BAD_REQUEST);
        }
    }

    public function index() {
        return view('payments');
    }
}
