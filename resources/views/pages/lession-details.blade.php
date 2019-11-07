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
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a data-toggle="pill" href="#vocal">{{ trans('pages.vocabulary') }}</a></li>
                            <li><a data-toggle="pill" href="#quiz">{{ trans('pages.quiz') }}</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="vocal" class="tab-pane fade in active">
                                @foreach ($lession->words as $word)
                                    <h3 class="mt0 mb20">{{ $word->key_word }}</h3>
                                    <p class="mb20"><small>{{ $word->sentence }}</small></p>
                                @endforeach
                            </div>
                            <div id="quiz" class="tab-pane fade">
                                @php $i = 1 @endphp
                                <form action="{{ route('answer.question', [$lession->id, $lession->test->id]) }}" method="POST">
                                    @csrf
                                    @foreach ($lession->test->questions as $question)
                                    <div class="form-group mt0 mb20">
                                        <div >
                                            <label for="{{ $question->id }}">{{ $i . '. ' . $question->text }}</label>
                                        </div>
                                        <div>
                                            @foreach ($question->answers as $answer)
                                            <input type="radio" name="{{ $question->id }}" value="{{ $answer->id }}" required="required"> {{ $answer->text }}<br>
                                            @endforeach
                                        </div>
                                    </div>
                                    <hr class="mb20">
                                    <?php $i++ ?>
                                    @endforeach
                                    <input type="submit" class="btn btn-success" name="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
