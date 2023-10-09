<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <x-logo />
        <div class="sb-sidenav-menu" style="overflow-y: hidden;">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/faculty">
                        <i class="fas fa-book"></i> Grades
                    </a>
                </li>
            </ul>
        </div>
        <div class="sb-sidenav-menu" style="align-self: end; margin-top: 400px; overflow-y: hidden;">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="update_faculty">
                        <i class="fas fa-user-cog"></i> Update Faculty Information
                    </a>
                </li>
            </ul>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <span class="user-name">{{ Auth::user()->name }}</span>
        </div>
    </nav>
</div>


<style>
    /* CSS for navigation enhancements */
    .nav-item a.nav-link {
        color: #fff;
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        font-weight: 500;
        transition: background-color 0.3s, color 0.3s;
        text-decoration: none; /* Added to remove underline from links */
    }

    .nav-item a.nav-link:hover {
        background-color: #333;
        color: #fff;
    }

    .nav-item {
        margin-bottom: 10px;
    }

    .sb-sidenav-footer {
        padding: 10px;
    }

    .sb-sidenav-extra .nav-item a.nav-link {
        color: #fff;
        font-weight: 500;
    }
</style>
