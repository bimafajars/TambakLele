@extends('layouts/admin/master-admin')

@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Data Node 1</div>
                    <div class="card-category">Informasi Data Realtime Sensor Terbaru</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-1"></div>
                            <h6 class="fw-bold mt-3 mb-0">Data Air</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-2"></div>
                            <h6 class="fw-bold mt-3 mb-0">Data pH</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-3"></div>
                            <h6 class="fw-bold mt-3 mb-0">Data Suhu</h6>                            
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-title">Data Node 2</div>
                    <div class="card-category">Informasi Data Realtime Sensor Terbaru</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-4"></div>
                            <h6 class="fw-bold mt-3 mb-0">Data Air</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-5"></div>
                            <h6 class="fw-bold mt-3 mb-0">Data pH</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-6"></div>
                            <h6 class="fw-bold mt-3 mb-0">Data Suhu</h6>                            
                        </div>
                    </div>
                </div>
                {{-- <h4 class="ml-3 mb-1">Pengelolaan Kesehatan Udang :</h4>
                <ul>
                    <li>Suhu optimal harus 25 - 30 &#176; C</li>
                    <li>PH normal 6.5 - 8.5</li>
                </ul> --}}
            </div>
        </div>
        {{-- <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Kontrol Aktuator</div>
                        <div class="card-category">Status Alat</div>
                            <div class="form-group col-md-6 offset-md-3">
                                <label class="form-label">Kondisi</label>
                                <form action="{{route('update-status')}}" method="POST" id="controlForm">
                                    @csrf
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="control" value="1" class="selectgroup-input" {{$akt == 1 ? 'checked' : null}}>
                                            <span class="selectgroup-button">ON</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="control" value="0" class="selectgroup-input" {{$akt == 0 ? 'checked' : null}}>
                                            <span class="selectgroup-button">OFF</span>
                                        </label>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
    </div> --}}
</div>
@endsection
@section('js')
<script type='text/javascript'>

    $(document).ready(function() { 
      $('input[name=control]').change(function(){
           $('#controlForm').submit();
      });
     });
   
</script>
<script>
    Circles.create({
        id:'circles-1',
        radius:45,
        value:{{$d_air}},
        maxValue:100,
        width:7,
        text: {{$d_air}},
        colors:['#f1f1f1', '#FF9E27'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    Circles.create({
        id:'circles-2',
        radius:45,
        value:{{$d_pH}},
        maxValue:100,
        width:7,
        text: {{$d_pH}},
        colors:['#f1f1f1', '#2BB930'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    Circles.create({
        id:'circles-3',
        radius:45,
        value:{{$d_suhu}},
        maxValue:100,
        width:7,
        text: {{$d_suhu}},
        colors:['#f1f1f1', '#F25961'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    }),

    Circles.create({
        id:'circles-4',
        radius:45,
        value:{{$d_air2}},
        maxValue:100,
        width:7,
        text: {{$d_air2}},
        colors:['#f1f1f1', '#FF9E27'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    Circles.create({
        id:'circles-5',
        radius:45,
        value:{{$d_pH2}},
        maxValue:100,
        width:7,
        text: {{$d_pH2}},
        colors:['#f1f1f1', '#2BB930'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    Circles.create({
        id:'circles-6',
        radius:45,
        value:{{$d_suhu2}},
        maxValue:100,
        width:7,
        text: {{$d_suhu2}},
        colors:['#f1f1f1', '#F25961'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })
</script>
@endsection
