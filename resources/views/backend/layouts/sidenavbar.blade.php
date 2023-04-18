
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
            <a href="{{ route('dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>
            <a href="{{ route('notice-prompts') }}">
                <div class="parent-icon"><i class='bx bx-file'></i>
                </div>
                <div class="menu-title">Notice Prompts</div>
            </a>
        </li>

        <li>
            <a href="{{ route('contacts') }}">
                <div class="parent-icon"><i class='bx bx-message-dots'></i>
                </div>
                <div class="menu-title">Contacts</div>
            </a>
        </li>

        <li>
            <a href="{{ route('writing-prompts') }}">
                <div class="parent-icon"><i class='bx bx-pen'></i>
                </div>
                <div class="menu-title">Writing Prompts</div>
            </a>
        </li>

    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->

<style scoped>
    .logo-icon{
        filter: none !important;
    }
</style>
