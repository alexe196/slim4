@extends('layouts.app')

@section('title', 'Home Page')
@section('description', 'Welcome to our website. This is the home page.')

@section('content')
<div class="container mt-5">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="/dashboard/product-upload/file" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="product_id" value="{{$product_id}}">

                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label" for="sort">
                                        Сортування
                                    </label>
                                    <input type="number" class="form-control"  id="sort" name="sort" min="1" max="100" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check pt-4" style="">
                                    <label class="form-check-label" for="is_viewer">
                                        В карточцi товара
                                    </label>
                                    <input class="form-check-input" name="is_viewer" type="checkbox" value="1" id="is_viewer">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label for="description" class="col-md-12">Завантажити файл</label>
                                    <input class="form-control" name="file" type="file" id="file" />
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
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Product</h4>
            <div class="table-responsive">
                <table class="table user-table">
                    <thead>
                    <tr>
                        <th class="border-top-0">#</th>
                        <th class="border-top-0">Name</th>
                        <th class="border-top-0">Img</th>
                        <th class="border-top-0">File Name</th>
                        <th class="border-top-0">sort</th>
                        <th class="border-top-0">Cart Product</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="product_part_view">
                    @if(!empty($product) && !empty($product[0]['path']))
                        @foreach($product as $item)
                        <tr>
                            <td>{{$item['id']}}</td>
                            <td>{{$item['product_name']}}</td>
                            <td><img src="{{$item['path']}}" height="50" /></td>
                            <td>{{$item['file_name']}}</td>
                            <td>
                                <input type="number" class="form-control" value="{{$item['sort']}}"  id="sort_{{$item['id']}}" name="sort" min="1" max="100" />
                            </td>
                            <td>
                                <input class="form-check-input" name="is_viewer" {{!empty($item['is_viewer']) ? 'checked' : ''}} type="checkbox" value="1" id="is_viewer_{{$item['id']}}">
                            </td>
                            <td>
                                <form method="post" action="/dashboard/product-upload/delete" class="form-horizontal form-material mx-2">
                                    <input type="hidden" value="{{$item['id']}}" name="id">
                                    <input type="hidden" value="{{$product_id}}" name="product_id">
                                    <button class="btn btn-outline-danger">Delete</button>
                                </form>
                            </td>
                            <td>
                                <button  data-id="{{$item['id']}}" class="btn btn-outline-warning edit-images">Edit</button>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
