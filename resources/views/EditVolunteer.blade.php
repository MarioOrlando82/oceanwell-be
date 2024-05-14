<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Edit Volunteer - OceanWell</title>
        <link rel="stylesheet" href="{{ asset('css/Edit.css') }}">
        <link rel="stylesheet" href="{{ asset('css/NavFoot.css') }}">

        <link rel="shortcut icon" href="../Aset/Logo/favicon.png" type="image/x-icon" />
    </head>

    <body>

        <nav>
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
        </nav>

        <div id="main">

            <div class="header-text">
                <label for="header">
                    <h1>Edit Page</h1>
                </label>
            </div>

            <form action="/update-volunteer/{{ $volunteer->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-box">

                    <div class="form-column" id="column-left">
                        <div class="form-input">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="Title" value="{{ $volunteer->Title }}" />
                        </div>
                        <div class="form-input">
                            <label for="author">Fundraiser</label>
                            <input type="text" id="author" name="Fundraiser"
                                value="{{ $volunteer->Fundraiser }}" />
                        </div>
                        <div class="form-input">
                            <label for="number">People</label>
                            <input type="number" id="people" name="People" value="{{ $volunteer->People }}" />
                        </div>
                        <div class="form-input">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="Image" value="" />
                        </div>
                    </div>

                    <div class="form-column">
                        <div class="form-input">
                            <label for="editor">Description</label>
                            <input type="text" id="description" name="Description"
                                value="{{ $volunteer->Description }}" />
                        </div>
                    </div>
                </div>

                <div class="btn-container">
                    <button type="submit" onclick="">Add</button>
                </div>
            </form>
        </div>
        <div class="footer">
            <img src="../Aset/Logo/OceanWell's Logo.png" class="logo-foot" alt="">
            <p>© 2024 OceanWell All Rights Reserved</p>
        </div>
    </body>
</html>
