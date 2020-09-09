@extends('layouts.app')

@section('meta_title', $event->title)
@section('meta_description', $event->extracto)

@section('content')

<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 text-center">
                <div class="breadcrumb_content">
                    <h4 class="breadcrumb_title">Event</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$event->title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
    

@endsection