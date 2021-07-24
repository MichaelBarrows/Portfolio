<?php

namespace App\Http\Controllers;

use App\Models\ProjectImage;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function show(ProjectImage $currentImage)
    {
        $maintenanceMode = SiteSetting::findOrFail(1);
        $currentImage = ProjectImage::findOrFail($id);
        $allImages = ProjectImage::where('project_id', $currentImage->project->id)
            ->pluck('id')
            ->toArray();
        $counter = "";
        for ($idx = 0; $idx < count($allImages); $idx++) {
            if ($currentImage->id == $allImages[$idx]) {
                if ($idx - 1 < 0) {
                    $prevImageId = 0;
                } else {
                    $prevImageId = $allImages[$idx - 1];
                }

                if ($idx + 1 >= count($allImages)) {
                    $nextImageId = 0;
                } else {
                    $nextImageId = $allImages[$idx + 1];
                }

                $counter = $idx + 1 . " / " . count($allImages);
                break;
            }
        }
        return view('pages.image', [
            'maintenance_mode' => $maintenanceMode,
            'prev_image_id' => $prev_imageId,
            'image' => $currentImage,
            'next_image_id' => $nextImageId,
            'counter' => $counter,
        ]);
    }
}
