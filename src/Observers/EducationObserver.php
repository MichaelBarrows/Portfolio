<?php

namespace MichaelBarrows\Portfolio\Observers;

use MichaelBarrows\Portfolio\Models\Education;
use MichaelBarrows\Portfolio\Traits\EncodesImages;

class EducationObserver
{
    use EncodesImages;

    public function saving(Education $education): void
    {
        $properties = $education->properties;
        if ($properties['url']) {
            $properties['encoded_image'] = $this->encode($properties['url']);
            $education->properties = $properties;
        }
    }
}
