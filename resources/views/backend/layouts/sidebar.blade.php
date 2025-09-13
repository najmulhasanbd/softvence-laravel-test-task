    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="{{route('dashboard')}}" class="app-brand-link">
                <span class="app-brand-text demo menu-text fw-bold ms-2">Soft<span class="text-success">Vence</span></span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
            </a>
        </div>

        <div class="menu-divider mt-0"></div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
            <li class="menu-item active open">
                <ul class="menu-sub">
                    <li class="menu-item active">
                        <a href="{{ route('dashboard') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="{{ url('/') }}" target="_blank" class="menu-link">
                            <div class="text-truncate" data-i18n="Analytics">Website</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('course.index')}}" class="menu-link">
                            <div class="text-truncate" data-i18n="CRM">Course Creation</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('module.index')}}" class="menu-link">
                            <div class="text-truncate" data-i18n="CRM">Module Creation</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('content.index')}}" class="menu-link">
                            <div class="text-truncate" data-i18n="CRM">Course </div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
