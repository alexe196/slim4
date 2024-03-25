@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="/dashboard/product-variant/add/" class="form-horizontal form-material mx-2">
                        <input type="hidden" name="product_id" value="{{$product_id}}">
                        <div class="form-group">
                            <label class="col-md-12 mb-0">sku</label>
                            <div class="col-md-12">
                                <input name="sku" type="text" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">variant name</label>
                            <div class="col-md-12">
                                <input name="variant_name" type="text" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">exception</label>
                            <div class="col-md-12">
                                <input name="exception" type="text" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">count page</label>
                            <div class="col-md-12">
                                <input name="cpage" type="number" class="form-control ps-0 form-control-line" min="0" maxlength="100000">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">weight</label>
                            <div class="col-md-12">
                                <input name="weight" type="number" class="form-control ps-0 form-control-line" min="0" maxlength="100000">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">classification</label>
                            <div class="col-md-12">
                                <input name="classification" type="text" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">price</label>
                            <div class="col-md-12">
                                <input name="price" type="text" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">old price</label>
                            <div class="col-md-12">
                                <input name="old_price" type="text" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">count</label>
                            <div class="col-md-12">
                                <input name="count" type="number" class="form-control ps-0 form-control-line" min="0" maxlength="100000">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">is_active</label>
                            <div class="col-md-12">
                                <input class="form-check-input" name="is_active" checked="" type="checkbox" value="1" id="is_active">
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
