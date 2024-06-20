<nav class="navbar navbar-expand-lg fixed-top px-3 px-md-5">
    <a class="navbar-brand" href="{{ route('beranda.index') }}">
        <img src="{{ asset('img/logo2.jpg') }}" alt="" class="img-fluid" width="45">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link {{ $type_menu == 'Home' ? 'active' : '' }}"
                    href="{{ route('beranda.index') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ $type_menu == 'ourProject' ? 'active' : '' }}"
                    href="{{ route('ourProject.index') }}">Our Project</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $type_menu == 'Pricing' ? 'active' : '' }}"
                    href="{{ route('estimasiBiaya.index') }}">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Request Survey</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
            </li>
        </ul>
    </div>
</nav>
