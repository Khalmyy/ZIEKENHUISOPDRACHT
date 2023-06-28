<?php

namespace Ziekenhuis;

class Patient extends Person
{
    private float $payment;

    public function __construct(string $name, string $role, float $payment)
    {
        parent::__construct($name, $role);
        $this->payment = $payment;
    }

    public function getPayment(): float
    {
        return $this->payment;
    }

    protected function getRole(): string
    {
        return $this->role;
    }
}
