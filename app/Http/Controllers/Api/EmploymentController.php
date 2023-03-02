<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmploymentResource;
use App\Models\Employment;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
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
}
