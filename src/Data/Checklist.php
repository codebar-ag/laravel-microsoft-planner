<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Data;

use Spatie\LaravelData\Data;

class Checklist extends Data
{
    public function __construct(
        public string $id,
        public bool $isChecked,
        public string $title,
        public string $orderHint,
        public string $lastModifiedDateTime,
        public string $lastModifiedByUserId,
    ) {}
}
