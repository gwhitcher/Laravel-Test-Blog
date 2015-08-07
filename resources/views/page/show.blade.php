@extends('layouts.master')
<?php
    $title = $page->title;
?>
@section('title', $title)

@section('content')
    <header class="intro-header" style="background-image: url('{{ page_image($page->page_image) }}')">&nbsp;</header>
    <div class="container">
        <div class="site-heading">
            <h1>{{ $page->title }}</h1>
            <hr class="small">
        </div>
        {!! $page->content_html !!}
    </div>
@endsection