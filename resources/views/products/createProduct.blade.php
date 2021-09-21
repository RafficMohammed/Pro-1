

<x-layout>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link">
            <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{$user->name}}</a>
                </div>
                <br>
                <form action="/logout" method="post">
                    @csrf
                    <button>
                        <a class="d-block">Logout</a>
                    </button>
                </form>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
        @if($user->role == '1')
            <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="/products.create" class="nav-link">
                                <p>
                                    Add New
                                </p>
                            </a>
                        </li>




                    </ul>
                </nav>
        @endif           <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Products Section</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Products Section</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->


            </section>



            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Add Vehicle</h3>
                        </div>

                        <!-- /.card-header -->
                        <form action="/submitProduct" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        <div class="card-body">
                            <div class="row">
                            	

                                <div class="col-md-6">

                                    <div class="form-group">
                                    	@error('name')
					                  <div class="alert alert-danger d-flex align-items-center" role="alert">
					                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					                        <span aria-hidden="true">&times;</span>
					                    </button>
					                  <svg class="bi flex-shrink-0 me-2" width="24" height="10" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
					                  <div>
					                    {{$message}}
					                  </div>
					                </div>
					                    @enderror
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control select2">

                                    </div>










                                    <!-- /.form-group -->
                                    <div class="form-group">
                                    
                                        <label>Engine Type</label>
                                          @error('type')
					                  <div class="alert alert-danger d-flex align-items-center" role="alert">
					                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					                        <span aria-hidden="true">&times;</span>
					                    </button>
					                  <svg class="bi flex-shrink-0 me-2" width="24" height="10" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
					                  <div>
					                    {{$message}}
					                  </div>
					                </div>
					                    @enderror
                                        <select class="form-control select2" name="type" value="{{old('type')}}"  style="width: 100%;">
                                            <option selected="selected">None</option>
                                            <option>ABC</option>
                                            <option>B4</option>
                                            <option>De</option>

                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>

















                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                      @error('description')
					                  <div class="alert alert-danger d-flex align-items-center" role="alert">
					                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					                        <span aria-hidden="true">&times;</span>
					                    </button>
					                  <svg class="bi flex-shrink-0 me-2" width="24" height="10" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
					                  <div>
					                    {{$message}}
					                  </div>
					                </div>
					                    @enderror
                                        <label>Description</label>
                                       <textarea class="form-control select2" name="description">{{old('description')}} </textarea>
                                    </div>










                                    <!-- /.form-group -->
                                    <div class="form-group">
                                    @error('tyre')
					                  <div class="alert alert-danger d-flex align-items-center" role="alert">
					                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					                        <span aria-hidden="true">&times;</span>
					                    </button>
					                  <svg class="bi flex-shrink-0 me-2" width="24" height="10" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
					                  <div>
					                    {{$message}}
					                  </div>
					                </div>
					                    @enderror
                                        <label>Tyre</label>
                                        <input type="number" name="tyre" value="{{old('tyre')}}"  class="form-control select2">

                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Loading Bearer</label>
                                        <input type="text" name="bearer"value="{{old('bearer')}}"  class="form-control select2">

                                    </div>





                                    <!-- /.form-group -->
                                    <div class="form-group">
                                    @error('speed')
					                  <div class="alert alert-danger d-flex align-items-center" role="alert">
					                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					                        <span aria-hidden="true">&times;</span>
					                    </button>
					                  <svg class="bi flex-shrink-0 me-2" width="24" height="10" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
					                  <div>
					                    {{$message}}
					                  </div>
					                </div>
					                    @enderror
                                        <label>Maximum Speed</label>
                                        <select class="form-control select2" name="speed" value="{{old('speed')}}"  style="width: 100%;">
                                            <option selected="selected">None</option>
                                            <option>100</option>
                                            <option>180</option>
                                            <option>260</option>
                                            <option>350</option>


                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>

                                <div class="col-md-6">

                                    <!-- /.form-group -->
                                    <div class="form-group">
                                    @error('brands')
					                  <div class="alert alert-danger d-flex align-items-center" role="alert">
					                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					                        <span aria-hidden="true">&times;</span>
					                    </button>
					                  <svg class="bi flex-shrink-0 me-2" width="24" height="10" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
					                  <div>
					                    {{$message}}
					                  </div>
					                </div>
					                    @enderror
                                        <label>Brands</label>
                                        <select class="form-control select2" name="brands" value="{{old('brands')}}"  style="width: 100%;">
                                            <option selected="selected">None</option>
                                            <option>Bajaj</option>
                                            <option>TVS</option>
                                            <option>AL</option>
                                            <option>TATA</option>
                                            <option>Yamaha</option>
                                            <option>Force</option>

                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                            </div>
                            <!-- /.row -->
    <div>
        <button type="submit" class="btn btn-primary">create</button>
    </div>

                        </div>
                        <!-- /.card-body -->
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
</x-layout>
