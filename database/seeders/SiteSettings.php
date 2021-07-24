<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_settings')->insert([
            [
                'id' => 1,
                'name' => 'maintenance_mode',
                'value' => false,
            ],
            [
                'id' => 2,
                'name' => 'allow_emails',
                'value' => true,
            ],
        ]);
    }
}
