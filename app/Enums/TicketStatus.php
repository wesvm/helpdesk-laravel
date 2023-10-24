<?php

namespace App\Enums;

use ReflectionClass;

class TicketStatus
{
    const ABIERTO = 'Abierto';
    const CERRADO = 'Cerrado';
    const EN_PROGRESO = 'En progreso';
    const PENDIENTE = 'Pendiente';

    public static function classConstants()
    {
        return (new ReflectionClass(__CLASS__))->getConstants();
    }
}
