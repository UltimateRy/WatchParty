@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <create-party :initial-users="{{ $users }}"></create-party>
        </div>
        <div class="col-sm-6">
            <parties :initial-parties="{{ $parties }}" :user="{{ $user }}"></parties>
        </div>
    </div>
</div>
@endsection