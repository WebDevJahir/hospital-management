<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="formsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="icon-eye1 nav-icon" style="float:left;padding-right: 5px;"></i>
        Monitoring
    </a>
    <ul class="dropdown-menu" aria-labelledby="formsDropdown">
        @if (in_array(123, $permission))
            <li>
                <a class="dropdown-item" href="{{ url('patient-profile-list') }}"><span
                        class="icon-account_box"></span> Patient Profile</a>
            </li>
        @endif
        @if (in_array(127, $permission))
            <li>
                <a class="dropdown-toggle sub-nav-link" href="m_investigation.html"><span
                        class="icon-search1"></span> Prescription</a>
                <ul class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="customDropdown">
                    @if (in_array(128, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('prescription-patient-list') }}"><span
                                    class="icon-file-text"></span> Prescription
                                Generator</a>
                        </li>
                    @endif
                    @if (in_array(129, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('certificate-patient-list') }}"><i
                                    class="icon-printer nav-icon"></i> Death
                                Certificate</a>
                        </li>
                    @endif
                    @if (in_array(130, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('opd-patient-list') }}"><i
                                    class="icon-printer nav-icon"></i>OPD Prescription</a>
                        </li>
                    @endif
                    @if (in_array(131, $permission))
                        <li>
                            <a class="dropdown-item" href="{{ url('opd-list') }}"><i
                                    class="icon-printer nav-icon"></i>List of OPD</a>
                        </li>
                    @endif
                    @if (in_array(132, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('medicine-item-list') }}"><i
                                    class="icon-printer nav-icon"></i>Add Medicine</a>
                        </li>
                    @endif
                    @if (in_array(136, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('follow-up-patient') }}"><i
                                    class="icon-printer nav-icon"></i>Patient Follow Up</a>
                        </li>
                    @endif
                    @if (in_array(139, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('next-plan-patient') }}"><i
                                    class="icon-printer nav-icon"></i>Next Plan</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        <!-- <li>
                <a class="dropdown-item" href="patient-follow-up-list"><span class="icon-fast-forward"></span> Follow Up</a>
        </li> -->
        @if (in_array(140, $permission))
            <li>
                <a class="dropdown-toggle sub-nav-link" href="m_investigation.html"><span
                        class="icon-search1"></span> Investigation</a>
                <ul class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="customDropdown">
                    @if (in_array(145, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('investigation-categories.index') }}"><i
                                    class="icon-printer nav-icon"></i> Category</a>
                        </li>
                    @endif
                    @if (in_array(149, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('investigation-sub-categories.index') }}"><i
                                    class="icon-printer nav-icon"></i> Sub Category</a>
                        </li>
                    @endif
                    @if (in_array(141, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('investigation-reports-list') }}"><i
                                    class="icon-edit1 nav-icon"></i>Input & Report</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (in_array(153, $permission))
            <li>
                <a class="dropdown-toggle sub-nav-link" href="#"
                    id="customDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="icon-chrome"></span> Pain Clinic
                </a>
                <ul class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="customDropdown">
                    @if (in_array(154, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('patient-pain-asmt-list') }}"><i
                                    class="icon-edit1 nav-icon"></i>Assessment</a>
                        </li>
                    @endif
                    @if (in_array(157, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('patient-morphin-list') }}"><i
                                    class="icon-edit1 nav-icon"></i>Management</a>
                        </li>
                    @endif
                    @if (in_array(160, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('patient-morphin-dose-list') }}"><i
                                    class="icon-edit1 nav-icon"></i>Monitoring</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (in_array(163, $permission))
            <li>
                <a class="dropdown-toggle sub-nav-link" href="#"
                    id="customDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="icon-chrome"></span>Wound Clinic
                </a>
                <ul class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="customDropdown">
                    @if (in_array(164, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('patient-wound-list') }}"><i
                                    class="icon-edit1 nav-icon"></i>Wound Describe</a>
                        </li>
                    @endif
                    @if (in_array(167, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('patient-wound-asst-list') }}"><i
                                    class="icon-edit1 nav-icon"></i>Wound Assesment</a>
                        </li>
                    @endif
                    @if (in_array(170, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('patient-wound-manage-list') }}"><i
                                    class="icon-edit1 nav-icon"></i>Wound Management</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (in_array(240, $permission))
            <li>
                <a class="dropdown-item"
                    href="{{ url('patient-psycho-asmt-list') }}"><span
                        class="icon-image"></span> Phycho ASMT</a>
            </li>
        @endif
        @if (in_array(173, $permission))
            <li>
                <a class="dropdown-toggle sub-nav-link" href="#"
                    id="customDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="icon-github"></span> Rehabilitative Pall Care
                </a>
                <ul class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="customDropdown">
                    @if (in_array(174, $permission))
                        <li>
                            <a class="dropdown-item" href="{{ url('menu-list') }}"><span
                                    class="icon-list2"></span> Menu</a>
                        </li>
                    @endif
                    @if (in_array(178, $permission))
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('video-link-list') }}"><span
                                    class="icon-paperclip"></span> Video</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (in_array(182, $permission))
            <li>
                <a class="dropdown-item" href="{{ url('all-uploads') }}"><span
                        class="icon-image"></span> Uploaded Documents</a>
            </li>
        @endif
    </ul>
</li>