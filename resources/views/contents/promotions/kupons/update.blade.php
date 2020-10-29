<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kupons</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Promotions</li>
              <li class="breadcrumb-item acti   ve"><a href="{{ url('promotions/kupons') }}">Kupons</a></li>
              <li class="breadcrumb-item active">Update Kupons</li>

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
                <form role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('promotions/kupons/update/'. $kupons->idkupons)}}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                        <div class="col-sm-5">
                        <input type="text" name="name" value="{{$kupons->name}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                      <label>Kelas</label>
                      <div class="col-sm-5">
                      <select class="form-control" id="idclass" name="idclass" onchange="passing_value(this.value)">
                        <option>-- select Kelas -- </option>
                        @php
                          $price = []; 
                        @endphp
                          @foreach ($classes as $cls)
                           <option value="{{$cls->idclass}}" @if ($cls->idclass == $kupons->idclass) 
                                selected
                            @endif>{{$cls->name}}</option>
                            @php
                              $price[$cls->idclass] = $cls->price;      
                            @endphp
                          @endforeach
                      </select>
                    </div>
                  </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Code</label>
                          <div class="col-sm-5">
                          <input type="text" name="code" value="{{$kupons->code}}" class="form-control">
                          </div>
                      </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Price Discounts</label>
                        <div class="col-sm-5">
                        <input type="text" name="potongan" value="{{$kupons->potongan}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Price</label>
                        <div class="col-sm-5">
                          <input type="text" name="price" onchange="passing_value(this.value)" id="price" readonly value="{{$kupons->classes->price}}" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gambar Kupons</label>
                        <div class="col-sm-5">
                        <input type="file" name="images" class="form-control">
                        <br>
                        <img class="img-rounded zoom" id="img-upload" src="{{env('PATH_URL')}}promotions/kupons/{{$kupons->images}}" width="100">
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
    var cls = {!!json_encode($price)!!};
    console.log(cls)
    function passing_value(id){
      $('#price').val(cls[id])
    }
</script>