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

            <label>Category name</label><br>
            <input
                type="text"
                class="form-control {{$errors->first('name') ? "is-invalid" : ""}}"
                value="{{old('name')}}"
                name="name">

                <div class="invalid-feedback">
                    {{$errors->first('name')}}
                </div>
            <br>

            <label>Category image</label>
            <input
                type="file"
                class="form-control {{$errors->first('image') ? "is-invalid" : ""}}"
                name="image">

                <div class="invalid-feedback">
                    {{$errors->first('image')}}
                </div>
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
