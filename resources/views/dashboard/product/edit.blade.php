@extends('layouts.app')

@section('title', 'Home Page')
@section('description', 'Welcome to our website. This is the home page.')

@section('content')
    <div class="container mt-5">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="/dashboard/product/update" class="form-horizontal form-material mx-2">
                        <input type="hidden" name="id" value="{{$product['id']}}">
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Name</label>
                            <div class="col-md-12">
                                <input name="name" value="{{$product['name']}}" type="text" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea
                                        type="text"
                                        name="description"
                                        class="form-control"
                                >{{!empty($product['description']) ? $product['description'] : ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">slug</label>
                            <div class="col-md-12">
                                <input name="slug" value="{{$product['slug']}}" type="text" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Category</label>
                            <div class="col-sm-12 border-bottom">
                                <select id="category_id" name="category_id" class="form-select shadow-none ps-0 border-0 form-control-line">
                                    @foreach($categories as $item)
                                        <option {{$product['categories_id'] == $item['id'] ? 'selected' : ''}} value="{{$item['id']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Meta description</label>
                            <div class="col-md-12">
                                <textarea id="meta_description" name="meta_description" class="form-control ps-0 form-control-line text-area-form" >{{$product['meta_description']}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Title</label>
                            <div class="col-md-12">
                                 <textarea id="title" name="title" class="form-control ps-0 form-control-line text-area-form">{{$product['title']}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">is_active</label>
                            <div class="col-md-12">
                                <input class="form-check-input" name="is_active" {{!empty($product['is_active']) ? 'checked' : ''}} type="checkbox" value="1" id="is_active">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button class="btn btn-success mx-auto mx-md-0 text-white">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
