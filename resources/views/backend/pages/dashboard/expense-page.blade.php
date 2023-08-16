@extends('backend.layout.sidenav-layout')
@section('content')
    @include('backend.components.expense.expense-list')
    @include('backend.components.expense.expense-delete')
    @include('backend.components.expense.expense-create')
    @include('backend.components.expense.expense-update')
@endsection
