@extends('template.body')
@section('title', 'Gramkina | Personal site')
@push('head')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endpush

@section('body')
    <main>

        {{-- AUTHOR INFO --}}
        <div class="author-preview quad">
            {{-- CIRCLE --}}
            <img src="/img/ellipse.svg" class="ellipse1">
            <img src="/img/ellipse.svg" class="ellipse2">
            <img src="/img/ellipse.svg" class="ellipse3">
            {{-- MIDDLE --}}
            <div class="author-name">
                <span class="author-nickname">Gramkina</span><br>
                <span class="author-profession">Backend-developer</span>
                {{-- CONTACTS --}}
                <a href="https://t.me/kmargin"><img src="/img/telegram.svg" alt="telegram" class="contact"></a>
                <a href="https://github.com/Gramkina"><img src="/img/github.svg" alt="github" class="contact"></a>
            </div>
        </div>

        <div class="card php-card">
            <object data="/img/elephant.svg"></object>
            <span class="card_title">PHP</span>
            <span class="card_desc">Using PHP as a server-side programming language</span>
        </div>
        <div class="card frameworks-card">
            <object data="/img/laravel.svg"></object>
            <span class="card_title">Frameworks</span>
            <span class="card_desc">Use of modern frameworks in project development</span>
        </div>
        <a href="{{route('projects')}}" class="card projects-card">
            <object data="/img/projects.svg"></object>
            <span class="card_title">Projects</span>
            <span class="card_desc">If you want to see the projects, then click here</span>
        </a>
    </main>
@endsection

