<?php namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CreateRequest;
use App\Http\Requests\Comment\UpdateRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Facades\CommentRepository;
class CommentController extends Controller {


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $data = CommentRepository::paginate(config('repository.page-limit'));
        return view('admin.comment.list', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        //return view('admin.comments.index')->withComments(Comment::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateRequest $request)
	{
        CommentRepository::create($request->all());

        return responseSuccess('res.comment.create_comment_success');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	public function check($id, $status)
	{
		if (!in_array($status, array_keys(Article::$IS_ONLINE)))
			return responseF('审核状态参数不对请刷新页面重试');

		$mod = Comment::findOrFail($id);
		$mod->update([
			'on_line' => $status
		]);

		return responseS();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $comment_id
	 * @return View
	 */
	public function edit($comment_id)
	{
        $comment = CommentRepository::find($comment_id);

        return view('admin.comment.update', compact('comment'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit(UpdateRequest $request, $id)
	{
        CommentRepository::updateById($id, $request->all());

        return responseSuccess('res.update_success', route('comment.index'));
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
		$comment = CommentRepository::find($id);

        CommentRepository::destroy($id);

		$article = Article::findOrFail($comment->article_id);
		$article->update([
			'comment_count' => $article->comment_count - 1
		]);

        return responseS();
    }

}
