<?php

namespace App\Support;

class Duration
{
    public function __construct(private int $value)
    {
    }

    public function humanize(): string
    {
        $output = '';
        $minutes = $this->value;
        $hours = 0;

        if ($minutes >= 60) {
            $hours = (int)floor($minutes / 60);
            $minutes = (int)($minutes - ($hours * 60));
        }

        if ($minutes > 0 || $hours === 0) {
            $output = $minutes . 'm ';
        }

        if ($hours > 0) {
            $output = $hours . 'h ' . $output;
        }

        return trim($output);
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public static function fromMinutes(int $minutes): static
    {
        return new static($minutes);
    }
}
