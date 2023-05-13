<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('frontend/images/logo/logo.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">History Chip</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.notice-prompts') }}">
                <div class="parent-icon"><i class='bx bx-file'></i>
                </div>
                <div class="menu-title">Notice Prompts</div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.contacts') }}">
                <div class="parent-icon"><i class='bx bx-message-dots'></i>
                </div>
                <div class="menu-title">Contacts</div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.writing-prompts') }}">
                <div class="parent-icon"><i class='bx bx-pen'></i>
                </div>
                <div class="menu-title">Writing Prompts</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon"><i class="bx bx-book-content"></i>
                </div>
                <div class="menu-title">Blogs</div>
            </a>
            <ul class="mm-collapse">
                <li> <a href="{{ route('admin.blogs.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Blog</a>
                </li>
                <li> <a href="{{ route('admin.blogs') }}"><i class="bx bx-right-arrow-alt"></i>Blog Lists</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="{{ route('admin.partner-types') }}">
                <div class="parent-icon"><i class='bx bx-joystick-alt'></i>
                </div>
                <div class="menu-title">Partner Type</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon"><i class="bx bx-unite"></i>
                </div>
                <div class="menu-title">Partners</div>
            </a>
            <ul class="mm-collapse">
                <li> <a href="{{ route('admin.partners.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Partner</a>
                </li>
                <li> <a href="{{ route('admin.partners') }}"><i class="bx bx-right-arrow-alt"></i>Partner Lists</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="{{ route('admin.story-categories') }}">
                <div class="parent-icon"><i class='bx bx-file'></i>
                </div>
                <div class="menu-title">Story Categories</div>
            </a>
        </li>

    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->

<style scoped>
    .logo-icon {
        filter: none !important;
    }
</style>
