<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Team</title>
    <link rel="stylesheet" href="{{ asset('css/admin-edit.css') }}">
    <style>
        body {
            background-color: #525D65;
            color: white;
            font-family: 'Poppins', sans-serif;
        }
        .container h1 {
            text-align: center;
            font-size: 48px;
        }
        .form-group label {
            font-size: 24px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 10px;
            border: 2px solid #000;
            background-color: #D9D9D9;
            color: black;
            font-size: 18px;
        }
        .btn-primary {
            background-color: #6D93AA;
            border: none;
            padding: 15px 30px;
            font-size: 20px;
            border-radius: 10px;
            cursor: pointer;
            color: white;
        }
        .buttons-section {
            background-color: #306B8F;
            text-align: center;
            padding: 30px 0;
        }
        .delete-all-button, .save-button {
            font-size: 20px;
            padding: 15px 50px;
            border-radius: 60px;
            cursor: pointer;
            border: 2px solid black;
        }
        .delete-all-button {
            background-color: red;
            color: white;
        }
        .save-button {
            background-color: #D9D9D9;
            color: black;
        }
    </style>
</head>
<body>
    <div class="header-bar">
        <div class="header-left">
            <a href="{{ route('landing') }}">
                <img src="/storage/images/logo hackathon.png" class="logo" alt="Hackathon Logo" />
            </a>
            <a href="{{ route('admin.index') }}" style="text-decoration: none;">
            <div class="header-title" role="heading" aria-level="1">Admin Panel</div>
            </a>
        </div>
        <button class="logout-btn" onclick="window.location.href='log_in.html'">LOGOUT</button>
    </div>

    <main class="profile-section">
        <div class="container">
            <h1>Edit Team</h1>
            <form id="update-form" action="{{ route('admin.update', $team->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="team_name">Team Name</label>
                    <input type="text" id="team_name" name="team_name" value="{{ $team->team_name }}" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="leader_name">Leader Name</label>
                    <input type="text" id="leader_name" name="leader_name" value="{{ $team->leader_name }}" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="leader_email">Leader Email</label>
                    <input type="email" id="leader_email" name="leader_email" value="{{ $team->leader_email }}" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="leader_whatsapp">Leader WhatsApp</label>
                    <input type="text" id="leader_whatsapp" name="leader_whatsapp" value="{{ $team->leader_whatsapp }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="leader_github">Leader GitHub</label>
                    <input type="text" id="leader_github" name="leader_github" value="{{ $team->leader_github }}">
                </div>
                <br>
                <button type="submit" class="btn-primary">Update Team</button>
            </form>
        </div>
    </main>

</html>