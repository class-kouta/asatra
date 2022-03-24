<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SortType extends Enum
{
    const LATEST = 1;
    const OLDEST = 2;
    const NICE_DESC = 3;
}
