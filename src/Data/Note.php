<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Data;

use Spatie\LaravelData\Data;

class Note extends Data
{
    public function __construct(
        public string $id,
        public string $contentType,
        public string $content,
    ) {}
}
