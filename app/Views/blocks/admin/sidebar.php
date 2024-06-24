<div class="sidebar w-100" style="height: 100vh !important;">
  <div class="h-100 sidebar-container d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" bis_skin_checked="1">
    <a href="#" class="w-100 d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
      <div class="w-100 d-flex flex-column text-center justify-content-center align-items-center">
        <img width="100px" src="<?php echo _HOST_PATH_ ?>\public\assets\clients\images\header_img\logo.png" alt="">
        <span class="w-100 fs-6 text-center text-primary fw-bold">Quản lí khu vui chơi, giải trí</span>
      </div>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a style="color: #000;" href="<?php echo _HOST_PATH_ ?>/admin/EnterServices" class="nav-link sidebar-item <?php if (isset($active)) {
             if (!empty($active))
               echo 'active fw-bold text-light';
           } ?>">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#speedometer2"></use>
          </svg>
          Quản lí dịch vụ vui chơi
        </a>
      </li>
      <li>
        <a style="color: #000;" href="<?php echo _HOST_PATH_ ?>/admin/News" class="nav-link sidebar-item <?php if (isset($activeNews)) {
             if (!empty($activeNews))
               echo 'active fw-bold text-light';
           } ?>">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#table"></use>
          </svg>
          Quản lí tin tức, sự kiện
        </a>
      </li>
      <li>
        <a style="color: #000;" href="<?php echo _HOST_PATH_ ?>/admin/Service" class="nav-link sidebar-item <?php if (isset($activeService)) {
             if (!empty($activeService))
               echo 'active fw-bold text-light';
           } ?>">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#table"></use>
          </svg>
          Quản lí dịch vụ
        </a>
      </li>
      <li>
        <a style="color: #000;" href="<?php echo _HOST_PATH_ ?>/admin/Tickets" class="nav-link sidebar-item <?php if (isset($activeTicket)) {
             if (!empty($activeTicket))
               echo 'active fw-bold text-light';
           } ?>">
          <svg class="bi pe-none me-2" width="16" height="16">
            <use xlink:href="#table"></use>
          </svg>
          Quản lí vé
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown" bis_skin_checked="1">
      <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
        aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" style="">
        <!-- <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li>
          <hr class="dropdown-divider">
        </li> -->
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>
</div>