<?php

namespace App\Http\Controllers;

use App\Http\Resources\TurbineResource;
use App\Services\TurbineService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

class TurbineController extends Controller
{
    private TurbineService $turbineService;

    public function __construct(TurbineService $turbineService)
    {
        $this->turbineService = $turbineService;
    }

    public function getAllTurbines(): AnonymousResourceCollection
    {
        $turbines = $this->turbineService->getAllTurbines();

        return TurbineResource::collection($turbines);
    }

    public function getTurbinesForFarm(int $farmId): AnonymousResourceCollection
    {
        $turbines = $this->turbineService->getTurbinesForFarm($farmId);

        return TurbineResource::collection($turbines);
    }

    public function getTurbineByFarmIdAndId(int $farmId, int $turbineId): TurbineResource
    {
        $turbine = $this->turbineService->getTurbineByFarmIdAndId($farmId, $turbineId);

        // Return turbine as JSON response using TurbineResource
        return new TurbineResource($turbine);
    }

    public function getTurbineById(int $turbineId): TurbineResource
    {
        $turbine = $this->turbineService->getTurbineById($turbineId);

        // Return turbine as JSON response using TurbineResource
        return new TurbineResource($turbine);
    }
}
