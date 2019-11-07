@extends('layouts.app')

@section('header')
    <h1>{{ trans('pages.browse_our_course') }}</h1>
    <p class="section-sub-title">{{ trans('pages.hurry_up_quickly') }}</p>
@endsection

@section('content')
<section id="our-courses">
    <div class="section-inner">
        <div class="container">
            <div class="row justify-content-md-center">
                @foreach ($courses as $course)
                    @if (count($course->lessions) > config('number.zero'))
                    <div class="mb40 col-sm-4">
                        <h5><span>{{ $course->name }}</span></h5>
                        <p class="lead"><b>{{ count($course->lessions) }} </b>{{ trans('pages.lessions') }}</p>
                        <a href="{{ route('get.all.lession', [$course->id, $course->slug]) }}" class="btn btn-primary btn-green">{{ trans('pages.register_course') }}</a>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

<a href="#" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

</div>
@endsection
