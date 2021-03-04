@extends('main')
@section('title', 'Home')
@section('content')
    <h1>The Notes</h1>
    <ul>
        <li>This test was supposed to be made in codeigniter but due a lot of work this week i choose to do it in a framework that i use usually.</li>
        <li>i usually type int all the vars but since you are using php 7.0 that dont support class properties types (only php7.4)</li>
        <li>Also I will not use union type int since that is only available on php8</li>
        <li>This app includes a seed to create schools after creating the tables to easier testing to run it use the command php artisan migrate:fresh --seed</li>
        <li>The urls could be more secure (can get next school members changing the url) and more user friendly (school name instead of id) but i thought that for this case was not needed</li>
    </ul>

@endsection
