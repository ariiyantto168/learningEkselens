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
            <li class="breadcrumb-item active">Lecture</li>
            <li class="breadcrumb-item active"><a href="{{ url('lecture/class') }}">Class</a></li>
            <li class="breadcrumb-item active">Create-new</li>

          </ol>
        </div><!-- /.col -->      
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-primary">
          <div class="card-header">
              <h3 class="card-title">Create</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
              </div>
          </div>
          <div class="card-body">
              <form role="form" method="post" enctype="multipart/form-data" action="{{ url('lecture/class/create-new') }}">
                  @csrf
                  <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <div class="col-sm-6">
                        <input type="text" name="name" placeholder="Name" class="form-control">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Duration</label>
                    <div class="col-sm-6">
                      <input type="text" name="duration" placeholder="Duration" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Category</label>
                    <div class="col-sm-6">
                    <select class="form-control" id="idcategories" name="idcategories">
                      <option>-- select categories -- </option>
                        @foreach ($categories as $cat)
                          <option value="{{$cat->idcategories}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Images</label>
                      <div class="col-sm-6">
                      <input type="file" name="images" class="form-control">
                      <small class="text-danger">size image max 5 mb</small>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Demo</label>
                      <div class="col-sm-6">
                      <input type="file" name="demo" class="form-control">
                      <small class="text-danger">size image max 10 mb</small>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tutor</label>
                    <div class="col-sm-6">
                      <textarea name="tutor" rows="3"  class="form-control" required></textarea>
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <div class="col-sm-6">
                      <textarea name="description" rows="3"  class="form-control" required></textarea>
                    </div>
                  </div>

                  {{-- class lecture --}}
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Materi Lecture</h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                      </div>
                    </div>

                    <div class="card-body">
                      <button type="button" id="addHeadMateri" class="btn btn-block btn-outline-primary btn-sm" style="width: 60px;">Add</button>
                      <br><br>
                        <table id="tableHeadMateri">
                          <tbody>
                            <tr>
                              <tr>
                                <td style="width=10% height:10px;">
                                  <label>1</label>
                                  <br>
                                </td>
                                <td>
                                  <label>Head Materi</label>
                                  <input type="text" style="width: 500px;" name="headmateri[]" id="headmateri_1" placeholder="Head Materi" class="form-control">
                                </td>
                              </tr>
                              
                              <tr>
                                <td>
                                  <button type="button" id="addMateri_1" class="btn btn-block btn-outline-primary btn-sm" style="width: 60px;">Add</button>
                                </td>
                              </tr>

                              <table>
                                <tbody>
                                  <tr>
                                    <td width="10%" >
                                      <label>1</label>
                                    </td>
                                    <td>
                                      <label>Materi</label>
                                      <input type="text" style="width: 500px;" name="materi[]" id="materi_1" placeholder="Materi" class="form-control">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>

                            </tr>
                          </tbody>
                        </table>
                

                      {{-- <div class="form-group">
                        <label for="exampleInputEmail1">Head Materi</label>
                        <div class="col-sm-6">
                          <input type="text" name="headmateri" placeholder="Head Materi" class="form-control">
                        </div>
                      </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Name Materi</label>
                          <div class="col-sm-6">
                            <input type="text" name="materi" placeholder="Materi" class="form-control">
                          </div>
                        </div> --}}
  


                    </div>
                  </div>

                  {{-- hilight lecture --}}
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Hilight Lecture</h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                      </div>
                    </div>

                    <div class="card-body">
                      <button type="button" id="addHilights" class="btn btn-block btn-outline-primary btn-sm" style="width: 60px;">Add</button>
                      <br>

                      <table id="tableHilights" class="table">
                        <tbody>
                          <tr>
                            <td style="text-align=center">
                              <label>1</label>
                            </td>
                            <td style="text-align=center">
                              <label for="exampleInputEmail1">Hilights Class</label>
                              <textarea name="namehilights[]" style="width: 500px;" id="namehilights_1"  class="form-control" required></textarea>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                  </div>
                      
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </form>
          </div>
      </div>  
  
    </div>
    <input type="hidden" id="appenhilights" value="2">
    <input type="hidden" id="appenheadmateri" value="2">
    <input type="hidden" id="appenmatericlass" value="2">
  </section>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</div>

<script>

  //  Hilights open
  //delete row for hilights
  $('#tableHilights').on('click', '.del' ,function(){
      $(this).closest('tr').remove();
  });

  // looping table for hilights
    $('#addHilights').on('click', function(){
      var ais = $('#appenhilights').val();
      $('#appenhilights').val(parseInt(ais)+1);

      //add row for hilights
    $('#tableHilights').append('<tr>'
      +'<td style="text-align=center">'
        +'<label>'+ais+'</label><br>'
        +'<a class="btn btn-xs del"><i class="fas fa-trash" aria-hidden="true"></i></a>'
      +'</td>'
      +'<td style="text-align=center">'
        +'<label for="exampleInputEmail1">Hilights Class</label>'
        +'<textarea name="namehilights[]" style="width: 500px;" id="namehilights_'+ais+'"  class="form-control" required></textarea>'
      +'</td>' 
    +'</tr>'
    );
    })
    // Hilights Close
</script>
<script>
  /**
        Head Materi
    **/

    // delete row for head materi
    $('#tableHeadMateri').on('click', '.del' ,function(){
      $(this).closest('tr').remove();
    });

    //delete materi
    $('#addMateriClass').on('click', '.del' ,function(){
      $(this).closest('tr').remove();
    });

    // looping table for hilights
    $('#addHeadMateri').on('click', function(){
      var ais = $('#appenheadmateri').val();
      $('#appenheadmateri').val(parseInt(ais)+1);

      //add row for hilights
    $('#tableHeadMateri').append('<tr>'
        +'<tr>'
          +'<td style="width=10% height:10px;">'
            +'<label>'+ais+'</label><br>'
            +'<a class="btn btn-xs del"><i class="fas fa-trash" aria-hidden="true"></i></a>'
            +'<br>'
          +'</td>'
          +'<td>'
            +'<label>Head Materi</label>'
            +'<input type="text" style="width: 500px;" name="headmateri[]" id="headmateri_'+ais+'" placeholder="Head Materi" class="form-control">'
            +'<br>'
          +'</td>'
        +'</tr>'
        +'<tr>'
          +'<td>'
            +'<button type="button" id="addMateri_'+ais+'" class="btn btn-block btn-outline-primary btn-sm" style="width: 60px;">Add</button>'
          +'</td>'
        +'</tr>'
    +'</tr>'
    );
      
    })
</script>