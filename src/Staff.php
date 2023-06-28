<?php

namespace Ziekenhuis;

abstract class Staff extends Person
{
    protected static float $salary = 0.0;
    protected array $appointments = [];

    public function __construct(string $name)
    {
        parent::__construct($name, $this->getRole());
    }

    public function setSalary(float $salary): void
    {
        static::$salary = $salary;
    }

    public function getSalary(): float
    {
        return static::$salary;
    }

    public function addAppointment(Appointment $appointment): void
    {
        $this->appointments[] = $appointment;
    }

    public function getAppointments(): array
    {
        return $this->appointments;
    }

    abstract protected function getRole(): string;
}
