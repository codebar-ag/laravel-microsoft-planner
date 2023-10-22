<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Data;

use Spatie\LaravelData\Data;

class Details extends Data
{
    public function __construct(
        public string $description,
        public Note $notes,
        public array $checklist,
    ) {}
}
