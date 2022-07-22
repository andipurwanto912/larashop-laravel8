@extends('layouts.global')
@section('title') Detail category @endsection

@section('content')

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <label for=""><b>Category Name</b></label><br>
                {{$category->name}}
                <br><br>

                <label for=""><b>Category Slug</b></label><br>
                @if ($category->image)
                    <img src="{{asset('storage/' . $category->image)}}" width="120px">
                @endif
                <br>
                <br>

                <div class="row">
                    <div class="col-md-12 text-right">
                    <a
                        href="{{route('categories.index')}}"
                        class="btn btn-dark">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
