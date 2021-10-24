@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Edit/View Product</h1>
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
                        <form action="{{ route('subscription.update', $sub->_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row clearfix">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" placeholder="Subscription Name"
                                                aria-label="Username" name="name" aria-describedby="basic-addon1"  value="{{ $sub->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Monthly Price</label>
                                            <input type="text" class="form-control" placeholder="Monthly Price"
                                                aria-label="Username" name="monthly_price"
                                                aria-describedby="basic-addon1" value="{{ $sub->monthlyPrice }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Onlinestore Presence</label>
                                            <select name="onlinestore_presence" id="sub-cate" class="form-control">
                                                <option value="" selected disabled>Select --</option>
                                                <option value="Yes"
                                                {{ ($sub->onlineStorePresence == 'Yes') ? 'selected' : '' }}
                                                >Yes</option>
                                                <option value="No"
                                                {{ ($sub->onlineStorePresence == 'No') ? 'selected' : '' }}
                                                >No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Unlimited Products Upload</label>
                                            <select name="unlimited_product" id="unlimited_product" class="form-control">
                                                <option value="" selected disabled>Select --</option>
                                                <option value="Yes"
                                                {{ ($sub->unlimitedProductsUpload == 'Yes') ? 'selected' : '' }}
                                                >Yes</option>
                                                <option value="No"
                                                {{ ($sub->unlimitedProductsUpload == 'No') ? 'selected' : '' }}
                                                >No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">N.o Of Products Upload </label>
                                            <input type="text" class="form-control" placeholder="N.o Of Products Upload"
                                                aria-label="Username" name="product_upload"
                                                aria-describedby="basic-addon1" id="no_product_upload"
                                                 value="0" {{ ($sub->unlimitedProductsUpload == 'Yes') ? 'readonly' : '' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Staff Account Available </label>
                                            <input type="number" class="form-control" placeholder="Staff Account Available"
                                                aria-label="Username" name="staff_account_available"
                                                aria-describedby="basic-addon1" value="{{ $sub->staffAccountAvailable }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Online Template Access</label>
                                            <select name="online_template_access" id="" class="form-control">
                                                <option value="" selected disabled>Select --</option>
                                                @foreach (config('constants.online_template_access') as $key=>$item)
                                                <option value="{{ $key }}"
                                                {{ ($sub->onlineTemplatesAccess == $key) ? 'selected' : '' }}
                                                >{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">24/7 Support</label>
                                            <select name="support" id="sub-cate" class="form-control">
                                                <option value="" selected disabled>Select --</option>
                                                <option value="Yes"
                                                {{ ($sub->support == 'Yes') ? 'selected' : '' }}
                                                >Yes</option>
                                                <option value="No"
                                                {{ ($sub->support == 'No') ? 'selected' : '' }}
                                                >No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Manual Order Creation (By Admin)</label>
                                            <select name="manual_order_creation" id="sub-cate" class="form-control">
                                                <option value="" selected disabled>Select --</option>
                                                <option value="Yes"
                                                {{ ($sub->manualOredrCreation == 'Yes') ? 'selected' : '' }}
                                                >Yes</option>
                                                <option value="No"
                                                {{ ($sub->manualOredrCreation == 'No') ? 'selected' : '' }}
                                                >No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Discount Code Creation (By Admin)</label>
                                            <select name="discount_code_creation" id="sub-cate" class="form-control">
                                                <option value="" selected disabled>Select --</option>
                                                <option value="Yes"
                                                {{ ($sub->discountCodeCreation == 'Yes') ? 'selected' : '' }}
                                                >Yes</option>
                                                <option value="No"
                                                {{ ($sub->discountCodeCreation == 'No') ? 'selected' : '' }}
                                                >No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Reports</label>
                                            <select name="reports" id="sub-cate" class="form-control">
                                                <option value="" selected disabled>Select --</option>
                                                <option value="Yes"
                                                {{ ($sub->reports == 'Yes') ? 'selected' : '' }}
                                                >Yes</option>
                                                <option value="No"
                                                {{ ($sub->reports == 'No') ? 'selected' : '' }}
                                                >No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Live Chat On Virtual Store</label>
                                            <select name="live_chat" id="sub-cate" class="form-control">
                                                <option value="" selected disabled>Select --</option>
                                                <option value="Yes"
                                                {{ ($sub->liveChat == 'Yes') ? 'selected' : '' }}
                                                >Yes</option>
                                                <option value="No"
                                                {{ ($sub->liveChat == 'No') ? 'selected' : '' }}
                                                >No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="" selected disabled>Select --</option>
                                                @foreach (config('constants.user_status') as $key=>$item)
                                                <option value="{{ $key }}"
                                                {{ ($key == $sub->status) ? 'selected' : '' }}
                                                >{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-50 mt-lg-5"></div>
                            <div class="col-4 text-left mt-lg-5 mt-3 mb-lg-3">
                                <button type="submit" class="btn btn-block btn-lg btn-primary text-white add-product"
                                    title="">Update Subscription</button>
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
        $('#unlimited_product').on('change', function () {
            var selected = $(this).val();
            console.log(selected);
            if(selected == 'Yes'){
                $('#no_product_upload').attr('readonly', true);
            }else{
                $('#no_product_upload').attr('readonly', false);
            }
         })
    })
</script>
@endsection
