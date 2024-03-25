@extends('layouts.app')

@section('title', 'Home Page')
@section('description', 'Welcome to our website. This is the home page.')

@section('content')

    <div class="container mt-5">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="/dashboard/category/update" class="form-horizontal form-material mx-2">
                        <input name="id" value="{{$category['id']}}" type="hidden">
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Name</label>
                            <div class="col-md-12">
                                <input name="name" value="{{$category['name']}}" type="text" placeholder="Mobile" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea id="description" name="description" class="form-control ps-0 form-control-line text-area-form" >{{$category['description']}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Parent</label>
                            <div class="col-sm-12 border-bottom">
                                <select id="parent" name="parent_id" class="form-select shadow-none ps-0 border-0 form-control-line">
                                    <option value="0">---</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">slug</label>
                            <div class="col-md-12">
                                <input type="text" id="slug" name="slug" value="{{$category['slug']}}" placeholder="mobile" class="form-control ps-0 form-control-line">
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
