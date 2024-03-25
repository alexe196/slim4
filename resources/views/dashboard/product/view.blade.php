@extends('layouts.app')

@section('title', 'Home Page')
@section('description', 'Welcome to our website. This is the home page.')

@section('content')

<div class="container mt-5">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/dashboard/product/search" class="form-horizontal form-material mx-2">
                            <div class="row">
                                <div class="col-sm-3">
                                    <select id="category_id_search" name="id" class="form-select">
                                        <option value="0">category</option>
                                        @foreach($categories as $item)
                                            <option value="{{$item['id']}}">{{$item['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input name="name" id="name_product_id" placeholder=" product name" type="text" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <button id="search_product_button_id" class="btn btn-success mx-auto mx-md-0 text-white">Search</button>
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
                        <h4 class="card-title">Product</h4>
                        <div class="table-responsive">
                            <table class="table user-table">
                                <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Url</th>
                                    <th class="border-top-0">Meta_description</th>
                                    <th class="border-top-0">Title</th>
                                    <th class="border-top-0">Category</th>
                                    <th class="border-top-0"></th>
                                    <th class="border-top-0"></th>
                                    <th class="border-top-0"></th>
                                    <th class="border-top-0"></th>
                                </tr>
                                </thead>
                                <tbody id="product_part_view">
                                    @include('dashboard.product.partview')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
