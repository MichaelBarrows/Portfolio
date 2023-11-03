<?php

namespace MichaelBarrows\Portfolio\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use MichaelBarrows\Portfolio\Http\Resources\EmploymentResource;
use MichaelBarrows\Portfolio\Models\Employment;
use MichaelBarrows\PortfolioShared\Http\Requests\EmploymentRequest;

class EmploymentController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return EmploymentResource::collection(
            Employment::all()
        );
    }

    public function create(EmploymentRequest $request): EmploymentResource
    {
        return new EmploymentResource(
            Employment::create($request->all())
        );
    }

    public function update(Employment $employment, EmploymentRequest $request): EmploymentResource
    {
        $employment->update($request->all());

        return new EmploymentResource(
            $employment
        );
    }

    public function delete(Employment $employment): JsonResponse
    {
        return response()->json([
            'success' => $employment->delete(),
        ]);
    }
}
