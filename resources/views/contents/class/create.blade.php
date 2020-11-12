<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Class</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Class</li>
            <li class="breadcrumb-item active">Create New</li>

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        {{--  <div class="row">
            <div class="col-12">
                <div>
                    <button type="button" id="addrow" class="btn btn-xs btn-secondary"><i class="fas fa-plus size:2x"></i> Add Materi</button>
                </div>
            </div>
        </div>  --}}
        <br>

        <form action="{{ url('lecture/class/create-new') }}" role="form" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
              <div class="col-12">
                @include('contents.allmessage')
                  <div class="card card-primary">
                      <div class="card-header">
                          <h3 class="card-title">
                            Create
                          </h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Categories</label>
                          <div class="col-sm-10">
                            <select name="idcategories" id="select2" class="form-control">
                              <option value=""> -- select categories -- </option>
                              @foreach ($categories as $cat)
                              <option value="{{$cat->idcategories}}">{{$cat->name}}</option>
                            @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Class Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Example: Class Android Kotlin" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Class Duration (minute)</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" name="duration" placeholder="Example: 60" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Class Image</label>
                          <div class="col-sm-10">
                            <input type="file" class="form-control-file" id="images" name="images" accept="image/svg,image/jpeg" required>
                            <small class="text-danger">Extension must jpg, jpeg</small>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Name Mitra</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="namemitra" placeholder="Example: Ekselen.id">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Description Mitra</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" name="descriptionmitra" placeholder="Description Mitra"  cols="10" rows="2"></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Image Mitra</label>
                          <div class="col-sm-10">
                            <input type="file" class="form-control-file" id="images" name="imagesmitra" accept="image/svg,image/jpeg">
                            <small class="text-danger">Extension must jpg, jpeg</small>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Instructor</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="instructor" placeholder="Example: Armen marifin" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Role Instructor</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="roleinstructor" placeholder="Example: Software Enginer" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">About Instructor</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="tutor" placeholder="Example: Deskripsi Tutor Instructor" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Images Instructor</label>
                          <div class="col-sm-10">
                            <input type="file" id="imagesinstructor" accept="image/svg,image/jpeg" class="form-control-file" name="imagesinstructor" required>
                            <small class="text-danger">Extension must jpg</small>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Description</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" name="description" placeholder="Deskripsi kelas"  cols="10" rows="2" required></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Price</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="price" placeholder="Example: 200000" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Rating</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" name="rating" placeholder="Example: 5" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Demo</label>
                          <div class="col-sm-10">
                            <input type="file" class="form-control-file" id="demo" name="demo" accept="video/mp4" required>
                            <small class="text-danger">Extension must MP4</small>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label"></label>
                          <div class="col-sm-10">
                            <a href="{{ url('class') }}" class="btn btn-warning" >Cancel </a>
                            <div class="float-right">
                              <input type="submit" class="btn btn-success" value="Save">
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>  
              </div>
          </div>
        </form>
        
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<script>
    {{--  $('#addrow').on('click',function(){
      var ais = $('#appendindex').val();
      $('#appendindex').val(parseInt(ais)+1);

      $('#count').append('<div class="container-fluid">'
            +'<div class="row" id="row_'+ais+'">'
              +'<div class="col-12">'
                +'<div class="card">'
                  +'<div class="card-header">'
                    +'<h3 class="card-title">Materi</h3>'
                  +'</div>'
                  +'<div class="card-body">'
                    +'<div class="form-group row">'
                     +'<label for="name_materi" class="col-sm-2 col-form-label">Name</label>'
                      +'<div class="col-sm-10">'
                        +'<input type="text" class="form-control" name="name_materi[]" id="name_materi_'+ais+'" placeholder="Name Materi">'
                      +'</div>'
                    +'</div>'
                    +'<div class="form-group row">'
                      +'<label class="col-sm-2 col-form-label"></label>'
                      +'<div class="col-sm-10">'
                        +'<button type="button" id="addrowsub_'+ais+'" class="btn btn-xs btn-secondary"><i class="fas fa-plus size:2x"></i> Add Sub Materi</button>'
                      +'</div>'
                    +'</div>'
                  +'</div>'
                +'</div>'  
              +'</div>'    
            +'</div>'
          +'</div>'
        )
        sub_materi(ais);
    });
    
    function sub_materi(ais){
      $('#table_'+ais+'').append('<tr>'
        +'<td>'
          +'dsdsfsdf'
        +'</td>'    
      +'</tr>');
      console.log(ais)
    }  --}}
</script>

{{-- batasan size images instructor --}}
<script>
$(document).ready(function() {
    maxFileSize = 10 * 1024 * 1024 / 2; // 5 mb

    $('#imagesinstructor').change(function() {
      fileSize = this.files[0].size;

      if (fileSize > maxFileSize) {
        this.setCustomValidity("You can upload only files under 5 MB");
        this.reportValidity();
      } else {
        this.setCustomValidity("");
      }
    });
  });
</script>

  {{-- batasan size images --}}
  <script type="text/javascript">
    $(document).ready(function() {
      maxFileSize = 10 * 1024 * 1024 / 2; // 5 mb
  
      $('#images').change(function() {
        fileSize = this.files[0].size;
  
        if (fileSize > maxFileSize) {
          this.setCustomValidity("You can upload only files under 5 MB");
          this.reportValidity();
        } else {
          this.setCustomValidity("");
        }
      });
    });
  </script>

{{-- batasan demo max size --}}
<script type="text/javascript">
  $(document).ready(function() {
    maxFileSize = 10 * 1024 * 1024 * 3; // 30 mb

    $('#demo').change(function() {
      fileSize = this.files[0].size;

      if (fileSize > maxFileSize) {
        this.setCustomValidity("You can upload only files under 30 MB");
        this.reportValidity();
      } else {
        this.setCustomValidity("");
      }
    });
  });
</script>