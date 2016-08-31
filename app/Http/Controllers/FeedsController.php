<?php

namespace App\Http\Controllers;

use Redis;
use App\User;
use App\Feeds;
use App\Events\FeedPosted;
use Illuminate\Http\Request;
use Core\NewsFeed\BaseNewsFeed;
use App\Http\Requests\NewsFeed;
use App\Http\Controllers\Controller;
use Core\NewsFeed\Mail\FeedsMailer as Mail;

class FeedsController extends Controller
{


    protected $mail;


    /**
     * Creating controller instance
     */
    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsFeed $request, User $user, BaseNewsFeed $feed)
    {
        event(new FeedPosted($request->except('_token')));
        $feed->UsersNewsFeed($request, $user);

        // For sending email notification to Users
        $faveID = $user->favoriteeList();
        foreach ($faveID as $id) {
            $this->mail->sendNewNotificationToUsers($user->find($id), $request->input('UserPosting'));
        }

        session()->flash('success_message', 'Posted Successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    public function destroy(Request $request)
    {
        $newsFeed = $request->except('_token');

        dd($newsFeed);
        Redis::lrem('newsFeed'.':'.\Auth::user()->username, -2, json_encode($newsFeed) );

        session()->flash('success_message', 'Deleted Post Successfully');
        return back();
    }
}
