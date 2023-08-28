<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Rick And morty Api
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('characters') }}"><strong>Characters</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('locations') }}"><strong>Locations</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><strong>Episodes</strong></a>
                </li>
            </ul>



            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">


            </ul>
        </div>
    </div>
</nav>