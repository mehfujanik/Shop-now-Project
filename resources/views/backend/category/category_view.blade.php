@extends('admin.admin_master')


 @section('admin')


 <div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
 

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title"> All Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
							
								<th>Category Icon</th>
							    <th>Category Name</th>
								<th>Action</th>
							
							</tr>
						</thead>
						<tbody>

							@foreach ($categorys as $item)
							<tr>					

								
								<td>  <i class="{{ $item->category_icon }}"></i> </td>

								<td>{{  $item->category_name }}</td>

								<td>

									<a href="{{ route('edit.category', $item->id)  }}"   >  <i class="fa fa-edit btn btn-success"></i> </a>

									<a href="{{ route('delete.category', $item->id ) }}"> <i class="fa fa-trash btn btn-danger"></i></a>
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
				  <h3 class="box-title">Category Add</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
    
					    
               <form action="{{ route('store.category') }}" method="POST" enctype="multipart/form-data" >
                  @csrf

                <div class="form-group">
                  <h5>Category Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="category_name" class="form-control">
                  
                    @error('category_name')
                   <strong class="text-danger">{{ $message }}</strong>	
                    </span>
                @enderror

                    </div>
                </div>

                <div class="form-group">
                  <h5>Category Icon <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="category_icon" class="form-control" >
                    @error('category_icon')
                    <strong class="text-danger">{{ $message }}</strong>	
                     </span>
                 @enderror
                  	

                    </div>
                </div>

                <input type="submit"  class="btn btn-rounded btn-info"  value="Add Category">
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



