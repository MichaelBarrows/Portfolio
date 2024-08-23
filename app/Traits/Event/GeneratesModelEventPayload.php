<?php

namespace App\Traits\Event;

trait GeneratesModelEventPayload
{
    public function getPayload(int $id, array $data, array $filterableKeys = [], string $type = null): array
    {
        $payload = [];

        $payload['id'] = $id;

        if ($type) {
            $payload['type'] = $type;
        }

        if (array_key_exists('tech_stack', $data) && is_array($data['tech_stack'])) {
            $data['tech_stack'] = collect($data['tech_stack']);
        }

        foreach ($filterableKeys as $filterableKey) {
            if (array_key_exists($filterableKey, $data)) {
                $payload['filtered'] = true;

                return $payload;
            }
        }

        $payload = array_merge($payload, $data);

        return $payload;
    }
}
