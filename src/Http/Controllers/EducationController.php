<?php

namespace MichaelBarrows\Portfolio\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use MichaelBarrows\Portfolio\Http\Resources\EducationResource;
use MichaelBarrows\Portfolio\Models\Education;
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
