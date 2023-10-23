<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Data;

use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;
use Saloon\Http\Response;

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

    public static function fromData(string $key, array $data): self
    {
        return new static(
            id: $key,
            isChecked: Arr::get($data, 'isChecked'),
            title: Arr::get($data, 'title'),
            orderHint: Arr::get($data, 'orderHint'),
            lastModifiedDateTime: Arr::get($data, 'lastModifiedDateTime'),
            lastModifiedByUserId: Arr::get($data, 'lastModifiedBy.user.id'),
        );
    }
}
