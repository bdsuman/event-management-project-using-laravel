@extends('frontend.layout.app')
@section('content')
    @include('frontend.components.post.article')
    @include('frontend.components.post.raleted')
    @include('frontend.components.post.promote')
    @include('frontend.components.post.alert')
    @include('frontend.components.post.modal')
    @include('frontend.components.home.footer')
@endsection

