<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderStatus extends Enum
{
    const DONE = 0;
    const ACTIVE = 1;
    const PREPARING = 2;
    const SENDING = 3;
    const DELETED = 4;

}
