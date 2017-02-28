<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Facades\TagRepository;
use App\Http\Controllers\Controller;
use App\Traits\ValidationTrait;
class TagController extends Controller
{
    use ValidationTrait;
    public function index()
    {
        $data = TagRepository::paginate(config('repository.page-limit'));

        return view('admin.tag.list', compact('data'));
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(Request $request)
    {
        $validator = $this->verify($request, 'tag.store');
        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        TagRepository::create($request->all());

        return responseSuccess('','', route('tag.index'));
    }

    public function edit($id)
    {
        $tag = TagRepository::find($id);

        return view('admin.tag.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->verify($request, 'tag.store');
        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        TagRepository::updateById($id, $request->all());

        return responseSuccess('','', route('tag.index'));
    }

    public function getDelete($id)
    {
        TagRepository::destroy($id);

        return responseSuccess();
    }
}
