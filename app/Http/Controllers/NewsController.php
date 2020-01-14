<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Response;
use Exception;
use \Cache;
use DB;
use App\Helpers\Helper;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.management.news-index');
    }

    public function ajax()
    {
        $fetchedNews = News::all();
        $newsData = [];
        foreach($fetchedNews as $newsKey => $news) {
            $newsData[$newsKey]['id']= $news->id;
            $newsData[$newsKey]['title']= $news->title;
            $newsData[$newsKey]['body']= $news->body;
            // $newsData[$newsKey]['created_at']= $news->created_at;
            $newsData[$newsKey]['is_active'] = $news->is_active;
        }
        
        return Response::json(['data' => $newsData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.management.news-create');
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
            'title' => ['required', 'max:225'],
            'body' => ['required', 'max:225'],
        ]);
        
        try
        {
            $validated = Helper::removeHtmlTagsOfFields($validate);
            $news = new News();
            $news->title = $validated['title'];
            $news->body = $validated['body'];
            $result = $news->save();
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
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::whereId($id)->get()->first()->toArray();
        return view('app.management.news-edit', ['data' => $news]);
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
            'title' => ['required', 'max:225'],
            'body' => ['required', 'max:225'],
        ]);

        try
        {
            $validated = Helper::removeHtmlTagsOfFields($validate);
            $news = News::find($request->id);
            $news->title = $validated['title'];
            $news->body = $validated['body'];
            $result = $news->update();
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
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $newsData = News::findOrFail($id);
            $oldData = $newsData->is_active;
            $status = ($newsData->is_active == 1) ? 0 : 1;
            $result = DB::table('news')->where('id', $id)->update(array('is_active' => $status));
    
            $datum = ['success' => ($result) ? 'true' : 'false'];
            Cache::forget('news');
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
        $deleteData = News::findOrFail($id);
        return view('app/management.news-delete', ['data' => $deleteData]);
    }
}
