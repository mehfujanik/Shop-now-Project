@extends('admin.admin_master')


 @section('admin')


 <div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Admin Profile Edit</h4>			  
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">  
    
                        
                        <form action= "{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
    
                          <div class="row"> 
    
                            <div class="col-lg-6">
    
                                <div class="form-group">
                                    <h5>Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" id="name" value="{{ $adminProfileEdit->name }}"   class="form-control" aria-invalid="false">
                                        </div>
                                    
                                </div>
                            </div>
    
                                <div class="col-lg-6">
    
                                <div class="form-group">
                                    <h5>Email  <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="email" name="email"  value="{{ $adminProfileEdit->email }}" id="email" class="form-control"> </div>
                                </div>
                            
                            </div> 
                        </div> <!-- end row -->
    
                            <div class="row">
                            <div class="col-lg-6">							
                                <div class="form-group">
                                    <h5>Admin Profile Photo <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" id="image" name="profile_photo_path" class="form-control" > </div>
                                </div>
                            </div>
    
                            <div class="col-lg-6">
    
                                <img id="showImage" style="height: 150px; width: 150px"
                                src="{{ (!empty($adminProfileEdit->profile_photo_path))?url('upload/admin_images/'
                                .$adminProfileEdit->profile_photo_path):url('upload/avatar-1.png') }}"> 
    
                            </div>
                          </div> <!-- end row -->
                          <div class="text-xs-right">
                            <button type="submit" class="btn btn-rounded btn-info">Update</button>
                        </div>
                            
                        </form>
    
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.box-body -->
              </div>
            



        </div>
    </section>
    <!-- /.content -->
  </div>


  @endsection


