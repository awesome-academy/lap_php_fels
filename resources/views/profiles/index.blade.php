@extends('layouts.app')

@section('content')
<div class="container">
    <div id="user-profile-2" class="user-profile">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
                <li class="active">
                    <a href="#">
                        <i class="green ace-icon fa fa-user bigger-120"></i>
                        {{ trans('profile.profile') }}
                    </a>
                </li>
            </ul>

            <div class="tab-content no-border padding-24">
                <div class="tab-pane in active">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 center">
                            <span class="profile-picture mb20">
                                <form>
                                    @if (Auth::user()->id == $user->id)
                                        <input type="file" name="avatar" value="asad ">
                                    @endif
                                    <img class="editable img-responsive" alt="{{ trans('profile.avatar') }}" id="avatar2" src="{{ $user->avatar }}">
                                </form>
                            </span>
                            <div class="d-flex justify-content-between mb20">
                                <span class="pull-left"><b>{{ count($activities) }}</b>{{ trans('profile.activities') }}</span>
                                <span><b>{{ count($userFollow) }}</b>{{ trans('profile.followers') }}</span>
                                <span class="pull-right">{{ {{ trans('profile.following') }} }}<b>{{ count($followUser) }}</b>{{ trans('profile.users') }}</span>
                            </div>
                            @if (Auth::user()->id != $user->id)
                            <div class="space space-4"></div>
                                <?php $i = config('number.zero') ?>
                                @foreach ($followUser as $follow)
                                    @if ($follow->id == $user->id)
                                        <?php $i = config('number.one'); break; ?>
                                    @endif
                                @endforeach
                                @if ($i == config('number.zero'))
                                    <a href="#" class="btn btn-sm btn-success">
                                        <span class="bigger-110">{{ trans('profile.followed') }}</span>
                                    </a>
                                @else
                                    <a href="#" class="btn btn-sm btn-success">
                                        <i class="ace-icon fa fa-plus-circle bigger-120"></i>
                                        <span class="bigger-110">{{ trans('profile.follow') }}</span>
                                    </a>
                                @endif
                            @endif

                        </div><!-- /.col -->

                        <div class="col-xs-12 col-sm-8">
                            <h4 class="blue">
                                <span class="middle">{{ $user->name }}</span>
                                @if (Auth::user()->id == $user->id)
                                <a href="{{ route('get.edit.profile',Auth::user()->id) }}">&nbsp;<i class="fas fa-pencil-alt"></i></a>
                                @endif
                            </h4>

                            <div class="profile-user-info">
                                <div class="profile-info-row">
                                    <div class="profile-info-name">{{ trans('profile._gender') }}</div>

                                    <div class="profile-info-value">
                                        <span>{{ $user->gender == config('number.zero') ? trans('profile.male') : trans('profile.female') }}</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name">{{ trans('profile._age') }}</div>

                                    <div class="profile-info-value">
                                        <span>{{ $user->birthday ? Carbon\Carbon::parse($user->birthday)->age : trans('profile.n_a') }}</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name">{{ trans('profile._email') }}</div>

                                    <div class="profile-info-value">
                                        <span>{{ $user->email? $user->email : trans('profile.n_a') }}</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name">{{ trans('profile._phone') }}</div>

                                    <div class="profile-info-value">
                                        <span>{{ $user->phone? $user->phone : trans('profile.n_a') }}</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name">{{ trans('profile._location') }}</div>

                                    <div class="profile-info-value">
                                        <i class="fa fa-map-marker light-orange bigger-110"></i>
                                        <span>{{ $user->address ? $user->address : trans('profile.n_a') }}</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name">{{ trans('profile._joined') }}</div>

                                    <div class="profile-info-value">
                                        <span>{{ $user->created_at? $user->created_at->format('Y/m/d') : trans('profile.n_a') }}</span>
                                    </div>
                                </div>

                            </div>

                            <div class="hr hr-8 dotted"></div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="space-20"></div>
                </div><!-- /#home -->

            </div>
        </div>
    </div>
    <div id="user-profile-2" class="user-profile">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
                <li class="active">
                    <a data-toggle="tab" href="#feed">
                        <i class="orange ace-icon fa fa-rss bigger-120"></i>
                        {{ trans('profile.activity_feed') }}
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#course">
                        <i class="orange ace-icon fa fa-rss bigger-120"></i>
                        {{ trans('profile.registed_courses') }}
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#lession">
                        <i class="blue ace-icon fa fa-users bigger-120"></i>
                        {{ trans('profile.learning_results') }}
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#result">
                        <i class="pink ace-icon fa fa-picture-o bigger-120"></i>
                        {{ trans('profile.words_memorised') }}
                    </a>
                </li>
            </ul>

            <div class="tab-content no-border padding-24">
                <div id="feed" class="tab-pane in active">
                        <div class="row">
                            @foreach ($activities as $act)
                            <div class="profile-activity clearfix col-lg-offset-1">
                                <div>
                                    <img class="pull-left" src="{{ $act->user->avatar }}">
                                    <a class="user" href="#"> {{ $act->user->name }} </a>
                                    {!! $act->description !!}
                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        {{ $act->created_at }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div><!-- /.row -->
                        <div class="text-center">
                            {{ $activities->links() }}
                        </div>
                    <div class="space-20"></div>
                </div>

                <div id="course" class="tab-pane">
                    <div class="profile-feed row">
                        <div class="col-sm-6">
                        </div>
                    </div><!-- /.row -->

                </div>

                <div id="lession" class="tab-pane">
                    <div class="row">
                        @foreach ($user->lessions as $lession)
                        <div class="profile-activity clearfix">
                            <div class="col-sm-3">
                                <a class="user" href="{{ route('get.detail.lession', [$lession->id, $lession->slug]) }}"> {{ $lession->name }} </a>
                            </div>
                            <div class="col-sm-9">
                                <span>{{ $lession->pivot->result }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div><!-- /.row -->
                    <div class="text-center">
                        {{ $activities->links() }}
                    </div>
                </div>

                <div id="result" class="tab-pane">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
