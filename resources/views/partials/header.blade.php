<header>
    <div class="username">
        <span>Hai {{ Auth::user()->username }}</span>
    </div>
    <div class="logout">
        <a href="/logout">Logout</a>
    </div>
</header>
