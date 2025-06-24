 @extends('backend.layouts.app')
 @section('content')
     <style type="text/css">
         .i-style {
             display: inline-block;
             padding: 10px;
             width: 2em;
             text-align: center;
             font-size: 2em;
             vertical-align: middle;
             color: #444;
         }

         .demo-icon {
             cursor: pointer;
         }
     </style>
     <div class="col-xl-12">
         <div class="breadcrumb-holder">
             <h1 class="main-title float-left">Menu add</h1>
             <ol class="breadcrumb float-right">
                 <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><strong>Home</strong></a></li>
                 <li class="breadcrumb-item active">Menu</li>
             </ol>
             <div class="clearfix"></div>
         </div>
     </div>



     <div class="container fullbody">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h5>Menu Add<a class="btn btn-sm btn-success float-right"
                            href="{{ route('menu') }}"><i class="fa fa-list"></i> Menu List</a></h5>
                 </div>
                 <!-- Form Start-->
                 <form method="post"
                       action="{{ @$editData ? route('menu.update', @$editData->id) : route('menu.store') }}"
                       id="myForm">
                     @csrf
                     <div class="card-body">
                         <div class="row">
                             <div class="col-sm-6">
                                 <div class="form-group">
                                     <label class="control-label">Menu Name <span class="text-red">*</span></label>
                                     <input type="text"
                                            id="name"
                                            name="name"
                                            value="{{ @$editData->name }}"
                                            class="form-control"
                                            placeholder="Enter Menu Name">
                                 </div>
                             </div>
                             <div class="col-sm-6">
                                 <div class="form-group {{ $errors->has('parent') ? 'has-error' : '' }}">
                                     <label class="control-label">Menu Type <span class="text-red">*</span></label>
                                     <select id="parent"
                                             name="parent"
                                             class="form-control select2">
                                         <option value="">Please Select Type</option>
                                         <option value="0"
                                                 {{ @$editData->parent == '0' ? 'selected' : '' }}>Parent
                                             Menu</option>
                                         @foreach ($parentMenu as $pm)
                                             <option value="{{ $pm->id }}"
                                                     {{ @$editData->parent == $pm->id ? 'selected' : '' }}>
                                                 {{ $pm->name }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="col-sm-6">
                                 <div class="form-group">
                                     <label class="control-label">Sub Menu <small>(if exist)</small></label>
                                     <select id="parentchield"
                                             name="parentchield"
                                             class="form-control select2">
                                         <option value="">Please Select Sub Menu</option>
                                         <option value="0">None</option>
                                     </select>
                                 </div>
                             </div>
                             <!-- <div class="col-sm-6">
                                       <div class="form-group">
                                        <label class="control-label">Sub Sub Menu <small>(if exist)</small></label>
                                        <select id="parentchildchield" name="parentchildchield" class="form-control">
                                         <option value="">Select Sub Sub Menu</option>
                                         <option value="0">None</option>
                                        </select>
                                       </div>
                                      </div> -->
                             <div class="col-sm-6">
                                 <div class="form-group">
                                     <label class="control-label">URL(Route Name) </label>
                                     <input type="text"
                                            id="url"
                                            name="url"
                                            value="{{ @$editData->route }}"
                                            class="form-control"
                                            placeholder="Enter Route Name">
                                 </div>
                             </div>
                             <div class="col-sm-3">
                                 <div class="form-group">
                                     <label class="control-label">Status</label>
                                     <select id="status"
                                             name="status"
                                             class="form-control select2">
                                         <option value="">Please Select Status</option>
                                         <option value="1" @if (@$editData->status == 1) selected @endif>Active</option>
                                         <option value="0" @if (@$editData->status == 0) selected @endif>Inactive</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-sm-3">
                                 <div class="form-group">
                                     <label class="control-label">Sort Order <span class="text-red">*</span></label>
                                     <input type="number"
                                            id="sort"
                                            value="{{ @$editData->sort }}"
                                            name="sort"
                                            class="form-control"
                                            placeholder="Enter Sort Number">
                                 </div>
                             </div>
                             <div class="col-sm-3">
                                 <div class="form-group">
                                     <label class="control-label">Icon</label>
                                     <input data-toggle="modal"
                                            data-target="#iconListModal"
                                            data-backdrop="static"
                                            data-keyboard="false"
                                            type="text"
                                            id="icon"
                                            name="icon"
                                            value="{{ @$editData->icon }}"
                                            class="form-control"
                                            placeholder="Enter Icon"
                                            readonly="readonly">
                                 </div>
                             </div>
                             <div class="col-sm-3">
                                 <div class="form-group">
                                     <label class="control-label">if Exist Extra route</label>
                                     <button type="button"
                                             class="btn btn-default btn-block addextraRoute">add More
                                         Route</button>
                                 </div>
                             </div>
                         </div>
                         <div id="addextraRouteDiv">
                             @if (@$menuRoutePermission)
                                 @foreach (@$menuRoutePermission as $item)
                                     <input type="hidden"
                                            id="newid[]"
                                            name="newid[]"
                                            value="{{ $item->id }}"
                                            class="newid form-control form-control-sm">
                                     <div class="remove_extraRouteDiv"
                                          id="remove_extraRouteDiv">
                                         <div class="row">
                                             <div class="col-sm-4">
                                                 <div class="form-group">
                                                     <label class="control-label">Menu Name</label>
                                                     <input type="text"
                                                            id="newname[]"
                                                            name="newname[]"
                                                            value="{{ $item->name }}"
                                                            class="newname form-control form-control-sm"
                                                            placeholder="Enter Menu Name">
                                                 </div>
                                             </div>
                                             <div class="col-sm-4">
                                                 <div class="form-group">
                                                     <label class="control-label">URL(Route Name)</label>
                                                     <input type="text"
                                                            id="newurl[]"
                                                            name="newurl[]"
                                                            value="{{ $item->route }}"
                                                            class="newurl form-control form-control-sm"
                                                            placeholder="Enter Route Name">
                                                 </div>
                                             </div>
                                             <div class="col-sm-2">
                                                 <div class="form-group">
                                                     <label class="control-label">Sort Order</label>
                                                     <input type="number"
                                                            id="newsort[]"
                                                            value="{{ $item->sort }}"
                                                            name="newsort[]"
                                                            class="newsort form-control form-control-sm"
                                                            placeholder="Enter Sort Number">
                                                 </div>
                                             </div>
                                             <div class="form-group col-md-2"
                                                  style="padding-top: 30px;">
                                                 <i class="btn btn-info fa fa-plus-circle addextraRoute"></i>
                                                 <i class="btn btn-danger fa fa-minus-circle removeextraRoute"> </i>
                                             </div>
                                         </div>
                                     </div>
                                 @endforeach
                             @endif
                         </div>
                         <div class="row">
                             <div class="col-sm-6">
                                 <div class="form-group">
                                     <button type="submit"
                                             class="btn btn-success btn-sm">{{ @$editData ? 'Update ' : 'Save' }}</button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </form>
                 <!--Form End-->
             </div>
         </div>
     </div>


     <div class="modal fade"
          id="iconListModal"
          role="dialog">
         <div class="modal-dialog modal-md">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Icon List</h4>
                     <button type="button"
                             class="close demo-icon"
                             data-dismiss="modal">&times;</button>
                 </div>
                 <div class="modal-body">
                     <div class="">
                         <div class="">
                             <div class="clearfix demo-icon-list">
                                 <div class="row">
                                     @foreach ($icon as $i)
                                         <div class="col-sm-6 col-md-6">
                                             <div class="demo-icon "><i
                                                    class="{{ $i->name }} i-style"></i><span>{{ $i->name }}</span>
                                             </div>
                                         </div>
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <script id="document-template" type="text/x-handlebars-template">
		<div class="remove_extraRouteDiv" id="remove_extraRouteDiv">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label class="control-label">Menu Name</label>
						<input type="text" id="newname[]" name="newname[]" value="" class="newname form-control form-control-sm" placeholder="Enter Menu Name" >
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label class="control-label">URL(Route Name)</label>
						<input type="text" id="newurl[]" name="newurl[]" value="" class="newurl form-control form-control-sm" placeholder="Enter Route Name">
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<label class="control-label">Sort Order</label>
						<input type="number" id="newsort[]"  value="" name="newsort[]" class="newsort form-control form-control-sm" placeholder="Enter Sort Number">
					</div>
				</div>
				<div class="form-group col-md-2" style="padding-top: 30px;">
					<i class="btn btn-info fa fa-plus-circle addextraRoute"></i>
					<i class="btn btn-danger fa fa-minus-circle removeextraRoute"> </i>
				</div>
				</div>
		</div>
	</script>


     <script type="text/javascript">
         $(document).ready(function() {
             var checkhas = {{ @$menuRoutePermission ? count(@$menuRoutePermission) : 0 }};
             // var checkhas = '0';
             console.log(checkhas);
             $(document).on("click", ".addextraRoute", function() {
                 var source = $("#document-template").html();
                 var template = Handlebars.compile(source);
                 var data = {
                     checkhas: checkhas
                 };
                 var html = template(data);
                 $("#addextraRouteDiv").append(html);
             });

             $(document).on("click", ".removeextraRoute", function(event) {
                 $(this).closest(".remove_extraRouteDiv").remove();
             });
         });
     </script>

     <script type="text/javascript">
         $(document).ready(function() {
             $(".demo-icon").click(function() {
                 var icon = $(this).find('span').html();
                 $('#icon').val(icon);
                 $('#iconListModal').modal('toggle');
             });

             $(document).on('change', '#parent', function() {
                 var parent = $(this).val();
                 $.ajax({
                     url: "{{ route('menu.getajaxsubparent') }}",
                     type: "GET",
                     data: {
                         'parent': parent
                     },
                     success: function(data) {
                         var html = '<option value="0">None</option>';
                         $.each(data, function(key, v) {
                             html += '<option value="' + v.id + '">' + v.name +
                                 '</option>';
                         });
                         $('#parentchield').html(html);
                     }
                 });
             });

             $(document).on('change', '#parentchield', function() {
                 var parent = $(this).val();
                 $.ajax({
                     url: "{{ route('menu.getajaxsubparent') }}",
                     type: "GET",
                     data: {
                         'parent': parent
                     },
                     success: function(data) {
                         var html = '<option value="0">None</option>';
                         $.each(data, function(key, v) {
                             html += '<option value="' + v.id + '">' + v.name +
                                 '</option>';
                         });
                         $('#parentchildchield').html(html);
                     }
                 });
             });
         });
     </script>
     <script type="text/javascript">
         $(document).ready(function() {
             $('textarea').each(function() {
                 $(this).val($(this).val().trim());
             });

             $('#myForm').validate({
                 ignore: [],
                 debug: false,
                 errorClass: 'text-danger',
                 validClass: 'text-success',
                 rules: {
                     name: {
                         required: true,
                     },
                     parent: {
                         required: true,
                     },

                     sort: {
                         required: true,
                         digits: true,
                     }

                 },
                 messages: {
                     name: {
                         required: "Name is required",
                     },
                     parent: {
                         required: "Menu Name is required",
                     },

                     sort: {

                         required: "Sort Order is required",
                         digits: "Invalid Order",
                     }

                 },

                 errorPlacement: function(error, element) {
                     error.addClass('text-danger');
                     element.closest('.form-group').append(error);
                 },
                 highlight: function(element, errorClass, validClass) {
                     $(element).addClass('is-invalid');
                 },
                 unhighlight: function(element, errorClass, validClass) {
                     $(element).removeClass('is-invalid');
                 }
             });
         });
     </script>
 @endsection
