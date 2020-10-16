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
              {{-- <li class="breadcrumb-item"> <a href="{{ url('lecture/class') }}">Class</a> </li> --}}
              <li class="breadcrumb-item active">Detail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
               @include('contents.allmessage')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Detail
                        </h3>
                        <div class="float-right">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#subclass">Add Sub Class</button>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#hilights">Add Hilights</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td width="20%"><strong> Categories</strong></td>
                                    <td>{{$class->categories->name}}</td> 
                                </tr>
                                <tr>
                                    <td width="20%"><strong> Name</strong></td>
                                    <td>{{ $class->name }}</td> 
                                </tr>
                                <tr>
                                    <td width="20%"><strong>Duration</strong></td>
                                    <td>{{ $class->duration }}</td> 
                                </tr>
                                <tr>
                                    <td width="20%"><strong> Tutor</strong></td>
                                    <td>{{ $class->tutor }}</td> 
                                </tr>
                                <tr>
                                    <td width="20%"><strong> Description</strong></td>
                                    <td>{{ $class->description }}</td> 
                                </tr>
                                <tr>
                                    <td width="20%"><strong> Image</strong></td>
                                    <td>
                                        <img  src="{{env('PATH_URL')}}image/{{$class->images}}" alt="..." class="img-thumbnail">
                                    </td> 
                                </tr>
                                <tr>
                                    <td width="20%"><strong> Demo</strong></td>
                                    <td>
                                        <iframe  src="{{env('PATH_URL')}}demo/{{$class->demo}}" frameborder="0"></iframe>
                                    </td> 
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Open Subclass --}}
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            Sub Class
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name Sub Class</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classes->subclass as $idsub => $sub)     
                                        <tr>
                                            <td width="2%">{{ $idsub+1 }}</td>
                                            <td>{{ $sub->headmateri }}</td>
                                            <td>
                                                <a class="open-mdl btn btn-xs btn-default" data-toggle="modal" data-target="#materies" data-id="{{ $sub->idsubclass }}" title="Add Materies"><i class="fas fa-plus"></i></a>
                                                <a class="btn btn-xs btn-default" title="View Materies" onclick="view_materies({{ $class->idclass }},{{ $sub->idsubclass }})"><i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Close Subclass --}}
        {{-- Open Hilights --}}
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            Hilights
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name Hilights</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classes->hilights as $idhil => $hil)
                                    <tr>
                                        <td width="2%">{{ $idhil+1 }}</td>
                                        <td>{{ $hil->namehilights }}</td>
                                        <td>
                                            <a class="btn btn-xs btn-default" title="View Materies" onclick="view_materies({{ $class->idclass }},{{ $sub->idsubclass }})"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Close Hilights --}}
    </div><!-- /.container-fluid -->
  </section>
    <!-- /.content -->
  </div>
  
  {{-- open modal subclass  --}}
<div class="modal fade" id="subclass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ url('lecture/class/detail/'.$class->idclass.'/create-subclass') }}" role="form" method="post">
            @csrf
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title" id="exampleModalCenterTitle">Add Sub Class</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <button type="button" id="addsubclass" class="btn btn-primary btn-sm">Add Sub Class</button>                
            </div>
         
                <div class="row">
                    <div class="col-12">
                            <div class="table-responsive">
                                <table class="table" id="table_subclass">
                                    <tbody>
                                        <tr>
                                            <td width="5%">1</td>
                                            <td><input type="text" class="form-control" name="headmateri[]" id="headmateri_1" required></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            <input type="hidden" value="2" id="index_subclass">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Save">
        </div>
      </div>
    </form>
      </div>
    </div>
      {{-- close  modal subclass  --}}
  </div>

          {{-- open modal hilights  --}}
<div class="modal fade" id="hilights" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ url('lecture/class/detail/'.$class->idclass.'/create-hilights') }}" role="form" method="post">
            @csrf
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title" id="exampleModalCenterTitle">Add Hilights Class</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <button type="button" id="addhilights" class="btn btn-primary btn-sm">Add Hilights Class</button>                
            </div>
         
                <div class="row">
                    <div class="col-12">
                            <div class="table-responsive">
                                <table class="table" id="table_hilights">
                                    <tbody>
                                        <tr>
                                            <td width="5%">1</td>
                                            <td><input type="text" class="form-control" name="namehilights[]" id="namehilights_1" required></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            <input type="hidden" value="2" id="index_hilights">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Save">
        </div>
      </div>
    </form>
      </div>
    </div>
      {{-- close  modal hilights  --}}

  {{--  create modal materies  --}}
