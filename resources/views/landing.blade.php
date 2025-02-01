<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HACKATHON</title>
  <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>

<div class="landing-container"></div>
  <header class="landing-page">
    <img src="/storage/images/logo-hackathon.png" alt="Company Logo" class="logo" />
    <nav>
        <ul>
            <li><a href="#home">HOME</a></li>
            <li><a href="#prizes">PRIZE</a></li>
            <li><a href="#mentors">MENTOR & JURY</a></li>
            <li><a href="#about">ABOUT</a></li>
            <li><a href="#faq">FAQ</a></li>
            <li><a href="#timeline">TIMELINE</a></li>
            <li><a href="{{ Auth::check() ? route('dashboard', Auth::id()) : route('getLogin') }}">DASHBOARD</a>
        </ul>
    </nav>
    <div class="auth-container">
        @if (Auth::check())
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="login-btn">LOGOUT</button>
            </form>
        @else
            <button class="login-btn" onclick="window.location.href='{{ route('getLogin') }}'">LOGIN</button>
        @endif
    </div>


  </header>

  <section id="home" class="hero">
    <div class="overlay"></div>
    <div class="content">
        <h1>HACKATHON</h1>
        <p class="subtitle">Code the Future, One Idea at a Time</p>
        <p class="description">
            Unleash your creativity and problem-solving skills in an intense coding marathon.<br>
            Collaborate, innovate, and bring groundbreaking ideas to life!
        </p>
        <p class="coming-soon">COMING SOON 2025</p>
    </div>
  </section>


  <section id="prizes" class="prizes">
    <div class="prizes-bg-1">Champion Prizes</div>
    <div class="prizes-bg-2">Champion Prizes</div>
    <div class="prizes-bg-3">Champion Prizes</div>
    <div class="prizes-bg-4">Champion Prizes</div>
    <div class="prize-cards">
      <div class="prizes-container">
        <div class="container-pertama second-place">
          <div class="container-kedua">
              <h1 class="prize-rank">2</h1>
              <p class="prize-detail">• Rp4.500.000</p>
              <p class="prize-detail">• Certificate</p>
              <p class="prize-detail">• Merchandise</p>
          </div>
      </div>
      <div class="container-pertama first-place">
          <div class="container-kedua">
              <h1 class="prize-rank">1</h1>
              <p class="prize-detail">• Rp8.500.000</p>
              <p class="prize-detail">• Certificate</p>
              <p class="prize-detail">• Merchandise</p>
          </div>
      </div>
      <div class="container-pertama third-place">
          <div class="container-kedua">
              <h1 class="prize-rank">3</h1>
              <p class="prize-detail">• Rp2.500.000</p>
              <p class="prize-detail">• Certificate</p>
              <p class="prize-detail">• Merchandise</p>
          </div>
      </div>
    </div>
    </div>
</section>


<section id="mentors" class="mentors-juries">

  <div class="title-container mentors-title">
      <h2>Mentors</h2>
  </div>


  <div class="profiles mentors-container">
      <div class="profile-card">
          <img src="/storage/images/ari-pasma.jpeg" alt="Ari Pasma">
          <div class="profile-info">
              <p class="name">Ari Pasma</p>
              <p class="position">UI/UX Designer at CIMB Niaga</p>
          </div>
      </div>
      <div class="profile-card">
          <img src="/storage/images/gagaz.jpeg" alt="Gagaz Manqunazara">
          <div class="profile-info">
              <p class="name">Gagaz Manqunazara</p>
              <p class="position">Software Engineer at Grab</p>
          </div>
      </div>
      <div class="profile-card">
          <img src="/storage/images/felix-indra.png" alt="Felix Indra">
          <div class="profile-info">
              <p class="name">Felix Indra</p>
              <p class="position">Lecture Specialist S2 at BINUS</p>
          </div>
      </div>
  </div>


  <div class="title-container juries-title">
      <h2>Juries</h2>
  </div>


  <div class="profiles juries-container">
      <div class="profile-card">
          <img src="/storage/images/dustin-rinaldy.jpeg" alt="Dustin Rinaldy Wolff">
          <div class="profile-info">
              <p class="name">Dustin Rinaldy Wolff</p>
              <p class="position">ACM at Teleperformance</p>
          </div>
      </div>
      <div class="profile-card">
          <img src="/storage/images/norman-sasono.jpeg" alt="Norman Sasono">
          <div class="profile-info">
              <p class="name">Norman Sasono</p>
              <p class="position">CTO at DANA Indonesia</p>
          </div>
      </div>
      <div class="profile-card">
          <img src="/storage/images/fadly-mahendra.jpeg" alt="Fadly Mahendra">
          <div class="profile-info">
              <p class="name">Fadly Mahendra</p>
              <p class="position">Senior TA at Bukalapak</p>
          </div>
      </div>
  </div>
</section>


<section id="about" class="about-section">
  <h2 class="about-title">About Hackathon</h2>
  <div class="about-container">
      <p class="about-text">
          A hackathon is a collaborative event where participants create innovative technology solutions,
          often within a limited time, fostering creativity and teamwork.
      </p>
      <button class="regist-button" onclick="window.location.href='{{ route('getRegister') }}'">Register Now!</button>
  </div>
