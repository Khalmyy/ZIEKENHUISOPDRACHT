<?php

namespace Ziekenhuis;

class Doctor extends Staff
{
    protected string $role = 'Doctor';
    protected static float $salary;

    public function calculateSalary(): float
    {
        $hoursWorked = $this->getHoursWorked();
        return $hoursWorked * static::$salary;
    }

    protected function getRole(): string
    {
        return $this->role;
    }

    private function getHoursWorked(): float
    {
        $appointments = $this->getAppointments();
        $totalHours = 0;

        foreach ($appointments as $appointment) {
            $beginTime = $appointment->getBeginTime();
            $endTime = $appointment->getEndTime();

            $diff = $endTime->diff($beginTime);

            $hours = $diff->h + ($diff->i / 60) + ($diff->s / 3600);
            $totalHours += $hours;
        }

        return $totalHours;
    }
}
