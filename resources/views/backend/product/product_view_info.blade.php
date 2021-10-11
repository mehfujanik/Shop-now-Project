@extends('admin.admin_master')


 @section('admin')

<style>
    .col-md-8{
        display: flex;
        justify-content:center;
        align-items:center;
    }
    p{
        margin-bottom:0px!important;
    }
</style>
 <div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
			<div class="col-12">
                <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Product Info View</h4>  
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">Brand Name:</label>
                                        <div class="col-md-8">
                                             <p class="font-weight-bold">{{ $products['brand']['brand_name'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">Category Name:</label>
                                        <div class="col-md-8">
                                        <p class="font-weight-bold">{{ $products['category']['category_name'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">SubCategory Name:</label>
                                        <div class="col-md-8">
                                             <p class="font-weight-bold">{{ $products['subcategory']['subcategory_name'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">SubSubCategory Name:</label>
                                        <div class="col-md-8">
                                        <p class="font-weight-bold">{{ $products['subsubcategory']['subsubcategory_name'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>	
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">Product Name:</label>
                                        <div class="col-md-8">
                                             <p class="font-weight-bold">{{ $products->product_name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">Product Code:</label>
                                        <div class="col-md-8">
                                        <p class="font-weight-bold">{{ $products->product_code }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>	
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">Product Image:</label>
                                        <div class="col-md-8">
                                            <img src="{{ asset($products->product_thambnail) }}" height="80px;" width="80px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">Product Qty:</label>
                                        <div class="col-md-8">
                                        <p class="font-weight-bold">{{ $products->product_qty }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">Product Tags:</label>
                                        <div class="col-md-8">
                                             <p class="font-weight-bold">{{ $products->product_tags }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">Product Size:</label>
                                        <div class="col-md-8">
                                        <p class="font-weight-bold">{{ $products->product_size }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">Product Color:</label>
                                        <div class="col-md-8">
                                             <p class="font-weight-bold">{{ $products->product_color }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">Product Selling Price:</label>
                                        <div class="col-md-8">
                                        <p class="font-weight-bold">{{ $products->selling_price }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>	
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">Discount Price:</label>
                                        <div class="col-md-8">
                                          <p class="font-weight-bold">{{ $products->discount_price }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">Product Short Description:</label>
                                        <div class="col-md-8">
                                           <p class="font-weight-bold">{{ $products->product_short_descp }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>	
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4">Product Status:</label>
                                        <div class="col-md-8">
                                             <p class="font-weight-bold">{{ $products->status }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>			
                        </div>
                        <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
</div>

@endsection