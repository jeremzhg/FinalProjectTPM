<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css') }}">
</head>
<body>
    <div class="admin-container">
        <div class="header-bar">
            <div class="header-left">
                <a href="{{ route('landing') }}">
                    <img src="/storage/images/logo hackathon.png" class="logo" alt="Hackathon Logo" />
                </a>
                <div class="header-title" role="heading" aria-level="1">Admin Panel</div>
            </div>
            <button class="logout-btn" onclick="window.location.href='{{ route('logout') }}'">LOGOUT</button>
        </div>

        <div class="page-title" role="heading" aria-level="2">TEAMS</div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" action="{{ route('admin.index') }}" class="search-sort-form">
            <input type="text" name="search" value="{{ old('search', $search) }}" class="search-input" placeholder="Search by team name">
            <select name="sort" class="sort-select">
                <option value="name_asc" {{ $sort === 'name_asc' ? 'selected' : '' }}>Sort by Name (A-Z)</option>
                <option value="name_desc" {{ $sort === 'name_desc' ? 'selected' : '' }}>Sort by Name (Z-A)</option>
                <option value="date_newest" {{ $sort === 'date_newest' ? 'selected' : '' }}>Sort by Newest Registration</option>
                <option value="date_oldest" {{ $sort === 'date_oldest' ? 'selected' : '' }}>Sort by Oldest Registration</option>
            </select>
            <button type="submit" class="btn-search">Search and Sort</button>
        </form>

        <div class="teams-grid">
            @foreach($teams as $team)
                <div class="team-card">
                    @if(Str::endsWith($team->leader_card, ['.jpg', '.jpeg', '.png', '.gif']))
                        <img loading="lazy" src="/storage/leader_card/{{$team->leader_card}}" class="team-image" alt="{{ $team->leader_name }} Profile">
                    @elseif(Str::endsWith($team->leader_card, '.pdf'))
                        <iframe src="/storage/leader_card/{{$team->leader_card}}" width="65%" height="500px"></iframe>
                    @else
                        <p>Unsupported file format</p>
                    @endif

                    <div class="team-leader">{{ $team->leader_name }}</div>
                    <div class="team-name">{{ $team->team_name }}</div>
                    <div class="button-group">
                        <a href="{{ route('admin.show', $team->id) }}" class="view-btn">View</a>
                        <a href="{{ route('admin.edit', $team->id) }}" class="view-btn">Edit</a>
                        <form action="{{ route('admin.destroy', $team->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="view-btn">Delete</button>
                        </form>
                    </div>
                </div>
                <br>
            @endforeach
        </div>

        {{ $teams->links() }}
    </div>
</body>
</html>
