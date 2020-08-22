{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- profile.blade.phpの@yield('title')に'自己紹介編集'を埋め込む --}}
@section('title', '自己紹介編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>自己紹介編集</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                   <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            @if ($profile_form->gender == "man")
                            <input type = "radio" checked = "checked" name = "gender" value = "man"><b>男性</b>
                            
                            <input type = "radio" name = "gender" value = "woman"><b>女性</b>
                            @else
                            <input type = "radio"  name = "gender" value = "man"><b>男性</b>
                            
                            <input type = "radio" checked = "checked" name = "gender" value = "woman"><b>女性</b>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-8">
                            <input type = "text" class = "form-control" name = "hobby" value = "{{ $profile_form->hobby }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">"{{ $profile_form->introduction }}"</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                {{-- 以下を追記　--}}
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($profile_form->hithistories != NULL)
                                @foreach ($profile_form->hithistories as $hithistory)
                                    <li class="list-group-item">{{ $hithistory->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection