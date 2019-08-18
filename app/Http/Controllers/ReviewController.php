<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Review;
use App\Http\Requests\StoreReview;
use App\Repositories\ReviewRepository;

class ReviewController extends Controller
{
    protected $reviews;

    public function __construct(ReviewRepository $reviews)
    {
        $this->middleware('auth', ['except' => ['store', 'getForm']]);

        $this->reviews = $reviews;
    }

    public function index()
    {
        $reviews = $this->reviews->getList();
        
        return view('reviews.index', compact('reviews'));
    }

    public function store(StoreReview $request)
    {
        Review::create([
            'author_name' => $request->author_name,
            'author_email' => $request->author_email,
            'message' => $request->message,
        ]);

        return ($request->user()) ? redirect('reviews') : redirect('/');
    }

    public function getForm()
    {
        return view('reviews.form');
    }
}
