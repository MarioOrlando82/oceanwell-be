<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Volunteer List - OceanWell</title>
        <link rel="stylesheet" href="{{ asset('css/List.css') }}">
        <link rel="stylesheet" href="{{ asset('css/NavFoot.css') }}">
        <link rel="stylesheet" href="{{ asset('css/Admin.css') }}">

    </head>

    <body>
        <div class="navbar">
            <div class="nav-wrap">
                <a href="/"><img src="../Aset/Logo/OceanWell's Logo.png" class="logo-nav" alt=""></a>
                <ul>
                    <li><a href="/aboutUs">About Us</a></li>
                    <li><a href="/donation">Donate</a></li>
                    <li><a href="/volunteer">Volunteer</a></li>
                    <li><a href="/article">Article</a></li>
                    @if (Auth::user())
                        <li><a href="/logout"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                Out</a></li>
                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Register</a></li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="banner">
            <div class="body">
                <div class="volunteerList">
                    <div class="header">
                        <h1>Volunteer List</h1>
                    </div>
                    @can('is_admin')
                        <div class="button">
                            <button type="submit" class="btn" onclick="location.href='/create-volunteer'">Add
                                Volunteer</button>
                        </div>
                    @endcan
                    <div class="isiList">
                        @forelse ($volunteers as $volunteer)
                            <div class="list">
                                <a href="{{ route('detail', $volunteer->id) }}">
                                    <img src="{{ asset('storage/images/' . $volunteer->Image) }}" alt="">
                                </a>
                                <div class="tulisan">
                                    <h1>{{ $volunteer->Title }}</h1>
                                    <h2>{{ $volunteer->Fundraiser }}</h2>
                                    <div class="emptyCell"></div>
                                    <div class="DownContentWrapper">
                                        <div class="LeftContent">
                                            <h3>Terkumpul</h3>
                                            <h4>{{ $volunteer->Total }} Orang dari {{ $volunteer->People }} Orang</h4>
                                        </div>
                                        @can('is_admin')
                                            <div class="RightContent">
                                                <button><a href="{{ route('edit', $volunteer->id) }}"
                                                        class="">Edit</a>
                                                </button>
                                            </div>
                                            <form action="/delete-volunteer/{{ $volunteer->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="delete">Delete</button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h5>Empty</h5>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <img src="../Aset/Logo/OceanWell's Logo.png" class="logo-foot" alt="">
            <p>© 2024 OceanWell All Rights Reserved</p>
        </div>
    </body>
</html>
