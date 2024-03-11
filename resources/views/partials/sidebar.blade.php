<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Inicio</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Reservaciones</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Confirmar</span>
                    </a>
                </li>
                <li>
                    <a href="components-accordion.html">
                        <i class="bi bi-circle"></i><span>Reservar</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Sucursales</span>
            </a>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Habitaciones</span>
            </a>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Bienes y servicios</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#compras-nav" data-bs-toggle="collapse"  >
                <i class="bi bi-cart4"></i><span>Compras</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="compras-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('compras.index') }}">
                        <i class="bi bi-circle"></i><span>Compras</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Doccompras.index') }}">
                        <i class="bi bi-circle"></i><span>Det. Compras</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed"  href="{{ route('planilla.index') }}">
                <i class="bi bi-newspaper"></i><span>Planilla</span>
            </a>
        </li><!-- End Charts Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Sugerencias</span>
            </a>
        </li><!-- End Icons Nav -->

        <li class="nav-heading">Perfiles</li>

        <li class="nav-item">
            <a class="nav-link collapsed"  href="{{ route('usuario') }}">
                <i class="bi bi-person"></i>
                <span>Usuarios</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed"  href="{{ route('empresa') }}">
                <i class="bi bi-person-vcard-fill"></i>
                <span>Empresa</span>
            </a>
        </li><!-- End Profile Page Nav -->
    </ul>

</aside>