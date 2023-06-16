<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\EditRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param News $news
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(News $news)
    {
        return view('admin.news.index', [
            'newsList' => $news->with('category')->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param Category $category
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(Category $category)
    {
        return view('admin.news.create', [
            'categories' => $category->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param News $news
     * @return RedirectResponse
     */
    public function store(Request $request, News $news)
    {
        $data = $request->only('title', 'author', 'status', 'image', 'description', 'category_id');
        $news = $news->create($data);
        if($news){
            return redirect()->route('admin.news.index')
                ->with('success','New news add');
        }
        return back()->with('error', 'Not added new news');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * @param News $news
     * @param Category $category
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(News $news, Category $category)
    {
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $category->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param EditRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(EditRequest $request, News $news): RedirectResponse
    {
        $status  = $news->fill($request->validated())->save();
        if($status)
        {
            return redirect()->route('admin.news.index')
                ->with('success', 'News edit');
        }
        return back()
            ->with('error', 'News not edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $status = $news->delete();
        if($status){
            return redirect()->route('admin.news.index')
                ->with('success', 'News delete');
        }
        return back()
            ->with('error', 'News not delete');
    }
}
