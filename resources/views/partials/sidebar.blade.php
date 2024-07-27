<aside class="sidebar">
    <div class="logo">
        <span>PT. Smart</span>
    </div>
    <nav>
        <ul>
            <li class="{{ request()->is('admin') ? 'active' : '' }}">
                <i class='bx bxs-category'></i>
                <a href="{{ url('/admin') }}">Dashboard</a>
            </li>
            <li class="{{ request()->is('admin/products*') ? 'active' : '' }}">
                <i class='bx bxs-box'></i>
                <a href="{{ url('/admin/products') }}">Products</a>
            </li>
            <li class="{{ request()->is('admin/leads*') ? 'active' : '' }}">
                <i class='bx bxs-user-account'></i>
                <a href="{{ url('/admin/leads') }}">Leads</a>
            </li>
            <li class="{{ request()->is('admin/projects*') ? 'active' : '' }}">
                <i class='bx bx-notepad'></i>
                <a href="{{ url('/admin/projects') }}">Projects</a>
            </li>
            <li class="{{ request()->is('admin/customers*') ? 'active' : '' }}">
                <i class='bx bxs-user-check'></i>
                <a href="{{ url('/admin/customers') }}">Customers</a>
            </li>
        </ul>
    </nav>
</aside>
