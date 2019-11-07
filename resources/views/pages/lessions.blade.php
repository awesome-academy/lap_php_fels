@extends('layouts.app')

@section('header')

<h1>{{ $course->name }}</h1>

@endsection

@section('content')

<section id="our-courses">
    <div class="section-inner">
        <div class="container">
            <div class="row">
                @foreach($lessions as $lession)
                <div class="col-md-12 mb40">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="hover-effect smoothie mb40">
                                <a href="#" class="smoothie">
                                    <img src="{{ $lession->avatar }}" alt="{{ trans('pages.image') }}" class="img-responsive smoothie">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <h2 class="mt0 mb40">{{ $lession->name }}</h2>
                            <p class="mb20"><small>{{ $lession->description }}</small></p>
                            <a href="#" class="btn btn-primary btn-red" data-toggle="modal" data-target="#{{ $lession->slug }}">{{ trans('pages.word_list') }}</a>
                            <a href="{{ route('get.detail.lession', [$lession->id, $lession->slug]) }}" class="btn btn-primary btn-green">{{ trans('pages.start_lession') }}</a>
                            <div class="modal fade" id="{{ $lession->slug }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{ $lession->name }}</h4>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            @foreach($lession->words as $word)
                                            <b>{{ $word->key_word }}</b>
                                            <br>
                                            @endforeach
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('pages.close') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
