@php
     $categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">

        {{-- category start loop list show --}}
        @foreach($categories as $category)                
       
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="{{ $category->category_icon }}" aria-hidden="true"></i>{{ $category->category_name }}</a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">
          
          {{-- Sub category view --}}
            @php
            $subcategories = App\Models\SubCategory::where('category_id',
            $category->id)->orderBy('subcategory_name','ASC')->get();
            @endphp

             @foreach($subcategories as $subcategory)
                <div class="col-sm-12 col-md-3">    

                  <a href="{{ url('subcategory/product/'.$subcategory->id) }}">   
                  <h2 class="title">                           
                    {{ $subcategory->subcategory_name }}
                  </h2>
                </a>

               {{-- Sub Sub Category List --}}
              @php
              $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', 
              $subcategory->id)->orderBy('subsubcategory_name', 'ASC')->get();
              @endphp

               @foreach($subsubcategories as $subsubcategory)
                             
                  <ul class="links list-unstyled"> 
                      
                    <li><a href="{{ url('subsubcategory/product/'.$subsubcategory->id) }}">{{ $subsubcategory->subsubcategory_name }}</a></li>                     
                  </ul>
               
                  @endforeach {{-- end sub sub category loop --}}
                </div>
                <!-- /.col -->                                         
                @endforeach   <!-- sub category end loop -->
              
              </div>
              <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu -->
         </li>
        <!-- /.menu-item -->
        @endforeach {{-- end category loop --}}
        
      </ul>
      <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
  </div>
  <!-- /.side-menu --> 