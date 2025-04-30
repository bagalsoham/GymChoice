@extends('layouts.main')

@section('title', 'Favorite Gyms')

@section('content')
<div class="dashboard-header d-flex justify-content-between align-items-center">
    <h2 class="mb-0"><i class="fas fa-heart me-2"></i> Favorite Gyms</h2>
    <div>
        <a href="{{ route('user.browse-gyms') }}" class="btn btn-purple">
            <i class="fas fa-search me-2"></i> Discover More Gyms
        </a>
    </div>
</div>

<div class="content-wrapper">
    <!-- Favorites Section -->
    @if(true) <!-- Replace with actual condition to check if user has favorites -->
        <div class="row">
            <!-- Favorite Gym Cards - This would be a loop in actual implementation -->
            @for ($i = 1; $i <= 6; $i++)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="position-relative">
                        <img src="https://source.unsplash.com/random/300x200/?gym,fitness&sig={{ $i + 20 }}" class="card-img-top" alt="Gym Image">
                        <button class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2" title="Remove from favorites">
                            <i class="fas fa-heart-broken"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0">FitChoice Gym {{ $i }}</h5>
                            <div class="text-warning">
                                @for ($j = 1; $j <= 5; $j++)
                                    <i class="fas fa-star{{ $j <= 4 ? '' : '-half-alt' }}"></i>
                                @endfor
                                <span class="text-light ms-1">(4.5)</span>
                            </div>
                        </div>
                        <p class="card-text text-secondary mb-1"><i class="fas fa-map-marker-alt me-2"></i> {{ 100 + $i }} Fitness Boulevard, City</p>
                        <p class="card-text text-secondary mb-2"><i class="fas fa-dumbbell me-2"></i> {{ ['Fitness Center', 'CrossFit Box', 'Yoga Studio', 'Boxing Gym'][$i % 4] }}</p>
                        
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            <span class="badge bg-secondary"><i class="fas fa-wifi me-1"></i> Wi-Fi</span>
                            <span class="badge bg-secondary"><i class="fas fa-shower me-1"></i> Shower</span>
                            <span class="badge bg-secondary"><i class="fas fa-swimming-pool me-1"></i> Pool</span>
                        </div>
                        
                        <p class="small text-secondary mb-3">
                            <i class="fas fa-clock me-1"></i> Last visited: {{ date('M d, Y', strtotime('-' . ($i * 3) . ' days')) }}
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-5 fw-bold text-success">${{ 40 + ($i * 5) }}<small class="fs-6 fw-normal">/month</small></span>
                            <div>
                                <a href="#" class="btn btn-sm btn-outline-light me-1" title="View gym details">
                                    <i class="fas fa-info-circle me-1"></i> Details
                                </a>
                                <a href="#" class="btn btn-sm btn-purple">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    @else
        <div class="text-center py-5">
            <div class="mb-4">
                <i class="fas fa-heart-broken text-secondary" style="font-size: 5rem;"></i>
            </div>
            <h3 class="mb-3">No Favorite Gyms Yet</h3>
            <p class="text-secondary mb-4">You haven't added any gyms to your favorites yet.</p>
            <a href="{{ route('user.browse-gyms') }}" class="btn btn-lg btn-purple">
                <i class="fas fa-search me-2"></i> Explore Gyms
            </a>
        </div>
    @endif

    <!-- Recently Viewed Section -->
    <div class="mt-5">
        <h4 class="mb-4"><i class="fas fa-history me-2"></i> Recently Viewed Gyms</h4>
        
        <div class="row">
            @for ($i = 1; $i <= 3; $i++)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="https://source.unsplash.com/random/150x150/?gym,fitness&sig={{ $i + 30 }}" 
                                class="img-fluid rounded-start" alt="Gym Image" 
                                style="height: 100%; object-fit: cover;">
                        </div>
                        <div class="col-8">
                            <div class="card-body py-2">
                                <h5 class="card-title">PowerGym {{ $i }}</h5>
                                <p class="card-text small text-secondary mb-1">
                                    <i class="fas fa-map-marker-alt me-1"></i> {{ 200 + $i }} Fitness Street
                                </p>
                                <div class="text-warning mb-2" style="font-size: 0.8rem;">
                                    @for ($j = 1; $j <= 5; $j++)
                                        <i class="fas fa-star{{ $j <= 4 ? '' : '-half-alt' }}"></i>
                                    @endfor
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <span class="text-success fw-bold">${{ 35 + ($i * 8) }}</span>
                                    <button class="btn btn-sm btn-outline-light" title="Add to favorites">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>
@endsection 