<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Career Ready Program</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Trandings</li>
              <li class="breadcrumb-item active"><a href="{{ url('trandings/populers') }}">Career Ready Program</a></li>
              <li class="breadcrumb-item active">Update</li>
              <li class="breadcrumb-item active">
                <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">Delete</button>
              </li>
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
                <h3 class="card-title">Update</h3>
            </div>
            <div class="card-body">
                <form role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('trandings/careers/update/'.$careers->idcareers) }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                        <div class="col-sm-5">
                            <input type="text" name="name" value="{{$careers->name}}" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label>Kelas</label>
                      <div class="col-sm-5">
                      <select class="form-control" id="idclass" name="idclass" onchange="passing_value(this.value)" required>
                        <option value="">-- select Kelas -- </option>
                        @php
                          $instructor = [];
                          $roleins = [];
                          $duration = [];
                          $tutor = [];
                          $price = [];
                          $rating = []; 
                          $image = []; 
                        @endphp
                          @foreach ($classes as $cls)
                           <option value="{{$cls->idclass}}" @if ($cls->idclass == $careers->idclass) 
                                selected
                            @endif>{{$cls->name}}</option>


                            @php
                              $instructor[$cls->idclass] = $cls->instructor;
                              $roleins[$cls->idclass] = $cls->roleinstructor;
                              $duration[$cls->idclass] = $cls->duration;
                              $tutor[$cls->idclass] = $cls->tutor;
                              $price[$cls->idclass] = $cls->price;
                              $rating[$cls->idclass] = $cls->rating;       
                            @endphp
                          @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                      <div class="col-sm-5">
                        <input type="text" name="price" onchange="passing_value(this.value)" id="price" readonly value="{{$careers->classes->price}}" class="form-control">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Instructor</label>
                      <div class="col-sm-5">
                      <input type="text" name="instructor" onchange="passing_value(this.value)" id="instructor" readonly value="{{$careers->classes->instructor}}" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Role Instructor</label>
                      <div class="col-sm-5">
                        <input type="text" name="roleinstructor" onchange="passing_value(this.value)" id="roleinstructor" readonly value="{{$careers->classes->roleinstructor}}" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Durasi</label>
                      <div class="col-sm-5">
                        <input type="text" name="duration" onchange="passing_value(this.value)" id="duration" readonly value="{{$careers->classes->duration}}" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tutor</label>
                      <div class="col-sm-5">
                        <input type="text" name="tutor" onchange="passing_value(this.value)" id="tutor" readonly value="{{$careers->classes->tutor}}" class="form-control">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Rating</label>
                      <div class="col-sm-5">
                        <input type="text" name="rating" onchange="passing_value(this.value)" id="rating" readonly value="{{$careers->classes->rating}}" class="form-control">
                      </div>
                  </div>
                  
                    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>  
    
      </div>
    </section>
  </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Delete Career Ready Program</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are You Sure Delete Career Ready Program ?
      </div>
      <div class="modal-footer">
          <form action="{{ url('trandings/careers/delete/'.$careers->idcareers) }}" role="form" method="post">
            @method('delete')
            @csrf
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Yes</button>
        </form>
      </div>
    </div>

  </div>
</div> 

  <script>
        var ins = {!!json_encode($instructor)!!};
        var roleins = {!!json_encode($roleins)!!};
        var dur = {!!json_encode($duration)!!};
        var tut = {!!json_encode($tutor)!!};
        var cls = {!!json_encode($price)!!};
        var rat = {!!json_encode($rating)!!};
        console.log(cls)
        function passing_value(id){
          $('#instructor').val(roleins[id])
          $('#roleinstructor').val(ins[id])
          $('#duration').val(dur[id])
          $('#tutor').val(tut[id])
          $('#price').val(cls[id])
          $('#rating').val(rat[id])
          $('#image').val(img[id])
          // console.log(cls[id]);
        }
    </script>