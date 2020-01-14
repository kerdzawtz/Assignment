<?php

namespace App\Http\Controllers;

use App\Comment;
use App\News;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Response;
use Exception;
use DB;
use \Cache;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.management.comment-index');
    }

    public function ajax($id)
    {
        $fetchedNews = News::findOrFail($id);
        $comments = [];
        foreach($fetchedNews->comments as $commentKey => $comment) {
            $comments[$commentKey]['id']= $comment->id;
            $comments[$commentKey]['body']= $comment->body;
            $comments[$commentKey]['is_active'] = $comment->is_active;
        }
        
        return Response::json(['data' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('app.management.comment-create', ['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'news_id_fk' => ['required'],
            'body' => ['max:225'],
        ]);
        
        try
        {
            $validated = Helper::removeHtmlTagsOfFields($validate);
            $comment = new Comment();
            $comment->news_id_fk = $validated['news_id_fk'];
            $comment->body = $validated['body'];
            $result = $comment->save();
            $datum = ['success' => ($result) ? 'true' : 'false'];
            return Response::json($datum);
        } catch(Exception $e) {
            $datum['success'] = "false";
            return Response::json($datum);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::whereId($id)->get()->first()->toArray();
        return view('app.management.comment-edit', ['data' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validate = $request->validate([
            'body' => ['max:225'],
        ]);

        try
        {
            $validated = Helper::removeHtmlTagsOfFields($validate);
            $comment = Comment::find($request->id);
            $comment->body = $validated['body'];
            $result = $comment->update();
            $datum = ['success' => ($result) ? 'true' : 'false'];
    
            return Response::json($datum);
        } catch(Exception $e) {
            $datum['success'] = "false";
            return Response::json($datum);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $commentData = Comment::findOrFail($id);
            $oldData = $commentData->is_active;
            $status = ($commentData->is_active == 1) ? 0 : 1;
            $result = DB::table('comments')->where('id', $id)->update(array('is_active' => $status));
    
            $datum = ['success' => ($result) ? 'true' : 'false'];
            Cache::forget('comments');
            return Response::json($datum);
        }
        catch(Exception $e)
        {
            $datum['success'] = "false";
            return Response::json($datum);
        }        
    }

    public function delete($id)
    {
        $deleteData = Comment::findOrFail($id);
        return view('app/management.comment-delete', ['data' => $deleteData]);
    }
}
