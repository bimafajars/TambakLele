@extends('layouts/admin/master-admin')
@section('content')
<div class="page-inner">
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">×
            </button>
            {{Session::get('success')}}
        </div>
    @elseif(Session::has('danger'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">×
            </button>
            {{Session::get('danger')}}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">×
            </button>
            @foreach ($errors->all() as $error)
            <h5>{{ $error }}</h5>
            @endforeach
        </div>
    @endif
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Ubah Galeri</h4>
                    </div>
                </div>
                <div class="card-body">
                        <form action="{{route('images.edit.post')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Nama</label>
                                        <input name="nama" type="text" class="form-control" placeholder="fill name" value="{{$data->nama}}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label for="exampleFormControlFile1">File Foto</label>
                                        <input name="foto" type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                    <p class="small">*max-size: 2MB.</p>
                                </div>
                                <img class="ml-3 mb-2" src="/public/storage/{{$data->foto}}" alt="" style="height:200px">
                            </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
