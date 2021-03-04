@extends('main')
@section('title', 'New Member')
@section('content')
    <h1>Add New Member</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('store_member') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name='email' class="form-control" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">School</label>
            <select class="custom-select" name="school">
                <option selected>Open this select menu</option>
                @foreach($schools as $school)
                <option value="{{ $school->id }}">{{ $school->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
