<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Data;

use Spatie\LaravelData\Data;

class Attachment extends Data
{
    public function __construct(
        public string $id,
        public string $type,
        public string $title,
        public string $url,
        public string $lastModifiedDateTime,
        public string $lastModifiedByUserId,
    ) {
    }
}
