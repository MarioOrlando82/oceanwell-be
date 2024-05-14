<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Volunteer List - OceanWell</title>
        <link rel="stylesheet" href="{{ asset('css/NavFoot.css') }}">
        <link rel="stylesheet" href="{{ asset('css/View.css') }}">
        <link rel="stylesheet" href="{{ asset('css/Popup.css') }}">

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

        <div class="Content-Box">

            <div class="Gambar">
                <img src="{{ asset('storage/images/' . $volunteer->Image) }}" alt="">
            </div>

            <div class="Content-Wrapper">

                <div class="Left-Content">
                    <p>{{ $volunteer->Description }}</p>
                </div>
                <div class="Mid-Content">
                    <h3>Terkumpul</h3>
                    <div class="Target-Wrapper">
                        <h2 id="CurrentNumber">{{ $volunteer->Total }} Orang</h2>&nbsp;<h2>Dari</h2>&nbsp;<h2
                            id="TargetNumber">{{ $volunteer->People }} Orang</h2>
                    </div>
                </div>

                <div class="Right-Content">

                    <form id="donationForm" action="/update-total/{{ $volunteer->id }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="InputWrapper">
                            <input type="text" id="donationAmount" name="Total"
                                placeholder="Masukkan Jumlah Orang">
                        </div>
                        <br>
                        <div class="SubmitBtn">
                            <button type="button" onclick="openInv()">Apply</button>
                        </div>
                        <div class="Popup" id="popup-invite" style="display: none;">

                            <div class="Popup-Wrapper">

                                <div class="Logo-exit">
                                    <img src="../Aset/Icon/X.png" alt="" onclick="closeInv()">
                                </div>

                                <div class="Logo-img">
                                    <img src="../Aset/Icon/logos_whatsapp-icon.png" alt="">
                                </div>

                                <div class="Popup-text">
                                    <h3>Silakan bergabung ke grup Whatsapp kami</h3>
                                    <h2>https://chat.whatsapp.com/ Kjei8jU4ugp4Bv1d2HfpXk</h2>
                                    <h3>Klik “Done” jika sudah bergabung ke grup Whatsapp</h3>
                                    <button type="submit" onclick="closeInv()">Done</button>
                                </div>


                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="footer">
            <img src="../Aset/Logo/OceanWell's Logo.png" class="logo-foot" alt="">
            <p>© 2024 OceanWell All Rights Reserved</p>
        </div>

        <script>
            function openInv() {
                document.getElementById("popup-invite").style.display = "block";
            }

            function closeInv() {
                document.getElementById("popup-invite").style.display = "none";
            }
        </script>
    </body>

</html>
