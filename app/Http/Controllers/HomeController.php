<?php

namespace App\Http\Controllers;

use App\Submission;
use App\Traits\CachableCategory;
use App\Traits\CachableSubmission;
use App\Traits\CachableUser;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use CachableUser, CachableSubmission, CachableCategory;

    /**
     * Displays the home page.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return view
     */
    public function homePage(Request $request)
    {
        $submissions = $this->guestHome($request);

        return view('home', compact('submissions'));
    }

    /**
     * Returns the submissions for the homepage of Auth user.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Collection
     */
    public function feed(Request $request)
    {
        $this->validate($request, [
            'sort' => 'required|in:hot,new,rising',
            'page' => 'required|integer',
        ]);

        if (!Auth::check()) {
            return $this->guestHome($request);
        }

        $submissions = (new Submission())->newQuery();

        // spicify the filter:
        if ($request->filter == 'all-channels') {
            // guest what? we don't have to do anything :|
        } elseif ($request->filter == 'moderating-channels') {
            $submissions->whereIn('category_id', Auth::user()->moderatingIds());
        } elseif ($request->filter == 'bookmarked-channels') {
            $submissions->whereIn('category_id', $this->bookmarkedCategories());
        } elseif ($request->filter == 'by-bookmarked-users') {
            $submissions->whereIn('user_id', $this->bookmarkedUsers());
        } else { // $request->filter == "subscribed channels"
            $submissions->whereIn('category_id', $this->subscriptions());
        }

        // exclude user's blocked categories
        $submissions->whereNotIn('category_id', $this->hiddenCategories());

        // exclude user's hidden submissions
        $submissions->whereNotIn('id', $this->hiddenSubmissions());

        // exclude NSFW if user doens't want to see them
        if (!settings('nsfw')) {
            $submissions->where('nsfw', false);
        }

        if (settings('exclude_upvoted_submissions')) {
            $submissions->whereNotIn('id', $this->submissionUpvotesIds());
        }

        if (settings('exclude_downvoted_submissions')) {
            $submissions->whereNotIn('id', $this->submissionDownvotesIds());
        }

        if ($request->sort == 'new') {
            $submissions->orderBy('created_at', 'desc');
        }

        if ($request->sort == 'rising') {
            $submissions->where('created_at', '>=', Carbon::now()->subHour())
                        ->orderBy('rate', 'desc');
        }

        if ($request->sort == 'hot') {
            $submissions->orderBy('rate', 'desc');
        }

        $submissions->groupBy('url');

        return $submissions->simplePaginate(10);
    }

    /**
     * returns submisisons from default categories. by time we're gonna improve this.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Collection
     */
    protected function guestHome(Request $request)
    {
        $submissions = (new Submission())->newQuery();

        $submissions->whereIn(
            'category_id', $this->getDefaultCategories()
        );

        $submissions->where('nsfw', false);

        if ($request->sort == 'new') {
            $submissions->orderBy('created_at', 'desc');
        } elseif ($request->sort == 'rising') {
            $submissions->where('created_at', '>=', Carbon::now()->subHour())
                        ->orderBy('rate', 'desc');
        } else {
            $submissions->orderBy('rate', 'desc');
        }

        $submissions->groupBy('url');

        return $submissions->simplePaginate(10);
    }
}
