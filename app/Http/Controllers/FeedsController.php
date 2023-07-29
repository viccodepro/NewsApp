<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //First we get all the records that are active category by category:
        $news_raw = Feed::where('active', '=', '1')->where('category', '=', 'News')->get();
        $sports_raw = Feed::where('active', '=', '1')->where('category', '=', 'Sports')->get();
        $technology_raw = Feed::where('active', '=', '1')->where('category', '=', 'Technology')->get();
        //Now we load our view file and send variables to the view
        // dd($news_raw, $sports_raw, $technology_raw);
        return view('index', ['news' => $news_raw, 'sports' => $sports_raw, 'technology' => $technology_raw]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_feed');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), Feed::$form_rules);
        if ($validation->fails()) {
            return redirect()->route('feeds.create')->with('message', $validation->errors()->first());
        } else {
            // We try to insert a new row with Eloquent
            $create = Feed::create(
                [
                    'title'         =>  $request->title,
                    'feed'          =>  $request->feed,
                    'category'      =>  $request->category,
                    'active'        =>  $request->active
                ]
            );
            if ($create) {
                return redirect()->route('feeds.create')->with('message', 'The feed was added to the database successfully');
            } else {
                return redirect()->route('feeds.create')->withInput()->with('message', 'The feed could not be added, Please try again later!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
