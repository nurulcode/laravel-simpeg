<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class KeluargaStatus extends Enum
{
    const OrangTua =   1;
    const SuamiIstri =   2;
    const Anak = 3;
}
