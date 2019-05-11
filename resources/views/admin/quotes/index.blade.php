@extends('layouts.admin')

@section('styles')
<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
@endsection

@section('contents')
	<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Edit Quotes
                    </h1>
                </div>
                <div class="body">
                    <form action="{{ url('admin/quotes') }}" id="myForm" class="willSubmit" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="description" value="{{ $quote->description }}">
                                <label class="form-label">Quotes</label>
                            </div>
                        </div>
						<button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection