@extends('layouts.global')
@section('title')Create New User @endsection
@section('content')

<div class="col-md-8">

    @if(session('status'))
        <div
            class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <form
        enctype="multipart/form-data"
        action="{{route('users.store')}}"
        class="bg-white shadow-sm p-3"
        method="POST">

        @csrf

        <label for="name">Name</label>
        <input
            type="text"
            class="form-control"
            name="name"
            id="name"
            placeholder="full name"/>
            <br/>

        <label for="username">Username</label>
        <input
            type="text"
            class="form-control"
            name="username"
            id="username"
            placeholder="username" />
            <br/>

        <label for="">Roles</label>
        <br>
        <input
            type="checkbox"
            name="roles[]"
            id="ADMIN"
            value="ADMIN">
            <label for="ADMIN">Administrator</label>

        <input
            type="checkbox"
            name="roles[]"
            id="STAFF"
            value="STAFF">
            <label for="STAFF">Staff</label>

        <input
            type="checkbox"
            name="roles[]"
            id="CUSTOMER"
            value="CUSTOMER">
            <label for="CUSTOMER">Customer</label>
            <br>

        <br>
        <label for="phone">Phone Number</label>
        <br>
        <input
            type="number"
            name="phone"
            class="form-control">
        <br>
        <label for="address">Address</label>
        <textarea
            class="form-control"
            name="address"
            id="address">
        </textarea>
        <br>

        <label for="avatar">Avatar Image</label>
        <br>
        <input
            type="file"
            id="avatar"
            name="avatar"
            class="form-control">

        <hr class="my-3">

        <label for="email">Email</label>
        <input
            type="text"
            class="form-control"
            type="email"
            name="email"
            id="email"
            placeholder="mail@gmail.com"
            />
        <br>

        <label for="password">Password</label>
        <input
            type="password"
            class="form-control"
            name="password"
            id="password"
            placeholder="password"/>
        <br>

        <label for="password_confirmation">Password Confirmation</label>
        <input
            class="form-control"
            type="password"
            name="password_confirmation"
            id="password_confirmation"
            placeholder="password confirmation"/>
        <br>

        <input
            class="btn btn-primary"
            type="submit"
            value="Save"/>

        <a
            href="{{route('users.index', [$user->id])}}"
            class="btn text-white btn-danger btn-sm">Back</a>
    </form>
</div>

@endsection
