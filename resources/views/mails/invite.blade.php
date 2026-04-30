<li class="list-group-item p-4 border-start border-4 border-success shadow-sm mb-3 rounded">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h6 class="fw-bold mb-1 text-dark">Project Invitation</h6>
            <p class="text-muted mb-0">
                You have been invited to join the project: <strong>{{ $projectName }}</strong> 
            </p>
        </div>
        <div class="bg-light p-2 rounded-circle">
            <i class="fas fa-envelope-open-text text-success"></i>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('invites.acceptRequest', $projectId) }}" 
           class="btn btn-success px-4 py-2 shadow-sm d-inline-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i> Accept & Join Project 
        </a>
    </div>
</li>