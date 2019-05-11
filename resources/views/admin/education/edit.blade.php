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
                        Edit Education
                    </h1>
                </div>
                <div class="body">
                    <form action="{{ url('admin/education/'.$education->id) }}" id="willSubmit" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="study" class="form-control" form="willSubmit" value="{{ $education->study }}">
                                <label class="form-label">Nama Jurusan</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="university" class="form-control" form="willSubmit" value="{{ $education->university }}">
                                <label class="form-label">Nama Universitas</label>
                            </div>
                        </div>    
                        
                        <label>Periode Pendidikan ( Dari dan Sampai )</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="date" name="from" class="form-control" form="willSubmit" value="{{ $education->from }}">
                                <!-- <label class="form-label">Dari Tanggal</label> -->
                            </div>
                        </div>    
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="date" name="until" class="form-control" form="willSubmit" value="{{ $education->until }}">
                                <!-- <label class="form-label">Sampai Tanggal</label> -->
                            </div>
                        </div>    
                        
                        <label>Deskripsi Pendidikan</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <textarea name="description" class="my-editor" form="willSubmit" rows="20">{{ $education->description }}</textarea>
                            </div>
                        </div>    

                        <div class="form-group">
                            <label>Thumbnail</label>
                            @if(isset($education->thumbnail))
                                <br>
                                <img class="img-responsive" style="max-width: 30vw; max-height: 30vh;" src="{{ url('education/'.$education->thumbnail) }}">
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
