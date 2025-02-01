<form action="{{ route('admin.update', $team->id) }}" method="POST">
    @csrf
    @method('PUT')

   
    <div class="form-group">
        <label for="team_name">Team Name</label>
        <input type="text" class="form-control" name="team_name" value="{{ $team->team_name }}" required>
    </div>

    <div class="form-group">
        <label for="leader_name">Leader Name</label>
        <input type="text" class="form-control" name="leader_name" value="{{ $team->leader_name }}" required>
    </div>

    <div class="form-group">
        <label for="leader_email">Leader Email</label>
        <input type="email" class="form-control" name="leader_email" value="{{ $team->leader_email }}" required>
    </div>

    <div class="form-group">
        <label for="leader_whatsapp">Leader WhatsApp</label>
        <input type="text" class="form-control" name="leader_whatsapp" value="{{ $team->leader_whatsapp }}" required>
    </div>

    <div class="form-group">
        <label for="leader_github">Leader GitHub</label>
        <input type="text" class="form-control" name="leader_github" value="{{ $team->leader_github }}" required>
    </div>

    <!-- Add more fields as necessary -->

    <button type="submit" class="btn btn-primary">Update Team</button>
</form>
