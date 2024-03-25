@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-3">
                            <a class="btn btn-success" href="/dashboard/product-variant/form/{{$product_id}}">Створити варiант товару</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product</h4>
                        <div class="table-responsive">
                            <table class="table user-table">
                                <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">sku</th>
                                    <th class="border-top-0">variant_name</th>
                                    <th class="border-top-0">price</th>
                                    <th class="border-top-0">count</th>
                                    <th class="border-top-0">is_active</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="product_part_view">
                                @if(!empty($productVariant))
                                    @foreach($productVariant as $item)
                                        <tr>
                                            <td>{{$item['id']}}</td>
                                            <td>{{$item['sku']}}</td>
                                            <td>{{$item['variant_name']}}</td>
                                            <td>{{round($item['price'], 2)}}</td>
                                            <td>{{round($item['old_price'], 2)}}</td>
                                            <td>{{$item['count']}}</td>
                                            <td>{{!empty($item['is_active']) ? 'active' : 'deactive'}}</td>
                                            <td>
                                                <a href="/dashboard/product-variant/edit/{{$item['id']}}" class="btn btn-outline-warning">Edit</a>
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
        </div>
    </div>
@endsection
