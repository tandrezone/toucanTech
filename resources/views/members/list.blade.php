@extends('main')
@section('title', 'List Schools')
@section('content')
    <h1>List Schools</h1>

    @if(count($schools) < 1)
        <div class="alert alert-warning">
            <strong>Sorry! No schools</strong>, please insert them manually on the db or run php artisan migrate:fresh
            --seed
        </div>
    @else
        Click on the school to see members:<br/>
        @foreach($schools as $school)
            <a href="{{ route('list_members', $school->id) }}">{{ $school->name }}</a><br/>
        @endforeach
    @endif
@endsection
