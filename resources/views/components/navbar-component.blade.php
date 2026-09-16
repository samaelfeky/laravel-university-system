<nav class="navbar navbar-expand-lg bg-body-tertiary">

    <div class="container-fluid">

        <a
            class="navbar-brand"
            href="{{ route('welcome') }}"
        >
            University System
        </a>


        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>


        <div
            class="collapse navbar-collapse"
            id="navbarSupportedContent"
        >

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                @auth

                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('dashboard') }}"
                        >
                            Dashboard
                        </a>
                    </li>


                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('users.index') }}"
                        >
                            Users
                        </a>
                    </li>


                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('students.index') }}"
                        >
                            Students
                        </a>
                    </li>


                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('departments.index') }}"
                        >
                            Departments
                        </a>
                    </li>


                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('courses.index') }}"
                        >
                            Courses
                        </a>
                    </li>


                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('teachers.index') }}"
                        >
                            Teachers
                        </a>
                    </li>

                @endauth

            </ul>


            <ul class="navbar-nav">

                @guest

                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('login') }}"
                        >
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('register') }}"
                        >
                            Register
                        </a>
                    </li>

                @endguest


                @auth

                    <li class="nav-item">

                        <form
                            action="{{ route('logout') }}"
                            method="POST"
                            class="d-inline"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="btn btn-link nav-link"
                            >
                                Logout
                            </button>

                        </form>

                    </li>

                @endauth

            </ul>


        </div>

    </div>

</nav>