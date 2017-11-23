<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Filters;
use App\Report;
use App\Submission;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use Filters;

    public function __construct()
    {
        $this->middleware('administrator');
    }

    /**
     * Is the authinticated user a Votepen administrator?
     *
     * @return string
     */
    public function isAdministrator()
    {
        return $this->mustBeVotepenAdministrator() ? 'true' : 'false';
    }

    /**
     * Returns the latest submissions.
     *
     * @return \Illuminate\Support\Collection
     */
    public function submissions(Request $request)
    {
        return Submission::orderBy('id', 'desc')->simplePaginate(10);
    }

    /**
     * Returns the latest submitted comments.
     *
     * @return \Illuminate\Support\Collection
     */
    public function comments()
    {
        return $this->withoutChildren(Comment::orderBy('id', 'desc')->simplePaginate(30));
    }

    /**
     * Returns the latest created categories.
     *
     * @return \Illuminate\Support\Collection
     */
    public function categories()
    {
        return Category::orderBy('id', 'desc')->simplePaginate(30);
    }

    /**
     * Returns the latest registered users.
     *
     * @return \Illuminate\Support\Collection
     */
    public function indexUsers()
    {
        return User::orderBy('id', 'desc')->simplePaginate(30);
    }

    /**
     * searches through users by username.
     *
     * @return \Illuminate\Support\Collection
     */
    public function searchUsers(Request $request)
    {
        return User::where('username', 'like', '%'.$request->username.'%')
                    ->select('username')->take(100)->get()->pluck('username');
    }

    /**
     * Indexes the reported submissions.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Collection
     */
    public function reportedSubmissions(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
        ]);

        if ($request->type == 'solved') {
            return Report::onlyTrashed()->whereHas('submission')->whereHas('reporter')->where([
                'reportable_type' => 'App\Submission',
            ])->with('reporter', 'submission')->orderBy('created_at', 'desc')->simplePaginate(50);
        }

        // default type which is "unsolved"
        return Report::whereHas('submission')->whereHas('reporter')->where([
            'reportable_type' => 'App\Submission',
        ])->with('reporter', 'submission')->orderBy('created_at', 'desc')->simplePaginate(50);
    }

    /**
     * Indexes the reported comments.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Collection
     */
    public function reportedComments(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
        ]);

        if ($request->type == 'solved') {
            return Report::onlyTrashed()->whereHas('comment')->whereHas('reporter')->where([
                'reportable_type' => 'App\Comment',
            ])->with('reporter', 'comment')->orderBy('created_at', 'desc')->simplePaginate(50);
        }

        // default type which is "unsolved"
        return Report::whereHas('comment')->whereHas('reporter')->where([
            'reportable_type' => 'App\Comment',
        ])->with('reporter', 'comment')->orderBy('created_at', 'desc')->simplePaginate(50);
    }

    /**
     * searches the categories.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Collection
     */
    public function getCategories(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        return Category::where('name', 'like', '%'.$request->name.'%')
                    ->select('id', 'name')->take(100)->get()->pluck('name');
    }
}
