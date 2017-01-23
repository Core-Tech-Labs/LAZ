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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BaseNewsFeed $feed)
    {
        $feed->deletingNewsItem($request);

        session()->flash('success_message', 'Deleted Post Successfully');
        return back();
    }
}
