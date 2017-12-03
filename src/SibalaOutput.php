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
            case 2:
                break;
            default:
                $result = array_count_values([$one, $two, $three, $four]);
                $result = $this->array_sort($result);
                $keys = array_keys($result);
                return ($keys[0] + $keys[1]) . ' points';
                break;
        }
    }

    private function array_sort($array, $type = 'asc')
    {
        $result = array();
        foreach ($array as $var => $val) {
            $set = false;
            foreach ($result as $var2 => $val2) {
                if ($set == false) {
                    if ($val > $val2 && $type == 'desc' || $val < $val2 && $type == 'asc') {
                        $temp = array();
                        foreach ($result as $var3 => $val3) {
                            if ($var3 == $var2) {
                                $set = true;
                            }
                            if ($set) {
                                $temp[$var3] = $val3;
                                unset($result[$var3]);
                            }
                        }
                        $result[$var] = $val;
                        foreach ($temp as $var3 => $val3) {
                            $result[$var3] = $val3;
                        }
                    }
                }
            }
            if (!$set) {
                $result[$var] = $val;
            }
        }
        return $result;
    }
}


