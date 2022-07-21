@extends('layouts.global')

@section('title') Edit User @endsection

@section('content')
    <div class="col-md-8">
        @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <form
            enctype="multipart/form-data"
            class="bg-white shadow-sm p-3"
            action="{{route('users.update', [$user->id])}}" method="POST">

            @csrf

            <input
                type="hidden"
                value="PUT"
                name="_method">

            <label for="name">Name</label>
            <input
                value="{{$user->name}}"
                type="text"
                class="form-control"
                name="name"
                id="name"
                placeholder="full name">
            <br>

            <label for="username">Username</label>
            <input
                value="{{$user->username}}"
                type="text"
                class="form-control"
                name="username"
                id="username"
                placeholder="username"
                disabled >
            <br>

            <label for="">Status</label>
            <br/>
            <input
                {{$user->status == "ACTIVE" ? "checked" : ""}}
                value="ACTIVE"
                type="radio"
                class="form-control"
                id="active"
                name="status">
            <label for="active">Active</label>

            <input
                {{$user->status == "INACTIVE" ? "checked" : ""}}
                value="INACTIVE"
                type="radio"
                class="form-control"
                id="inactive"
                name="status">
            <label for="inactive">Inactive</label>
            <br><br>

            <label for="">Roles</label>
            <br>
            <input
                type="checkbox"
                {{in_array("ADMIN", json_decode($user->roles)) ? "checked" : ""}}
                name="roles[]"
                id="ADMIN"
                VALUE="ADMIN">
                <label for="ADMIN">Administrator</label>

            <input
                type="checkbox"
                {{in_array("STAFF", json_decode($user->roles)) ? "checked" : ""}}
                name="roles[]"
                id="STAFF"
                VALUE="STAFF">
                <label for="STAFF">Staff</label>

            <input
                type="checkbox"
                {{in_array("CUSTOMER", json_decode($user->roles)) ? "checked" : ""}}
                name="roles[]"
                id="CUSTOMER"
                VALUE="CUSTOMER">
                <label for="CUSTOMER">Customer</label>
            <br>
            <br>

            <label for="phone">Phone Number</label>
            <br>
            <input
                type="text"
                name="phone"
                class="form-control"
                value="{{$user->phone}}">
            <br>

            <label for="address">Address</label>
            <textarea
                name="address"
                id="address"
                class="form-control">{{$user->address}}
            </textarea>
            <br>

            <label
                for="avatar">Avatar image</label>
            <br>
            Current avatar: <br>
            @if($user->avatar)
            <img
                src="{{asset('storage/'.$user->avatar)}}"
                width="120px" />
            <br>
                @else
                No avatar
                @endif
            <br>
            <input
                id="avatar"
                name="avatar"
                type="file"
                class="form-control">
            <small
                class="text-muted">Kosongkan jika tidak ingin mengubah avatar
            </small>

            <hr class="my-3">

            <label for="email">Email</label>
            <input
                value="{{$user->email}}"
                disabled
                class="form-control"
                placeholder="user@mail.com"
                type="text"
                name="email"
                id="email"/>
                <br>

            <input
                class="btn btn-primary btn-sm"
                type="submit"
                value="Save"/>

            <a
                href="{{route('users.index', [$user->id])}}"
                class="btn text-white btn-danger btn-sm">Back</a>
        </form>
    </div>
@endsection
