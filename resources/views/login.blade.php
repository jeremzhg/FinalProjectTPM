<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/log_in_style.css') }}">
    <link rel="script" href="{{ asset('js/log_in.js') }}">
</head>
<body>
    <div class="login-page">
        <div class="header-container">
          <button class="nav-home" onclick="window.location.href='{{ route('landing') }}'">&#8592; HOME</button>
          <div class="login-container">
            <div class="form-wrapper">
              <form class="form-content" action="{{route('login')}}" method="POST">
                @csrf
                <h1 class="login-header">LOGIN</h1>
                
                <div class="form-group">
                  <label for="teamName" class="form-label">Team Name</label>
                  <input type="text" id="teamName" name="team_name" class="form-input" placeholder="Input Team Name" aria-label="Enter team name" />
                </div>
                
                <div class="form-group">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" id="password" name="password" class="form-input" placeholder="Input your Password" aria-label="Enter password" />
                </div>

                @if ($errors->any())
                    <div style="color: red;">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                    </div>
                @endif
      
                <button type="submit" class="submit-button">Sign In</button>

                <div class="register-text">
                  <span class="text-regular">Don't have an account?</span>
                  <a href="{{ route('getRegister') }}" class="register-link">Register Now!</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</body>
</html>