<aside class="sidebar col-lg-3 usr_menu_wrap">
    <div class="widget widget-dashboard usr_menu_box">
        <h3 class="widget-title">My Account</h3>

        <ul class="list">
            <li class="{{ webActive('user.dashboard') }}">
                <a href="{{ webRoute('user.dashboard') }}">Dashboard</a>
            </li>

            <li class="{{ webActive('user.profile.index') }}">
                <a href="{{ webRoute('user.profile.index') }}">Account Information</a>
            </li>

            <li class="{{ webActive('user.address.book.index') }}">
                <a href="{{ webRoute('user.address.book.index') }}">Address Book</a>
            </li>

            <li class="{{ webActive('user.order.list') }}">
                <a href="{{ webRoute('user.order.list') }}">My Orders</a>
            </li>

            <li><a href="#">Wishlist</a></li>
            <li><a href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        </ul>
    </div><!-- End .widget -->
</aside>

<form id="logout-form" action="{{ route('web.user.auth.logout') }}" method="POST" style="display: none;">
    @csrf
</form>