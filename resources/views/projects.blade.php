@extends('template.body')
@section('title', 'Gramkina | Projects')
@push('head')
    <link rel="stylesheet" href="{{asset('css/projects.css')}}">
@endpush
@section('body')
    <main>
        <div class="title-page">
            <span class="title-page-name">Projects</span>
            <hr class="title-page-line">
        </div>
        <div class="repos">
            @foreach($repos as $repo)
                <div class="repo">
                    <div class="repo-info">
                        <span class="repo-name">{{$repo['name']}}</span>
                        <span class="repo-desc">{{$repo['description']}}</span>
                        <div>
                            <div class="language-panel">
                                <div class="language-line">
                                    @php
                                        $languages = json_decode(\Illuminate\Support\Facades\Cache::get($repo['name']), true);
                                        $bytes = array_sum($languages);
                                    @endphp
                                    @foreach($languages as $language => $byte)
                                        <div style="width: {{round($byte/$bytes*100, 1)}}%; height: 4px; background: {{$colors[$language] ?? null}}"></div>
                                    @endforeach
                                </div>
                                <div class="languages-name">
                                @foreach($languages as $language => $byte)
                                    <div style="color: {{$colors[$language] ?? null}}">{{$language}}</div>
                                @endforeach
                                </div>
                            </div>
                           <a href="{{$repo['html_url']}}" target="_blank" class="repo-go-to"><img src="{{asset('img/repository.svg')}}">Go to repository</a>
                        </div>
                    </div>
                    <img class="repo-preview-img" src="{{asset('img/no_preview.svg')}}">
                </div>
            @endforeach
        </div>
    </main>
@endsection
