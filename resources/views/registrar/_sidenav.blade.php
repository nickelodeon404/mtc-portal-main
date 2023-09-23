<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <x-logo />
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="/registrar">
                    Dashboard
                </a>
                <a class="nav-link" href="{{ url('/view-table') }}">
                    Admissions
                </a>
                <a class="nav-link" href="{{ url('/enrollment_table-table') }}">
                    Enrollment
                </a>
                <a class="nav-link" href="{{ url('/enrolled_table-table') }}">
                    Enrolled
                </a>
                <a class="nav-link" href="{{ url('/academic_record_request_table-table') }}">
                    Academic Record Request
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>
