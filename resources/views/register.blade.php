<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>

  <button class="home-button" onclick="window.location.href='{{ route('landing') }}'">
    <img src="/storage/images/arrow-icon.png" alt="Arrow" class="arrow-icon">
    HOME
  </button>



  <div class="container-pertama">
    <div class="container-kedua">
      <div class="container-ketiga">
        <h1 class="register-title">REGISTER</h1>
      </div>



      <form id="register-form" action="{{ route('registerStep1') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="input-control">
          <label class="label">Team Name</label>
          <input type="text" placeholder="Input your Team Name" class="input-field input-team-name" id="team_name" name="team_name" value="{{ old('team_name') }}">
          <span class="error-message">
            @error('team_name')
            <p>{{ $message }}</p>
            @enderror
          </span>
        </div>

        <div class="input-control">
          <label class="label">Password</label>
          <input type="password" placeholder="Input your Password" class="input-field input-password" name="password" id="password">
          <span class="error-message">
            @error('password')
            <p>{{ $message }}</p>
            @enderror
          </span>
        </div>

        <div class="input-control">
          <label class="label">Confirm Password</label>
          <input type="password" placeholder="Confirm your Password" class="input-field input-confirm-password" id="password_confirmation" name="password_confirmation">
          <span class="error-message">
            @error('password_confirmation')
            <p>{{ $message }}</p>
            @enderror
          </span>
        </div>


        <button type="submit" class="button-submit">Submit</button>
      </form>

    </div>
  </div>

  <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>
