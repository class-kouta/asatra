<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PostStatusType extends Enum
{
    const PUBLISHED = 0;
    const SECRET = 1;
    const DRAFT = 2;

    public static function getDescription($value): string
    {
        if ($value === self::PUBLISHED) {
            return '公開';
        }

        if ($value === self::SECRET) {
            return '非公開';
        }

        if ($value === self::DRAFT) {
            return '下書き';
        }

        return parent::getDescription($value);
    }

    public static function getValue(string $key)
    {
        if ($key === '公開') {
            return self::PUBLISHED;
        }

        if ($key === '非公開') {
            return self::SECRET;
        }

        if ($key === '下書き') {
            return self::DRAFT;
        }

        return parent::getValue($key);
    }
}
