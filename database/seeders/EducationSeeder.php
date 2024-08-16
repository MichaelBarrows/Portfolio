<?php

namespace Database\Seeders;

use App\Enums\TechStack;
use App\Models\Education;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        Http::acceptJson()
            ->get('https://api.michaelbarrows.com/education')
            ->collect('data')
            ->reverse()
            ->each(function ($record) {
                unset($record['id']);

                if (!empty($record['properties']['image'])) {
                    $encodedImage = explode('base64,',$record['properties']['image']);
                    $record['properties']['encoded_image'] = end($encodedImage);
                    $record['properties']['prefix'] = 'data:image/jpg;base64,';

                    unset($record['properties']['image']);
                }

                $record['tech_stack'] = collect($record['tech_stack'])
                    ->map(fn ($ts) => TechStack::tryFrom($ts['id']));

                Education::factory()->create($record);
            });

    }
}
