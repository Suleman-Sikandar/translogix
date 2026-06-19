<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | TransLogix Dispatch</title>
    <link rel="stylesheet" href="{{ asset('adminPanel/assets/css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <!-- Left Side: Brand / Dispatch Board -->
        <div class="brand-section">
            <div class="brand-content">
                <div class="brand-logo">
                    <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="2" y="13" width="20" height="14" rx="2" fill="#F6F4EF"/>
                        <path d="M22 17H30L36 23V27H22V17Z" fill="#E8622C"/>
                        <circle cx="11" cy="29" r="4" fill="#161B22" stroke="#F6F4EF" stroke-width="2"/>
                        <circle cx="29" cy="29" r="4" fill="#161B22" stroke="#F6F4EF" stroke-width="2"/>
                        <rect x="25" y="20" width="4" height="4" fill="#F4B400"/>
                    </svg>
                    <span class="brand-logo-word">Speedway</span>
                </div>

                <p class="brand-eyebrow">Dispatch Office</p>
                <h1 class="brand-title">Trans<span>Logix</span></h1>
                <p class="brand-subtitle">Bookings, drivers, and live shipment status &mdash; on one screen, for <strong>Speedway Logistics</strong>.</p>
            </div>

            <div class="brand-illustration">
                <svg viewBox="0 0 460 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path id="routePath" d="M0 170 C 80 170, 90 90, 160 90 S 260 30, 330 70 S 420 60, 460 20"
                        stroke="#3A4452" stroke-width="3" stroke-dasharray="2 12" stroke-linecap="round"/>

                    <circle cx="0" cy="170" r="5" fill="#F4B400"/>
                    <circle cx="160" cy="90" r="5" fill="#5C6B73"/>
                    <circle cx="330" cy="70" r="5" fill="#5C6B73"/>
                    <circle cx="460" cy="20" r="6" fill="#E8622C"/>

                    <g transform="translate(380,4)">
                        <rect x="0" y="0" width="3" height="12" fill="#E8622C"/>
                        <circle cx="1.5" cy="0" r="6" fill="#E8622C" opacity="0.18"/>
                    </g>

                    <g class="truck-marker" style="offset-path: path('M0 170 C 80 170, 90 90, 160 90 S 260 30, 330 70 S 420 60, 460 20');">
                        <rect x="-12" y="-8" width="24" height="14" rx="2" fill="#F6F4EF"/>
                        <rect x="6" y="-5" width="9" height="11" fill="#E8622C"/>
                        <circle cx="-6" cy="7" r="2.5" fill="#161B22"/>
                        <circle cx="9" cy="7" r="2.5" fill="#161B22"/>
                    </g>
                </svg>
            </div>

            <div class="brand-footer">
                <span class="coords">33.6844&deg; N, 73.0479&deg; E</span>
                <span>Fleet Ops Console</span>
            </div>
        </div>

        <!-- Right Side: Form Section -->
        <div class="form-section">
            <div class="form-wrapper">
                <div class="form-header">
                    <svg class="form-mark" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="2" y="13" width="20" height="14" rx="2" fill="#161B22"/>
                        <path d="M22 17H30L36 23V27H22V17Z" fill="#E8622C"/>
                        <circle cx="11" cy="29" r="4" fill="#F6F4EF" stroke="#161B22" stroke-width="2"/>
                        <circle cx="29" cy="29" r="4" fill="#F6F4EF" stroke="#161B22" stroke-width="2"/>
                        <rect x="25" y="20" width="4" height="4" fill="#F4B400"/>
                    </svg>
                    <p class="form-eyebrow">Admin Access</p>
                    <h2 class="form-title">Sign In</h2>
                    <p class="form-subtitle">Enter your dispatch credentials to continue.</p>
                </div>

                @if(Session::has('flash_message_error'))
                    <div class="alert alert-danger">
                        {{ Session::get('flash_message_error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="user_name" class="form-control" placeholder="Enter your username" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>

                    <button type="submit" class="btn-login">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
