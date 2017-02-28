<?php namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Facades\MenuRepository;
use App\Http\Controllers\Controller;
use App\Traits\ValidationTrait;
class MenuController extends Controller {


    use ValidationTrait;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data= MenuRepository::paginate(config('repository.page-limit'));

        return view('admin.menu.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $menus_tree = create_level_tree(MenuRepository::getAllDisplayMenus());

        return view('admin.menu.create', compact('menus_tree'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = $this->verify($request, 'menu.store');
        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        MenuRepository::create($request->all());

        return responseSuccess('','', route('menu.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $menu_id
     * @return View
     */
    public function edit($menu_id)
    {
        $menus_tree = create_level_tree(MenuRepository::getAllDisplayMenus());
        $menu = MenuRepository::find($menu_id);

        return view('admin.menu.edit', compact('menu', 'menus_tree'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->verify($request, 'menu.store');
        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        MenuRepository::updateById($id, $request->all());

        return responseSuccess('res.update_success', '', route('menu.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $menu = MenuRepository::find($id);

        if (count($menu->cMenus) > 0)
        {
            return responseFail('res.menu.has_child_menus');
        }

        MenuRepository::destroy($id);

        return responseSuccess();
    }

}
