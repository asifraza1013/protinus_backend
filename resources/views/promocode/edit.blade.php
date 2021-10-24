@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Add Promocode</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-cube"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row clearfix">
            @include('msg.flash_message')
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <form action="{{ route('promocodes.update', $promo->_id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" placeholder="Name" aria-label="Username" name="name" aria-describedby="basic-addon1" value="{{ $promo->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Type</label>
                                            <select name="type" id="" class="form-control">
                                                <option value="" selected disabled>Selected --</option>
                                                @foreach (config('constants.promo_type') as $key=>$item)
                                                    <option value="{{ $key }}"
                                                    {{ ($item == $promo->type) ? 'selected' : '' }}
                                                    >{{ $key }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Value</label>
                                            <input type="text" class="form-control" placeholder="Value" aria-label="Username" name="value" aria-describedby="basic-addon1" value="{{ $promo->value }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Minimum Spending</label>
                                            <select name="min_spend" id="min-spend" class="form-control">
                                                <option value="" selected disabled>Selected --</option>
                                                <option value="Yes"
                                                {{ ($promo->minimumSpending == "Yes") ? 'selected' : '' }}
                                                >Yes</option>
                                                <option value="No"
                                                {{ ($promo->minimumSpending == 'No') ? 'selected' : '' }}
                                                >No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Minimum Spending Amount</label>
                                            <input type="text" class="form-control" placeholder="Mini Spending Amount" aria-label="Username" name="min_spend_amount" aria-describedby="basic-addon1" id="min-spend-amount" value="{{ $promo->minimumSpendingAmount }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Expire Date</label>
                                            <input type="date" class="form-control" placeholder="" aria-label="Username" name="expire_date" aria-describedby="basic-addon1"  value="{{ date("Y-m-d",strtotime($promo->expiryDate)) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Total Usage</label>
                                            <input type="text" class="form-control" placeholder="Total Usage" aria-label="Username" name="total_usage" aria-describedby="basic-addon1" value="{{ $promo->totalUsage }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">N.o Of Usage Per Person</label>
                                            <input type="text" class="form-control" placeholder="Total Usage" aria-label="Username" name="total_usage_person" aria-describedby="basic-addon1" value="{{ $promo->noOfUsagePerPerson }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Product Specific</label>
                                            <select name="product_specification" id="" class="form-control">
                                                <option value="" selected disabled>Selected --</option>
                                                <option value="Yes"
                                                {{ ($promo->productspecific == "Yes") ? 'selected' : '' }}
                                                >Yes</option>
                                                <option value="No"
                                                {{ ($promo->productspecific == "No") ? 'selected' : '' }}
                                                >No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Product SKU</label>
                                            <select name="product_sku" id="product-sku" class="form-control">
                                                <option value="" selected disabled>Selected --</option>
                                                @foreach ($products as $key=>$atteributs)
                                                    @foreach ($atteributs->productAttributes as $attr)
                                                        <option value="{{ $attr[2] }}"
                                                        {{ ($promo->productSKU == $attr[2]) ? 'selected' : '' }}
                                                        p-id="{{ $atteributs->productId }}"
                                                        p-name="{{ $atteributs->productName }}"
                                                        >
                                                        {{ $attr[2] }}
                                                    </option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Products ID</label>
                                            <input type="text" class="form-control" placeholder="Total Usage" aria-label="Username" name="product_id" id="p-id" aria-describedby="basic-addon1" readonly value="{{ $promo->productName->_id }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Product Name</label>
                                            <input type="text" class="form-control" placeholder="Total Usage" aria-label="Username" name="product_name" id="p-name" aria-describedby="basic-addon1" readonly value="{{ $promo->productName->_id }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-50 mt-lg-5"></div>
                                <div class="col-2 text-left mt-lg-5 mt-3">
                                    <button type="submit" class="btn btn-block btn-lg btn-primary text-white" title="">Add</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
<script>

    $(document).ready(function () {
        $('#product-sku').on('change', function () {
            $('#p-name').val($('#product-sku option:selected').attr('p-name'));
            $('#p-id').val($('#product-sku option:selected').attr('p-id'));
         })

         $('#min-spend').on('change', function () {
            var selected = $(this).val();
            console.log(selected);
            if(selected == 'No'){
                $('#min-spend-amount').attr('disabled', true);
            }else{
                $('#min-spend-amount').attr('disabled', false);
            }
          })
    });
</script>
@endsection