</section>


<section id="faq" class="faq-section">
  <h2 class="faq-title">Frequently Asked Questions</h2>
  <div class="faq-container">
      <div class="faq-item">
          <p class="faq-question">Apa saja persyaratan untuk berpartisipasi di Hackathon?</p>
          <span class="faq-icon">+</span>
      </div>
      <div class="faq-item">
          <p class="faq-question">Apakah hackathon gratis?</p>
          <span class="faq-icon">+</span>
      </div>
      <div class="faq-item">
          <p class="faq-question">Kapan batas waktu pendaftaran?</p>
          <span class="faq-icon">+</span>
      </div>
      <div class="faq-item">
          <p class="faq-question">Berapa jumlah anggota dalam satu tim?</p>
          <span class="faq-icon">+</span>
      </div>
      <div class="faq-item">
          <p class="faq-question">Apakah diperbolehkan adanya pergantian anggota tim?</p>
          <span class="faq-icon">+</span>
      </div>
      <div class="faq-item">
          <p class="faq-question">Bisakah saya bergabung dengan lebih dari satu tim?</p>
          <span class="faq-icon">+</span>
      </div>
  </div>
</section>


  <section id="timeline"></section>
  <div style="width: 100%; height: 920px; position: relative" class="timeline-container">
    <div style="width: 100%; height: 920px; left: 0px; top: 0px; position: absolute; background: #000000;">
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

  <body>

    <div class="media-partner-section">
        <div class="container">

            <div class="partner-section">
                <img src="/storage/images/binus-himtek.png" alt="Binus Himtek">
                <img src="/storage/images/yuk-coding.png" alt="YukCoding">
                <img src="/storage/images/binus-english.png" alt="Binus English Club">
                <img src="/storage/images/filemagz.png" alt="Filemagz">
            </div>

            <div class="title-section">
                <h1>Media Partner</h1>
            </div>


            <div class="partner-section">
                <img src="/storage/images/detikcom.png" alt="Detikcom">
                <img src="/storage/images/hardrock.png" alt="Hard Rock FM">
                <img src="/storage/images/digital-skola.png" alt="Digital Skola">
                <img src="/storage/images/atds.png" alt="ATDS IT Center">
            </div>
        </div>
    </div>
</body>


<section id="contact" class="contact-section">
    <h1>Contact Us!</h1>
    <form class="contact-form" action="{{ route('sendEmail') }}" method="POST">
        @csrf
        <div class="input-row">
            <input type="text" placeholder="Input Name" class="input-box" id="name"name="name" required>
            <input type="email" placeholder="Input Email Address" class="input-box" id="email" name="email" required>
        </div>
        <input type="text" placeholder="Input Subject" class="input-box full-width" id="subject" name="subject" required>
        <textarea placeholder="Input Message....." class="input-box message-box" id="message" name="message" required></textarea>
        <button type="submit" class="send-button">Send Message</button>
    </form>
</section>


<section class="social-section">
  <div class="title">Our Social Media</div>
  <div class="social-container">
      <div class="social-item instagram">
          <a href="https://www.instagram.com/technoscapebncc/" target="_blank">
            <img src="/storage/images/Instagram.png" alt="Instagram" class="social-logo">
          </a>
          <span class="social-name">@technoscapebncc</span>
      </div>
      <div class="social-item email">
          <a href="mailto:technoevent@bncc.net" target="_blank">
            <img src="/storage/images/Email.png" alt="Email" class="social-logo">
          </a>
          <span class="social-name">technoevent@bncc.net</span>
      </div>
      <div class="social-item facebook">
          <a href="https://www.facebook.com/bina.nusantara.computer.club/" target="_blank">
            <img src="/storage/images/Facebook.png" alt="Facebook" class="social-logo">
          </a>
          <span class="social-name">technoscapebncc</span>
      </div>
      <div class="social-item linkedin">
          <a href="https://www.linkedin.com/company/bnccbinus/" target="_blank">
            <img src="/storage/images/Linkedin.png" alt="LinkedIn" class="social-logo">
          </a>
          <span class="social-name">technoscapebncc</span>
      </div>
      <div class="social-item twitter">
          <a href="https://x.com/BNCC_Binus" target="_blank">
            <img src="/storage/images/Twitter.png" alt="Twitter" class="social-logo">
          </a>
          <span class="social-name">@BNCC_Binus</span>
      </div>
  </div>
</section>

<footer>
  <div class="footer-title">Powered & Organized By:</div>
  <div class="footer-container">
      <div class="footer-logo">
          <img src="/storage/images/bncc.png" alt="BNCC Logo">
          <img src="/storage/images/filemagz.png" alt="Filemagz Logo">
      </div>
      <div class="footer-right-container">
          <p>All Rights Reserved BNCC 2024, <br>Bina Nusantara Computer Club</p>
      </div>
  </div>
</footer>
  <script src="{{ asset('js/landing.js') }}"></script>
</body>
</html>
