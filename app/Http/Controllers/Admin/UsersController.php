<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param User $user
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(User $user)
    {

        return view('admin.users.index', [
            'users' => $user->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'users' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $status = $user->fill($request->only(['name', 'email']))
            ->save();
        if ($status){
            return redirect()->route('admin.users.index')
                ->with('success', __('messages.admin.users.update.success' ));
        }
        return back()->with('error', __('messages.admin.users.update.fail'));
    }
}
