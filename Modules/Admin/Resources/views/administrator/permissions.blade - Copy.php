@extends('master.master')
@section('title', 'Permission - Hospice Bangladesh')
@section('main_content')
@parent
  @php
    $roles = \App\UserRole::get();
    $usserPermission = \App\UserPermission::where('role',$id)->first();
    if($usserPermission->permission == "null"){
        $permission = array("0");
    }
    else{
        $permission = json_decode($usserPermission->permission);
    }

  @endphp

<style type="text/css">
 .cbxTree {
    font: 12px/1.5em Arial, "Helvetica CY", "Nimbus Sans L", sans-serif;
}
span.select2-container {
    z-index:10050;
}
.cbxTree>.cbxTree-node {
    padding-left: 0;
}
.cbxTree-node {
    padding-left: 15px;
}
.cbxTree-swicth {
    width: 10px;
    height: 18px;
    font-size: 16px;
    color: #000;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin-right: -13px;

}
.cbxTree-swicth:before {
    content: "+";
    color: green;
    font-size: 25px;
}

.cbxTree-swicth.open:before {
    content: "-";
    color: red;
    font-size: 25px;
}
.cbxTree-label {
    margin-left: 15px;
}
.cbxTree-swicth~.cbxTree-node {
    display: none;
}
.cbxTree-swicth.open~.cbxTree-node {
    display: block;
}

