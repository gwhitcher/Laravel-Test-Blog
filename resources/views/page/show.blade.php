@extends('layouts.master')
<?php
    $title = $page->title;
?>
@section('title', $title)

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div class="container page_padding">
        <div class="site-heading">
            <h1>{{ $page->title }}</h1>
            <hr class="small">
        </div>
        {!! $page->content_html !!}
    </div>
@endsection