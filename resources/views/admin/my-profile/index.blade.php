@extends('layouts.admin')

@section('styles')
<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
@endsection

@section('contents')
	<div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Edit My Profile
                    </h1>
                </div>
                <div class="body">
                    <!-- <form action="{{ url('admin/my-profile') }}" id="myForm" class="willSubmit" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }} -->
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="name" class="form-control" form="willSubmit" value="{{ $myBio->name }}">
                                <label class="form-label">Nama</label>
                            </div>

                            <div class="form-line">
                                <textarea name="description" class="my-editor" form="willSubmit" rows="20">{{ $myBio->description }}</textarea>
                            </div>

                        </div>
                        
                        <div class="form-group">
                            <label>Photo Background</label>
                            @if(isset($myBio->photo_background))
                                <br>
                                <img class="img-responsive" style="max-width: 30vw; max-height: 30vh;" src="{{ url('mybio/'.$myBio->photo_background) }}">
                            @endif
                            <input type="file" name="photo_background" class="form-control" form="willSubmit" value="">
                        </div>

                    <!-- </form> -->
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
              		<p>Sosmed = </p>
              		<form action="{{ url('admin/my-profile') }}" id="willSubmit" method="POST" enctype="multipart/form-data">
              			{{ csrf_field() }}
                    	{{ method_field('put') }}
	              		<div class="form-group form-float">	
	              			<div class="form-line">
	              				<input type="text" name="ig" class="form-control" value="{{ $myBio->ig }}">
	              				<label class="form-label">Instagram</label>
	              			</div>
	              		</div>
                    <div class="form-group form-float"> 
                      <div class="form-line">
                        <input type="text" name="fb" class="form-control" value="{{ $myBio->fb }}">
                        <label class="form-label">Facebook</label>
                      </div>
                    </div>
                    <div class="form-group form-float"> 
                      <div class="form-line">
                        <input type="text" name="in" class="form-control" value="{{ $myBio->in }}">
                        <label class="form-label">Linked In</label>
                      </div>
                    </div>
                    <div class="form-group form-float"> 
                      <div class="form-line">
                        <input type="text" name="twitter" class="form-control" value="{{ $myBio->twitter }}">
                        <label class="form-label">Twitter</label>
                      </div>
                    </div>
                    <div class="form-group form-float"> 
                      <div class="form-line">
                        <input type="text" name="github" class="form-control" value="{{ $myBio->github }}">
                        <label class="form-label">Github</label>
                      </div>
                    </div>
	                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
              		</form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
  var editor_config = {
    path_absolute : "{{ url('/').'/' }}",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endsection
