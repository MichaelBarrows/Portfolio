<?php

namespace App\Enums;

use Illuminate\Support\Str;

enum TechStack: string
{
    case PHP = 'php';
    case LARAVEL = 'laravel';
    case JAVASCRIPT = 'javascript';
    case JQUERY = 'jquery';
    case REACT = 'react';
    case VUE = 'vue';
    case NUXT = 'nuxt';
    case PYTHON = 'python';
    case NLP = 'natural-language-processing';
    case ML = 'machine-learning';
    case FLASK = 'flask';
    case API = 'api';

    public function getName(): string
    {
        return match($this) {
            self::PHP => 'PHP',
            self::JAVASCRIPT => 'JavaScript',
            self::JQUERY => 'JQuery',
            self::API => 'API',
            default => Str::title(Str::replace('-', ' ', $this->value))
        };
    }

    public function isLong(): bool
    {
        return strlen($this->getName()) >= 10;
    }

    public function getIdentifier(): string
    {
        return $this->value;
    }

    public function getShortName(): ?string
    {
        return match($this) {
            self::JAVASCRIPT => 'JS',
            self::NLP => 'NLP',
            self::ML => 'ML',
            default => null
        };
    }
}
