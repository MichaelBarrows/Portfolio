<?php

namespace App\Http\Controllers\Api\Internal;

use App\Helpers\Version;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    public function __construct(public Version $version)
    {
    }

    public function __invoke(Request $request)
    {
        return response()->json([
            'api' => $this->version->getApiVersion(),
            'fe' =>  $this->version->getFEVersion(),
        ]);
    }
}
