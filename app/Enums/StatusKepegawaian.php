<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusKepegawaian extends Enum
{
    const PNS       =   'PNS';
    const PTT       =   'PTT';
    const Honorer   =   'Honorer';
    const Kontrak   =   'Kontrak';
}
