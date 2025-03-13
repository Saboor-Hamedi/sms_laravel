<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function fetchCategory()
    {
        return Category::pluck('name', 'id');
    }
}
