<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="tablesDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="icon-printer nav-icon" style="float:left;padding-right: 5px;"></i>
        ERP Report
    </a>
    <ul class="dropdown-menu" aria-labelledby="tablesDropdown">

        <li>
            <a class="dropdown-item" href="{{ url('payment-list') }}"><span class="icon-file-text"></span> Payments</a>
        </li>

        <li>
            <a class="dropdown-item" href="{{ url('cash-book') }}"><i class="icon-book-open"></i> Cash Book</a>
        </li>

        <li>
            <a class="dropdown-item" href="{{ url('cash-book-subcat') }}"><i class="icon-book-open"></i> Cash Book by
                Sub-Cat</a>
        </li>

        <li>
            <a class="dropdown-item" href="{{ url('cash-book-head') }}"><i class="icon-book-open"></i> Cash Book by
                In-Head</a>
        </li>

        <li>
            <a class="dropdown-item" href="{{ url('provident-fund-report') }}"><span class="icon-loader"></span>
                Provident Fund</a>
        </li>

    </ul>
</li>
