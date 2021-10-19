@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Add Product</h1>
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
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <select name="user_name" id="" class="form-control">
                                                <option value="" selected disabled>Select --</option>
                                                @foreach ($userList as $key=>$item)
                                                <option value="{{ $item->_id }}">{{ $item->userName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Product Name</label>
                                            <input type="text" class="form-control" placeholder="Product Name"
                                                aria-label="Username" name="product_name"
                                                aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Price ({{ currency() }})</label>
                                            <input type="text" class="form-control" placeholder="Product Price"
                                                aria-label="Username" name="price" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Sub Category</label>
                                            <select name="sub_category" id="sub-cate" class="form-control">
                                                <option value="" selected disabled>Select --</option>
                                                @foreach ($subCateList as $key=>$item)
                                                <option value="{{ $item->_id }}">{{ $item->name }} ({{
                                                    $item->productType
                                                    }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Product ID</label>
                                            <input type="text" class="form-control" placeholder="Product ID"
                                                aria-label="Username" name="product_id" aria-describedby="basic-addon1"
                                                readonly id="product_id">
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
                                                <option value="{{ $key }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Prouduct Description</label>
                                            <textarea name="prod_description" id="" cols="30" rows="6"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="attribute" id="attr" value="">
                                <input type="hidden" name="quantity" id="quantity" value="">
                                <input type="hidden" name="sku" id="sku" value="">

                                <div class="col-lg-12 mt-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Product Attributes (E.g. Color, size)</label>
                                            <div class="wrapper">

                                                <table class="common_table w-100 table">
                                                    <tbody>
                                                        <tr class="template_row">
                                                            <td class="controls"><a href="javascript: void(0);"
                                                                    class="list_cancel text-dark" title="Delete Row"><i
                                                                        class="fa fa-times"></i></a>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control attribute" id="attribute" name=""
                                                                    value="" placeholder="Attribute"/>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="long form-control quantity" id="quantity" name=""
                                                                    value="" placeholder="Quantity"/>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control sku" id="SKU" name="" value="" placeholder="SKU"/>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <a href="javascript: void(0);" class="list_add"><i
                                                        class="fa fa-plus-circle fa-2s text-dark">Add one row</i></a>
                                                <br class="clear" />
                                            </div>
                                        </div>
                                        <!-- ############# wrapper end ############# -->
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Image Upload</label>
                                            <input type="file" multiple name="images" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="h-50 mt-lg-5"></div>
                    <div class="col-2 text-left mt-lg-5 mt-3 mb-lg-3">
                        <button type="button" class="btn btn-block btn-lg btn-primary text-white add-product" title="">Add Product</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="{{ baseurl('assets/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#sub-cate').on('change', function () {
            var prodid = Math.random().toString(36).substr(2, 9);
            $('#product_id').val(prodid);
         })

        function addNewRow() {
            var template = $('tr.template_row:first');
            $('.no_entries_row').css('display','none');
            var newRow = template.clone();
            var lastRow = $('tr.template_row:last').after(newRow);

            $('.list_cancel').on('click',function(event){
                event.stopPropagation();
                event.stopImmediatePropagation();
                if($('.list_cancel').length > 1){
                    $(this).closest('tr').remove();
                    if($('.list_cancel').length ===1){
                        $('.no_entries_row').css('display','inline-block');
                    }
                }
                console.log($('.list_cancel').length)
            });
                console.log($('.list_cancel').length)
                $('select.label').on('change',function(event){
                event.stopPropagation();
                event.stopImmediatePropagation();
                $(this).css('background-color',$(this).val());
            })
        }
        $('a.list_add').on('click',addNewRow);


        $('.add-product').on('click', function (e) {
            var atteributs = [];
            var quantity = [];
            var sku = [];
            e.preventDefault();
            $('.attribute').each(function () {
                var values = $(this).val();
                if(values != '' || values != null || values != undefined){
                    atteributs.push(values);
                }
            });

            $('.quantity').each(function () {
                var values = $(this).val();
                if(values != '' || values != null || values != undefined){
                    quantity.push(values);
                }
            });

            $('.sku').each(function () {
                var values = $(this).val();
                if(values != '' || values != null || values != undefined){
                    sku.push(values);
                }
            });

            $('#attr').val(atteributs);
            $('#sku').val(sku);
            $('#quantity').val(quantity);
            $('form').submit();
         })
    })
</script>
@endsection
