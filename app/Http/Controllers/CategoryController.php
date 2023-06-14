<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function list()
    {
        $categories = Category::orderBy('id')->get();
        return view(
            'components/Listings/CategoryList',
            compact('categories')
        );
    }

    function new()
    {
        $category = new Category();
        $category->id = Category::max('id') + 1;
        $category->category_name = "";
        $category->description = "";

        return view("components/Forms/FormCategory", compact('category'));
    }

    function save(Request $request)
    {
        if ($request->input('id') == Category::max('id') + 1) {
            $category = new Category();
        } else {
            $category = Category::find($request->input('id'));
        }

        $category->category_name = $request->input('category_name');
        $category->description = $request->input('description');

        $category->save();

        return redirect('category/list');
    }

    function edit($id) {
        $category = Category::find($id);

        return view("components/Forms/FormCategory", compact('category'));
    }

    function delete($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect('category/list');    
    }
}
