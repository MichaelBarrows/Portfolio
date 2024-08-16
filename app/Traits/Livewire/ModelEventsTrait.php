<?php

namespace App\Traits\Livewire;

trait ModelEventsTrait
{
    public array $refreshModelFields;

    public function modelCreated()
    {
        $this->getData();
    }

    public function modelUpdated(string $key, array $event)
    {
        if ($this->data->has($key)) {
            if (array_key_exists('filtered', $event)) {
                return $this->data[$key]->refresh();
            }

            foreach ($this->refreshModelFields as $field) {
                if (array_key_exists($field, $event)) {
                    return $this->data[$key]->refresh();
                }
            }

            return $this->data[$key]->fill($event);
        }

        return $this->getData();
    }

    public function modelDeleted(string $key, array $event)
    {
        $this->data->forget($key);
    }
}
