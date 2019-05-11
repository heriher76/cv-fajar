@extends('layouts.admin')

@section('contents')
	<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Setting
                    </h1>
                </div>
                <div class="body">
                    <form action="{{ url('admin/setting/') }}" id="willSubmit" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>Parallax Background</label>
                            @if(isset($setting->background_parallax))
                                <br>
                                <img class="img-responsive" style="max-width: 30vw; max-height: 30vh;" src="{{ url('images/'.$setting->background_parallax) }}">
                            @endif
                            <input type="file" name="thumbnail" class="form-control" form="willSubmit" value="">
                        </div>

                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                    
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection