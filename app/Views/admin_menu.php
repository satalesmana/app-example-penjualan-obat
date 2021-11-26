
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Mater Data</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <?php echo anchor('admin/obat', '<span data-feather="file-text"></span> Obat',  ['class' => 'nav-link']); ?>
            </li>
            <li class="nav-item">
                 <?php echo anchor('admin/users', '<span data-feather="file-text"></span> Users',  ['class' => 'nav-link']); ?>
            </li>
        </ul>
    </div>
</nav>

        