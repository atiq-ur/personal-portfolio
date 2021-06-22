<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('backend.pages.portfolio.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Please provide name',

        ]);
        if ($request->input('name') > 0){
            $cats = $request->get('name');
            foreach ($cats as $cat_name){
                $ab = new Category();
                $ab->name = $cat_name;
                $ab->save();
            }
            toastr()->success('Added Successfully', 'Category');
        }else{
            toastr()->error('Something went wrong! ', 'Error ');
        }
        return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.pages.portfolio.categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Please provide name',

        ]);
        $cat = Category::find($id);
        if ($cat){
            $cat->name = $request->name;
            $cat->update();
            toastr()->success('Updated Successfully', 'Updated');
        }else{
            toastr()->error('Something went wrong! ', 'Error ');
            return back();
        }
        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        $cat = Category::find($id);
        if (!is_null($cat)){
            $cat->delete();
            toastr()->success('Category deleted successfully ', 'Delete');
        }else{
            toastr()->warning('No data found with that name', 'Warning!');
        }
        return back();
    }
}
