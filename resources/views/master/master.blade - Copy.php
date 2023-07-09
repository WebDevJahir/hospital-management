<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Meta -->
		<meta name="description" content="Hospice Bangladesh Ltd">
		<meta name="author" content="E-Light Software ltd">
		<link rel="shortcut icon" href="{{asset('/assets/img/logo.png')}}" />
		<!-- Title -->
		<title>Hospice Bangladesh</title>
		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
		<script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg="nest"></script>
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="{{asset('assets/fonts/style.css')}}">
		<!-- Main css -->
		<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
		<link rel="stylesheet" href="{{asset('css/lightbox.css')}}">
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- DateRange css -->
		<link rel="stylesheet" href="{{asset('assets/vendor/daterange/daterange.css')}}" />
		<!-- Data Tables -->
		<link rel="stylesheet" href="{{asset('assets/vendor/datatables/dataTables.bs4.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/datatables/dataTables.bs4-custom.css')}}" />
		<link href="{{asset('assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet" />
		<!-- C3 CSS -->
		<link rel="stylesheet" href="{{asset('assets/vendor/c3/c3.min.css')}}" />
		<!-- Steps Wizard CSS -->
		<link rel="stylesheet" href="{{asset('assets/vendor/wizard/jquery.steps.css')}}" />
		<script src="{{asset('assets/vendor/wizard/jquery.steps.custom.js')}}"></script>
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<script src="{{asset('assets/js/jquery.min.js')}}"></script>
		<script src="https://cdn.tiny.cloud/1/00dm49ig2jbajh5kez5vcc73lv8abi81meek6icc5thu3brq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<style type="text/css">
			.select2-container--default .select2-selection--single{
			padding:6px;
			height: 35px;
			z-index: 5000;
				}
			
		</style>
	</head>
	<body>
		
		<!-- *************s
			************ Header section start *************
		************* -->
		<!-- Header start -->
		<header class="header" style="height: 45px;">
			<div class="logo-wrapper text-center">
				<span class="dropdown">
					<a href="#" id="userSettings" class="logo" data-toggle="dropdown" aria-haspopup="true">
						<img style="margin: auto;" src="{{asset('assets/img/logo.png')}}" alt="E-Light Admin Dashboard" />
					</a>
					<div class="dropdown-menu" style="top:20px!important" aria-labelledby="userSettings">
						<div class="header-profile-actions">
							<div class="header-user-profile">
								<div class="header-user">
									<img src="assets/img/logo.png" alt="Admin Template" />
								</div>
								<h5>Hospice Bangladesh</h5>
								<p>Admin</p>
								<a class="bg-primary text-white" href="{{url('logout')}}"><i class="icon-log-out1"></i> Sign Out</a>
							</div>
						</div>
					</div>
				</span>
				<span class=" text-success" style="font-size: 20px;font-weight: bold; margin: auto;"> Hospice Bangladesh Ltd </span>
			</div>
			<div class="header-items">
				<!-- Header actions start -->
				<ul class="header-actions">
					<!-- Navigation start -->
					<nav class="navbar navbar-expand-lg custom-navbar">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bluemoonNavbar" aria-controls="bluemoonNavbar" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
							<i></i>
							<i></i>
							<i></i>
						</span>
						</button>
						<div class="collapse navbar-collapse" id="bluemoonNavbar">
							<ul class="navbar-nav">
								<li class="nav-item dropdown">
									<a class="nav-link active-page" href="{{url('dashboard')}}" id="dashboardsDropdown" role="button">
										<i class="icon-home2 nav-icon" style="float:left;padding-right: 5px;"></i>
										Dashboards
									</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-shield1 nav-icon" style="float:left;padding-right: 5px;"></i>  Administration
									</a>
									<ul class="dropdown-menu" aria-labelledby="appsDropdown">
										<li>
											<a class="dropdown-toggle sub-nav-link" href="#" id="calendarsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-verified_user"></span> Administrator
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="calendarsDropdown">
											<li>
												<a class="dropdown-item" href="{{url('add-user-role')}}"><span class="icon-person_pin"></span> User Role</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('user-permission/init')}}"><span class="icon-shield-off"></span> User Permission</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('staff-list')}}"><span class="icon-user-x"></span> Add Staff</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('prescription-doctor-list')}}"><span class="icon-user-x"></span> Add Doctor</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('attendance')}}"><span class="icon-check-circle"></span> Attendance</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('projects')}}"><span class="icon-folder-plus"></span> Add Project</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="calendarsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="icon-layers"></span> Company Setting
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="calendarsDropdown">
											<li>
												<a class="dropdown-item" href="{{url('add-vat')}}"><span class="icon-squared-plus"></span> Vat </a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('add-banner')}}"><span class="icon-plus"></span>Banner</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="calendarsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="icon-layers"></span> Finance Setting
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="calendarsDropdown">
											<li>
												<a class="dropdown-item" href="{{url('income-head')}}"><span class="icon-squared-plus"></span> Income Head</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('income-sub-category')}}"><span class="icon-plus"></span> Income Subcategory</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('expense-head')}}"><span class="icon-squared-minus"></span> Expense Head</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('expense-sub-category')}}"><span class="icon-minus"></span> Expense Subcategory</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('package-list')}}"><span class="icon-file-plus"></span> Add Package</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('payments-method')}}"><span class="icon-contact_mail"></span> Payments Method</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="calendarsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="icon-twitter1"></span> Hospice Service
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="calendarsDropdown">
											<li>
												<a class="dropdown-item" href="{{url('city-list')}}"><span class="icon-pin_drop" style="display: inline;"></span> City Name</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('promo-code-list')}}"><span class="icon-gift"></span> Promo Code</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('delivery-charge-list')}}"><span class="icon-truck"></span> Delivery Charge</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('service-charge-list')}}"><span class="icon-pie_chart"></span> Service Charge</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('medical-support-list')}}"><span class="icon-shareable"></span> Medical support</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('medical-procedure-list')}}"><span class="icon-local_hospital"></span> Medical Procedure</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('instrument-list')}}" aria-expanded="false">
													<span class="icon-shopping_cart"></span> Instrument Rent
												</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('allied-health-list')}}"><span class="icon-rotate_90_degrees_ccw"></span> Allied Health</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="calendarsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="icon-shopping_cart"></span> e-Phamacy
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="calendarsDropdown">
											<li>
												<a class="dropdown-item" href="{{url('shop-list')}}"><span class="icon-control_point"></span> Add shop </a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('product-list')}}"><span class="icon-price-tag"></span> Add Product</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="calendarsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="icon-log-out1"></span> Video Consultation
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="calendarsDropdown">
											<li>
												<a class="dropdown-item" href="{{url('speciality-list')}}"><span class="icon-file-plus"></span> Add Speciality </a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('doctor-list')}}"><span class="icon-archive"></span> Add Doctor</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="calendarsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="icon-log-out1"></span> Home LAB
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="calendarsDropdown">
											<li>
												<a class="dropdown-item" href="{{url('lab-list')}}"><span class="icon-file-plus"></span> Add LAB </a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('lab-test-list')}}"><span class="icon-archive"></span> Add Test</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon-users nav-icon" style="float:left;padding-right: 5px;"></i>
									Patient
								</a>
								<ul class="dropdown-menu" aria-labelledby="pagesDropdown">
									<li>
										<a class="dropdown-item" href="{{url('patient-list')}}"><span class="icon-person_add"></span> New Registration</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{url('plan-and-status')}}"><span class="icon-help_outline"></span> Plan & status</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{url('reports')}}"><span class="icon-record_voice_over"></span> Registration Report</a>
									</li>
									
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="formsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon-eye1 nav-icon" style="float:left;padding-right: 5px;"></i>
									Monitoring
								</a>
								<ul class="dropdown-menu" aria-labelledby="formsDropdown">
									<li>
										<a class="dropdown-item" href="{{url('patient-profile-list')}}"><span class="icon-account_box"></span> Patient Profile</a>
									</li>
									
									<li>
										<a class="dropdown-toggle sub-nav-link" href="m_investigation.html"><span class="icon-search1"></span> Prescription</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
											<li>
												<a class="dropdown-item" href="{{url('prescription-patient-list')}}"><span class="icon-file-text"></span> Prescription Generator</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('certificate-patient-list')}}"><i class="icon-printer nav-icon"></i> Death Certificate</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('opd-patient-list')}}"><i class="icon-printer nav-icon"></i>OPD Prescription</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('opd-list')}}"><i class="icon-printer nav-icon"></i>List of OPD</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('medicine-item-list')}}"><i class="icon-printer nav-icon"></i>Add Medicine</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('follow-up-patient')}}"><i class="icon-printer nav-icon"></i>Patient Follow Up</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('next-plan-patient')}}"><i class="icon-printer nav-icon"></i>Next Plan</a>
											</li>
										</ul>
									</li>
									<!-- <li>
															<a class="dropdown-item" href="patient-follow-up-list"><span class="icon-fast-forward"></span> Follow Up</a>
									</li> -->
									<li>
										<a class="dropdown-toggle sub-nav-link" href="m_investigation.html"><span class="icon-search1"></span> Investigation</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
											<li>
												<a class="dropdown-item" href="{{url('investigation-reports-list')}}"><i class="icon-edit1 nav-icon"></i>Input & Report</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('investigation-category-list')}}"><i class="icon-printer nav-icon"></i> Category</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('investigation-sub-category-list')}}"><i class="icon-printer nav-icon"></i> Sub Category</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="customDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="icon-chrome"></span> Pain Clinic
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
											<li>
												<a class="dropdown-item" href="{{url('patient-pain-asmt-list')}}"><i class="icon-edit1 nav-icon"></i>Assessment</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('patient-morphin-list')}}"><i class="icon-edit1 nav-icon"></i>Management</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('patient-morphin-dose-list')}}"><i class="icon-edit1 nav-icon"></i>Monitoring</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="customDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="icon-chrome"></span>Wound Clinic
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
											<li>
												<a class="dropdown-item" href="{{url('patient-wound-list')}}"><i class="icon-edit1 nav-icon"></i>Wound Describe</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('patient-wound-asst-list')}}"><i class="icon-edit1 nav-icon"></i>Wound Assesment</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('patient-wound-manage-list')}}"><i class="icon-edit1 nav-icon"></i>Wound Management</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-item" href="{{url('patient-psycho-asmt-list')}}"><span class="icon-image"></span> Phycho ASMT</a>
									</li>

									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="customDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="icon-github"></span> Rehabilitative Pall Care
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
											<li>
												<a class="dropdown-item" href="{{url('menu-list')}}"><span class="icon-list2"></span> Menu</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('video-link-list')}}"><span class="icon-paperclip"></span> Video</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-item" href="{{url('all-uploads')}}"><span class="icon-image"></span> Uploaded Documents</a>
									</li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="uiElementsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon-edit1 nav-icon" style="float:left;padding-right: 5px;"></i>
									ERP Entry
								</a>
								<ul class="dropdown-menu" aria-labelledby="uiElementsDropdown">
									<li>
										<a class="dropdown-toggle sub-nav-link" href="" id="buttonsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="icon-trending_up"></span> Invoice
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="buttonsDropdown">
											<li>
												<a class="dropdown-item" href="{{url('invoice-list')}}"><span class="icon-twitter1"></span>Invoice</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('donation-invoice-list')}}"><span class="icon-palette"></span> Donation</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('ambulance-invoice-list')}}"><span class="icon-airport_shuttle"></span> Ambulance</a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li>
														<a class="dropdown-item-item" href="{{url('donation-invoice-list')}}"><span class="icon-palette"></span> Donation</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="buttonsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="icon-trending-down"></span> Expense
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="buttonsDropdown">
											<li>
												<a class="dropdown-item" href="{{url('voucher-list')}}"><span class="icon-send1"></span> Debit Voucher</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="buttonsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="icon-server"></span> Inventory
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="buttonsDropdown">
											<li>
												<a class="dropdown-item" href="{{url('buy-list')}}"><span class="icon-plus-circle"></span> Buy</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('sell-list')}}"><span class="icon-minus-circle"></span> Sell</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('buy-and-sell-reports')}}"><span class="icon-target"></span> Total</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="buttonsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="icon-layers2"></span> Roster
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="buttonsDropdown">
											<li>
												<a class="dropdown-item" href="{{url('roster-entry')}}"><i class="icon-edit1 "></i> Entry</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('roster-duty-report')}}"><i class="icon-printer nav-icon"></i> Report</a>
											</li>
											<!-- <li>
																	<a class="dropdown-item" href="e_roster_visit.html"><span class="icon-log-in"></span> Visit</a>
											</li> -->
										</ul>
									</li>
									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="buttonsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="icon-layers2"></span> Salary
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="buttonsDropdown">
											<li>
												<a class="dropdown-item" href="{{url('leave-list')}}"><span class="icon-clock1"></span>Add Salary</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('salary-report-list')}}"><span class="icon-dollar-sign"></span>Salary Report</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="buttonsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="icon-layers2"></span> Leave
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="buttonsDropdown">
											<li>
												<a class="dropdown-item" href="{{url('leave-list')}}"><span class="icon-clock1"></span> Leave Application</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('approve-leave-list')}}"><i class="icon-printer nav-icon"></i> Approve List</a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('unapprove-leave-list')}}"><span class="icon-log-in"></span> Pending List</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="calendarsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="icon-file-plus"></span>Bed
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="calendarsDropdown">
											<li>
												<a class="dropdown-item" href="{{url('bed-list')}}"><span class="icon-file-plus"></span> Add Bed </a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('bed-assign-list')}}"><span class="icon-archive"></span>Assign Bed</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="calendarsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span style="margin-right: 3px;"><i class="fas fa-bed"></i></span>Instrument
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="calendarsDropdown">
											<li>
												<a class="dropdown-item" href="{{url('instrument-rent-list')}}"><span class="icon-file-plus"></span> Add Instrument </a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('instrument-assign-list')}}"><span class="icon-archive"></span>Assign Instrument</a>
											</li>
										</ul>
									</li>
									<li>
										<a class="dropdown-toggle sub-nav-link" href="#" id="calendarsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span style="margin-right: 3px;"><i class="fas fa-bed"></i></span>Schedule & Booking
										</a>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="calendarsDropdown">
											<li>
												<a class="dropdown-item" href="{{url('schedule-list')}}"><span class="icon-file-plus"></span> Add Schedule </a>
											</li>
											<li>
												<a class="dropdown-item" href="{{url('appointment-list')}}"><span class="icon-archive"></span>Add Appointment</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="tablesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon-printer nav-icon" style="float:left;padding-right: 5px;"></i>
									ERP Report
								</a>
								<ul class="dropdown-menu" aria-labelledby="tablesDropdown">
									<li>
										<a class="dropdown-item" href="{{url('due-invoice-list')}}"><span class="icon-insert_invitation"></span> Due Invoice</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{url('paid-invoice-list')}}"><span class="icon-event_available"></span> Paid Invoice</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{url('due-expence-list')}}"><span class="icon-restore"></span> Due Expense</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{url('paid-expence-list')}}"><span class="icon-highlight_off"></span> Paid Expense</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{url('payment-list')}}"><span class="icon-file-text"></span> Payments</a>
									</li>
									
									<li>
										<a class="dropdown-item" href="{{url('cash-book')}}"><i class="icon-book-open"></i> Cash Book</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{url('cash-book-subcat')}}"><i class="icon-book-open"></i> Cash Book by Sub-Cat</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{url('cash-book-head')}}"><i class="icon-book-open"></i> Cash Book by In-Head</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{url('bed-report')}}"><span class="icon-clock1"></span> Bed</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{url('instrument-report')}}"><span class="icon-clock1"></span> Instrument</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{url('provident-fund-report')}}"><span class="icon-loader"></span> Provident Fund</a>
									</li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="layoutsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon-radio nav-icon" style="float:left;padding-right: 5px;"></i>
									Communication
								</a>
								<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="layoutsDropdown">
									
									<li>
										<a class="dropdown-item" href="{{url('/chatify')}}"><span class="icon-chat"></span> Chat</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{url('mail-portal')}}"><span class="icon-mail"></span> Mail Portal</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{url('sms-portal')}}"><span class="icon-message"></span> SMS Portal</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
				<!-- Navigation end -->
			</ul>
			<!-- Header actions end -->
		</div>
	</header>
	<!-- Header end -->
	<!-- Screen overlay start -->
	<div class="screen-overlay"></div>
	<!-- Screen overlay end -->
	
	<!-- *************
		************ Header section end *************
	************* -->
	<!-- Container fluid start -->
	<div class="container-fluid p-0 m-0">
		<!--//oldnav-->
		<!-- *************
			************ Main container start *************
		************* -->
		@yield('main_content')
		<!-- *************
			************ Main container end *************
		************* -->
		<!-- Footer start -->
		<footer class="main-footer">
			<div class="logo-wrapper" style="float: left;">Logged in ip: 192.168.0.1</div>
			<div class="header-items" style="float: right;">Developed By: E-Light Software Ltd</div>
			<div class="clearfix"></div>
		</footer>
		<!-- Footer end -->
	</div>
	<!-- Container fluid end -->
	<!-- *************
		************ Required JavaScript Files *************
	************* -->
	<!-- Required jQuery first, then Bootstrap Bundle JS -->
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/js/moment.js')}}"></script>
	<!-- *************
		************ Vendor Js Files *************
	************* -->
	<!-- Slimscroll JS -->
	<script src="{{asset('assets/vendor/slimscroll/slimscroll.min.js')}}"></script>
	<script src="{{asset('assets/vendor/slimscroll/custom-scrollbar.js')}}"></script>
	<!-- Daterange -->
	<script src="{{asset('assets/vendor/daterange/daterange.js')}}"></script>
	<script src="{{asset('assets/vendor/daterange/custom-daterange.js')}}"></script>
	<!-- Circliful JS -->
	<script src="{{asset('assets/vendor/circliful/circliful.min.js')}}"></script>
	<script src="{{asset('assets/vendor/circliful/circliful.custom.js')}}"></script>
	<!-- Data Tables -->
	<script src="{{asset('assets/vendor/datatables/dataTables.min.js')}}"></script>
	<script src="{{asset('assets/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
	
	<!-- Custom Data tables -->
	<script src="{{asset('assets/vendor/datatables/custom/custom-datatables.js')}}"></script>
	<script src="{{asset('assets/vendor/datatables/custom/fixedHeader.js')}}"></script>
	<!-- Download / CSV / Copy / Print -->
	<script src="{{asset('assets/vendor/datatables/buttons.min.js')}}"></script>
	<script src="{{asset('assets/vendor/datatables/jszip.min.js')}}"></script>
	<script src="{{asset('assets/vendor/datatables/pdfmake.min.js')}}"></script>
	<script src="{{asset('assets/vendor/datatables/vfs_fonts.js')}}"></script>
	<script src="{{asset('assets/vendor/datatables/html5.min.js')}}"></script>
	<script src="{{asset('assets/vendor/datatables/buttons.print.min.js')}}"></script>
	<!-- Peity JS -->
	<script src="{{asset('assets/vendor/peity/peity.min.js')}}"></script>
	<script src="{{asset('assets/vendor/peity/custom-peity.js')}}"></script>
	<!-- D3 JS -->
	<script src="{{asset('assets/vendor/d3/d3.min.js')}}"></script>
	<!-- C3 Graphs -->
	<script src="{{asset('assets/vendor/c3/c3.min.js')}}"></script>
	<script src="{{asset('assets/vendor/c3/custom/bar-graph-one.js')}}"></script>
	<!-- JVector Map -->
	<script src="{{asset('assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
	<script src="{{asset('assets/vendor/jvectormap/world-mill-en.js')}}"></script>
	<script src="{{asset('assets/vendor/jvectormap/gdp-data.js')}}"></script>
	<script src="{{asset('assets/vendor/jvectormap/custom/world-map-markers.js')}}"></script>
	<!-- Steps wizard JS -->
	<script src="{{asset('assets/vendor/wizard/jquery.steps.min.js')}}"></script>
	<script src="{{asset('assets/vendor/wizard/jquery.steps.custom.js')}}"></script>
	<!-- Main Js Required -->
	<script src="{{asset('assets/js/main.js')}}"></script>
	<script src="{{asset('js/lightbox.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script type="text/javascript">
		$('.select2').select2();
		$.fn.modal.Constructor.prototype.enforceFocus = function() {};
	</script>
	<!-- Manual Scipt -->
	@yield('script')
	
</body>
</html>