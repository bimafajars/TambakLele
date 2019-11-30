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
                        <h4 class="card-title">Pengguna</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-target="#addRowModal" data-toggle="modal">
                            <i class="fa fa-plus"></i>
                           Tambah Data
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</td>
                                    <th>Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Role</th>
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
                                    <td class="text-center">{{$item->email}}</td>
                                    <td class="text-center">{{$item->role}}</td>
                                    <td class="text-center">
                                        <div class="form-button-action">
                                        <button data-toggle="modal" data-target="#edit-{{$item->id}}" class="btn btn-link btn-primary" data-original-title="Ubah Data"><i class="fa fa-edit"></i></button>
                                        <button title="Remove Data" class="btn btn-link btn-danger" data-toggle="modal" data-target="#delete-{{$item->id}}"><i class="fa fa-times"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="edit-{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header no-bd">
                                                <h5 class="modal-title">
                                                    <span class="fw-mediumbold">
                                                    Ubah Data</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('user.edit')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Nama</label>
                                                                <input name="nama" type="text" class="form-control" placeholder="fill name" value="{{$item->nama}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Email</label>
                                                                <input name="email" type="email" class="form-control" placeholder="fill email" value="{{$item->email}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12"><div class="form-group form-group-default">
                                                            <label>Role</label>
                                                            <select class="form-control" id="formGroupDefaultSelect" name="role">
                                                                <option value="{{$item->role}}" selected>{{$item->role}}</option>
                                                                <option value="Administrator">Administrator</option>
                                                                <option value="Pegawai">Pegawai Tambak</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer no-bd">
                                                <button type="submit" class="btn btn-primary">Ubah Data</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
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
                                            <form action="{{route('user.delete')}}" method="POST">
                                                @csrf
                                                <p class="text-center m-0">Yakin akan menghapus user dengan nama {{$item->nama}} ?</p>
                                            </div>
                                            <div class="modal-footer no-bd">
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                            
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


<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                    Tambah Data</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.post')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Nama</label>
                                <input name="nama" type="text" class="form-control" placeholder="fill name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Email</label>
                                <input name="email" type="email" class="form-control" placeholder="fill email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" placeholder="fill password">
                            </div>
                        </div>
                        <div class="col-md-12"><div class="form-group form-group-default">
                            <label>Role</label>
                            <select class="form-control" id="formGroupDefaultSelect" name="role">
                                <option value="Administrator">Administrator</option>
                                <option value="Pegawai">Pegawai Tambak</option>
                            </select>
                        </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer no-bd">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
