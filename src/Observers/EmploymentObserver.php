<?php

namespace MichaelBarrows\Portfolio\Observers;

use MichaelBarrows\Portfolio\Models\Employment;
use MichaelBarrows\Portfolio\Traits\EncodesImages;

class EmploymentObserver
{
    use EncodesImages;

    public function saving(Employment $employment): void
    {
        if ($employment->isDirty('properties') && ! empty($employment->properties['encoded_image'])) {
            $properties = $employment->properties;
            $properties['encoded_image'] = $this->encode($properties['url']);
            $employment->properties = $properties;
        }
    }
}
