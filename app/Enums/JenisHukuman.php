<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class JenisHukuman extends Enum
{
    const Lisan = 'Teguran Lisan';
    const Tertulis = 'Teguran Tertulis';
    const Berkala = 'Tunda Kenaikan Berkala';
    const Pangkat = 'Tunda Kenaikan Pangkat';
    const Berhenti = 'Pemberhentian';
}
