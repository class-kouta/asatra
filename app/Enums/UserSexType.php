<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserSexType extends Enum
{
    const MALE = '1';
    const FEMALE = '2';
    const NOT_APPLICABLE = '9';
}
