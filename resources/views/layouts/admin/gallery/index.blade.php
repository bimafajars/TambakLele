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
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Galeri</h4>
                        <a href="{{route('images.add')}}" class="btn btn-primary btn-round ml-auto" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Tambah Data
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</td>
                                    <th>Nama</th>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($datas as $item)
                                    
                                
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td class="text-center"><a href="public/storage/{{$item->foto}}" target="_blank">{{$item->foto}}</a></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{route('images.edit', $item->id)}}" data-toggle="tooltip" class="btn btn-link btn-primary" data-original-title="Ubah Data"><i class="fa fa-edit"></i></a>
                                            <button title="Remove Data" class="btn btn-link btn-danger" data-toggle="modal" data-target="#delete-{{$item->id}}"><i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="delete-{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header no-bd">
                                                <h5 class="modal-title">
                                                    <span class="fw-mediumbold">Hapus Data</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{route('images.delete')}}" method="POST">
                                                @csrf
                                                <p class="text-center m-0">Yakin akan menghapus gambar {{$item->nama}} ?</p>
                                            </div>
                                            <div class="modal-footer no-bd">
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                            
                                                <button type="submit" class="btn btn-danger">Hapus Data</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
