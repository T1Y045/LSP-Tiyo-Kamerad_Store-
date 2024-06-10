@extends('dashboard.master')
@section('title', 'dashboard')
@section('nav')
    @include('dashboard.nav')
@endsection
@section('page-title', 'Dashboard')
@section('main')
    @include('dashboard.main')
    @include('chart.dashboard')
@endsection

