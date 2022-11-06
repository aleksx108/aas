<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Models\Review as ModelsReview;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{    

    public function index(Request $request)
    {

        $filter = $request->all();
        if(!empty($filter)){
            $reviews = ModelsReview::query();
            $reviews ->join('instructors', 'reviews.instructor_id', '=', 'instructors.id');
            // dd($filter);

            if($filter['name'] != null){
                $reviews->where('instructors.name', 'like', '%'.$filter['name'].'%');
            }

            if($filter['surname'] != null){
                $reviews->where('instructors.surname', 'like', '%'.$filter['surname'].'%');
            }

            if($filter['category'] != null && $filter['category']  != '--'){
                $reviews->where('category', 'like', '%'.$filter['category'].'%');
            }

            $reviews = $reviews->get();
        }else{
            $reviews = ModelsReview::all();
        }

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
    
    public function destroy(Request $request, $review_id)
    {

        if (! (Auth::user() != null && Auth::user()->hasRole('moderator'))){
            return redirect()->back();
        }

        ModelsReview::where('id',$review_id)->delete();

        $request->session()->flash('status', 'Review was deleted successfully!');

        return redirect()->back();
    }

    public function moderateList(){

        if (! (Auth::user() != null && Auth::user()->hasRole('moderator'))){
            return redirect()->back();
        }

        $reviews = ModelsReview::all();
        return view('review.moderate-list', ['reviews' => $reviews]);
    }

    public function banReviewAuthor(Request $request, $creator_id){

        if (! (Auth::user() != null && Auth::user()->hasRole('moderator'))){
            return redirect()->back();
        }

        $user = User::find($creator_id);
        $user->banned = 1;
        $user->save();

        $request->session()->flash('status', $user->name. ' was banned successfully!');

        return redirect()->back();
    }

    public function unbanReviewAuthor(Request $request, $creator_id){

        if (! (Auth::user() != null && Auth::user()->hasRole('moderator'))){
            return redirect()->back();
        }

        $user = User::find($creator_id);
        $user->banned = 0;
        $user->save();

        $request->session()->flash('status', $user->name. ' was un-banned successfully!');

        return redirect()->back();
    }
}
