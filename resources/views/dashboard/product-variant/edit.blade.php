@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="/dashboard/product-variant/update/" class="form-horizontal form-material mx-2">
                        <input type="hidden" name="id" value="{{$variant['id']}}">
                        <input type="hidden" name="product_id" value="{{$variant['product_id']}}">
                        <div class="form-group">
                            <label class="col-md-12 mb-0">sku</label>
                            <div class="col-md-12">
                                <input name="sku" type="text" value="{{!empty($variant['sku']) ? $variant['sku'] : ''}}" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">variant name</label>
                            <div class="col-md-12">
                                <input name="variant_name" value="{{!empty($variant['variant_name']) ? $variant['variant_name'] : ''}}" type="text" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">exception</label>
                            <div class="col-md-12">
                                <input name="exception" value="{{!empty($variant['exception']) ? $variant['exception'] : ''}}" type="text" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">count page</label>
                            <div class="col-md-12">
                                <input name="cpage" type="number" value="{{!empty($variant['cpage']) ? $variant['cpage'] : 0}}" class="form-control ps-0 form-control-line" min="0" maxlength="100000">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">weight</label>
                            <div class="col-md-12">
                                <input name="weight" type="number" value="{{!empty($variant['weight']) ? $variant['weight'] : 0}}" class="form-control ps-0 form-control-line" min="0" maxlength="100000">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">classification</label>
                            <div class="col-md-12">
                                <input name="classification" value="{{!empty($variant['classification']) ? $variant['classification'] : ''}}" type="text" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">price</label>
                            <div class="col-md-12">
                                <input name="price" value="{{!empty($variant['price']) ? $variant['price'] : 0}}" type="text" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">old price</label>
                            <div class="col-md-12">
                                <input name="old_price" type="text" value="{{!empty($variant['old_price']) ? $variant['old_price'] : 0}}" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">count</label>
                            <div class="col-md-12">
                                <input name="count" type="number" value="{{!empty($variant['count']) ? $variant['count'] : 0}}" class="form-control ps-0 form-control-line" min="0" maxlength="100000">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">is_active</label>
                            <div class="col-md-12">
                                <input class="form-check-input" name="is_active" {{!empty($variant['is_active']) ? 'checked' : ''}} type="checkbox" value="1" id="is_active">
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

