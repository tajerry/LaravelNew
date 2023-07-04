<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $category = Category::create($data);
        if($category){
            return redirect()->route('admin.categories.index')
                ->with('success', __('messages.admin.categories.create.success'));
        }
        return back()->with('error', __('messages.admin.categories.create.fail'));
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
     * @param CreateRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CreateRequest $request, Category $category)
    {
        $status = $category->fill($request->only(['title', 'description']))
            ->save();
        if ($status){
            return redirect()->route('admin.categories.index')
                ->with('success', __('messages.admin.categories.update.success' ));
        }
        return back()->with('error', __('messages.admin.categories.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return response()->json(['status'=>'ok']);
        }
        catch (\Exception $e){
            \Log::error("Категория не удалена");
            return response()->json(['status'=>'error'], 400);
        }
    }
}
