<?php

namespace App\Http\Controllers;

use App\Http\Resources\FarmsResource;
use App\Services\FarmService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

class FarmController extends Controller
{
    private FarmService $farmService;

    public function __construct(FarmService $farmService)
    {
        $this->farmService = $farmService;
    }

    public function index(): AnonymousResourceCollection
    {
        $farms = $this->farmService->getAllFarms();

        return FarmsResource::collection($farms);
    }

    public function show(int $farmID): FarmsResource
    {
        $farm = $this->farmService->getFarmById($farmID);

        return new FarmsResource($farm);
    }
}
