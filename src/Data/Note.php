<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Data;

use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

class Note extends Data
{
    public function __construct(
        public string $contentType,
        public string $content,
    ) {
    }

    public static function fromData(array $data): self
    {
        return new static(
            contentType: Arr::get($data, 'contentType'),
            content: Arr::get($data, 'content'),
        );
    }
}
