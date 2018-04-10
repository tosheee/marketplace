<ul id="ver-account-menu">
    <span class=""><b>Seller</b></span>
    <li><a href="/sellers/{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}">Dashboard Seller</a></li>

    <li><a href="/sellers/{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}/create_product">Create product</a></li>
    <li><a href="/sellers/{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}/products/{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}">Inserted products</a></li>
</ul>

<ul id="ver-account-menu">
    <span class=""><b>Customer</b></span>
    <li><a href="#">Address Book</a></li>
    <li><a href="#">Wish List</a></li>
    <li><a href="#">Order History</a></li>
    <li><a href="#">Conversations</a></li>
    <li><a href="#">Downloads</a></li>
    <li><a href="#">Recurring payments</a></li>
    <li><a href="#">Reward Points</a></li>
    <li><a href="#">Returns</a></li>
    <li><a href="#">Transaction</a></li>
</ul>