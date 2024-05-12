<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - OceanWell</title>
    <link rel="stylesheet" href="{{asset('css/Register.css')}}">
</head>
<body>
    <div class="banner">
        <div class="logo">
            <img src="../Aset/Logo/OceanWell's Logo.png" alt="">
        </div>
        <form method="POST" action="{{ route('register') }}" class="form">
            @csrf
            <h1>Register</h1>
            <div class="Name">
                <label>Name</label>
            </div>
            <div class="inputBox2">
                <input type="text" placeholder="First Name" name="first_name">
                <input type="text" placeholder="Last Name" name="last_name">
            </div>
            <div class="Email">
                <label>Email</label>
            </div>
            <div class="inputBox">
                <input type="email" placeholder="budisantoso@gmail.com" name="email">
            </div>
            <div class="phoneNumber">
                <label>Phone Number</label>
            </div>
            <div class="inputBox">
                <input type="tel" id="phone" name="phone_number" placeholder="+62........." pattern="\+62\d{10,11}">
            </div>
            <div class="DOB">
                <label>Date Of Birth</label>
            </div>
            <div class="inputBox">
                <input type="date" name="dob">
            </div>
            <div class="password">
                <label>Password</label>
            </div>
            <div class="inputBox">
                <input type="password" placeholder="Password" name="password">
            </div>
            <div class="button">
                <button type="submit" class="btn">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
