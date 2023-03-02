<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EducationResource;
use App\Models\Education;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use MichaelBarrows\PortfolioShared\Http\Requests\EducationRequest;

class EducationController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return EducationResource::collection(
            Education::all()
        );
    }

    public function create(EducationRequest $request): EducationResource
    {
        return new EducationResource(
            Education::create($request->all())
        );
    }

    public function update(Education $education, EducationRequest $request): EducationResource
    {
        $education->update($request->all());

        return new EducationResource(
            $education
        );
    }

    public function delete(Education $education): JsonResponse
    {
        return response()->json([
            'success' => $education->delete(),
        ]);
    }
}
