<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="">
          <i class="bi bi-grid"></i>
          <span>Pos</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"  style="font-size: 1.4rem; color: #899bbd"></i><span>Employee</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin.employee.create') }}">
              <i class="bi bi-person-plus" style="font-size: 1.3rem; color: #899bbd"></i><span>Add Employee</span>
            </a>
          </li>

          <li>
            <a href="{{ route('admin.employee.index') }}">
              <i class="bi bi-person-lines-fill" style="font-size: 1.3rem; color: #899bbd"></i><span>All Employee</span>
            </a>
          </li>

        </ul>
      </li><!-- End Forms Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#customer" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-video3"  style="font-size: 1.4rem; color: #899bbd"></i><span>Customer</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        
        <ul id="customer" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin.customer.create') }}">
              <i class="bi bi-person-plus" style="font-size: 1.3rem; color: #899bbd"></i><span>Add Customer</span>
            </a>
          </li>

          <li>
            <a href="{{ route('admin.customer.index') }}">
              <i class="bi bi-person-lines-fill" style="font-size: 1.3rem; color: #899bbd"></i><span>All Customer</span>
            </a>
          </li>

        </ul>
      </li><!-- End Forms Nav -->
    


    </ul>

  </aside><!-- End Sidebar-->