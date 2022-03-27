<?php

namespace App\Services;

use App\Models\Tenants\Attribute;


class AttributeService {


    public function create($request) {
        return Attribute::create($request->all());
    }

    public function getAttributes() {
        return Attribute::all();
    }

}
