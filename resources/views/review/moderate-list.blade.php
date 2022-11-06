@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                
                <form method="" action="">
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <label for="authorName" class="form-label">Atsaukmes autors</label>
                            <input type="text" disabled class="form-control" name="authorName" id="authorName">
                        </div>
                        <div class="col-md-3 col-6">
                            <label for="dateFrom" class="form-label">Datums no</label>
                            <input type="text" disabled class="form-control" name="dateFrom" id="dateFrom">
                        </div>
                        <div class="col-md-3 col-6">
                            <label for="dateTo" class="form-label">Datums lidz</label>
                            <input type="text" disabled class="form-control" name="dateTo" id="dateTo">
                        </div>
                        <div class="col-md-3 col-6">
                            <label class="form-label invisible">submit</label>
                            <button type="submit" disabled class="btn btn-primary float-end w-100">Filtrēt</button>
                        </div>
                    </div>
    
                </form>
                
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        @foreach ($reviews as $review)
                            <div class="col-12 mt-2">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-2">
                                                {{$review->creator->name}}
                                            </div>
                                            <div class="col-10">
                                                <ul class="nav justify-content-end" style="font-size:12px;">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" aria-current="page" href="#">Skatīt visu lietotāja aktivitāti</a>
                                                    </li>
                                                    <li class="nav-item">
                                                    
                                                       @if($review->creator->banned == 0)
                                                            <a class="nav-link" href="{{ route('review-ban-author', ['creator_id' => $review->creator_id ])}}">Liegt komentēt</a>
                                                        @else
                                                            <a class="nav-link disabled" aria-disabled="true" href="#">Liegt komentēt</a>
                                                        @endif
                                                    
                                                    </li>
                                                    <li class="nav-item">
                                                        @if($review->creator->banned == 0)
                                                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Noņemt liegumu</a>
                                                        @else
                                                            <a class="nav-link" href="{{ route('review-unban-author', ['creator_id' => $review->creator_id ])}}" tabindex="-1" aria-disabled="false">Noņemt liegumu</a>
                                                        @endif
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ route('review-show', ['instructor_id' => $review->instructor_id ])}}">Skatīt atsauksmi intruktora lapā</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">{{$review->review_text}}</div>
                                            <div class="col-12">
                                                <span class="text-muted fst-italic">
                                                    {{"Pievienots ".$review->created_at}}
                                                </span>
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
</div>
@endsection
