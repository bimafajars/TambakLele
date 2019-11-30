@extends('layouts/admin/master-admin')
@section('content')
@if($max_air2->nilai > 0)
<div class="alert alert-success" role="alert">
    <h3>Kondisi Air!</h3>Terakhir Update: {{($max_air2->waktu)}}<br> Kondisi Air : {{($max_air2->nilai)}}
</div>
@elseif($max_air2->nilai > 0)
<div class="alert alert-danger" role="alert">
    <h3>Kondisi Air!</h3>Terakhir Update: {{($max_air2->waktu)}}<br> Kondisi Air : {{($max_air2->nilai)}}
</div>
@else
<div class="alert alert-success" role="alert">
        <h3>Kondisi Air!</h3>Terakhir Update: {{($max_air2->waktu)}}<br> Kondisi Air : {{($max_air2->nilai)}}
</div>
@endif

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tabel Pengamatan Air</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
                <div id="tabelku2">
            <table id="tabel_air2" class="display table table-striped table-hover table-bordered" >
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
                        <td>{{date('H:i:s', strtotime($jarak->waktu))}}</td>
                        <td>{{$jarak->nilai}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
        $('#tabel_air2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'Data Air Node 2 Excel'
            },
            {
                extend: 'pdfHtml5',
                title: 'Data Air Node 2 Pdf'
            }
        ]
    } );
} );
    </script>
<script>
 function autoRefreshPage() {
        window.location = window.location.href;
        }
        setInterval('autoRefreshPage()', 10000);
</script>
@endsection