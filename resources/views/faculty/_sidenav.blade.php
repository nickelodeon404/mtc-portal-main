<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <x-logo />
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="#">
                    Dashboard
                </a>
                <a class="nav-link" href="/faculty">
                    Grades
                </a>
                <a class="nav-link" href="#">
                    Update Faculty Information
                 </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>
