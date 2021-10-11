@extends('admin.admin_master')


 @section('admin')


 <div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
 

		



			<div class="col-8">
			<div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Brand Edit</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
    
					    
             <form action="{{ route('update.brand', $brands->id) }}" method="POST" enctype="multipart/form-data" >

                  @csrf

              <input type="hidden" name="id" value="{{ $brands->id }}">

                  <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">


                <div class="form-group">
                  <h5>Brand Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="brand_name"  class="form-control" id="brand_name" >
    
                    </div>
                </div>

                <div class="form-group">
                  <h5>Brand Img <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="file" name="brand_image" class="form-control" id="brand_image" >
    
                    </div>
                </div>




                       <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info"  value="Update Brand" >
                        </div>

				</form> 

				</div>
			</div>


			</div>
		
				<div class="col-4"></div>

			<!-- /.col -->

		 </div>
        </div>
    </section>
</div>

@endsection



