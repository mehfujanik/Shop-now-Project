@extends('admin.admin_master')


 @section('admin')


 <div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
 

		
  <div  class="col-3"></div>

			<div class="col-6">
			<div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Category Edit</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
    
					    
             <form action= "{{  route('update.category') }}" method="POST"  >
				  @csrf


                 <input type="hidden" name="id" value="{{ $categorys->id }}">

              

				   <div class="form-group" >
                   	<label>Category Icon</label>
	                		<input type="text"  value="{{ $categorys->category_icon }}" name="category_icon" class="form-control" > 

	                		@error('category_icon')
 						  <strong style="color: red">{{ $message }}</strong>	
	                		@enderror

	               </div>



		              <div class="form-group">
			               <label>Category Name</label>
		                   <input type="text" value="{{ $categorys->category_name }}"  name="category_name" class="form-control" >
		          
		                   @error('category_name')
		                     
		                       <strong style="color: red">{{ $message }}</strong>	
		                      
		                   @enderror

			           </div>

                  


                       <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info"  value="Add Category" >
                        </div>

				</form> 

				</div>
			</div>


			</div> 
			{{-- col-6 end  --}}

			<div  class="col-3"></div>
		



		 </div>
        </div>
    </section>
</div>

@endsection



