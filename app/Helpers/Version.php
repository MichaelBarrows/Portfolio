<?php

namespace App\Helpers;

class Version
{
    public function getApiVersion(): string
    {
        return json_decode(
            file_get_contents(
                config('version.api-path')
            )
        )
        ->version;
    }

    public function getFEVersion(): string
    {
        return json_decode(
            file_get_contents(
                base_path(config('version.fe-path'))
            )
        )
        ->version;
    }
}
