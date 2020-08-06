<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusPegawai extends Enum
{
    const PNS       =   1;
    const Honorer   =   2;
    const Kontrak   =   3;
}
