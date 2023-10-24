<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Data;

use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

class Reference extends Data
{
    public function __construct(
        public string $alias,
        public string $url,
        public string $type,
        public string $previewPriority,
        public string $lastModifiedDateTime,
        public string $lastModifiedByUserId,
    ) {
    }

    public static function fromData(string $key, array $data): self
    {
        return new static(
            alias: Arr::get($data, 'alias'),
            url: $key,
            type: Arr::get($data, 'type'),
            previewPriority: Arr::get($data, 'previewPriority'),
            lastModifiedDateTime: Arr::get($data, 'lastModifiedDateTime'),
            lastModifiedByUserId: Arr::get($data, 'lastModifiedBy.user.id'),
        );
    }
}
