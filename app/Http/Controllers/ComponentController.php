<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComponentResource;
use App\Services\ComponentService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

class ComponentController extends Controller
{
    protected ComponentService $componentService;

    public function __construct(ComponentService $componentService)
    {
        $this->componentService = $componentService;
    }

    public function getAllComponents(): AnonymousResourceCollection
    {
        $components = $this->componentService->getAllComponents();

        return ComponentResource::collection($components);
    }
    public function getComponentById(int $componentId): ComponentResource
    {
        $component = $this->componentService->getComponentById($componentId);

        return new ComponentResource($component);
    }
    public function getComponentsByTurbineId(int $turbineId): AnonymousResourceCollection
    {
        $components = $this->componentService->getComponentsByTurbineId($turbineId);

        return ComponentResource::collection($components);
    }
    public function getComponentByTurbineIdAndId(int $turbineId, int $componentId): ComponentResource
    {
        $component = $this->componentService->getComponentByTurbineIdAndId($turbineId, $componentId);

        return new ComponentResource($component);
    }
}
