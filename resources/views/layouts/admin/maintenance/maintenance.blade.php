@extends('layouts/admin/master-admin')

@section('content')
@if (Session::has('msg') != null)
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading"></h4>
        <p>Berhasil Dihapus</p>
    </div>
@endif
@if (Session::has('error') != null)
    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading"></h4>
        <p>Pilih Bulan Terlebih Dahulu</p>
    </div>
@endif
<div class="card border">
    <div class="card-header">
        Maintenance DB
    </div>
    <div class="card-body">
    <form action="{{route('hapus-data')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlSelect2">Pilih Bulan</label>
                <select multiple class="form-control" name="bulan[]" id="exampleFormControlSelect2">
                    @foreach ($bulan as $bulan)
                        <option value="{{$bulan->month}}">{{date('F',strtotime($bulan->year.'-'.$bulan->month.'-1'))}}</option>    
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Pilih Tahun</label>
                <select class="form-control" name="tahun" id="">
                    @for ($i=2019; $i<=2030; $i++)
                        <option value="{{$i}}">{{$i}}</option>    
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Hapus Data" class="btn btn-danger">
            </div>
        </form>
    </div>
</div>





@endsection