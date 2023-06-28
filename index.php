<?php

require 'vendor/autoload.php';

use Ziekenhuis\Patient;
use Ziekenhuis\Doctor;
use Ziekenhuis\Nurse;
use Ziekenhuis\Appointment;


$patient1 = new Patient("John Doe", "Patient");
$patient2 = new Patient("Gary Landon", "Patient");
$patient3 = new Patient("Charlie Stores", "Patient");
$patient4 = new Patient("Calvin Camstar", "Patient");
$patient5 = new Patient("Lara Individua", "Patient");


$doctor = new Doctor("Dr. Smith");


$nurse1 = new Nurse("Nurse 1");
$nurse2 = new Nurse("Nurse 2");


$doctor->setSalary(150);
$nurse1->setSalary(150);
$nurse2->setSalary(150);


$appointments = [];


$appointment1 = new Appointment();
$appointment1->setAppointment($patient1, $doctor, [], new DateTime('2023-06-10 09:00:00'), new DateTime('2023-06-10 10:00:00'));
$doctor->addAppointment($appointment1);
$appointments[] = $appointment1;

$appointment2 = new Appointment();
$appointment2->setAppointment($patient2, $doctor, [$nurse1], new DateTime('2023-06-12 11:00:00'), new DateTime('2023-06-12 12:00:00'));
$doctor->addAppointment($appointment2);
$appointments[] = $appointment2;

$appointment3 = new Appointment();
$appointment3->setAppointment($patient3, $doctor, [$nurse1, $nurse2], new DateTime('2023-06-15 14:00:00'), new DateTime('2023-06-15 15:00:00'));
$doctor->addAppointment($appointment3);
$appointments[] = $appointment3;

$appointment4 = new Appointment();
$appointment4->setAppointment($patient4, $doctor, [], new DateTime('2023-06-18 16:00:00'), new DateTime('2023-06-18 17:00:00'));
$doctor->addAppointment($appointment4);
$appointments[] = $appointment4;

$appointment5 = new Appointment();
$appointment5->setAppointment($patient5, $doctor, [], new DateTime('2023-06-20 10:00:00'), new DateTime('2023-06-20 11:00:00'));
$doctor->addAppointment($appointment5);
$appointments[] = $appointment5;


foreach ($appointments as $appointment) {
    displayAppointment($appointment);
}

function displayAppointment(Appointment $appointment)
{
    echo "<table>";
    echo "<tr><td>Patient:</td><td>{$appointment->getPatient()->getName()}</td></tr>";
    echo "<tr><td>Doctor:</td><td>{$appointment->getDoctor()->getName()}</td></tr>";
    echo "<tr><td>Nurses:</td><td>";
    foreach ($appointment->getNurses() as $nurse) {
        echo "{$nurse->getName()} ";
    }
    echo "</td></tr>";
    echo "<tr><td>Start Time:</td><td>{$appointment->getBeginTime()->format('Y-m-d H:i:s')}</td></tr>";
    echo "<tr><td>End Time:</td><td>{$appointment->getEndTime()->format('Y-m-d H:i:s')}</td></tr>";
    echo "<tr><td>Cost:</tr></td>";
}
