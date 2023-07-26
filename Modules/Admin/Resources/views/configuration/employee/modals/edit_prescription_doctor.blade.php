<link rel="stylesheet" type="text/css" href="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/css/prettify.css"></link>
<link rel="stylesheet" type="text/css" href="https://jhollingworth.github.io/bootstrap-wysihtml5//src/bootstrap-wysihtml5.css"></link>

<script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/wysihtml5-0.3.0.js"></script>
<script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/prettify.js"></script>
<script src="https://jhollingworth.github.io/bootstrap-wysihtml5//src/bootstrap-wysihtml5.js"></script>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="width:700px;">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel">Add new doctor</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					 <form role="form"  method="post"  id="editPrescriptionDoctor" action="{{url('update-prescription-doctor',$doctor->id)}}">
					 	@csrf
                        <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Doctor Name:</label>

                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Enter Doctor Name" id="menu_name" name="doc_name" minlength="2" value="{{$doctor->doctor_name}}" required>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status:</label>

                                        <div class="input-group">
                                            <select class="form-control" name="status" required>
                                                <option>Select Status</option>
                                                <option @if($doctor->status == 'Active') selected @endif value="Active">Active</option>
                                                <option @if($doctor->status == 'Inactive') selected @endif value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description:</label>
                                    <div class="form-group">
                                        <textarea class="editDes form-control" name="description">{{$doctor->description}}</textarea>
                                    </div>
                                </div>
                                <!-- /.form group -->
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
				</div>
					=
				</div>
			</div>
		</div>
	</div>
@if(Session::has('success'))
<script type="text/javascript">
    Toast.fire({
                icon: 'success',
                title: '{!! Session::get('success') !!}',
                })
</script>
@php Session::forget('success') @endphp
@endif

@if(Session::has('failed'))
<script type="text/javascript">
    Toast.fire({
                icon: 'success',
                title: '{!! Session::get('failed') !!}',
                })
</script>
@endif
@php Session::forget('error') @endphp
    <script type="text/javascript">
        $(document).ready(function() {
          $('.editDes').wysihtml5();
        });
    </script>