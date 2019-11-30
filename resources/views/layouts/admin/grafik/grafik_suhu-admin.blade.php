@extends('layouts/admin/master-admin')

@section('content')
@if($selisih > 12)
<div class="alert alert-danger" role="alert">
        <h3>Gagal terhubung dengan broker!</h3>Terakhir Update: {{($updatewaktu)}}
</div>
@endif

<div class="card border">
    <div class="card-header">
        <div class="card-title">Grafik Suhu</div>
    </div>
    <div class="card-body">
        <div class="chart-container">
            <canvas id="lineChart"></canvas>
        </div>
        <h5>Keterangan :</h5>
        <ul>
            <li>x : satuan waktu per menit</li>
            <li>y : satuan grafik suhu dalam &#176;C</li>
            <li>Suhu optimum 25 - 30&#176;C</li>
        </ul>
    </div>
</div>

@endsection
@section('js')
<script>
    var lineChart = document.getElementById('lineChart').getContext('2d');
    var myLineChart = new Chart(lineChart, {
        type: 'line',
        data: {
            labels: [
                @foreach ($suhu as $waktu)
                    "{{date('H:i:s',strtotime($waktu->waktu))}}",
                @endforeach

            ],
            datasets: [{
                label: "Data Suhu",
                borderColor: "#1d7af3",
                pointBorderColor: "#FFF",
                pointBackgroundColor: "#1d7af3",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: 'rgba(62, 153, 250,0.4)',
                fill: true,
                borderWidth: 2,
                data: [

                    @foreach ($suhuu as $nilai)
                    @php
                        $nilai = $nilai['nilai'];
                        $celcius = "&#176;C";
                    @endphp
                        '{{"$nilai"}}',
                @endforeach


                ]
            }]
        },
        options: {
            legend: {
                display: false                
            },
            scales: {
                xAxes: [{
                gridLines: {
                    display: false,
                    color: "gray",
                    borderDash: [1, 3],
                },
                scaleLabel: {
                    display: true,
                    labelString: "Waktu",
                    fontColor: "green"
                }
                }],
                yAxes: [{
                gridLines: {
                    display: false,
                    color: "gray",
                    borderDash: [1, 3],
                },
                ticks: {
                    display: true,
                    suggestedMin: 20,
                    suggestedMax: 33,
                },
                scaleLabel: {
                    display: true,
                    labelString: "Suhu (°C)",
                    fontColor: "green"
                }
                }]
            }
        }
    });
</script>
<script>
    function autoRefreshPage() {
        window.location = window.location.href;
        }
        setInterval('autoRefreshPage()', 10000);
</script>
@endsection
