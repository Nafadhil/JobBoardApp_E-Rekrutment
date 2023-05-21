<style>
    .sidebar-menu li:hover {
        background-color: #f1f1f1;
    }

    .sidebar-menu li:hover a {
        color: rgba(103, 119, 239, 255);
    }

    .sidebar-menu li.active {
        background-color: rgba(103, 119, 239, 255);
    }

    .sidebar-menu li.active a {
        color: #000;
    }
</style>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">E-Rekrutmen</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">ER</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main Menu</li>
            <li>
                <a href="/" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            <?php if (session()->get('role') == 1) { ?>
                <li>
                    <a href="/berkas" class="nav-link"><i class="fas fa-columns"></i> <span>Job Applicant</span></a>
                </li>
            <?php } ?>
            <li><a class="nav-link" href="/job"><i class="fas fa-th"></i> <span>Job List</span></a></li>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a href="https://www.instagram.com/offcialfoodymoody/"
                    class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fab fa-instagram"></i> Official Instagram
                </a>
            </div>
    </aside>
</div>