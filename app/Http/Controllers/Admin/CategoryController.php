<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Category $category
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(Category $category)
    {

        return view('admin.categories.index', [
            'categories' => $category->with('news')->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['title', 'description']);
        $category = Category::create($data);
        if($category){
            return redirect()->route('admin.categories.index')
                ->with('success','New category add');
        }
        return back()->with('error', 'Not added new category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Category $category
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $status = $category->fill($request->only(['title', 'description']))
            ->save();
        if ($status){
            return redirect()->route('admin.categories.index')
                ->with('success','Category edite');
        }
        return back()->with('error', 'Not edite category');


    }

    /**
     * Remove the specified resource from storage.
     * @param Category $category
     */
    public function destroy(Category $category): RedirectResponse
    {
        $status = $category->delete();
        if ($status){
            return redirect()->route('admin.categories.index')
                ->with('success','Category delete');
        }
        return redirect()->route('admin.categories.index')
            ->with('error', 'Not delete category');
    }
}
