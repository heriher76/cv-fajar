@extends('layouts.admin')

@section('styles')
    <!-- JQuery DataTable Css -->
    <link href="{{ url('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('contents')
	<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        List Experience
                    </h1>
                </div>
                <div class="body">
                	<a href="{{ url('/admin/experience/create') }}" class="btn btn-success">Tambah</a>
                	<br><br>
                	<div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Pekerjaan</th>
                                    <th>Tempat</th>
                                    <th>Waktu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($experiences as $experience)
                                <tr>
                                    <td>{{ $experience->name }}</td>
                                    <td>{{ $experience->work_at }}</td>
                                    <td>{{ $experience->from }} || {{ $experience->until }}</td>
                                    <td>
                                        <a href="{{ url('admin/experience/'.$experience->id.'/edit') }}" class="btn btn-success btn-xs waves-effect">Edit</a>
                                        <form action="{{ url('admin/experience/'.$experience->id) }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Ingin Menghapus Experience Ini ?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END Table -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
	<!-- Jquery DataTable Plugin Js -->
	<script src="{{ url('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
	<script src="{{ url('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
@endsection

@section('datatable')
	<script src="{{ url('js/pages/tables/jquery-datatable.js') }}"></script>
@endsection