<?php

namespace App\Http\Controllers;

use App\Models\ProjectImage;
use App\Models\SiteSetting;
use Illuminate\View\View;

class ImagesController extends Controller
{
    public function show(ProjectImage $image): View
    {
        $allImages = ProjectImage::whereProjectId($image->project->id)
            ->pluck('id')
            ->toArray();

        $counter = "";

        for ($idx = 0; $idx < count($allImages); $idx++) {
            if ($image->id == $allImages[$idx]) {
                $prevImageId = $idx - 1 < 0 ? 0 : $allImages[$idx - 1];
                $nextImageId = $idx + 1 >= count($allImages) ? 0 : $allImages[$idx + 1];
                $counter = $idx + 1 . " / " . count($allImages);
                break;
            }
        }

        return view('pages.image', [
            'maintenance_mode' => SiteSetting::findOrFail(SiteSetting::MAINTENANCE_MODE),
            'prev_image_id' => $prevImageId,
            'image' => $image,
            'next_image_id' => $nextImageId,
            'counter' => $counter,
        ]);
    }
}
