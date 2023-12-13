<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.pages.categories.index');
    }
    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return http_response_code(200);
    }
}
