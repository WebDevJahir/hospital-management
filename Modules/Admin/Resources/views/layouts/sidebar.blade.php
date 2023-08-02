<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
            class="icon-shield1 nav-icon" style="float:left;padding-right: 5px;"></i>
        Administration
    </a>
    <ul class="dropdown-menu" aria-labelledby="appsDropdown">
        @if (in_array(2, $permission))
            <li>
                <a class="dropdown-toggle sub-nav-link" href="#"
                    id="calendarsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><span
                        class="icon-verified_user"></span> Administrator
                </a>
                <ul class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="calendarsDropdown">
                    @if (in_array(3, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('add-user-role') }}"><span
                                    class="icon-person_pin"></span> User Role</a>
                        </li>
                    @endif
                    @if (in_array(7, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('user-permission/init') }}"><span
                                    class="icon-shield-off"></span> User Permission</a>
                        </li>
                    @endif
                    @if (in_array(11, $permission))
                        <li>
                            <a class="dropdown-item" href="{{ route('staffs.index') }}"><span
                                    class="icon-user-x"></span> Add Staff</a>
                        </li>
                    @endif
                    @if (in_array(244, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('admin/prescription-doctor-list') }}"><span
                                    class="icon-user-x"></span> Add Doctor</a>
                        </li>
                    @endif
                    @if (in_array(15, $permission))
                        <li>
                            <a class="dropdown-item" href="{{ url('admin/attendance') }}"><span
                                    class="icon-check-circle"></span> Attendance</a>
                        </li>
                    @endif
                    @if (in_array(19, $permission))
                        <li>
                            <a class="dropdown-item" href="{{ url('projects') }}"><span
                                    class="icon-folder-plus"></span> Add Project</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (in_array(23, $permission))
            <li>
                <a class="dropdown-toggle sub-nav-link" href="#"
                    id="calendarsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="icon-layers"></span> Company Setting
                </a>
                <ul class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="calendarsDropdown">
                    @if (in_array(24, $permission))
                        <li>
                            <a class="dropdown-item" href="{{ url('add-vat') }}"><span
                                    class="icon-squared-plus"></span> Vat </a>
                        </li>
                    @endif
                    @if (in_array(25, $permission))
                        <li>
                            <a class="dropdown-item" href="{{ route('banners.index') }}"><span
                                    class="icon-plus"></span>Banner</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (in_array(26, $permission))
            <li>
                <a class="dropdown-toggle sub-nav-link" href="#"
                    id="calendarsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="icon-layers"></span> Finance Setting
                </a>
                <ul class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="calendarsDropdown">
                    @if (in_array(27, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('income-head') }}"><span
                                    class="icon-squared-plus"></span> Income Head</a>
                        </li>
                    @endif
                    @if (in_array(31, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('income-sub-category') }}"><span
                                    class="icon-plus"></span> Income Subcategory</a>
                        </li>
                    @endif
                    @if (in_array(35, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('expense-head') }}"><span
                                    class="icon-squared-minus"></span> Expense Head</a>
                        </li>
                    @endif
                    @if (in_array(39, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('expense-sub-category') }}"><span
                                    class="icon-minus"></span> Expense Subcategory</a>
                        </li>
                    @endif
                    @if (in_array(43, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('package-list') }}"><span
                                    class="icon-file-plus"></span> Add Package</a>
                        </li>
                    @endif
                    @if (in_array(47, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('payments-method') }}"><span
                                    class="icon-contact_mail"></span> Payments Method</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (in_array(51, $permission))
            <li>
                <a class="dropdown-toggle sub-nav-link" href="#"
                    id="calendarsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="icon-twitter1"></span> Hospice Service
                </a>
                <ul class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="calendarsDropdown">
                    @if (in_array(52, $permission))
                        <li>
                            <a class="dropdown-item" href="{{ url('city-list') }}"><span
                                    class="icon-pin_drop" style="display: inline;"></span>
                                City Name</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ url('thana-list') }}"><span
                                    class="icon-pin_drop" style="display: inline;"></span>
                                Thana Name</a>
                        </li>
                    @endif
                    @if (in_array(53, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('promo-code-list') }}"><span
                                    class="icon-gift"></span> Promo Code</a>
                        </li>
                    @endif
                    @if (in_array(60, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('delivery-charge-list') }}"><span
                                    class="icon-truck"></span> Delivery Charge</a>
                        </li>
                    @endif
                    @if (in_array(64, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('service-charge-list') }}"><span
                                    class="icon-pie_chart"></span> Service Charge</a>
                        </li>
                    @endif
                    @if (in_array(68, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('medical-support-list') }}"><span
                                    class="icon-shareable"></span> Medical support</a>
                        </li>
                    @endif
                    @if (in_array(71, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('medical-procedure-list') }}"><span
                                    class="icon-local_hospital"></span> Medical
                                Procedure</a>
                        </li>
                    @endif
                    @if (in_array(78, $permission))
                        <li>
                            <a class="dropdown-item" href="{{ url('instrument-list') }}"
                                aria-expanded="false">
                                <span class="icon-shopping_cart"></span> Instrument Rent
                            </a>
                        </li>
                    @endif
                    @if (in_array(75, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('allied-health-list') }}"><span
                                    class="icon-rotate_90_degrees_ccw"></span> Allied
                                Health</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (in_array(81, $permission))
            <li>
                <a class="dropdown-toggle sub-nav-link" href="#"
                    id="calendarsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="icon-shopping_cart"></span> e-Phamacy
                </a>
                <ul class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="calendarsDropdown">
                    @if (in_array(83, $permission))
                        <li>
                            <a class="dropdown-item" href="{{ url('shop-list') }}"><span
                                    class="icon-control_point"></span> Add shop </a>
                        </li>
                    @endif
                    @if (in_array(87, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('product-list') }}"><span
                                    class="icon-price-tag"></span> Add Product</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (in_array(91, $permission))
            <li>
                <a class="dropdown-toggle sub-nav-link" href="#"
                    id="calendarsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="icon-log-out1"></span> Video Consultation
                </a>
                <ul class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="calendarsDropdown">
                    @if (in_array(92, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('speciality-list') }}"><span
                                    class="icon-file-plus"></span> Add Speciality </a>
                        </li>
                    @endif
                    @if (in_array(96, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('doctor-list') }}"><span
                                    class="icon-archive"></span> Add Doctor</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (in_array(100, $permission))
            <li>
                <a class="dropdown-toggle sub-nav-link" href="#"
                    id="calendarsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="icon-log-out1"></span> Home LAB
                </a>
                <ul class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="calendarsDropdown">
                    @if (in_array(101, $permission))
                        <li>
                            <a class="dropdown-item" href="{{ url('lab-list') }}"><span
                                    class="icon-file-plus"></span> Add LAB </a>
                        </li>
                    @endif
                    @if (in_array(105, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('lab-test-list') }}"><span
                                    class="icon-archive"></span> Add Test</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
    </ul>
</li>