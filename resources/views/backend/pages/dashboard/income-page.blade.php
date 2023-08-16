@extends('backend.layout.sidenav-layout')
@section('content')
    @include('backend.components.income.income-list')
    @include('backend.components.income.income-delete')
    @include('backend.components.income.income-create')
    @include('backend.components.income.income-update')
@endsection