label{
  font-size: 1rem;
  font-weight: 600;
}
</style>
<div class="main-container">
  <!-- Page header start -->
  <div class="page-header">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Administration</li>
      <li class="breadcrumb-item active">Permission</li>
    </ol>
    <ul class="app-actions">
      <li>
        <a href="#" id="reportrange">
          <span class="range-text"></span>
          <i class="icon-chevron-down"></i>
        </a>
      </li>
      <li>
        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print">
          <i class="icon-print"></i>
        </a>
      </li>
      <li>
        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download CSV">
          <i class="icon-cloud_download"></i>
        </a>
      </li>
    </ul>
  </div>
      <div class="modal fade" id="addModal" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="width:600px">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myExtraLargeModalLabel">Select a role</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <div style="font-weight: bold;"> Role</div>
              <div class="input-group">
                <div class="input-group-prepend">
                 
                </div>
                <select class="custom-select select2
                " id="dynamic_select" name="role" data-width="100%">
                  @foreach($roles as $role)
                  <option value="/user-permission/{{$role->id}}" @if($role->id == $id) selected="selected" @endif>{{$role->rolename}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="modal-footer">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  
  <!-- Page header end -->
  <!-- Content wrapper start -->
  <div class="content-wrapper">
    <!-- Fixed body scroll start -->
    <div class="fixedBodyScroll">
      <div class="t-header"><h2>{{$roles->where('id',$id)->first()->rolename}}</h2> <button type="button" class="btn-info btn-rounded disabled" data-toggle="modal" data-target="#addModal">Change</button></div>
              <div class="">
                <br><br>
      <!-- Row start -->

      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <form action="{{url('set-permission/'.$id)}}" method="post">
                  @csrf
    <div class="cbxTree"> 
        <!--NODE-2-->
        <div class="cbxTree-node">
            <a href="#" class="cbxTree-swicth"></a>
            <label class="cbxTree-label">
                <input type="checkbox" name="permission[]" value="1" @if(in_array(1, $permission)) checked="" @endif class="cbxTree-cbx" />
                <span class="cbxTree-txt">Administration</span>
            </label>
            <!--NODE-21-->
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="2" @if(in_array(2, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Administrator</span>
                </label>
                <div class="cbxTree-node">
                <!--NODE-211-->
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="3" @if(in_array(3, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">User Role</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="4" @if(in_array(4, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="5" @if(in_array(5, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="6" @if(in_array(6, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="7" @if(in_array(7, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">User Permission</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="8" @if(in_array(8, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="9" @if(in_array(9, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="10" @if(in_array(10, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="11" @if(in_array(11, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add Staff</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="12" @if(in_array(12, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="13" @if(in_array(13, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="14" @if(in_array(14, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="15" @if(in_array(15, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Attendance</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="16" @if(in_array(16, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="17" @if(in_array(17, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="18" @if(in_array(18, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="19" @if(in_array(19, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add Project</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="20" @if(in_array(20, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="21" @if(in_array(21, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="22" @if(in_array(22, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="23" @if(in_array(23, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add Package</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="24" @if(in_array(24, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="25" @if(in_array(25, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="26" @if(in_array(26, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="27" @if(in_array(27, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Finance Setting</span>
                </label>
                <div class="cbxTree-node">
                <!--NODE-211-->
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="28" @if(in_array(28, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Income Head</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="29" @if(in_array(29, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="30" @if(in_array(30, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="31" @if(in_array(31, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="32" @if(in_array(32, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Income Sub Category</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="33" @if(in_array(33, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="34" @if(in_array(34, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="35" @if(in_array(35, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="36" @if(in_array(36, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Expense Head</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="37" @if(in_array(37, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="38" @if(in_array(38, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="39" @if(in_array(39, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="40" @if(in_array(40, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Expense Sub Category</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="41" @if(in_array(41, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="42" @if(in_array(42, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="43" @if(in_array(43, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="44" @if(in_array(44, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Payment Methods</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="45" @if(in_array(45, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="46" @if(in_array(46, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="47" @if(in_array(47, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="48" @if(in_array(48, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Hospice Service</span>
                </label>
                <div class="cbxTree-node">
                <!--NODE-211-->
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="49" @if(in_array(49, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">City Name</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="50" @if(in_array(50, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="51" @if(in_array(51, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="52" @if(in_array(52, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="53" @if(in_array(53, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Promo Code</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="54" @if(in_array(54, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="55" @if(in_array(55, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="56" @if(in_array(56, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="57" @if(in_array(57, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Delivery Charge</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="58" @if(in_array(58, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="59" @if(in_array(59, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="60" @if(in_array(60, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="61" @if(in_array(61, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Service Charge</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="62" @if(in_array(62, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="63" @if(in_array(63, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="64" @if(in_array(64, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="65" @if(in_array(65, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Medical Support</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="66" @if(in_array(66, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="67" @if(in_array(67, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="68" @if(in_array(68, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="node-211" value="69" @if(in_array(69, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Medical Procedure</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="70" @if(in_array(70, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="71" @if(in_array(71, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="72" @if(in_array(72, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="73" @if(in_array(73, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Allied Health</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="74" @if(in_array(74, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="75" @if(in_array(75, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="76" @if(in_array(76, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="77" @if(in_array(77, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Ambulance</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="78" @if(in_array(78, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="79" @if(in_array(79, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="80" @if(in_array(80, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="81" @if(in_array(81, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">E-Pharmacy</span>
                </label>
                <div class="cbxTree-node">
                <!--NODE-211-->
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="82" @if(in_array(82, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add Shop</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="83" @if(in_array(83, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="84" @if(in_array(84, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="85" @if(in_array(85, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="86" @if(in_array(86, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add product</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="87" @if(in_array(87, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="88" @if(in_array(88, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="89" @if(in_array(89, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="91" @if(in_array(91, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Video Consultancy</span>
                </label>
                <div class="cbxTree-node">
                <!--NODE-211-->
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="92" @if(in_array(92, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add Speciality</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="93" @if(in_array(93, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="94" @if(in_array(94, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label"> 
                            <input type="checkbox" name="permission[]" value="95" @if(in_array(95, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="96" @if(in_array(96, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add Doctor</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="97" @if(in_array(97, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="98" @if(in_array(98, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="99" @if(in_array(99, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="100" @if(in_array(100, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Home Lab</span>
                </label>
                <div class="cbxTree-node">
                <!--NODE-211-->
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="101" @if(in_array(101, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add Lab</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="102" @if(in_array(102, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="103" @if(in_array(103, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="104" @if(in_array(104, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="105" @if(in_array(105, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add Test</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="106" @if(in_array(106, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="107" @if(in_array(107, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="108" @if(in_array(108, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="109" @if(in_array(109, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Medical Instrument</span>
                </label>
                <div class="cbxTree-node">
                <!--NODE-211-->
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="110" @if(in_array(110, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add Category</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="111" @if(in_array(111, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="112" @if(in_array(112, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="113" @if(in_array(113, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="114" @if(in_array(114, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Instrument Rent & List</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="115" @if(in_array(115, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="116" @if(in_array(116, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="309" @if(in_array(309, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>

                </div>
            </div>
                </div>
            </div>
        </div>

    </div>
     <div class="cbxTree">
        <!--NODE-1-->
        <div class="cbxTree-node">
            <a href="#" class="cbxTree-swicth"></a>
            <label class="cbxTree-label">
                <input type="checkbox" name="permission[]" value="117" @if(in_array(117, $permission)) checked="" @endif class="cbxTree-cbx" />
                <span class="cbxTree-txt">Patient</span>
            </label>
            <!--NODE-11-->
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="118" @if(in_array(118, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">New Registration</span>
                </label>
                <!--NODE-111-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="119" @if(in_array(119, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add</span>
                    </label>
                </div>
                <!--NODE-112-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="120" @if(in_array(120, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Edit</span>
                    </label>
                </div>
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="121" @if(in_array(121, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Delete</span>
                    </label>
                </div>
            </div>
            <!--NODE-12-->
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="122" @if(in_array(122, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Plan & Status</span>
                </label>
                <!--NODE-121-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="123" @if(in_array(123, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add</span>
                    </label>
                </div>
                <!--NODE-122-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="124" @if(in_array(124, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Edit</span>
                    </label>
                </div>
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="125" @if(in_array(125, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Delete</span>
                    </label>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="126" @if(in_array(126, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Registration Report</span>
                </label>
                <!--NODE-121-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="127" @if(in_array(127, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add</span>
                    </label>
                </div>
                <!--NODE-122-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="128" @if(in_array(128, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Edit</span>
                    </label>
                </div>
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="node-122" value="129" @if(in_array(129, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Delete</span>
                    </label>
                </div>
            </div>
        </div>
      </div>
      <div class="cbxTree">
        <!--NODE-1-->
        <div class="cbxTree-node">
            <a href="#" class="cbxTree-swicth"></a>
            <label class="cbxTree-label">
                <input type="checkbox" name="permission[]" value="130" @if(in_array(130, $permission)) checked="" @endif class="cbxTree-cbx" />
                <span class="cbxTree-txt">Monitoring</span>
            </label>
            <!--NODE-11-->
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="131" @if(in_array(131, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Patient Profile</span>
                </label>
                <!--NODE-111-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="132" @if(in_array(132, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add</span>
                    </label>
                </div>
                <!--NODE-112-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="133" @if(in_array(133, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Edit</span>
                    </label>
                </div>
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="134" @if(in_array(134, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Delete</span>
                    </label>
                </div>
            </div>
            <!--NODE-12-->
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="135" @if(in_array(135, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Prescription</span>
                </label>
                <!--NODE-121-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="136" @if(in_array(136, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add</span>
                    </label>
                </div>
                <!--NODE-122-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="137" @if(in_array(137, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Edit</span>
                    </label>
                </div>
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="138" @if(in_array(138, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Cancel</span>
                    </label>
                </div>
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="139" @if(in_array(139, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Send SMS</span>
                    </label>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="140" @if(in_array(140, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Follow Up</span>
                </label>
                <!--NODE-121-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="141" @if(in_array(141, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add</span>
                    </label>
                </div>
                <!--NODE-122-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="142" @if(in_array(142, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">View</span>
                    </label>
                </div>
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="143" @if(in_array(143, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Report</span>
                    </label>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="144" @if(in_array(144, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Investigation</span>
                </label>
                <div class="cbxTree-node">
                <!--NODE-211-->
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="145" @if(in_array(145, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Input & Report</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="146" @if(in_array(146, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="147" @if(in_array(147, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">View</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="148" @if(in_array(148, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Report</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="149" @if(in_array(149, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Category</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="150" @if(in_array(150, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="151" @if(in_array(151, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="152" @if(in_array(152, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="153" @if(in_array(153, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Sub Category</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="154" @if(in_array(154, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="155" @if(in_array(155, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="156" @if(in_array(156, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="157" @if(in_array(157, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Morphine Monitor</span>
                </label>
                <div class="cbxTree-node">
                <!--NODE-211-->
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="158" @if(in_array(158, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Input & Report</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="159" @if(in_array(159, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="160" @if(in_array(160, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">View</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="161" @if(in_array(161, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="162" @if(in_array(162, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Report</span>
                        </label>
                    </div>
                </div>

                </div>
            </div>
             <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="163" @if(in_array(163, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Chemo Card</span>
                </label>
                <div class="cbxTree-node">
                <!--NODE-211-->
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="164" @if(in_array(164, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Input & Report</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="165" @if(in_array(165, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="166" @if(in_array(166, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">View</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="167" @if(in_array(167, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="168"  @if(in_array(168, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Report</span>
                        </label>
                    </div>
                </div>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="169" @if(in_array(169, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Physiotheraphy</span>
                </label>
                <div class="cbxTree-node">
                <!--NODE-211-->
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="170" @if(in_array(170, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Menu</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="171" @if(in_array(171, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="172" @if(in_array(172, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="173" @if(in_array(173, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="174" @if(in_array(174, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Video Link</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="175" @if(in_array(175, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="176" @if(in_array(176, $permission)) checked="" @endif  class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="177" @if(in_array(177, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="178" @if(in_array(178, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Upload Documents</span>
                </label>
                <!--NODE-121-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="179" @if(in_array(179, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add</span>
                    </label>
                </div>
                <!--NODE-122-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="180" @if(in_array(180, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">View</span>
                    </label>
                </div>
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="181" @if(in_array(181, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Delete</span>
                    </label>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="182" @if(in_array(182, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Assesment</span>
                </label>
                <div class="cbxTree-node">
                <!--NODE-211-->
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="183" @if(in_array(183, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Pos</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="184" @if(in_array(184, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="185" @if(in_array(185, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="186" @if(in_array(186, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="cbxTree-node">
            <a href="#" class="cbxTree-swicth"></a>
            <label class="cbxTree-label">
                <input type="checkbox" name="permission[]" value="187" @if(in_array(187, $permission)) checked="" @endif class="cbxTree-cbx" />
                <span class="cbxTree-txt">ERP Entry</span>
            </label>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="188" @if(in_array(188, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Invoice</span>
                </label>
                <div class="cbxTree-node">
                <!--NODE-211-->
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="189" @if(in_array(189, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Tele Hospice</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="190" @if(in_array(190, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="191" @if(in_array(191, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">View</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="192" @if(in_array(192, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Report</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="193" @if(in_array(193, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Donation</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="194" @if(in_array(194, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="195" @if(in_array(195, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="196" @if(in_array(196, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="197" @if(in_array(197, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Instrument Rent</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="198" @if(in_array(198, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="199" @if(in_array(199, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="200" @if(in_array(200, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]"  value="201" @if(in_array(201, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Ambulance</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]"  value="202" @if(in_array(202, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]"  value="203" @if(in_array(203, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]"  value="204" @if(in_array(204, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]"  value="205" @if(in_array(205, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Expense</span>
                </label>
                <div class="cbxTree-node">
                <!--NODE-211-->
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]"  value="206" @if(in_array(206, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Debit Vouchers</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]"  value="207" @if(in_array(207, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]"  value="208" @if(in_array(208, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]"  value="209" @if(in_array(209, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]"  value="210" @if(in_array(210, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Transport</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="211" @if(in_array(211, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="212" @if(in_array(212, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="213" @if(in_array(213, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>

                </div>
            </div>
             <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="214" @if(in_array(214, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Inventory</span>
                </label>
                <div class="cbxTree-node">
                <!--NODE-211-->
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="215" @if(in_array(215, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Buy</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="216" @if(in_array(216, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="217" @if(in_array(217, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="218" @if(in_array(218, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <a href="#" class="cbxTree-swicth"></a>
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="219" @if(in_array(219, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Sell</span>
                    </label>
                    <!--NODE-2111-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]"  value="220" @if(in_array(220, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Add</span>
                        </label>
                    </div>
                    <!--NODE-2112-->
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="221" @if(in_array(221, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Edit</span>
                        </label>
                    </div>
                    <div class="cbxTree-node">
                        <label class="cbxTree-label">
                            <input type="checkbox" name="permission[]" value="222" @if(in_array(222, $permission)) checked="" @endif class="cbxTree-cbx" />
                            <span class="cbxTree-txt">Delete</span>
                        </label>
                    </div>
                </div>
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="223" @if(in_array(223, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Total</span>
                    </label>
                </div>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="224" @if(in_array(224, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Roster</span>
                </label>
                <!--NODE-121-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="225" @if(in_array(225, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add</span>
                    </label>
                </div>
                <!--NODE-122-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="226" @if(in_array(226, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Edit</span>
                    </label>
                </div>
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="227" @if(in_array(227, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Delete</span>
                    </label>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="228" @if(in_array(228, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Salary</span>
                </label>
                <!--NODE-121-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="229" @if(in_array(229, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add</span>
                    </label>
                </div>
                <!--NODE-122-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="230" @if(in_array(230, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Edit</span>
                    </label>
                </div>
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="231" @if(in_array(231, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Delete</span>
                    </label>
                </div>
            </div>
            <div class="cbxTree-node">
                <a href="#" class="cbxTree-swicth"></a>
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="232" @if(in_array(232, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Leave</span>
                </label>
                <!--NODE-121-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="233" @if(in_array(233, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Add</span>
                    </label>
                </div>
                <!--NODE-122-->
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="234" @if(in_array(234, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Edit</span>
                    </label>
                </div>
                <div class="cbxTree-node">
                    <label class="cbxTree-label">
                        <input type="checkbox" name="permission[]" value="235" @if(in_array(235, $permission)) checked="" @endif class="cbxTree-cbx" />
                        <span class="cbxTree-txt">Delete</span>
                    </label>
                </div>
            </div>
        </div>
      </div>
      <div class="cbxTree">
        <!--NODE-1-->
        <div class="cbxTree-node">
            <a href="#" class="cbxTree-swicth"></a>
            <label class="cbxTree-label">
                <input type="checkbox" name="permission[]" value="293" @if(in_array(293, $permission)) checked="" @endif class="cbxTree-cbx" />
                <span class="cbxTree-txt">ERP Report</span>
            </label>
            <div class="cbxTree-node">
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="294" @if(in_array(294, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Due Invoice</span>
                </label>
                <div class="cbxTree-node">
                </div>
            </div>
            <div class="cbxTree-node">
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="295" @if(in_array(295, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Paid Invoice</span>
                </label>
                <div class="cbxTree-node">
                </div>
            </div>
            <div class="cbxTree-node">
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="296" @if(in_array(296, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Due Expense</span>
                </label>
                <div class="cbxTree-node">
                </div>
            </div>
            <div class="cbxTree-node">
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="297" @if(in_array(297, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Paid Expense</span>
                </label>
                <div class="cbxTree-node">
                </div>
            </div>
            <div class="cbxTree-node">
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="298" @if(in_array(298, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Payments</span>
                </label>
                <div class="cbxTree-node">
                </div>
            </div>
            <div class="cbxTree-node">
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="299" @if(in_array(299, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Salary</span>
                </label>
                <div class="cbxTree-node">
                </div>
            </div>
            <div class="cbxTree-node">
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="300" @if(in_array(300, $permission)) checked="" @endif class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Cash Book</span>
                </label>
                <div class="cbxTree-node">
                </div>
            </div>
            <div class="cbxTree-node">
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="301" @if(in_array(301, $permission)) checked="" @endif  class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Leave</span>
                </label>
                <div class="cbxTree-node">
                </div>
            </div>
            <div class="cbxTree-node">
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="302" @if(in_array(302, $permission)) checked="" @endif  class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Provident Fund</span>
                </label>
                <div class="cbxTree-node">
                </div>
            </div>
        </div>
        <div class="cbxTree-node">
            <a href="#" class="cbxTree-swicth"></a>
            <label class="cbxTree-label">
                <input type="checkbox" name="permission[]" value="303" @if(in_array(303, $permission)) checked="" @endif  class="cbxTree-cbx" />
                <span class="cbxTree-txt">Communication</span>
            </label>
            <div class="cbxTree-node">
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="304" @if(in_array(304, $permission)) checked="" @endif  class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Chat</span>
                </label>
                <div class="cbxTree-node">
                </div>
            </div>
            <div class="cbxTree-node">
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="305" @if(in_array(305, $permission)) checked="" @endif  class="cbxTree-cbx" />
                    <span class="cbxTree-txt">Mail Portal</span>
                </label>
                <div class="cbxTree-node">
                </div>
            </div>
            <div class="cbxTree-node">
                <label class="cbxTree-label">
                    <input type="checkbox" name="permission[]" value="306" @if(in_array(306, $permission)) checked="" @endif  class="cbxTree-cbx" />
                    <span class="cbxTree-txt">SMS Portal</span>
                </label>
                <div class="cbxTree-node">
                </div>
            </div>
        </div>
      </div>
    <button type="Submit" class="btn btn-success">Submit</button>
    <button type="reset" class="btn btn-primary">Reset</button>
</form>
        </div>
      </div>
      <!-- Row end -->
    </div>
    <!-- Fixed body scroll end -->
  </div>
  <!-- Content wrapper end -->
</div>
<script type="text/javascript">

 $(document).on({
    click: function(){
        $('body').toggleClass('fcd-ie8'); //For the stupid ie8
        $(this).toggleClass('open');
        return false;
    }
}, ".cbxTree-swicth");
$(document).on({
    change: function(){
        var $node = $(this).closest('.cbxTree-node');
        if($(this).is(':checked')){
            $node.children('.cbxTree-swicth').addClass('open');
        }
        $node.find('.cbxTree-cbx').prop({checked : $(this).is(':checked')});
    }
}, ".cbxTree-cbx");
</script>
@endsection
   