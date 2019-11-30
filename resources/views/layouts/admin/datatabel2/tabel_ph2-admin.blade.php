@extends('layouts/admin/master-admin')

@section('content')
@if($max_ph2->nilai < 6.5)
<div class="alert alert-danger" role="alert">
    <h3>Kondisi PH Tidak Aman!</h3>Terakhir Update: {{($max_ph2->waktu)}}<br> Kondisi PH : {{($max_ph2->nilai)}}
</div>
@elseif($max_ph2->nilai > 8.5)
<div class="alert alert-danger" role="alert">
    <h3>Kondisi PH Aman!</h3>Terakhir Update: {{($max_ph2->waktu)}}<br> Kondisi PH : {{($max_ph2->nilai)}}
</div>
@else
<div class="alert alert-success" role="alert">
        <h3>Kondisi PH Aman!</h3>Terakhir Update: {{($max_ph2->waktu)}}<br> Kondisi PH : {{($max_ph2->nilai)}}
</div>
@endif
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tabel pengamatan pH</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabel_ph2" class="display table table-striped table-hover table-bordered" >
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pH as $p) 
                    <tr>
                            <td>{{date('Y-m-d', strtotime($p->waktu))}}</td>
                            <td>{{date('H:i:s', strtotime($p->waktu))}}</td>
                            <td>{{$p->nilai}}</td>
                            @if ($p->nilai < '6.5')
                            <td>Tidak Aman</td>                  
                            @elseif($p->nilai > '8.5')
                            <td>Tidak Aman</td>
                            @else
                                <td>Aman</td>
                            @endif 
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('js')
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
        $('#tabel_ph2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'Data ph Node 2 Excel'
            },
            {
                extend: 'pdfHtml5',
                title: 'Data ph Node 2 Pdf '
            }
        ]
    } )
} );
    </script>

<script>
        function autoRefreshPage() {
            window.location = window.location.href;
            }
            setInterval('autoRefreshPage()', 10000);
</script>

@endsection