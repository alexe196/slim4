@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="/dashboard/medialibrary/upload" enctype="multipart/form-data" class="form-horizontal form-material mx-2">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <label for="description" class="col-md-12">Завантажити файл</label>
                                            <input class="form-control" type="file" multiple="multiple" name="file[]" id="file"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group pt-4">
                                            <div class="col-sm-12 d-flex">
                                                <button class="btn btn-success mx-auto mx-md-0 text-white">Завантажити</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- column -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Image Filles</h4>
                            <div class="table-responsive">
                                <div class="row mb-3">
                                    @if(!empty($files))
                                        @foreach($files as $idname => $file)
                                            <div class="col mb-5 text-center">
                                                <img src="{{$file}}" width="100" height="100">
                                                <div> <a href="/dashboard/medialibrary/delete/{{$idname}}" >{{$idname}}</a></div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

