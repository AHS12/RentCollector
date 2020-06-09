<?php

namespace App\Http\Traits;

trait NumericTrait
{
    /**
     * Add leading zeros to a number, if necessary
     *
     * @var int $value The number to add leading zeros
     * @var int $threshold Threshold for adding leading zeros (number of digits 
     *                     that will prevent the adding of additional zeros)
     * @return string
     */
    public function addLeadingZero($value, $threshold = 2)
    {
        return sprintf('%0' . $threshold . 's', $value);
    }
}
