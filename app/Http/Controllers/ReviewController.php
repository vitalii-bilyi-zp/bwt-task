<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Review;
use App\Http\Requests\StoreReview;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store', 'getForm']]);
    }

    public function index()
    {
        return 'Reviews index';
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
