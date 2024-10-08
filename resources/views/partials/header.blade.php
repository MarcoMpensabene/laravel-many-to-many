<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <a class="nav-link " href="/" role="button">
                    Homepage
                </a>
                @if (Route::has('admin.projects.index'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.projects.index') }}">{{ __('ProjectsList') }}</a>
                </li>
                @endif

                @if (Route::has('admin.projects.create'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.projects.create') }}">{{ __('Add new Project') }}</a>
                        </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.projects.deleted-index') }}">{{ __('DeletedProjectIndex') }}</a>
                </li>

                @if (Route::has('admin.types.index'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.types.index') }}">{{ __('TypeList') }}</a>
                    </li>
                @endif

                @if (Route::has('admin.types.create'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.types.create') }}">{{ __('AddType') }}</a>
                </li>
                @endif

                @if (Route::has('admin.technologies.index'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.technologies.index') }}">{{ __('TechnologyList') }}</a>
                </li>
                @endif

                @if (Route::has('admin.technologies.create'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.technologies.create') }}">{{ __('AddTechnology') }}</a>
                </li>
                @endif




            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/home">
                                Homepage
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
