<!-- Start Edit Modal -->
<div class="modal fade" id="editStaffModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="basicModalLabel">Edit staff</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- Row start -->
				<form action="{{url('update-staff',$staff->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div id="example-form">
								<!-- Patient Details -->
								
								<h3>Personal Information</h3>
								<section>
									<div class="row gutters">
										<div class="col-6">
											<div class="form-group">
												<div style="font-weight: bold;">First Name *</div>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><span class="icon-account_box"></span></span>
													</div>
													<input type="text" class="form-control" placeholder="name" id="editname" name="name" aria-label="Username" aria-describedby="basic-addon1" value="{{$staff->name}}" >
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<div style="font-weight: bold;">Last Name *</div>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><span class="icon-account_box"></span></span>
													</div>
													<input type="text" class="form-control" placeholder="name" id="editLastname" name="last_name" aria-label="Username" aria-describedby="basic-addon1" value="{{$staff->last_name}}" >
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<div style="font-weight: bold;">Father's Name *</div>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><span class="icon-account_box"></span></span>
													</div>
													<input type="text" class="form-control" placeholder="Email" id="editfather_name" name="father_name" aria-label="Username" aria-describedby="basic-addon1" value="{{$staff->father_name}}" >
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<div style="font-weight: bold;">Mother's Name *</div>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><span class="icon-account_box"></span></span>
													</div>
													<input type="text" class="form-control" placeholder="Mother's name" id="editmother_name" name="mother_name" aria-label="Username" aria-describedby="basic-addon1" value="{{$staff->mother_name}}">
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<div style="font-weight: bold;"> image </div>
												<div class="input-group">
													<div class="input-group-prepend">
														
													</div>
													<div class="custom-file">
														<input type="file" name="image" class="form-control" id="editimage">
														
													</div>
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<div style="font-weight: bold;"> Email</div>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><span class="icon-phone"></span></span>
													</div>
													<input type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1" name="email" id="editemail" value="{{$staff->email}}">
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<div style="font-weight: bold;"> Password *</div>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><span class="icon-phone"></span></span>
													</div>
													<input type="text" class="form-control" placeholder="Password" aria-describedby="basic-addon1" name="password" id="edit_password" value="{{$staff->text_password ?? ''}}" >
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<div style="font-weight: bold;">Age:</div>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><span class="icon-home"></span></span>
													</div>
													<input type="number" class="form-control" placeholder="Age" aria-label="Username" aria-describedby="basic-addon1" name="age" id="editage" value="{{$staff->age}}">
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<div style="font-weight: bold;"> Sex *</div>
												<div class="input-group">
													<div class="input-group-prepend">
														<label class="input-group-text" for="inputGroupSelect01"><span class="icon-user-check"></span></label>
													</div>
													<select class="custom-select" id="editgender" name="gender" required="">
														<option @if($staff->sex == 'Male') selected @endif value="Male">Male</option>
														<option @if($staff->sex == 'Female') selected @endif value="Female">Female</option>
														<option  value="Other">Other</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<div style="font-weight: bold;">NID/Passport/Birth-Cirtificate</div>
												<div class="input-group">
													<div class="input-group-prepend">
														<label class="input-group-text" for="inputGroupSelect01"><span class="icon-user-check"></span></label>
													</div>
													<input type="text" class="form-control" placeholder="NID/Passport/Birth-Cirtificate no" aria-label="Username" aria-describedby="basic-addon1" name="nid" id="editnid" value="{{$staff->nid}}">
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<div style="font-weight: bold;">Parent's NID</div>
												<div class="input-group">
													<div class="input-group-prepend">
														<label class="input-group-text" for="inputGroupSelect01"><span class="icon-user-check"></span></label>
													</div>
													<input type="text" class="form-control" placeholder="Parents NID no" aria-label="Username" aria-describedby="basic-addon1" name="parents_nid" id="editnid" value="{{$staff->parents_nid}}">
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<div style="font-weight: bold;">Phone Number *</div>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><span class="icon-user"></span></span>
													</div>
													<input type="number" class="form-control" placeholder="Mobile Number" aria-label="Username" aria-describedby="basic-addon1" name="mobile" id="editmobile" value="{{$staff->mobile}}">
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<div style="font-weight: bold;">Alternative Phone Number</div>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><span class="icon-user"></span></span>
													</div>
													<input type="number" class="form-control" placeholder="Alternative Mobile Number" aria-label="Username" aria-describedby="basic-addon1" name="alternative_mobile" id="editalternative_mobile" value="{{$staff->alternative_mobile}}">
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<div style="font-weight: bold;">Present Address *</div>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><span class="icon-account_box"></span></span>
													</div>
													<input type="text" class="form-control" placeholder="Present Address" id="editpresent_address" name="present_address" aria-label="Username" aria-describedby="basic-addon1" value="{{$staff->present_address}}">
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<div style="font-weight: bold;">Permanent Address</div>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><span class="icon-account_box"></span></span>
													</div>
													<input type="text" class="form-control" placeholder="Permanent address" id="editpermanent_address" name="permanent_address" aria-label="Username" aria-describedby="basic-addon1" value="{{$staff->permanent_address}}">
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
							<h3>Salary particularizes</h3>
							<section>
								
								<div class="row gutters">
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">Reference Name</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><span class="icon-account_box"></span></span>
												</div>
												<input type="text" class="form-control" placeholder="Reference name" id="editreference" name="reference" aria-label="Username" aria-describedby="basic-addon1" value="{{$staff->reference}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">Degination</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><span class="icon-account_box"></span></span>
												</div>
												<input type="text" class="form-control" placeholder="Designation" id="editdesignation" name="designation" aria-label="Username" aria-describedby="basic-addon1" value="{{$staff->designation}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;"> Role *</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="input-group-text" for="inputGroupSelect01"><span class="icon-user-check"></span></label>
												</div>
												<select class="custom-select" id="role" name="role">
													@php $roles = App\UserRole::get(); @endphp
													@foreach($roles as $role)
													<option @if($staff->role == $role->id) selected @endif  value="{{$role->id}}">{{$role->rolename}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;"> Staff Type</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><span class="icon-user-check"></span></span>
												</div>
												<select class="custom-select" id="role" name="staff_type">
													<option @if($staff->staff_type == 'On Call') selected @endif value="On Call">On Call</option>
													<option @if($staff->staff_type == 'Roster') selected @endif value="Roster">Roster</option>
													<option @if($staff->staff_type == 'Monthly salary') selected @endif value="Monthly salary">Monthly salary</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">Monthly Salary:</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><span class="icon-home"></span></span>
												</div>
												<input type="number" class="form-control" placeholder="Monthly Salary" aria-label="Username" aria-describedby="basic-addon1" name="monthly_salary" id="editmonthly_salary" value="{{$staff->monthly_salary}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">Hourly Salary</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="input-group-text" for="inputGroupSelect01"><span class="icon-user-check"></span></label>
												</div>
												<input type="number" class="form-control" placeholder="Hourly Salary" aria-label="Username" aria-describedby="basic-addon1" name="hourly_salary" id="edithourly_salary" value="{{$staff->hourly_salary}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">Roster</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><span class="icon-user-check"></span></span>
												</div>
												<input type="number" class="form-control" placeholder="Hourly Salary" aria-label="Username" aria-describedby="basic-addon1" name="roster_morning" id="roster_morning" value="{{$staff->roster}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">Food:</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><span class="icon-user"></span></span>
												</div>
												<input type="number" class="form-control" placeholder="Food" aria-label="Username" aria-describedby="basic-addon1" name="food" id="food" value="{{$staff->food}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">Night:</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><span class="icon-user"></span></span>
												</div>
												<input type="number" class="form-control" placeholder="Night" aria-label="Username" aria-describedby="basic-addon1" name="night" id="night" value="{{$staff->night}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">BMDC Reg. No:</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><span class="icon-account_box"></span></span>
												</div>
												<input type="text" class="form-control" placeholder="BMDC Reg. No" id="editbmdc_reg_no" name="bmdc_reg_no" aria-label="Username" aria-describedby="basic-addon1" value="{{$staff->bmdc_reg_no}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">BNC Reg. No:</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><span class="icon-account_box"></span></span>
												</div>
												<input type="text" class="form-control" placeholder="BNC Registration No" id="editbnc_reg_no" name="bnc_reg_no" aria-label="Username" aria-describedby="basic-addon1" value="{{$staff->bnc_reg_no}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">On call (On Duty):</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><span class="icon-user"></span></span>
												</div>
												<input type="number" class="form-control" placeholder="" id="oncall_onduty" name="oncall_onduty" aria-label="Username" aria-describedby="basic-addon1" value="{{$staff->oncall_onduty}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">On call (Off Duty):</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><span class="icon-user"></span></span>
												</div>
												<input type="number" class="form-control" placeholder="" id="oncall_offduty" name="oncall_offduty" aria-label="Username" aria-describedby="basic-addon1" value="{{$staff->oncall_offduty}}">
											</div>
										</div>
									</div>
								</div>
							</section>
							<h3>Facilities</h3>
							<section>
								
								<div class="row gutters">
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">Conveyance</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><span class="icon-account_box"></span></span>
												</div>
												<input type="text" class="form-control" placeholder="Conveyance" id="editconveyance" name="conveyance" aria-label="Username" aria-describedby="basic-addon1"  value="{{$staff->conveyance}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">Increment</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><span class="icon-account_box"></span></span>
												</div>
												<input type="text" class="form-control" placeholder="Increment" id="editincrement" name="increment" aria-label="Username" aria-describedby="basic-addon1"  value="{{$staff->increment}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;"> Bonus</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="input-group-text" for="inputGroupSelect01"><span class="icon-user-check"></span></label>
												</div>
												<input type="number" class="form-control" placeholder="Bonus" id="editbonus" name="bonus" aria-label="Username" aria-describedby="basic-addon1"  value="{{$staff->bonus}}">
											</div>
										</div>
									</div>
									<div class="col-6">
												<div class="form-group">
													<div style="font-weight: bold;"> Deduction</div>
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon1"><span class="icon-user-check"></span></span>
														</div>
														<input type="number" class="form-control" placeholder="Deduction" id="deduction" name="deduction" aria-label="Username" aria-describedby="basic-addon1" value="{{$staff->deduction}}">
													</div>
												</div>
											</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">Provident-fund:</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><span class="icon-home"></span></span>
												</div>
												<input type="number" class="form-control" placeholder="Provident Fund" aria-label="Username" aria-describedby="basic-addon1" name="provident_fund" id="editprovident_fund"  value="{{$staff->provident_fund}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">Casual Leave</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="input-group-text" for="inputGroupSelect01"><span class="icon-user-check"></span></label>
												</div>
												<input type="number" class="form-control" placeholder="Casual Leave" aria-label="Username" aria-describedby="basic-addon1" name="casual_leave" id="editcasual_leave"  value="{{$staff->casual_leave}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">Sick Leave</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="input-group-text" for="inputGroupSelect01"><span class="icon-user-check"></span></label>
												</div>
												<input type="number" class="form-control" placeholder="Sick Leave" aria-label="Username" aria-describedby="basic-addon1" name="sick_leave" id="editsick_leave"  value="{{$staff->sick_leave}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">Emergency Leave</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="input-group-text" for="inputGroupSelect01"><span class="icon-user-check"></span></label>
												</div>
												<input type="number" class="form-control" placeholder="Emergency Leave" aria-label="Username" aria-describedby="basic-addon1" name="emergency_leave" id="editemergency_leave"  value="{{$staff->emergency_leave}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">Pay Leave</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="input-group-text" for="inputGroupSelect01"><span class="icon-user-check"></span></label>
												</div>
												<input type="number" class="form-control" placeholder="Pay Leave" aria-label="Username" aria-describedby="basic-addon1" name="pay_leave" id="editpay_leave"  value="{{$staff->pay_leave}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">Special Leave</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="input-group-text" for="inputGroupSelect01"><span class="icon-user-check"></span></label>
												</div>
												<input type="number" class="form-control" placeholder="Educational Leave" aria-label="Username" aria-describedby="basic-addon1" name="educational_leave" id="editeducational_leave"  value="{{$staff->educational_leave}}">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div style="font-weight: bold;">Status *</div>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><span class="icon-account_box"></span></span>
												</div>
												<select class="custom-select" id="editstatus" name="status">
													<option  value="">Select</option>
													<option @if($staff->status == 'Active') selected @endif value="Active">Active</option>
													<option @if($staff->status == 'Not Active') selected @endif value="Not Active">Not Active</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-success">Update Statff</button>
							</section>
						</div>
					</div>
				</div>
				<!-- Row end -->
			</form>
		</div>
	</div>
</div>
</div>
</div>
<!-- End Edit Modal -->