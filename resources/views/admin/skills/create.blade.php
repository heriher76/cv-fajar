@extends('layouts.admin')

@section('contents')
	<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Create Skill
                    </h1>
                </div>
                <div class="body">
                    <form action="{{ url('admin/skills') }}" id="willSubmit" method="POST">
                        {{ csrf_field() }}
                        
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="name" class="form-control" form="willSubmit" value="">
                                <label class="form-label">Nama</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="icon" class="form-control" form="willSubmit" value="">
                                <label class="form-label">Icon</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <textarea name="description" class="form-control" form="willSubmit"> </textarea>
                                <label class="form-label">description</label>
                            </div>
                        </div>    
                                            
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Create</button>
                    
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection