<?php

namespace App\Http\Controllers\Admin;

use App\Facades\ActionRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;


class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actions = ActionRepository::paginate(config('repository.page-limit'));

        return view('admin.action.index', compact("actions"));
    }

    /**
     * Display a listing of the resource by the search condition.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Router $router
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Router $router)
    {
        //$actions = ActionRepository::getActionsByRoutes($router->getRoutes()->getRoutes());

        //return view('admin.action.create', compact('actions'));
        return view('admin.action.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Form\ActionCreateForm $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ActionRepository::create($request->all());

        return responseSuccess('', route('action.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int    $id
     * @param  Router $router
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Router $router)
    {
        $action = ActionRepository::find($id);
        //$actions = ActionRepository::getActionsByRoutes($router->getRoutes()->getRoutes());

        return view('admin.action.edit', compact('action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Form\ActionCreateForm $request
     * @param  int                                     $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        ActionRepository::updateById($id, $request->all());

        return responseSuccess('', route('action.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ActionRepository::destroy($id);

        return responseSuccess();
    }
}
