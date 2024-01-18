<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="icon-users nav-icon" style="float:left;padding-right: 5px;"></i>
        Patient
    </a>
    <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
        @if (in_array(110, $permission))
            <li>
                <a class="dropdown-item" href="{{ route('patients.index') }}"><span class="icon-person_add"></span> New
                    Registration</a>
            </li>
        @endif
        @if (in_array(114, $permission))
            <li>
                <a class="dropdown-item" href="{{ route('patient-profile.index') }}"><span
                        class="icon-help_outline"></span>
                    Patient Profile</a>
            </li>
        @endif
        @if (in_array(118, $permission))
            <li>
                <a class="dropdown-item" href="{{ url('reports') }}"><span class="icon-record_voice_over"></span>
                    Registration Report</a>
            </li>
        @endif
    </ul>
</li>
