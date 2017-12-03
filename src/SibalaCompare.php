<?php

namespace JoeyDojo;

use UnexpectedValueException;

class SibalaCompare
{
    const STATE_SAME_COLOR = 0;
    const STATE_NO_POINT = 1;
    const STATE_WITH_NUMBER = 2;

    private $sibalaSet = [];

    static private $validSibalaInput = ['name', 'number', 'state'];

    public function setSibala(array $sibala): SibalaCompare
    {
        if (!array_has($sibala, self::$validSibalaInput))
        {
            throw new UnexpectedValueException(
                'Missing index of sibala input: ' .
                implode(',', self::$validSibalaInput)
            );
        }

        $this->sibalaSet[] = $sibala;
        return $this;
    }

    public function compare(): array
    {
        usort($this->sibalaSet, [$this, 'compareNumber']);
        return array_pluck($this->sibalaSet, 'name');
    }

    public function compareNumber(array $a, array $b): bool
    {
        if (array_get($a, 'state') === self::STATE_WITH_NUMBER
            && array_get($a, 'state') === self::STATE_WITH_NUMBER) {
            return array_get($a, 'number') <= array_get($b, 'number');
        }
    }
}
