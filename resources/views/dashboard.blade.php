<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="dashboard-container">
      <header class="navigation-header">
        <a href="{{ route('landing') }}">
            <img src="/storage/images/logo-hackathon.png" alt="Company Logo" class="logo" />
        </a>
        <nav class="nav-links">
            <a href="{{ route('landing') }}">HOME</a>
            <a href="{{ route('landing') }}#prizes">PRIZE</a>
            <a href="{{ route('landing') }}#mentors">MENTOR & JURY</a>
            <a href="{{ route('landing') }}#about">ABOUT</a>
            <a href="{{ route('landing') }}#faq">FAQ</a>
            <a href="{{ route('landing') }}#timeline">TIMELINE</a>
            <a href="{{ Auth::check() ? route('dashboard', Auth::id()) : route('getLogin') }}">DASHBOARD</a>
        </nav>
        <div class="auth-container">
            @if (Auth::check())
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="logout-btn">LOGOUT</button>
                </form>
            @else
                <button class="logout-btn" onclick="window.location.href='{{ route('getLogin') }}'">LOGIN</button>
            @endif
        </div>
     </header>
    </div>


    <main class="profile-section">
      <h1 class="team-title">{{ $user->team_name }}</h1>
      <div class="profile-content">
        <section class="profile-image-section">
            <div class="profile-grid">
                <div class="image-container">
                  @if(Str::endsWith($user->leader_card, ['.jpg', '.jpeg', '.png', '.gif']))
                  <img src="/storage/leader_card/{{$user->leader_card}}" alt="Team Leader Profile Photo" class="profile-image" />
                  @elseif(Str::endsWith($user->leader_card, '.pdf'))
                      <iframe src="/storage/leader_card/{{$user->leader_card}}" width="65%" height="500px"></iframe>
                  @else
                      <p>Unsupported file format</p>
                  @endif
                </div>
                <div class="button-container">
                    <button class="cv-button" onclick="viewCV('{{ asset('storage/leader_cv/' . $user->leader_cv) }}')">View CV</button>
                </div>
            </div>
        </section>



        <section class="profile-details">
          <div class="details-grid">
            <div class="personal-info">
              <div class="info-label">Leader Full Name :</div>
              <div class="info-value">{{ $user->leader_name }}</div>
              <div class="info-label">Email :</div>
              <div class="info-value">{{ $user->leader_email }}</div>

            </div>
            <div class="contact-info">
              <div class="info-label">Birthdate :</div>
              <div class="info-value">  {{ \Carbon\Carbon::parse($user->leader_birth_date)->format('d F Y') }}</div>
              <div class="info-label">Birthplace :</div>
              <div class="info-value">  {{ $user->leader_birth_place }}</div>
              <div class="info-label">Whatsapp :</div>
              <div class="info-value"> {{ $user->leader_whatsapp }}</div>
            </div>
          </div>
          <div class="github-section">
            <div class="info-label">GitHub :</div>
            <div class="info-value"> {{ $user->leader_github }}</div>
          </div>
        </section>
      </div>
    </main>

    <div style="width: 100%; height: 920px; position: relative" class="timeline-container">
      <div style="width: 100%; height: 920px; left: 0px; top: 0px; position: absolute; background: #306B8F;">
        <div style="width: 62px; height: 61px; left: 148px; top: 598px; position: absolute; background: #D9D9D9; border-radius: 9999px"></div>
        <div style="width: 62px; height: 61px; left: 1256px; top: 279px; position: absolute; background: #D9D9D9; border-radius: 9999px"></div>
        <div style="width: 62px; height: 61px; left: 838px; top: 694px; position: absolute; background: #D9D9D9; border-radius: 9999px"></div>
        <div style="width: 62px; height: 61px; left: 469px; top: 340px; position: absolute; background: #D9D9D9; border-radius: 9999px"></div>
        <div style="width: 324.01px; height: 0px; left: 198px; top: 593px; position: absolute; transform: rotate(-36.34deg); transform-origin: 0 0; border: 2px white solid"></div>
        <div style="width: 413.07px; height: 0px; left: 521px; top: 409px; position: absolute; transform: rotate(43.63deg); transform-origin: 0 0; border: 2px white solid"></div>
        <div style="width: 477.39px; height: 0px; left: 912px; top: 686px; position: absolute; transform: rotate(-43.90deg); transform-origin: 0 0; border: 2px white solid"></div>
        <div style="left: 87px; top: 667px; position: absolute; text-align: center; color: white; font-size: 20px; font-family: Poppins; font-weight: 600; line-height: 40px; word-wrap: break-word">Open Registration<br/>30 May</div>
        <div style="left: 407px; top: 252px; position: absolute; text-align: center; color: white; font-size: 20px; font-family: Poppins; font-weight: 600; line-height: 40px; word-wrap: break-word">Close Registration<br/>11 June</div>
        <div style="left: 775px; top: 763px; position: absolute; text-align: center; color: white; font-size: 20px; font-family: Poppins; font-weight: 600; line-height: 40px; word-wrap: break-word">Technical Meeting<br/>12 June</div>
        <div style="left: 1188px; top: 184px; position: absolute; text-align: center; color: white; font-size: 20px; font-family: Poppins; font-weight: 600; line-height: 40px; word-wrap: break-word">COMPETITION DAY!!<br/>14 - 16 June</div>
      </div>
      <div style="width: 361px; height: 65px; left: 131px; top: 55px; position: absolute; text-align: center; color: white; font-size: 80px; font-family: Poppins; font-weight: 700; line-height: 40px; word-wrap: break-word">TIMELINE</div>
    </div>

    <div class="footer-container">
      <h1 class="footer-title">Contacts</h1>
      <div class="phone">
        <img src="/storage/images/whatsapp pic.png" alt="phone" class="footer-pic">
        <p class="contact-people">Contact Person 1 - 08xxxx</p>
        <p class="contact-people">Contact Person 2 - 08xxxx</p>
        <p class="contact-people">Contact Person 3 - 08xxxx</p>

      </div>
      <div class="insta">
        <a href="https://www.instagram.com/technoscapebncc/" target="_blank">
          <img src="/storage/images/insta pic.png" alt="instagram" class="footer-pic">
        </a>
        <p class="insta-techno">@technoscapebncc</p>
      </div>
  </div>
  <script>
    function viewCV(filePath) {
    window.open(filePath, '_blank');
  }
  </script>
</body>
</html>

