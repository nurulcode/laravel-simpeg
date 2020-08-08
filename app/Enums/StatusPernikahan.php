<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusPernikahan extends Enum
{
    const Menikah = 'Menikah';
    const Belum = 'Belum Menikah';
    const Cerai = 'Cerai';
}
