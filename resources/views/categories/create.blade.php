@extends('layouts.global')
@section('title') Create new Categories @endsection

@section('content')

    <div class="col-md-8">

        @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <form
            action="{{route('categories.store')}}"
            class="bg-white shadow-sm p-3"
            enctype="multipart/form-data"
            method="POST">

            @csrf

            <label for="">Category Name</label>
            <input
                type="text"
                class="form-control"
                name="name"/>
            <br>

            <label for="">Category Image</label>
            <input
                type="file"
                class="form-control"
                name="image"/>
            <br>

            <input
                type="submit"
                value="Save"
                class="btn btn-primary btn-sm"/>

            <a href="{{route('categories.index')}}"
               class="btn text-white btn-danger btn-sm">Back</a>
        </form>
    </div>
@endsection
