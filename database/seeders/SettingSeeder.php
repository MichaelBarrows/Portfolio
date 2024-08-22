<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::factory()->create([
            'key' => 'show-currently-playing',
            'type' => 'bool',
            'value' => 'true',
        ]);

        Setting::factory()->create([
            'key' => 'open-to-opportunities',
            'type' => 'bool',
            'value' => 'false',
        ]);

        Setting::factory()->create([
            'key' => 'currently-working-at',
            'type' => 'array',
            'value' => json_encode([
                'text' => 'Workplace',
                'primary-color' => '#000000',
                'secondary-color' => '#FFFFFF',
                'url' => 'https://michaelbarrows.com',
                'image' => '',
            ]),
        ]);
    }
}
