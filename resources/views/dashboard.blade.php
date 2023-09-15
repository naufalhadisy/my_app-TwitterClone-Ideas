
@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        <div class="card overflow-hidden">
            @include('shared.left_sidebar')
        </div>
    </div>
    <div class="col-6">
        @include('shared.success_msg')
        @include('shared.submit_ideas')
        <hr>
        @foreach ($ideas as $idea)
        <div class="mt-3">
            @include('shared.ideas_card')
        </div>
        @endforeach
        <div class="mt-3">
        {{$ideas->links()}}
        </div>
    </div>
    <div class="col-3">
        @include('shared.search_bar')
        @include('shared.follow_box')
    </div>
</div>
@endsection
