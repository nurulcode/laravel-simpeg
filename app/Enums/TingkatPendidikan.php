<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TingkatPendidikan extends Enum
{
    const SD ='SD';
    const SMD = 'SMP';
    const SMA = 'SMA';
    const S1 = 'S1';
    const S2 = 'S2';
    const S3 = 'S3';
    const Tidak = 'Tidak Sekolah';
}
