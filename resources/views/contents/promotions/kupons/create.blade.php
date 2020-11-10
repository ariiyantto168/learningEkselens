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
                <form role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('promotions/kupons/create-new') }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                        <div class="col-sm-5">
                          <input type="text" name="name" placeholder="Example: Kupon Learning Tekhnologi" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Code</label>
                          <div class="col-sm-5">
                            <input type="text" name="code" placeholder="Example: Gajian Belajar Terus" class="form-control">
                          </div>
                      </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Price Kupons</label>
                        <div class="col-sm-5">
                          <input type="text" name="potongan" placeholder="Example: 75%" class="form-control">
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
                            @php
                              $price[$cls->idclass] = $cls->price;     
                            @endphp
                            <option value="{{$cls->idclass}}">{{$cls->name}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                      <div class="col-sm-5">
                        <input type="text" name="price" readonly onchange="passing_value(this.value)" id="price" placeholder="Price" class="form-control">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Start Date</label>
                  <div class="col-sm-5">
                    <div class="input-group date">
                        <input type="text" class="form-control datepicker pull-right" name="start_date" id="date" data-date-format='yyyy-mm-dd' value="{{date('Y-m-d')}}" autocomplete="off">
                    </div>
                </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">End Date</label>
                <div class="col-sm-5">
                  <div class="input-group date">
                      <input type="text" class="form-control datepicker pull-right" name="end_date" id="date" data-date-format='yyyy-mm-dd' value="{{date('Y-m-d')}}" autocomplete="off">
                  </div>
              </div>
              </div>

                    
                    <div class="form-group row">
                      <label for="name_materi" class="col-sm-1 col-form-label">Images Kupons</label>
                      <div class="col-sm-5">
                        <input type="file" class="form-control-file" id="images" accept="image/svg,image/jpeg" name="images">
                        <small class="text-danger">Extension must jpg, jpeg, png</small>
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
      // console.log(cls[id]);
    }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    maxFileSize = 10 * 1024 * 1024 / 2; // 10 mb

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