<div class="modal fade" id="materies" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ url('lecture/class/detail/'.$class->idclass.'/create-materies') }}" enctype="multipart/form-data" role="form" method="post">
            @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Add Materies</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <button type="button" id="addmateries" class="btn btn-default btn-sm">Add Materies</button>                
            </div>
            <div class="row">
                <div class="col-12">
                        <div class="table-responsive">
                            <table class="table" id="table_materies">
                                <tbody>
                                    <tr>
                                        <td width="2%">1</td>
                                        <td>
                                            <small><strong>Name</strong></small>
                                            <input type="hidden" id="add_idsubclass" name="add_idsubclass" >
                                            <input type="text" class="form-control" name="name_materies[]" id="name_materies_1" placeholder="Name Materies" required>
                                        </td>
                                        <td>
                                            <small><strong>Video 480</strong></small>
                                            <input type="file" class="form-control-file" name="video_480[]" id="video_480_1">
                                            <small class="text-danger">Extension Video Only MP4</small>

                                        </td>
                                        <td>
                                            <small><strong>Video 720</strong></small>
                                            <input type="file" class="form-control-file" name="video_720[]" id="video_720_1">
                                            <small class="text-danger">Extension Video Only MP4</small>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            <input type="hidden" value="2" id="index_materies">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Save">
        </div>
    </form>

      </div>
    </div>
  </div>

  {{--  modal view materies  --}}
  @include('contents.class.materies.detail')

  <script>
        //delete create table subclass
        $('#table_subclass').on('click', '.del' ,function(){
            $(this).closest('tr').remove();
            var subclass = $('#index_subclass').val();
            $('#index_subclass').val(parseInt(subclass)-1);
        });

         //delete create table materies
         $('#table_materies').on('click', '.del-add-materies' ,function(){
            $(this).closest('tr').remove();
            var materis_num = $('#index_materies').val();
            $('#index_materies').val(parseInt(materis_num)-1);
        });

        $('#addsubclass').on('click', function(){
            var subclass = $('#index_subclass').val();
            $('#index_subclass').val(parseInt(subclass)+1);

            $('#table_subclass').append('<tr>'
                    +'<td width="5%">'
                        +subclass
                    +'</td>'
                    +'<td>'
                        +'<input type="text" class="form-control" name="headmateri[]" id="headmateri_'+subclass+'">'
                    +'</td>'
                    +'<td>'
                        +'<a class="del btn btn-sm"><i class="fas fa-trash"></i></a>'
                    +'</td>'
                +'</tr>'
            );
        });

        $('#addmateries').on('click', function(){
            var materis = $('#index_materies').val();
            $('#index_materies').val(parseInt(materis)+1);
            $('#table_materies').append('<tr>'
                    +'<td>'
                        +materis
                    +'</td>'
                    +'<td>'
                       +'<small><strong>Name</strong></small>'
                        +'<input type="text" class="form-control" name="name_materies[]" id="name_materies_'+materis+'" placeholder="Name Materies" required>'
                    +'</td>'
                    +'<td>'
                        +'<small><strong>Video 480</strong></small>'
                        +'<input type="file" class="form-control-file" name="video_480[]" id="video_480_'+materis+'">'
                        +'<small class="text-danger">Extension Video Only MP4</small>'
                    +'</td>'
                    +'<td>'
                        +'<small><strong>Video 720</strong></small>'
                        +'<input type="file" class="form-control-file" name="video_720[]" id="video_720_'+materis+'">'
                        +'<small class="text-danger">Extension Video Only MP4</small>'
                    +'</td>'
                    +'<td>'
                        +'<a class="del-add-materies btn btn-sm"><i class="fas fa-trash"></i></a>'
                    +'</td>'
                +'</tr>'
            );
        });

        $('.open-mdl').on('click',function(){
            var idsubclass = $(this).data('id');
            $('#add_idsubclass').val(idsubclass);
        })

        function view_materies(idclass,idsub){
            $.ajax({
                type: "GET",
                url: "{{url('lecture/class/detail')}}/"+idclass+'/view-materies/'+idsub,
                dataType: "json",
                success: function (response) {
                    $('#view-materies').modal('show');
                    console.log(response);
                    var content = '';
                    $.each(response.subclass, function( index, value ) {
                        content += '<tr>'+index+'<tr>' 
                    });
                    $('#tr-view-show').html(content)
                }
            });
        }
       
      
  </script>


{{-- open hilights --}}
<script>
    //delete create table subclass
    $('#table_hilights').on('click', '.del' ,function(){
        $(this).closest('tr').remove();
        var hilights = $('#index_hilights').val();
        $('#index_hilights').val(parseInt(hilights)-1);
    });


    $('#addhilights').on('click', function(){
        var hilights = $('#index_hilights').val();
        $('#index_hilights').val(parseInt(hilights)+1);

        $('#table_hilights').append('<tr>'
                +'<td width="5%">'
                    +hilights
                +'</td>'
                +'<td>'
                    +'<input type="text" class="form-control" name="namehilights[]" id="namehilights_'+hilights+'">'
                +'</td>'
                +'<td>'
                    +'<a class="del btn btn-sm"><i class="fas fa-trash"></i></a>'
                +'</td>'
            +'</tr>'
        );
    });

    $('.open-mdl').on('click',function(){
        var idhilights = $(this).data('id');
        $('#add_idhilights').val(idhilights);
    })
   
  
</script>
{{-- close hiligts --}}