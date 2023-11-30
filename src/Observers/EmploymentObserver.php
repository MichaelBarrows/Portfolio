<?php

namespace MichaelBarrows\Portfolio\Observers;

use MichaelBarrows\Portfolio\Models\Employment;
use MichaelBarrows\Portfolio\Traits\EncodesImages;

class EmploymentObserver
{
    use EncodesImages;

    public function saving(Employment $employment): void
    {
        $properties = $employment->properties;
        if ($properties['url']) {
            $properties['encoded_image'] = $this->encode($properties['url']);
            $employment->properties = $properties;
        }
    }
}
