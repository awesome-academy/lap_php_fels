@extends('layouts.app')

@section('header')
    <h1>{{ $lession->name }}</h1>
@endsection

@section('content')
<section id="about-us">
    <div class="section-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="group-tabs">
                        <div class="tab-content">
                            <h3 class="text-center">{{ trans('pages.results') }}</h3>
                            <div>
                                <?php $i = {{ config('number.one') }} ?>
                                @csrf
                                @foreach ($lession->test->questions as $question)
                                <div class="form-group mt0 mb20">
                                    <div >
                                        <label for="{{ $question->id }}">{{ $i . '. ' . $question->text }}</label>
                                    </div>
                                    <div>
                                        @foreach ($question->answers as $answer)
                                        <input type="radio" disabled="" @if ($request->get($question->id) == $answer->id) checked="" @endif  name="{{ $question->id }}" value="{{ $answer->id }}" required="required"> {{ $answer->text }}
                                            @foreach ($true_answer as $true)
                                                @if ($true->id == $answer->id)
                                                <i class="fas fa-check"></i>
                                                @endif
                                            @endforeach
                                        <br>
                                        @endforeach
                                    </div>
                                </div>
                                <?php $i++ ?>
                                @endforeach
                            </div>
                        </div>
                        <a href="#" class="btn btn-outline-primary"><i class="fas fa-arrow-circle-left"></i> {{ trans('pages.back_to_home') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
