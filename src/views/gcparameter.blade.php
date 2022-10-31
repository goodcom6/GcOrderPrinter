@extends('admin.admin_master')
@section('admin')



<div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->


                         
                        <div class="col-md-12">
                            <div class="form-group">
                                
                                <form method="POST" action="{{ route('gcprinter.store') }}" enctype="multipart/form-data">
                                @csrf
                                
                       

                                                     
                                
                                <div class="box_general padding_bottom">
                                        <div class="header_box version_2">
                                           <h2><i class="fa fa-map-marker"></i>Goodcom Printer </h2>
                                        </div>
                                    
                                                <div class="row">
                                                    <div class="col-md-3 center">
                                                        <div class="form-group">
                                                            <label>Printer Username</label>
                                                            <input type="text" class="form-control" name="username" value="{{ $Setting['username']}}" required>
                                                      </div>
                                                    </div>

                                                    <div class="col-md-3 center">
                                                        <div class="form-group">
                                                            <label>Printer Password</label>
                                                            <input type="text" class="form-control" name="password" value="{{ $Setting['password']}}" required>
                                                      </div>
                                                    </div>

                                                    <div class="col-md-3 center">
                                                        <div class="form-group">
                                                            <label>User Agent</label>
                                                            <input type="text" class="form-control" name="UserAgent" value="{{ $Setting['UserAgent']}}" required>
                                                      </div>
                                                    </div>

                                                    


                                               </div>
                                    </div>

                               

           
                                        <div class="row">
                                            <div class="text-xs-right">
	                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Save">					 
						                    </div>
                                        </div>
                
                           
                    </form>
</div>
              





@endsection







