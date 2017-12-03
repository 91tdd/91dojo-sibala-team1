<?php

namespace JoeyDojo;

class SibalaOutput
{
    public function calculator($one , $two, $three, $four)
    {
        $unique = collect([$one , $two, $three, $four])->unique()->count();
        switch ($unique) {
            case 4:
                return 'no points';
                break;
            case 1:
                return 'same color';
                break;
            default:
                break;
        }


    }
}
