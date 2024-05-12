<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OceanWell</title>
    <link rel="stylesheet" href="{{asset('css/Home.css')}}">
</head>
<body>
    <div class="banner1">
        <div class="navbar">
            <img src="../Aset/Logo/OceanWell's Logo.png" class="logo" alt="">
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Donate</a></li>
                <li><a href="#">Volunteer</a></li>
                <li><a href="#">Articles</a></li>
                @if (Auth::user())
                    <form action="/logout" method="POST">
                        @csrf
                        <li><button type="submit" href="#">Log Out</button></li>
                    </form>
                @else
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
                @endif
            </ul>
        </div>
        <div class="content">
            <h1><b>SAVE THE OCEANS</b></h1>
            <h2>BY JOINING THE CLEAN OCEAN MOVEMENT</h2>
            <p>We are on a mission to preserve ecosystems in the ocean and need your help to make it happen</p>
        </div>
    </div>
    <div class="banner2">
        <div class="content2">
            <h1>READY TO <b>HELP US</b> SAVE THE OCEANS?</h1>
            <p>50% - 85% of the world’s oxygen comes from the oceans
                and they also help regulate the climate. </p>
        </div>
        <button class="button">Donate Now</button>
    </div>
    <div class="banner3">
        <div class="content3-wrapper">
            <div class="content3">
                <h1><b>OCEAN CLEANERS
                    WANTED!</b></h1>
                <p>We've built a fantastic community to support our
                    ideas, and we're looking for adventurers to join the mission!</p>
                <button class="button2">Join Now</button>
            </div>
        </div>
        <div class="footer">
            <img src="../Aset/Logo/OceanWell's Logo.png" class="logo" alt="">
            <p>© 2024 OceanWell All Rights Reserved</p>
        </div>
    </div>
</body>
</html>
