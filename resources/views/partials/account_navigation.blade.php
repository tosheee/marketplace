<ul id="ver-account-menu">
    <li><a href="/account/view_user_orders/{{ Auth::user()->id }}">My Orders</a></li>
    <li><a href="#">Edit Account</a></li>
    <li><a href="#">Edit Password</a></li>
    <li><a href="#">Edit Email</a></li>
    <li><a href="#">Messages</a></li>
    <li><a href="#">Logout</a></li>
    @if(!isset(App\Admin\Seller::where('user_id', Auth::user()->id)->first()->id))
        <li><a href="/account/{{ Auth::user()->id }}/create_seller">Create seller</a></li>
    @endif
</ul>
