<h1>User side</h1>
<form action="{{route('logout')}}" id="logout-form" method="POST">
    @csrf
    <a class="nav-link" href="{{route('logout')}}" class="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
    Logout
    </a>
</form>