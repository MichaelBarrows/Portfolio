<?php

namespace App\Traits\Filament;

trait TextTransformer
{
    public function openLinksInNewTabs(string $text): string
    {
        return str_replace(
            search: '<a ',
            replace: '<a target="_blank" ',
            subject: $text,
        );
    }
}
