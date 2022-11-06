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
                            <label for="name" class="form-label">Vārds</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="col-md-3 col-6">
                            <label for="surname" class="form-label">Vārds</label>
                            <input type="text" class="form-control" name="surname" id="surname">
                        </div>
                        <div class="col-md-3 col-6">
                            <label class="form-label">Kategorija</label>
                            <select class="form-select" name="category">
                                <option selected>--</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-6">
                            <label class="form-label invisible">submit</label>
                            <button type="submit" class="btn btn-primary float-end w-100">Filtrēt</button>
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

                    @foreach ($reviews as $key => $review)
                        <div class="row py-2 {{ $key % 2 == 0 ? 'bg-light' : ''}}">
                            <div class="col-md-3 col-6">
                                {{$review->instructor->name}}
                            </div>
                            <div class="col-md-3 col-6">
                                {{$review->instructor->surname}}
                            </div>
                            <div class="col-md-3 col-12">
                                @include('partials.categories', ['categoryList' => $review->category])
                            </div>
                            <div class="col-md-3 col-12">
                                <a href="{{ route('review-show', ['instructor_id' => $review->instructor->id] ) }}" class="w-100 btn btn-outline-primary float-end px-5">Skatīt</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
