<?php

namespace Ziekenhuis;

class Appointment
{
    private Patient $patient;
    private Doctor $doctor;
    private array $nurses;
    private \DateTime $beginTime;
    private \DateTime $endTime;
    private static int $count = 0;
    protected static array $appointments = [];

    public function setAppointment(Patient $patient, Doctor $doctor, array $nurses, \DateTime $beginTime, \DateTime $endTime): void
    {
        $this->patient = $patient;
        $this->doctor = $doctor;
        $this->nurses = $nurses;
        $this->beginTime = $beginTime;
        $this->endTime = $endTime;
        self::$count++;
        self::$appointments[] = $this;
    }

    public function addNurse(Nurse $nurse): void
    {
        $this->nurses[] = $nurse;
    }

    public function getDoctor(): Doctor
    {
        return $this->doctor;
    }

    public function getPatient(): Patient
    {
        return $this->patient;
    }

    public function getNurses(): array
    {
        return $this->nurses;
    }

    public function getBeginTime(): string
    {
        return $this->beginTime->format('Y-m-d H:i:s');
    }

    public function getEndTime(): string
    {
        return $this->endTime->format('Y-m-d H:i:s');
    }

    public function getTimeDifference(): float
    {
        $diff = $this->endTime->diff($this->beginTime);
        return $diff->h + ($diff->i / 60) + ($diff->s / 3600);
    }

    public function getCosts(): float
    {
        $doctorSalary = $this->doctor->calculateSalary();
        $nurseSalaries = array_map(fn($nurse) => $nurse->calculateSalary(), $this->nurses);
        $totalSalary = $doctorSalary + array_sum($nurseSalaries);
        return $totalSalary;
    }

    public function getHoursWorked(): float
    {
        return $this->getTimeDifference();
    }
}
