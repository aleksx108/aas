@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex flex-row">
                                <div class="m-3">
                                    <i class="fa-regular fa-user" style="font-size: 5.73em;"></i>
                                </div>
                                <div>
                                    <div>
                                        @include('partials.categories', ['categoryList' => $reviews[0]->category])
                                    </div>
                                    <div>
                                        <h2 class="fw-bold">{{ strtoupper($reviews[0]->instructor->name . " " . $reviews[0]->instructor->surname)}}</h2>
                                    </div>
                                    <div>
                                        <span class="text-secondary" >Kopā {{ count($reviews) }} atsauksmes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2">
                            <h4>Atsauksmes</h4>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($reviews as $review)
                            <div class="col-12 mt-2">
                                <div class="card">
                                    <div class="card-header">
                                        {{$review->creator->name}}
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">{{$review->review_text}}</div>
                                            <div class="col-12">
                                                <div class="float-end">
                                                    <span class="mr-3 fw-bold">
                                                        5 <i class="fa-regular fa-thumbs-up"></i>
                                                    </span>
                                                    <span class="fw-bold">
                                                    2 <i class="fa-regular fa-thumbs-down"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>   
                        @endforeach
                    </div>
                    
            </div>
        </div>
    </div>
</div>
@endsection
