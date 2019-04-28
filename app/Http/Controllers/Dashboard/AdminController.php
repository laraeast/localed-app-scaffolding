<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Admin::class);

        return View::make('dashboard.admins.index')
            ->withAdmins(
                Admin::latest()->paginate()
            );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Admin::class);

        return View::make('dashboard.admins.create')->withAdmin(new Admin());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AdminRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $admin = Admin::create($request->allWithHashedPassword());

        $admin->addOrUpdateMediaFromRequestBase64Data('avatar');

        $this->flash('created');

        return redirect()->route('dashboard.admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $this->authorize('view', $admin);

        return View::make('dashboard.admins.show')->withAdmin($admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $this->authorize('update', $admin);

        return View::make('dashboard.admins.edit')->withAdmin($admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AdminRequest $request
     * @param  \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        $admin->update($request->allWithHashedPassword());

        $admin->addOrUpdateMediaFromRequestBase64Data('avatar');

        $this->flash('updated');

        return redirect()->route('dashboard.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $this->authorize('delete', $admin);

        $admin->delete();

        $this->flash('deleted');

        return redirect()->route('dashboard.admins.index');
    }
}
