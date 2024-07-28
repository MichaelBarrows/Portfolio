<?php

namespace App\Actions\Setting;

use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;

class CreateSettingAction
{
    public function execute(array $args): Setting
    {
        if ($args['type'] == 'encrypted') {
            $args['value'] = Crypt::encrypt($args['value']);
        }

        return Setting::create($args);
    }
}
