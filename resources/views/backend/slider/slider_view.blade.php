@extends('admin.admin_master')


 @section('admin')


 <div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
 

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title"> All Brands</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
							
								<th>Slider Title</th>
								<th>Slider Img</th>
								<th>Slider Description</th>
								<th>Status</th>
							    <th>Actions</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($slider as $item)
							<tr>					
								<td>  {{ $item->title }} </td>

								<td>

								<img src="{{ asset($item->slider_img) }}" height="80px;" width="80px;">

								</td>

								<td>  {{ $item->description }} </td>
								@if($item->status==0)
								<td>  <a class="btn btn-danger btn-sm">Deactive</a> </td>
								@else
								<td>  <a class="btn btn-success btn-sm">Active</a> </td>
								@endif

								<td>

									<a href="{{ route('edit.slider',$item->id) }}"  class="btn btn-info btn-sm" ><i class="fa fa-pencil"></i> </a>

									<a href="{{ route('slider.delete',$item->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
								@if($item->status==1)
									<a href="{{ route('slider.deactive',$item->id) }}" class="btn btn-danger btn-sm" title="Product deactive now"><i class ="fa fa-arrow-down"></i></a>
								@else
									<a href="{{ route('slider.active',$item->id) }}" class="btn btn-success btn-sm" title="Product active now"><i class ="fa fa-arrow-up"></i></a>
								@endif
								 </td>

														
							</tr> 

								@endforeach	
							

						</tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			 
			  <!-- /.box -->          
			</div>
			<!-- /.col -->



			<div class="col-4">
			<div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Slider Add</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
    
					    
             <form action= "{{ route('slider.store')}}" method="POST" enctype="multipart/form-data" >
				  @csrf

              <div class="form-group">
	               <label>Slider Title</label>
                   <input type="text"  name="slider_title" class="form-control" >
          


                   @error('slider_title')
                     
                       <strong style="color: red">{{ $message }}</strong>	
                      
                   @enderror


	           </div>
			   <div class="form-group">
	               <label>Slider Description</label>
                   <input type="text"  name="slider_description" class="form-control" >
          


                   @error('slider_description')
                     
                       <strong style="color: red">{{ $message }}</strong>	
                      
                   @enderror


	           </div>

                   <div class="form-group" >
                   	<label>Slider Img</label>
	                		<input type="file" id="image" name="slider_image" class="form-control" > 

	                		@error('slider_image')
 						  <strong style="color: red">{{ $message }}</strong>	
	                		@enderror

	               </div>


                       <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info"  value="Add Slider" >
                        </div>

				</form> 

				</div>
			</div>


			</div>
		

	      </div>
        </div>
    </section>
</div>

@endsection



