@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark">Manage Slider</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('site-setting.slider-master')}}">Slider</a></li>
              <li class="breadcrumb-item active">Slider Image</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        	<div class="col-lg-12">
	        	<div class="card card-outline card-primary"> 
	        		<div class="card-header">
                  <h5> Manage Slider Image
                    <a href="{{ route('site-setting.slider.add',$slider_master_id) }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Add Slider</a>
                  </h5>
	        		</div>
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>#</th>
                      <th>Caption</th>
                      <th>Slider Image</th>
                      <th>Sort Order</th>
                      <th width="80">Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                @foreach($slider as $p)	
		                <tr>		                  	                 
		                    <td> {{$loop->iteration}}</td>
                        <td>{!!  $p['text_on_banner']   !!}</td>
                        <td><img src="{{asset('upload/slider/'.$p['image']) }}" height="80"></td>
                        <td>{{ $p['sort_order'] }}</td>
		                  	<td>
                          <a href="{{ route('site-setting.slider.edit',['slider_master_id'=>$slider_master_id,'id'=>$p->id]) }}" class="btn btn-primary btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | 
                          <a  class="btn btn-danger btn-sm delete" style="cursor: pointer" id="delete" title="Delete" data-route = "{{ route('site-setting.slider.delete') }}" data-id="{{ $p->id }}" data-token={{csrf_token()}} ><i class="fas fa-trash text-white"></i></a>
		                  </td>
		                </tr>
		                @endforeach                
		                </tbody>                
		              </table>
		            </div>
	            <!-- /.card-body -->
          		</div>
          <!-- /.card -->
        	</div>
        </div>
      </div>
      <!--/. container-fluid -->
    </section>
@endsection

