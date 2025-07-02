<?php

namespace laravelgpt\DhruFusion;

use App\Models\Package;

class PackageService {
    public function getPackages() {
        return Package::where('is_active', 1)->get();
    }
}
