<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectImage;
use App\Models\SiteSetting;

class ImagesController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maintenance_mode = SiteSetting::findOrFail(1);
        $current_image = ProjectImage::findOrFail($id);
        $all_images = ProjectImage::where('project_id', $current_image->project->id)->pluck('id')->toArray();
        $counter = "";
        for ($idx = 0; $idx < count($all_images); $idx++) {
            if ($current_image->id == $all_images[$idx]) {
                if ($idx - 1 < 0) {
                    $prev_image_id = 0;
                } else {
                    $prev_image_id = $all_images[$idx - 1];
                }

                if ($idx + 1 >= count($all_images)) {
                    $next_image_id = 0;
                } else {
                    $next_image_id = $all_images[$idx + 1];
                }

                $counter = $idx + 1 . " / " . count($all_images);
                break;
            }
        }
        return view('pages.image', [
            'maintenance_mode' => $maintenance_mode,
            'prev_image_id' => $prev_image_id,
            'image' => $current_image,
            'next_image_id' => $next_image_id,
            'counter' => $counter
        ]);
    }
}
