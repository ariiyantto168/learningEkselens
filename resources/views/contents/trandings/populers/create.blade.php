<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Kelas Populer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Trandings</li>
              <li class="breadcrumb-item active"><a href="{{ url('trandings/populers') }}">Populers</a></li>
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
            </div>
            <div class="card-body">
              @include('contents.allmessage')
                <form role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('trandings/populers/create-new') }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                        <div class="col-sm-5">
                          <input type="text" name="name" placeholder="Name" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label>Class</label>
                      <div class="col-sm-5">
                      <select class="form-control" id="idclass" name="idclass" onchange="passing_value(this.value)" required>
                        <option value="">-- select Class -- </option>
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
                            @php
                              $instructor[$cls->idclass] = $cls->instructor;
                              $roleins[$cls->idclass] = $cls->roleinstructor;
                              $duration[$cls->idclass] = $cls->duration;
                              $tutor[$cls->idclass] = $cls->tutor;
                              $price[$cls->idclass] = $cls->price;
                              $rating[$cls->idclass] = $cls->rating;       
                            @endphp
                            <option value="{{$cls->idclass}}">{{$cls->name}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                      <div class="col-sm-5">
                        <input type="text" name="price" onchange="passing_value(this.value)" id="price" readonly placeholder="Price" class="form-control" required>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Instructor</label>
                      <div class="col-sm-5">
                        <input type="text" name="instructor" onchange="passing_value(this.value)" id="instructor" readonly placeholder="Instructor" class="form-control" required>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Role Instructor</label>
                      <div class="col-sm-5">
                        <input type="text" name="roleinstructor" onchange="passing_value(this.value)" id="roleinstructor" readonly placeholder="Role Instructor" class="form-control" required>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Durasi</label>
                      <div class="col-sm-5">
                        <input type="text" name="duration" onchange="passing_value(this.value)" id="duration" readonly placeholder="Duration" class="form-control" required>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tutor</label>
                      <div class="col-sm-5">
                        <input type="text" name="tutor" onchange="passing_value(this.value)" id="tutor" readonly placeholder="Tutor" class="form-control" required>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Rating</label>
                      <div class="col-sm-5">
                        <input type="text" name="rating" onchange="passing_value(this.value)" id="rating" readonly placeholder="Rating" class="form-control" required>
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