<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Class Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Class Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Class Detail</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Instructor</span>
                      <span class="info-box-number text-center text-muted mb-0">belum ada</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Name Class</span>
                      <span class="info-box-number text-center text-muted mb-0">{{$classes->name}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">duration Class</span>
                      <span class="info-box-number text-center text-muted mb-0">{{$classes->duration}}<span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Class Activity</h4>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ env('ADMINLTE3') }}dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Nama instructor</a>
                        </span>
                        <span class="description">Job Role</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Visi misi instructor mengajar
                      </p>
                    </div>

                    <div class="post clearfix">
                        <div class="box-body table-responsive">
                            <table id="" class="table table-bordered table-striped">
                              <tbody>
                                <tr>
                                    <td width="15%">Class</td>
                                    <td width="2%">:</td>
                                    <td>{{$classes->name}}</td>
                                </tr>
                                <tr>
                                    <td>Categories</td>
                                    <td>:</td>
                                    <td>{{$classes->categories->name}}</td>
                                </tr>
                                <tr>
                                    <td>Duration</td>
                                    <td>:</td>
                                    <td>{{$classes->duration}}</td>
                                </tr>
                                <tr>
                                    <td>Images</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tutor</td>
                                    <td>:</td>
                                    <td>{{$classes->tutor}}</td>
                                </tr>

                                @foreach ($classes->subclass as $sub)
                                <tr>
                                    <td>Head Materi</td>
                                    <td>:</td>
                                    <td>{{$sub->headmateri}} </td>
                                </tr>
                                @endforeach

                                @foreach ($classes->materies as $mat)
                                <tr>
                                    <td>Materi</td>
                                    <td>:</td>
                                    <td>{{$mat->materi}}</td>
                                </tr>
                                @endforeach
                                
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Price</h3>
              <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Client Company
                  <b class="d-block">Deveint Inc</b>
                </p>
                <p class="text-sm">Project Leader
                  <b class="d-block">Tony Chicken</b>
                </p>
              </div>

              <h5 class="mt-5 text-muted">Project files</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                </li>
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>