<header>
    <div class="container">
        <h1 class="header-logo">Mon Association</h1>
         <nav>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link <?php if ($current_url === '/') echo 'active'; ?>" href="/">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($current_url === '/pages/qui_nous_sommes') echo 'active'; ?>" href="/pages/qui_nous_sommes">Qui nous sommes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($current_url === '/pages/les_membres') echo 'active'; ?>" href="/pages/les_membres">Les membres</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($current_url === '/pages/admin') echo 'active'; ?>" href="/pages/admin">Admin</a>
        </li>
    </ul>
</nav>

    </div>
</header>
