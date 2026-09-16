
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('welcome') }}">
            University System
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarContent"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}">
                        Home
                    </a>
                </li>

                @auth

                    @if(auth()->user()->role === 'admin')

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">
                                Users
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('students.index') }}">
                                Students
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('teachers.index') }}">
                                Teachers
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('courses.index') }}">
                                Courses
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('departments.index') }}">
                                Departments
                            </a>
                        </li>

                    @endif

                @endauth

            </ul>

            <ul class="navbar-nav">

@guest

    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">
            Login
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">
            Register
        </a>
    </li>

@else

                    <li class="nav-item">
                        <span class="nav-link">
                            {{ auth()->user()->name }}
                        </span>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button
                                type="submit"
                                class="btn btn-link nav-link"
                            >
                                Logout
                            </button>
                        </form>
                    </li>

                @endguest

            </ul>

        </div>
    </div>
</nav>