<?php

namespace App\Actions\Setting;

use App\Events\Settings\SettingUpdated;
use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;

class UpdateSettingAction
{
    public function execute(Setting $setting, array $args): Setting
    {

        if ($args['type'] == 'encrypted') {
            $args['value'] = Crypt::encrypt($args['value']);
        } else if ($args['type'] == 'bool') {
            $args['value'] = $args['value'] ? 'true' : 'false';
        }

        $setting->fill($args);

        $setting->save();

        if ($setting->type != 'encrypted') {
            SettingUpdated::dispatch($setting);
        }

        return $setting;
    }
}
