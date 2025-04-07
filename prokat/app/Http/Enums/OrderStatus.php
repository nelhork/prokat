<?php

namespace App\Enums;

enum OrderStatus: int
{
    case Created = 1;
    case Issued = 2;
    case Returned = 3;
}
