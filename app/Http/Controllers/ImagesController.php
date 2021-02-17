<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectImage;
use App\Models\SiteSetting;
class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
        return view ('pages.image', [
            'maintenance_mode' => $maintenance_mode,
            'prev_image_id' => $prev_image_id,
            'image' => $current_image,
            'next_image_id' => $next_image_id,
            'counter' => $counter
        ]);

        $images = $current_image->project->project_images;
        foreach ($images as $image) {
            if ($exit == True) {
                $next_image_id = $image->id;
                break;
            }
            if ($image->id == $id) {
                $exit = True;
            } else {

            }
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
