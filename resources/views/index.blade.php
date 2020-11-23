@extends('layouts.app')
@section('body')
    @include('parts.slider.slider-1')
    <div class="main-container">
        @include('parts.category.category-tree')
        <div class="main-content">
            <div class="container-fluid">
                @include('parts.category.category')
            </div>
        </div>
    </div>
@endsection
