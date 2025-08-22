<?php

namespace Tests\Unit;

use App\Service\Car\Enums\Color;
use Tests\TestCase;

class ColorEnumTest extends TestCase
{
    public function test_it_returns_english_label_by_default(): void
    {
        app()->setLocale('en');

        $this->assertSame('Black', Color::BLACK->label());
        $this->assertSame('Pearl', Color::PEARL->label());
    }

    public function test_it_returns_russian_label_when_locale_ru(): void
    {
        app()->setLocale('ru');

        $this->assertSame('Черный', Color::BLACK->label());
        $this->assertSame('Жемчужный', Color::PEARL->label());
        $this->assertSame('Темно-синий', Color::NAVY->label());
    }
}
