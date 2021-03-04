@extends('main')
@section('title', 'List Members')
@section('content')
    <h1>List of Members</h1>
    <h4>{{ $school->name }}</h4>
    @if(count($members) < 1)
        <div class="alert alert-warning">
            <strong>Sorry! No Members</strong>, please insert them using "New Member" menu
        </div>
    @else
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($members as $member)
                <tr>
                    <th scope="row">{{ $member->id }}</th>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif
@endsection
