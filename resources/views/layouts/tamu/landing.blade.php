<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Tambak Lele</title>

  <!-- Bootstrap core CSS -->
  <link href="{{url('landingh/vendor/bootstrap/css/bootstrap.min.css')}}    " rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{url('landingh/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{url('landingh/vendor/simple-line-icons/css/simple-line-icons.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="{{url('landingh/device-mockups/device-mockups.min.css')}}">
  <link rel="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

  <!-- Custom styles for this template -->
  <link href="{{url('landingh/css/new-age.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Tambak Udang</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{route('proses.login')}}">Masuk Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('tentang.pembuat')}}">Tentang</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-lg-7 my-auto">
          <div class="header-content mx-auto">
            <h1 class="mb-5">Sistem Informasi Monitoring & Controlling Tambak Udang</h1>
          </div>
        </div>
        <div class="col-lg-5 my-auto">
          <div class="device-container">
            <div class="device-mockup iphone6_plus portrait white">
              <div class="device">
                <div class="screen">
                  <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                  <img src="https://source.unsplash.com/1600x3000/?animal" class="img-fluid" alt="">
                </div>
                <div class="button">
                  <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section class="download bg-primary text-center" id="download">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <h2 class="section-heading">Hasil Monitoring Tambak Udang!</h2>
          <p>Berupa data tabel sensor suhu, sensor pH, sensor ketinggian</p>
        </div>
      </div>
    </div>
  </section>

  <section class="features" id="features">
    <div class="container">
      <div class="section-heading text-center">
        <hr>
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Tabel Pengamatan</h4>
          </div>
          <div class="card-body">
            <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link text-dark active" id="pills-air-tab" data-toggle="pill" href="#pills-air" role="tab" aria-controls="pills-air" aria-selected="true">Air</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" id="pills-suhu-tab" data-toggle="pill" href="#pills-suhu" role="tab" aria-controls="pills-suhu" aria-selected="false">Suhu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" id="pills-ph-tab" data-toggle="pill" href="#pills-ph" role="tab" aria-controls="pills-ph" aria-selected="false">pH</a>
              </li>
            </ul>
            <div class="tab-content mt-2 mb-3" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-air" role="tabpanel" aria-labelledby="pills-air-tab">
                  <div class="table-responsive" id="tabelku">
                      <table id="tabel_air" class="display table table-striped table-hover table-bordered" >
                          <thead>
                              <tr>
                                  <th>Tanggal</th>
                                  <th>Jam</th>
                                  <th>Nilai</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($jarak as $jarak)
                              <tr>
                                  <td>{{date('Y-m-d', strtotime($jarak->waktu))}}</td>
                                  <td>{{date('h:i:s', strtotime($jarak->waktu))}}</td>
                                  <td>{{$jarak->nilai}}</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>       
              </div>
              <div class="tab-pane fade" id="pills-suhu" role="tabpanel" aria-labelledby="pills-suhu-tab">
                  <div class="table-responsive">
                      <table id="tabel_suhu" class="display table table-striped table-hover table-bordered" >
                          <thead>
                              <tr>
                                  <th>Tanggal</th>
                                  <th>Jam</th>
                                  <th>Nilai</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($suhu as $suhu)                    
                              <tr>
                                      <td>{{date('Y-m-d', strtotime($suhu->waktu))}}</td>
                                      <td>{{date('h:i:s', strtotime($suhu->waktu))}}</td>
                                      <td>{{$suhu->nilai}}</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
              <div class="tab-pane fade" id="pills-ph" role="tabpanel" aria-labelledby="pills-ph-tab">
                  <div class="table-responsive">
                      <table id="tabel_ph" class="display table table-striped table-hover table-bordered" >
                          <thead>
                              <tr>
                                  <th>Tanggal</th>
                                  <th>Jam</th>
                                  <th>Nilai</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($pH as $pH) 
                              <tr>
                                      <td>{{date('Y-m-d', strtotime($pH->waktu))}}</td>
                                      <td>{{date('h:i:s', strtotime($pH->waktu))}}</td>
                                      <td>{{$pH->nilai}}</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>


  <section class="contact bg-primary" id="contact">
    <div class="container">
      <h2>We
        <i class="fas fa-heart"></i>
        new friends!</h2>
      <ul class="list-inline list-social">
        <li class="list-inline-item social-twitter">
          <a href="#">
            <i class="fab fa-twitter"></i>
          </a>
        </li>
        <li class="list-inline-item social-facebook">
          <a href="#">
            <i class="fab fa-facebook-f"></i>
          </a>
        </li>
        <li class="list-inline-item social-google-plus">
          <a href="#">
            <i class="fab fa-google-plus-g"></i>
          </a>
        </li>
      </ul>
    </div>
  </section>

  <footer>
    <div class="container">
      <p>&copy; Tugas Akhir</p>
      <ul class="list-inline">
        <li class="list-inline-item">
          <a href="#">Bima Fajar Setiawan 21120115140088</a>
        </li>
      </ul>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{url('landingh/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('landingh/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{url('landingh/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{url('landingh/js/new-age.min.js')}}"></script>
  <!-- JavaScript Datatables -->
  <script src="{{ asset('Atlantis/assets/js/plugin/datatables/datatables.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src= "https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src= "https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
			$('#tabel_air').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel'
                ],
                aaSorting: [[0, 'desc']]
            });
        });
    </script> 
    <script>
      $(document).ready(function() {
    $('#tabel_ph').DataTable({
              dom: 'Bfrtip',
              buttons: [
                  'csv', 'excel'
              ],
              aaSorting: [[0, 'desc']]
          });
      });
    </script>
     <script>
      $(document).ready(function() {
    $('#tabel_suhu').DataTable({
              dom: 'Bfrtip',
              buttons: [
                  'csv', 'excel'
              ],
              aaSorting: [[0, 'desc']]
          });
      });
    </script> 
</body>
</html>
