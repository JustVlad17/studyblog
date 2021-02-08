<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function createCategory(Request $request)
    {
        $result = 'Создайте категорию';
        if (!empty($request->category)) {
            if ($this->check($request->category)) {
                $category = new Category();
                $category->category = $request->category;
                $category->save();
                $result = 'Категория создана';
            } else {
                $result = 'Такая категория существует';
            }
        }
        return view('adminCategory.createCategory', ['result' => $result]);
    }

    private function check($name)
    {
        $category = Category::where('Category', $name)->first();
        if (!empty($category)) {
            return false;
        } else {
            return true;
        }
    }
}
