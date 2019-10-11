<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;

use App\Http\Requests\Questions\ReviewRequest;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::orderBy('created_at', 'desc')->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function store(ReviewsRequest $request)
    {

        $review = Review::findOrFail($request['id']);
        $review->update([
            'answer' => $request['answer'],
            'proven' => 1,
            'answered_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.reviews.index');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index');
    }

        public function ban(Review $review)
    {
        $review->update(['status' => $review::STATUS_WAIT]);
        return redirect()->route('admin.reviews.index');
    }    

    public function unBan(Review $review)
    {

        $review->update([
            'status' => $review::STATUS_ACTIVE, 
            'proven' => 1,

        ]);
        return redirect()->route('admin.reviews.index');
    }
}
