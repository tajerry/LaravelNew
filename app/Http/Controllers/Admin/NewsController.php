<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\Category;
use App\Services\UploadService;
use http\Env\Response;
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
     * @param CreateRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function store(CreateRequest $request, News $news)
    {
        $data = $request->validated();
        $news = $news->create($data);
        if($news){
            return redirect()->route('admin.news.index')
                ->with('success','Новость успешно добавлена');
        }
        return back()->with('error', 'Новость не добавлена');

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
     * @param UploadService $service
     * @return RedirectResponse
     */
    public function update(EditRequest $request, News $news, UploadService $service): RedirectResponse
    {
        $validated = $request->validated();
        if($request->hasFile('image')){
            $validated['image'] = $service->uploadFile($request->file('image'));
        }
        $status  = $news->fill($request->validated())->save();
        if($status)
        {
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость успешно отредактирована');
        }
        return back()
            ->with('error', 'Новость не отредактирована');
    }

    /**
     * Remove the specified resource from storage.
     * @param News $news
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(News $news)
    {
        try {
            $news->delete();
            return response()->json(['status'=>'ok']);
        }
        catch (\Exception $e){
            \Log::error("News wasn't delete");
            return response()->json(['status'=>'error'], 400);
        }
    }

}
