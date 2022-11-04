@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pievienot jaunu atsauksmi') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('review-store') }}" accept-charset="UTF-8">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleInputEmail1" class="form-label">Instruktors</label>
                                <select class="form-select" name="instructors">
                                    <option selected>--</option>

                                       @foreach($instructors as $instructor)
                                            <option value="{{$instructor->id}}">{{$instructor->name ." ". $instructor->surname}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <label class="form-label">Atzīmē apmācības kategoriju</label>
                                    <div class="col-12">
                                        <div class="form-check form-check-inline">
                                            <input name="category[]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="A">
                                            <label class="form-check-label" for="inlineCheckbox1">A</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input name="category[]"  class="form-check-input" type="checkbox" id="inlineCheckbox2" value="B">
                                            <label class="form-check-label" for="inlineCheckbox2">B</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input name="category[]"  class="form-check-input" type="checkbox" id="inlineCheckbox3" value="C">
                                            <label class="form-check-label" for="inlineCheckbox3">C</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Atsauksme</label>
                                <textarea name="review_text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary float-end mt-3">Iesniegt atsauksmi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
