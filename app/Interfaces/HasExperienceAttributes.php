<?php

namespace App\Interfaces;

interface HasExperienceAttributes
{
    public function getOrganisationAttribute(): string;
    public function getPositionAttribute(): string;
    public function getTypeAttribute(): string;
}
