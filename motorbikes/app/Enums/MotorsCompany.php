<?php

namespace App\Enums;


use Illuminate\Validation\Rules\Enum as RulesEnum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MotorsCompany extends RulesEnum
{
    const Honda =   0;
    const Kawasaki =   1;
    const Suzuki = 2;
    const Yamaha = 3;
}
