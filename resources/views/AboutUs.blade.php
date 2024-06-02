<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - OceanWell</title>
    <link rel="stylesheet" href="{{ asset('css/NavFoot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/AboutUs.css') }}">


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

    <div class="banner">
        <div class="body">
            <div class="konten1">
                <h1>Who Is OceanWell?</h1>
                <p>We are a dedicated team committed to preserving and protecting our planet's greatest treasure—the oceans.
                </p>
            </div>
            <div class="konten2">
                <h2>Our Mission</h2>
                <p>At Ocean Well, our mission is clear: to safeguard the oceans and marine life for future generations. We believe in the inherent value of our oceans and recognize their critical role in sustaining life on Earth. Through our collective efforts, we strive to raise awareness, inspire action, and support initiatives that promote ocean conservation and sustainability.
                </p>
            </div>
            <div class="konten3">
                <h2>What We Do</h2>
                <p>Ocean Well operates as a platform for change, bringing together individuals, organizations, and communities passionate about preserving our oceans. Through our website, we facilitate charitable giving and support projects aimed at tackling key environmental issues such as plastic pollution, overfishing, habitat destruction, and climate change.
                </p>
                <p>We collaborate with reputable non-profit organizations, research institutions, and grassroots movements to fund impactful projects and initiatives. From beach clean-ups and marine protected area establishment to scientific research and policy advocacy, we work tirelessly to address the most pressing challenges facing our oceans today.
                </p>
            </div>
            <div class="konten4">
                <h2>Get Involved</h2>
                <p>Join us on our mission to protect and restore our oceans. Whether you're an individual donor, corporate partner, volunteer, or advocate, there are countless ways to get involved and make a difference. Together, we can create a healthier, more sustainable future for our planet and all its inhabitants.
                </p>
            </div>
        </div>
    </div>

    <div class="footer">
        <img src="../Aset/Logo/OceanWell's Logo.png" class="logo-foot" alt="">
        <p>© 2024 OceanWell All Rights Reserved</p>
    </div>
</body>
</html>
