<!-- Desktop Navbar (Visible on lg and above) -->
<nav class="navbar navbar-expand-lg bg-white sticky-top d-none d-lg-block">
    <div class="container-fluid">
        @if (isset($all_view['setting']->logo))
            @if (Route::has('site.index'))
                <a class="navbar-brand logo-fordesktop" href="{{ route('site.index') }}">
                    <img src="{{ asset($all_view['setting']->logo) }}" alt="logo">
                </a>
            @endif
        @endif
        <a class="navbar-brand responsive-view-logo" href="{{ route('site.index') }}">
            <img src="{{ asset('user/images/logo-head.png') }}" alt="logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mx-lg-center mx-auto">
                @if (isset($data['menu']))
                    @foreach ($data['menu'] as $key => $row)
                        <li class="nav-item dropdown-center dropdown">
                            <a class="nav-link" href="{{ url($row['url']) }}" role="button">
                                {{ $row['menu_name'] }}
                                @if (array_key_exists('child', $row))
                                    <i class="fas fa-chevron-down dropdown-icon"></i>
                                @endif
                            </a>
                            @if (array_key_exists('child', $row))
                                <div class="dropdown-menu d-flex">
                                    @if ($key == 2)
                                        <div class="sub-menu">
                                            <div class="sub-count">
                                                <div class="count-number">
                                                    <a href="">
                                                        <span class="text-white">Total Member</span> <br>
                                                        <h3 class="text-white">
                                                            {{ isset($all_view['total_member']) ? $all_view['total_member'] : '0' }}
                                                            +
                                                        </h3>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="sub-menu sub-menu-items w-100">
                                        @foreach ($row['child'] as $child)
                                            @if (array_key_exists('child', $child))
                                                <!-- 3rd level menu item with sub-children -->
                                                <div class="dropdown-submenu">
                                                    <span class="dropdown-item dropdown-toggle-custom"
                                                        style="cursor: pointer;">
                                                        {{ $child['menu_name'] }}
                                                        <i class="fas fa-chevron-right float-end"></i>
                                                    </span>
                                                    <div class="dropdown-submenu-menu">
                                                        @foreach ($child['child'] as $grandchild)
                                                            <a href="{{ url($grandchild['url']) }}"
                                                                class="dropdown-item">
                                                                {{ $grandchild['menu_name'] }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <!-- Regular 2nd level menu item -->
                                                <a href="{{ url($child['url']) }}"
                                                    class="dropdown-item">{{ $child['menu_name'] }}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Mobile Navbar (Visible below lg) -->
<nav class="navbar navbar-expand-lg bg-white sticky-top d-lg-none">
    <div class="container-fluid">
        @if (isset($all_view['setting']->logo))
            <a class="navbar-brand" href="{{ route('site.index') }}">
                <img src="{{ asset($all_view['setting']->logo) }}" alt="logo">
            </a>
        @endif

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mx-auto">
                @if (isset($data['menu']))
                    @foreach ($data['menu'] as $key => $row)
                        <li class="nav-item dropdown bg-success">
                            <div class="d-flex justify-content-between align-items-center border-bottom border-light">
                                <a class="nav-link bg-success text-white" href="{{ url($row['url']) }}">
                                    {{ $row['menu_name'] }}
                                </a>
                                @if (array_key_exists('child', $row))
                                    <i class="fas fa-chevron-down dropdown-icon text-white" data-bs-toggle="collapse"
                                        data-bs-target="#dropdown-{{ $key }}"
                                        style="padding: 10px 30px; background:#4da42f; color:white;"></i>
                                @endif
                            </div>

                            @if (array_key_exists('child', $row))
                                <div class="collapse sub-menu sub-menu-items bg-light"
                                    id="dropdown-{{ $key }}">
                                    @foreach ($row['child'] as $childKey => $child)
                                        @if (array_key_exists('child', $child))
                                            <!-- 3rd level menu item with sub-children -->
                                            <div class="mobile-submenu-parent">
                                                <div
                                                    class="d-flex justify-content-between align-items-center border-bottom border-light">
                                                    <span class="dropdown-item" style="cursor: pointer;">
                                                        {{ $child['menu_name'] }}
                                                    </span>
                                                    <i class="fas fa-chevron-down text-muted" data-bs-toggle="collapse"
                                                        data-bs-target="#subdropdown-{{ $key }}-{{ $childKey }}"
                                                        style="padding: 5px 15px; cursor: pointer;"></i>
                                                </div>
                                                <div class="collapse bg-white"
                                                    id="subdropdown-{{ $key }}-{{ $childKey }}">
                                                    @foreach ($child['child'] as $grandchild)
                                                        <a class="dropdown-item ps-4"
                                                            href="{{ url($grandchild['url']) }}">
                                                            {{ $grandchild['menu_name'] }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <!-- Regular 2nd level menu item -->
                                            <a class="dropdown-item"
                                                href="{{ url($child['url']) }}">{{ $child['menu_name'] }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</nav>

<style>
    /* ========================================
       NAVBAR STYLES INDEX
       ========================================
       1. Base Navigation Styles
       2. Dropdown Menu System
       3. 3-Level Dropdown Implementation
       4. Navigation Link Effects
       5. Mobile Navigation Styles
       6. Responsive Adjustments
       7. Animation & Transitions
       8. Utility Classes
       ======================================== */

    /* ========================================
       1. BASE NAVIGATION STYLES
       ======================================== */
    .navbar-nav .nav-link {
        transition: color 0.3s ease, background-color 0.3s ease;
    }

    /* ========================================
       2. DROPDOWN MENU SYSTEM
       ======================================== */
    .navbar-nav .dropdown-menu {
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
        background: white;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .navbar-nav .dropdown:hover>.dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    /* ========================================
       3. 3-LEVEL DROPDOWN IMPLEMENTATION
       ======================================== */

    /* 3.1 Submenu Container */
    .dropdown-submenu {
        position: relative;
    }

    /* 3.2 Submenu Positioning & Styling */
    .dropdown-submenu .dropdown-submenu-menu {
        position: absolute;
        top: 0;
        left: 100%;
        margin-left: -1px;
        /* Overlap to prevent gap */
        min-width: 200px;
        background: white;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        z-index: 1050;
        opacity: 0;
        visibility: hidden;
        transform: translateX(10px);
        transition: opacity 0.15s ease, visibility 0.15s ease, transform 0.15s ease;
        transition-delay: 0s, 0s, 0s;
        /* No delay when showing */
    }

    /* 3.3 Submenu Hover Effects - Fixed Flickering */
    .dropdown-submenu:hover .dropdown-submenu-menu {
        opacity: 1;
        visibility: visible;
        transform: translateX(0);
        transition-delay: 0s, 0s, 0s;
        /* No delay when showing */
    }

    /* 3.3.1 Add invisible bridge to prevent gaps */
    .dropdown-submenu::before {
        content: '';
        position: absolute;
        top: 0;
        right: -1px;
        width: 1px;
        height: 100%;
        background: transparent;
        z-index: 1049;
    }

    /* 3.4 Parent Dropdown Persistence */
    .dropdown:hover .dropdown-menu {
        display: block;
    }

    /* ========================================
       4. NAVIGATION LINK EFFECTS
       ======================================== */

    /* 4.1 Dropdown Item Base Styling */
    .dropdown-submenu .dropdown-item {
        padding: 8px 16px;
        color: #333;
        text-decoration: none;
        display: block;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* 4.1.1 Custom Dropdown Toggle (Non-clickable Parent) */
    .dropdown-toggle-custom {
        padding: 8px 16px;
        color: #333;
        text-decoration: none;
        display: block;
        transition: background-color 0.3s ease, color 0.3s ease;
        cursor: pointer;
        user-select: none;
        /* Prevent text selection */
        position: relative;
    }

    /* 4.1.2 Visual indicator for non-clickable parents */
    .dropdown-toggle-custom::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 3px;
        height: 100%;
        background: linear-gradient(to bottom, transparent, #007bff, transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .dropdown-toggle-custom:hover::after {
        opacity: 0.3;
    }

    /* 4.2 Dropdown Item Hover Effects */
    .dropdown-submenu .dropdown-item:hover,
    .dropdown-toggle-custom:hover {
        background-color: #f8f9fa;
        color: #007bff;
    }

    /* 4.3 Chevron Arrow Styling */
    .dropdown-submenu .fas.fa-chevron-right {
        font-size: 12px;
        margin-top: 2px;
        transition: transform 0.3s ease;
    }

    /* 4.4 Chevron Arrow Animation */
    .dropdown-submenu .dropdown-item:hover .fas.fa-chevron-right,
    .dropdown-submenu .dropdown-toggle-custom:hover .fas.fa-chevron-right {
        transform: rotate(90deg);
    }

    /* ========================================
       5. MOBILE NAVIGATION STYLES
       ======================================== */

    /* 5.1 Mobile Submenu Parent Styling */
    .mobile-submenu-parent .dropdown-item {
        border-bottom: 1px solid #eee;
        transition: background-color 0.3s ease;
    }

    /* 5.2 Mobile Submenu Child Styling */
    .mobile-submenu-parent .dropdown-item.ps-4 {
        padding-left: 2rem !important;
        background-color: #f8f9fa;
        font-size: 0.9rem;
        transition: background-color 0.3s ease;
    }

    /* 5.3 Mobile Submenu Hover Effects */
    .mobile-submenu-parent .dropdown-item.ps-4:hover {
        background-color: #e9ecef;
    }

    /* ========================================
       7. ANIMATION & TRANSITIONS
       ======================================== */

    /* 7.1 Collapse Animations */
    .collapse {
        transition: height 0.3s ease, opacity 0.3s ease;
    }

    .collapsing {
        transition: height 0.3s ease, opacity 0.3s ease;
    }

    /* Responsive adjustments */
    @media (max-width: 991.98px) {
        .navbar-nav .dropdown-menu {
            position: static;
            opacity: 1;
            visibility: visible;
            transform: none;
            box-shadow: none;
            border: none;
            background: #f8f9fa;
        }

        .dropdown-submenu .dropdown-submenu-menu {
            position: static;
            box-shadow: none;
            border: none;
            background: #f8f9fa;
            margin-left: 1rem;
            opacity: 1;
            visibility: visible;
            transform: none;
        }

        /* 6.1.3 Mobile Hover Behavior Override */
        .dropdown-submenu:hover .dropdown-submenu-menu {
            display: none;
            /* Collapse controls visibility in mobile */
        }

        /* 6.1.4 Mobile Dropdown Item Adjustments */
        .dropdown-submenu .dropdown-item {
            padding: 8px 16px;
        }

        /* 6.1.5 Mobile Chevron Animation */
        .dropdown-submenu .fas.fa-chevron-down {
            transition: transform 0.3s ease;
        }

        .dropdown-submenu .fas.fa-chevron-down.show {
            transform: rotate(180deg);
        }
    }

    /* ========================================
       8. UTILITY CLASSES
       ======================================== */

    /* 8.1 General Dropdown Menu Styling */
    .dropdown-menu .sub-menu-items a {
        display: block;
        padding: 8px 16px;
        color: #333;
        text-decoration: none;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* 8.2 General Dropdown Menu Hover Effects */
    .dropdown-menu .sub-menu-items a:hover {
        background-color: #f8f9fa;
        color: #007bff;
    }

    /* ========================================
       END OF NAVBAR STYLES
       ======================================== */
</style>

<!-- ========================================
     NAVBAR JAVASCRIPT INDEX
     ========================================
     1. Anti-Flickering 3rd Level Dropdown Handler
     2. Mobile Navigation Enhancements
     3. Smooth Scroll Behavior
     4. Event Listeners & Utilities
     ======================================== -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        /* ========================================
           1. ANTI-FLICKERING 3RD LEVEL DROPDOWN HANDLER
           ======================================== */

        const dropdownSubmenus = document.querySelectorAll('.dropdown-submenu');
        let hideTimeout;

        dropdownSubmenus.forEach(function(submenu) {
            const submenuMenu = submenu.querySelector('.dropdown-submenu-menu');

            if (submenuMenu) {
                // Show submenu on hover with immediate response
                submenu.addEventListener('mouseenter', function() {
                    // Clear any pending hide timeout
                    if (hideTimeout) {
                        clearTimeout(hideTimeout);
                        hideTimeout = null;
                    }

                    // Show submenu immediately
                    submenuMenu.style.opacity = '1';
                    submenuMenu.style.visibility = 'visible';
                    submenuMenu.style.transform = 'translateX(0)';
                    submenuMenu.style.transitionDelay = '0s';
                });

                // Hide submenu with delay to prevent flickering
                submenu.addEventListener('mouseleave', function() {
                    hideTimeout = setTimeout(function() {
                        submenuMenu.style.opacity = '0';
                        submenuMenu.style.visibility = 'hidden';
                        submenuMenu.style.transform = 'translateX(10px)';
                    }, 100); // 100ms delay to prevent flickering
                });

                // Keep submenu open when hovering over the submenu itself
                submenuMenu.addEventListener('mouseenter', function() {
                    if (hideTimeout) {
                        clearTimeout(hideTimeout);
                        hideTimeout = null;
                    }
                });

                submenuMenu.addEventListener('mouseleave', function() {
                    hideTimeout = setTimeout(function() {
                        submenuMenu.style.opacity = '0';
                        submenuMenu.style.visibility = 'hidden';
                        submenuMenu.style.transform = 'translateX(10px)';
                    }, 100);
                });
            }
        });

        console.log('✅ Anti-flickering handler initialized for', dropdownSubmenus.length, '3rd level menus');
    });
</script>
