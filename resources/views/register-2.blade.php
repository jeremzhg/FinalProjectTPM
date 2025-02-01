<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Binusian Registration</title>
  <link rel="stylesheet" href="{{ asset('css/register-2.css') }}">
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


      <form id="register-form" action="{{ route('registerStep2') }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div>


        <label class="label label-leader-name">Leader Full Name</label>
        <input type="text" placeholder="Input your Leader Full Name" class="input-field input-leader-name" id="leader_name"name="leader_name" value="{{ old('leader_name') }}">


        <label class="label label-email">Email</label>
        <input id="leader_email" type="email" name="leader_email" value="{{ old('leader_email') }}" placeholder="Input your Email Address" class="input-field input-email">


        <label class="label label-member-one">Member 1</label>
        <input input id="member_1" type="text" name="member_1" value="{{ old('member_1') }}" placeholder="Input member 1 name" class="input-field input-member-one">


        <label class="label label-email-one">Member 1 Email</label>
        <input id="member_1_email" type="email" name="member_1_email" value="{{ old('member_1_email') }}" placeholder="Input member 1 Email Address" class="input-field input-email-one">


        <label class="label label-member-two">Member 2</label>
        <input id="member_2" type="text" name="member_2" value="{{ old('member_2') }}" placeholder="Input member 2 name" class="input-field input-member-two">


        <label class="label label-email-two">Member 2 Email</label>
        <input id="member_2_email" type="email" name="member_2_email" value="{{ old('member_2_email') }}" placeholder="Input member 2 Email Address" class="input-field input-email-two">


        <label class="label label-member-three">Member 3</label>
        <input id="member_3" type="text" name="member_3" value="{{ old('member_3') }}" placeholder="Input member 3 name" class="input-field input-member-three">


        <label class="label label-email-three">Member 3 Email</label>
        <input id="member_3_email" type="email" name="member_3_email" value="{{ old('member_3_email') }}" placeholder="Input member 3 Email Address" class="input-field input-email-three">



        <label class="label label-whatsapp">Leader Whatsapp Number</label>
        <input id="leader_whatsapp" type="text" name="leader_whatsapp" value="{{ old('leader_whatsapp') }}" placeholder="Input your Whatsapp Number" class="input-field input-whatsapp">


        <label class="label label-line-id">Leader Line ID</label>
        <input id="leader_line" type="text" name="leader_line" value="{{ old('leader_line') }}" placeholder="Input your Line ID" class="input-field input-line-id">


        <label class="label label-github">Github/ Gitlab ID</label>
        <input id="leader_github" type="text" name="leader_github" value="{{ old('leader_github') }}" placeholder="Input your Github/ Gitlab ID" class="input-field input-github">



        <label class="label label-birth-place">Leader Birth Place</label>
        <input id="leader_birth_place" type="text" name="leader_birth_place" value="{{ old('leader_birth_place') }}" placeholder="Input your Birth Place (ex: Jakarta)" class="input-field input-birth-place">

        <label class="label label-birth-date">Leader Birth Date</label>
        <input id="leader_birth_date" type="date" name="leader_birth_date" value="{{ old('leader_birth_date') }}"  placeholder="Input your Birth Date (dd-mm-yyyy)"class="input-field input-birth-date">



        <label class="label label-upload-cv">Upload CV</label>
        <div class="upload-cv-container">
            <input type="text" class="input-field upload-field" placeholder="Upload your CV (.PDF)" readonly>
            <input id="upload_cv" name="leader_cv" type="file" class="file-upload" accept=".pdf">
            <label for="upload_cv" class="upload-button">Upload</label>
        </div>

        <div class="error-message-container" id="upload_cv_error"></div>

        <div class="radio-group">
            <input type="radio" id="binusian" class="radio-binusian" name="status" value="0" {{ old('status') == 0 ? 'checked' : '' }}>
            <label for="binusian" class="label-radio">Binusian</label>
            <input type="radio" id="non-binusian" class="radio-non-binusian" name="status" value="1" {{ old('status') == 1 ? 'checked' : '' }}>
            <label for="non-binusian" class="label-radio">Non-Binusian</label>
        </div>


        <button class="button-register">Register</button>


        <label class="label label-upload-flazz" id="upload-label">Upload FLAZZ Card (Leader Only)</label>
        <div class="upload-flazz-container">
            <input type="text" class="input-field upload-field" placeholder="Upload your Card Here" readonly>
            <input type="file" class="file-upload" name="leader_card" id="upload-flazz" accept=".pdf,.jpg,.jpeg,.png">
            <label for="upload-flazz" class="upload-button">Upload</label>
        </div>

        <div class="error-message-container" id="upload_flazz_error"></div>
    </div>
  </div>
</form>

  <script src="{{ asset('js/register-2.js') }}"></script>

</body>
</html>




