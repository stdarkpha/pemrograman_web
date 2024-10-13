<div class="navbar bg-base-100 sticky top-0 shadow z-50">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                <li><a>Item 1</a></li>
                <li>
                    <a>Parent</a>
                    <ul class="p-2">
                        <li><a>Submenu 1</a></li>
                        <li><a>Submenu 2</a></li>
                    </ul>
                </li>
                <li><a>Item 3</a></li>
            </ul>
        </div>
        <a href="index.php?page=home" class="btn btn-ghost text-xl">FarPortal</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal gap-2 px-1">
            <li><a class="btn btn-ghost" href="index.php?page=home">Home</a></li>
            <li><a class="btn btn-ghost" href="index.php?page=about">About</a></li>
            <li><a class="btn btn-ghost" href="index.php?page=news">News</a></li>
            <li><a class="btn btn-ghost" href="index.php?page=survey">Survey</a></li>
        </ul>
    </div>
    <div class="navbar-end">
        <!-- <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost">
                <div class="avatar placeholder">
                    <div class="bg-neutral text-neutral-content w-8 rounded-full">
                        <span class="text-xs">UN</span>
                    </div>
                </div>
                <span class="ml-2">User Name</span>
            </div>
            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                <li><a>Edit Profile</a></li>
                <li><a>Logout</a></li>
            </ul>
        </div> -->
        <label class="flex cursor-pointer gap-2 px-4">
            <span class="label-text">Dark</span>
            <input id="theme" type="checkbox" value="light" class="toggle theme-controller" />
            <span class="label-text">Light</span>
        </label>
    </div>
</div>

<script>
    const theme = localStorage.getItem('theme');

    if (theme) {
        document.documentElement.setAttribute('data-theme', theme);
        document.getElementById('theme').checked = theme === 'light';
        localStorage.setItem('theme', theme);
    }

    const themeController = document.querySelector('#theme');
    themeController.addEventListener('change', () => {
        const theme = themeController.checked ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
    });
</script>