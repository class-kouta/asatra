<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PostListType extends Enum
{
    const MY_POST = 0;
    const MY_NICE = 1;
    const MY_COMMENT = 2;
    const MY_DRAFT = 3;
}
