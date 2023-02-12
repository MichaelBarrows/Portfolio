<?php

namespace App\Http\Controllers\Api\Internal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegenerateTokenController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $token = $request->user()->currentAccessToken();

        $newToken = $request->user()->createToken($token->name);

        $token->delete();

        return response()->json([
            'token' => $newToken->plainTextToken,
        ]);
    }
}
