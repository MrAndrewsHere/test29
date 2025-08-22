<?php

namespace App\Service\Car\Enums;

/**
 * Enum representing common car colors
 */
enum Color: string
{
    case BLACK = 'black';
    case WHITE = 'white';
    case SILVER = 'silver';
    case GRAY = 'gray';
    case RED = 'red';
    case BLUE = 'blue';
    case BROWN = 'brown';
    case GREEN = 'green';
    case BEIGE = 'beige';
    case ORANGE = 'orange';
    case GOLD = 'gold';
    case YELLOW = 'yellow';
    case PURPLE = 'purple';
    case BURGUNDY = 'burgundy';
    case NAVY = 'navy';
    case BRONZE = 'bronze';
    case CHAMPAGNE = 'champagne';
    case COPPER = 'copper';
    case CHARCOAL = 'charcoal';
    case PEARL = 'pearl';

    private const TRANSLATION_PREFIX = 'enums.color.';

    public function label(): string
    {
        $translated = __($this->translationKey());

        if ($translated === $this->translationKey()) {
            return $this->defaultLabel();
        }

        return (string) $translated;
    }

    private function defaultLabel(): string
    {
        return ucfirst(strtolower($this->value));
    }

    public function translationKey(): string
    {
        return self::TRANSLATION_PREFIX.$this->value;
    }

    public static function random(): self
    {
        return collect(self::cases())->random();
    }
}
