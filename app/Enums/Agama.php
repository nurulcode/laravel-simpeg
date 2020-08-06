<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Agama extends Enum
{
    const Islam     = 1;
    const Protestan = 2;
    const Katolik   = 3;
    const Hindu     = 4;
    const Buddha    = 5;
    const Khonghucu = 6;
    const Lain      = 7;
}
