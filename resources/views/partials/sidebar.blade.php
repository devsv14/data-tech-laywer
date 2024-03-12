<aside id="sidebar" class="sidebar" style='color:black !important'>

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="">
                <i class="bi bi-grid"></i>
                <span>Inicio</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Expedientes</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                <a class="nav-link collapsed"  href="{{ route('expedientes') }}">
                     <i class="bi bi-journal-text"></i><span>Crear expedientes</span>
                </a>
                </li>
                <li>
                    <a href="components-accordion.html">
                        <i class="bi bi-circle"></i><span>####</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="{{ route('expedientes') }}">
                <i class="bi bi-journal-text"></i><span>Expedientes</span>
            </a>
        </li> -->

        

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
                <span>IInstitucion</span>
            </a>
        </li><!-- End Profile Page Nav -->
    </ul>

</aside>