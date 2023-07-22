<!-- Start Edit Modal -->
		<div class="modal fade bd-example-modal-xl" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myExtraLargeModalLabel">Add new Project</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row gutters">
							<div class="col-3">
								<div class="form-group">
									<div style="font-weight: bold;"> Project Name *</div>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><span class="icon-folder-plus"></span></span>
										</div>
										<input type="text" class="form-control" id="editProjectsName" placeholder="Project Name" aria-label="Username" aria-describedby="basic-addon1" value="{{$project->name}}">
									</div>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									<div style="font-weight: bold;"> Phone *</div>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><span class="icon-phone"></span></span>
										</div>
										<input type="number" class="form-control" id="editProjectsPhone" placeholder="Phone number" aria-label="Username" aria-describedby="basic-addon1" value="{{$project->phone}}">
									</div>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									<div style="font-weight: bold;"> Email *</div>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">@</span>
										</div>
										<input type="Email" class="form-control" id="editProjectsEmail" value="{{$project->email}}" placeholder="email" aria-label="Username" aria-describedby="basic-addon1">
									</div>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									<div style="font-weight: bold;"> Website Link</div>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">@</span>
										</div>
										<input type="text" class="form-control" id="edit_web_link" value="{{$project->web_link}}" placeholder="email" aria-label="Username" aria-describedby="basic-addon1">
									</div>
								</div>
							</div>
						</div>
						<div class="row gutters">
							<div class="col-8">
								<div class="form-group">
									<div style="font-weight: bold;"> Address *</div>
									<div class="input-group">
										<div class="input-group-prepend">
											<label class="input-group-text" for="inputGroupSelect01"><span class="icon-user-check"></span></label>
										</div>
										<textarea class="form-control" id="editProjectsAddress" rows="1">{{$project->address}}</textarea>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<div style="font-weight: bold;"> Logo *</div>
									<div class="input-group">
										<div class="input-group-prepend">
											
										</div>
										<div class="custom-file">
											<input type="file" name="editProjectsLogo" class="form-control" id="editProjectsLogo">
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<span class="spinner-grow d-none text-danger spinner-grow-sm" id="addLoadButton"></span>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="updateProject" onclick="updateProject({{$project->id}})" >Save</button>
					</div>
				</div>
			</div>
		</div>
<!-- End Edit Modal -->