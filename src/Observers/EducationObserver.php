<?php

namespace MichaelBarrows\Portfolio\Observers;

use MichaelBarrows\Portfolio\Models\Education;
use MichaelBarrows\Portfolio\Traits\EncodesImages;

class EducationObserver
{
    use EncodesImages;

    public function saving(Education $education): void
    {
        if ($education->isDirty('properties') && ! empty($education->properties['encoded_image'])) {
            $properties = $education->properties;
            $properties['encoded_image'] = $this->encode($properties['url']);
            $education->properties = $properties;
        }
    }
}
