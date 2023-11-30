<?php

namespace MichaelBarrows\Portfolio\Traits;

trait EncodesImages
{
    public function encode(string $url): string
    {
        return base64_encode(file_get_contents($url));
    }
}
