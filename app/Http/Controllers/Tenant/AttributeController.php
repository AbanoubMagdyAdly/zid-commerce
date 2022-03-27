<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Services\AttributeService;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    protected $attributeService;

    public function __construct(AttributeService $attributeService) {
        $this->attributeService = $attributeService;
    }

    public function create(Request $request) {
        $attribute = $this->attributeService->create($request);
        return $this->getSuccessResponse($attribute);

    }

    public function getAttributes() {
        $attribute = $this->attributeService->getAttributes();
        return $this->getSuccessResponse($attribute);
    }
}
