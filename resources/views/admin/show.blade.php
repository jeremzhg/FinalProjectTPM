<!-- resources/views/admin/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin-view.css') }}">
    <title>View Team</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')

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

    <div class="container">
        <h1>Team Details</h1>
        <table class="table">
            <tr>
                <th>Team Name</th>
                <td>{{ $team->team_name }}</td>
            </tr>
            <tr>
                <th>Leader Name</th>
                <td>{{ $team->leader_name }}</td>
            </tr>
            <tr>
                <th>Leader Email</th>
                <td>{{ $team->leader_email }}</td>
            </tr>
            <tr>
                <th>Leader WhatsApp</th>
                <td>{{ $team->leader_whatsapp }}</td>
            </tr>
            <tr>
                <th>Leader GitHub</th>
                <td>{{ $team->leader_github }}</td>
            </tr>
            <tr>
                <th>Team Members</th>
                <td>
                    {{ collect([$team->member_1, $team->member_2, $team->member_3])->filter()->implode(', ') }}
                </td>
            </tr>
        </table>

        <a href="{{ route('admin.edit', $team->id) }}" class="btn btn-warning">Edit Team</a>
    </div>
    @endsection
</body>
</html>
