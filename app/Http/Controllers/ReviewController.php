<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Models\Review as ModelsReview;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{    

    public function index()
    {
        $reviews = ModelsReview::all();
        return view('review.index', ['reviews' => $reviews]);
    }
    
    public function create(Request $request)
    {
        //redirect if not logged in
        if (Auth::user() == null) {
            return redirect()->route('login');
        }

        $instructors = Instructor::all();

        return view('review.create', ["instructors" => $instructors]);
    }
    
    public function store(Request $request)
    {
        // $input = $request->all();
        // $request->input('instructors')

        $review = new ModelsReview();
        $review->creator_id = Auth::id();
        $review->instructor_id = $request->input('instructors');
        $review->review_text = $request->input('review_text');
        //format array to comma seperated string
        $category = implode(',', $request->input('category'));
        $review->category = $category;
        $review->save();

        //show message about save success
        $request->session()->flash('status', 'Review saved successfully!');
        return view('home');
    }
    
    public function show($instructor_id)
    {
        $reviews = ModelsReview::where('instructor_id', '=', $instructor_id)->get();
        return view('review.show', ['reviews' => $reviews]);
    }
    
    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        //
    }
    
    public function destroy($id)
    {
        //
    }
}
