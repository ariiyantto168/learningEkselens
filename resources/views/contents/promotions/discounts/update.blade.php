<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Discounts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Promotions</li>
              <li class="breadcrumb-item acti   ve"><a href="{{ url('promotions/discounts') }}">Discounts</a></li>
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
                <form role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('promotions/discounts/update/'. $discounts->iddiscounts) }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                        <div class="col-sm-5">
                        <input type="text" name="name" value="{{$discounts->name}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Price Discounts</label>
                        <div class="col-sm-5">
                        <input type="text" name="potongan" value="{{$discounts->potongan}}" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gambar Discounts</label>
                        <div class="col-sm-5">
                        <input type="file" name="images" class="form-control">
                        <br>
                        <img class="img-rounded zoom" id="img-upload" src="{{env('PATH_URL')}}discounts/{{$discounts->images}}" width="100">
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