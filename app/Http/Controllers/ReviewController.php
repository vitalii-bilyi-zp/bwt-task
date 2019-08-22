<?php

namespace App\Http\Controllers;

use App\Review;
use App\Http\Requests\StoreReview;
use App\Repositories\ReviewRepository;

class ReviewController extends Controller
{
    /**
     * The review repository instance.
     *
     * @var ReviewRepository
     */
    protected $reviews;


    /**
     * Create a new controller instance.
     *
     * @param  ReviewRepository  $reviews
     * @return void
     */
    public function __construct(ReviewRepository $reviews)
    {
        $this->middleware('auth', ['except' => ['store', 'getForm']]);

        $this->reviews = $reviews;
    }

    /**
     * Display a list of all reviews.
     *
     * @return Response
     */
    public function index()
    {
        $reviews = $this->reviews->getList();
        
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Store the incoming review.
     *
     * @param  StoreReview  $request
     * @return Response
     */
    public function store(StoreReview $request)
    {
        Review::create([
            'author_name' => $request->author_name,
            'author_email' => $request->author_email,
            'message' => $request->message,
        ]);

        return ($request->user()) ? redirect('reviews') : redirect('/');
    }

    /**
     * Display reviews form.
     *
     * @return Response
     */
    public function getForm()
    {
        return view('reviews.form');
    }
}
