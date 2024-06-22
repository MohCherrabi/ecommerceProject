<div class="navbar-nav align-items-center">
    <div class="nav-item d-flex align-items-center">
        <i class="bx bx-search fs-4 lh-0"></i>
        <input type="text" name="search" class="form-control border-0 shadow-none ps-1 ps-sm-2"
            placeholder="Search..." aria-label="Search..." />
    </div>
</div>
<!-- /Search -->

<ul class="navbar-nav flex-row align-items-center ms-auto">
    <!-- Place this tag where you want the button to render. -->
    <li class="nav-item lh-1 me-3">

        <button class="btn btn-primary ">Search</button>
    </li>

    <!-- User -->
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
            data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
                <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                    class="w-px-40 h-auto rounded-circle" />
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <a class="dropdown-item" href="#">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                                <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                                    class="w-px-40 h-auto rounded-circle" />
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <span class="fw-medium d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <div class="dropdown-divider"></div>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <i class="bx bx-user me-2"></i>
                    <span class="align-middle">My Profile</span>
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <i class="bx bx-cog me-2"></i>
                    <span class="align-middle">Settings</span>
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <span class="d-flex align-items-center align-middle">
                        <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                        <span class="flex-grow-1 align-middle ms-1">Billing</span>
                        <span
                            class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                    </span>
                </a>
            </li>
            <li>
                <div class="dropdown-divider"></div>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);">
                    <i class="bx bx-power-off me-2"></i>
                    <span class="align-middle">Log Out</span>
                </a>
            </li>
        </ul>
    </li>
    <!--/ User -->
</ul>
