<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param User $user
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(User $user)
    {

        return view('accounts.index', [
            'users' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
     * @param User $user
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(User $user)
    {
        return view('accounts.edit', [
            'users' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $status = Auth::user()->fill($request->only(['name', 'email']))
            ->save();
        if ($status){
            return redirect()->route('accounts.index')
                ->with('success', __('messages.accounts.update.success' ));
        }
        return back()->with('error', __('messages.accounts.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
