<?php

namespace App\Actions\Setting;

use App\Models\Setting;
use App\Repositories\SettingRepository;
use Illuminate\Support\Collection;

class GetSettingWithDefaultAction
{
    public function __construct(
        private SettingRepository $settingRepository,
    ) {
    }

    public function execute(array $keys): Collection
    {
        $settings = $this->settingRepository->getQueryBuilder()
            ->whereIn('key', $keys)
            ->get()
            ->keyBy('key');

        collect($keys)->each(function ($key) use (&$settings) {
            if ($settings->has($key)) {
                return;
            }

            $settings->put(
                key: $key,
                value: new Setting([
                    'key' => $key,
                    ...config("settings.defaults.{$key}"),
                ]),
            );
        });

        return $settings;
    }
}
