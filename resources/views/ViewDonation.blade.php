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
                <img src="{{ asset('storage/images/' . $donation->Image) }}" alt="">
            </div>

            <div class="Content-Wrapper">

                <div class="Left-Content">
                    <p>{{ $donation->Description }}</p>
                </div>
                <div class="Mid-Content">
                    <h3>Terkumpul</h3>
                    <div class="Target-Wrapper">
                        <h2 id="CurrentNumber">Rp.{{ $donation->Total }}</h2>&nbsp;<h2>Dari</h2>&nbsp;<h2
                            id="TargetNumber">Rp.{{ $donation->Limit }}</h2>
                    </div>
                </div>

                <div class="Right-Content">

                    <form id="donationForm" action="/update-total-donation/{{ $donation->id }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="InputWrapper">
                            <input type="text" id="donationAmount" name="Total"
                                placeholder="Masukkan Nominal Donasi">
                        </div>
                        <br>
                        <div class="SubmitBtn">
                            <button type="button" onclick="openPay()">Donate</button>
                        </div>
                        <div class="Popup" id="popup-pay" style="display: none;">
                            <div class="Popup-Wrapper">
                                <div class="Logo-exit">
                                    <img src="../Aset/Icon/X.png" alt="" onclick="closePay()">
                                </div>
                                <div class="Logo-pay">
                                    <img src="../Aset/Icon/QR.png" alt="">
                                </div>
                                <div class="Popup-text">
                                    <h3>Klik “Done” jika sudah melakukan pembayaran</h3>
                                    <button type="button" onclick="openInvoice()">Done</button>
                                </div>
                            </div>
                        </div>
                        <div class="Popup" id="popup-invoice" style="display: none;">
                            <div class="announcement">
                                <div class="Announcement-Wrapper">
                                    <div class="Announcement-img">
                                        <img src="../Aset/Icon/Check.png" alt="">
                                    </div>
                                    <div class="Announcement-Text">
                                        <h2>Terima kasih telah melakukan pembayaran sebesar:</h2>
                                        <h1 id="donationAmountDisplay"></h1>
                                        <h3>Dana yang Anda berikan akan segera kami berikan kepada orang yang
                                            membutuhkan. Terima kasih!</h3>
                                    </div>
                                    <div class="Announcement-Btn">
                                        <button type="submit">Back</button>
                                    </div>
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
            function openPay() {
                document.getElementById("popup-pay").style.display = "block";
            }

            function openInvoice() {
                var donationAmount = document.getElementById("donationAmount").value;
                document.getElementById("donationAmountDisplay").innerText = donationAmount;
                document.getElementById("popup-invoice").style.display = "block";
            }

            function closePay() {
                document.getElementById("popup-pay").style.display = "none";
            }
        </script>
    </body>
</html>
