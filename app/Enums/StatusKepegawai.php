<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusKepegawai extends Enum
{
    const PNS       =   1;
    const PTT       =   2;
    const Honorer   =   3;
    const Kontrak   =   4;
}
