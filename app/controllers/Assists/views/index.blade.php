@extends('l.base')

@section('title')开发辅助 @stop

@section('beforeStyle')
    {{ style('bootstrap-3.0.3') }}
@stop

@section('style')
body
{
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #eef;
}
.form-center, .alert-dismissable
{
    float: none;
    margin: 0 auto;
    margin-top:2em;
}
@parent @stop

@section('body')


    <div class="container">

        <h2 style="text-align:center;">开发辅助</h2>

        <form method="post" action="{{ route('5-say-refresh') }}" class="col-lg-6 form-center" role="form">
            <input name="_method" type="hidden" value="PUT">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="input-group">
                {{ Form::select('refresh', $directories, '5-say', array('class' => 'form-control input-lg')) }}
                <span class="input-group-btn">
                    <button class="btn btn-lg btn-danger" type="submit" style="width:11em;">迁移并填充测试数据</button>
                </span>
            </div><!-- /input-group -->
        </form>

        <form method="post" action="{{ route('5-say-seed') }}" class="col-lg-6 form-center" role="form">
            <input name="_method" type="hidden" value="PUT">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="input-group">
                {{ Form::select('seed', $directories, '5-say', array('class' => 'form-control input-lg')) }}
                <span class="input-group-btn">
                    <button class="btn btn-lg btn-warning" type="submit" style="width:11em;">迁移并填充基础数据</button>
                </span>
            </div><!-- /input-group -->
        </form>


        <h2 style="text-align:center;">快速安装应用程序</h2>

        <form method="post" action="{{ route('5-say-create') }}" class="col-lg-6 form-center" role="form">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="input-group">
                {{ Form::select('type', array('base' => '快速安装，仅基础数据', 'all' => '完全安装，含测试数据'), 'all', array('class' => 'form-control input-lg')) }}
                <span class="input-group-btn">
                    <button class="btn btn-lg btn-primary" type="submit" style="width:11em;">安装</button>
                </span>
            </div><!-- /input-group -->
        </form>


        <div class="alert alert-warning alert-dismissable col-lg-6 {{ $errors->first('err')?'':'hidden'; }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ $errors->first('err') }}</strong>
        </div>
        <div class="alert alert-success alert-dismissable col-lg-6 {{ $errors->first('succ')?'':'hidden'; }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ $errors->first('succ') }}</strong>
        </div>
    </div> <!-- /container -->

@stop


@section('end')
    {{ script('jquery-1.10.2', 'bootstrap-3.0.3') }}
@stop
