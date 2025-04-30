@extends('layouts.main')

@section('title', 'Browse Gyms')

@section('content')
<div class="dashboard-header d-flex justify-content-between align-items-center">
    <h2 class="mb-0"><i class="fas fa-dumbbell me-2"></i> Browse Gyms</h2>
</div>

<div class="content-wrapper">
    <!-- Smart Search Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-search me-2"></i> Smart Search</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('user.browse-gyms') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="search" class="form-label">Gym Name or Keywords</label>
                    <input type="text" class="form-control" id="search" name="search" placeholder="Search by gym name..." value="{{ request('search') }}">
                </div>
                
                <div class="col-md-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="City, Neighborhood..." value="{{ request('location') }}">
                </div>
                
                <div class="col-md-3">
                    <label for="radius" class="form-label">Distance (km)</label>
                    <select class="form-select" id="radius" name="radius">
                        <option value="5" {{ request('radius') == 5 ? 'selected' : '' }}>5 km</option>
                        <option value="10" {{ request('radius') == 10 ? 'selected' : '' }}>10 km</option>
                        <option value="20" {{ request('radius') == 20 ? 'selected' : '' }}>20 km</option>
                        <option value="50" {{ request('radius') == 50 ? 'selected' : '' }}>50 km</option>
                    </select>
                </div>
                
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-purple w-100"><i class="fas fa-search me-2"></i> Search</button>
                </div>
                
                <!-- Collapsible Advanced Filters -->
                <div class="col-12 mt-2">
                    <a class="text-decoration-none" data-bs-toggle="collapse" href="#advancedFilters" role="button" aria-expanded="false">
                        <i class="fas fa-sliders-h me-1"></i> Advanced Filters
                    </a>
                </div>
                
                <div class="collapse mt-3" id="advancedFilters">
                    <div class="row g-3">
                        <div class="col-12">
                            <h6 class="text-light">Amenities</h6>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="parking" name="amenities[]" value="parking" {{ in_array('parking', request('amenities', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="parking">Parking</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="shower" name="amenities[]" value="shower" {{ in_array('shower', request('amenities', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="shower">Shower</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wifi" name="amenities[]" value="wifi" {{ in_array('wifi', request('amenities', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="wifi">Wi-Fi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="lockers" name="amenities[]" value="lockers" {{ in_array('lockers', request('amenities', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="lockers">Lockers</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="trainer" name="amenities[]" value="trainer" {{ in_array('trainer', request('amenities', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="trainer">Personal Trainers</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="pool" name="amenities[]" value="pool" {{ in_array('pool', request('amenities', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="pool">Swimming Pool</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sauna" name="amenities[]" value="sauna" {{ in_array('sauna', request('amenities', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="sauna">Sauna</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="daycare" name="amenities[]" value="daycare" {{ in_array('daycare', request('amenities', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="daycare">Childcare</label>
                            </div>
                        </div>
                        
                        <div class="col-12 mt-3">
                            <h6 class="text-light">Price Range</h6>
                            <div class="range-slider">
                                <input type="range" class="form-range" id="priceRange" name="price_range" min="0" max="1000" step="50" value="{{ request('price_range', 500) }}">
                                <div class="d-flex justify-content-between">
                                    <span>$0</span>
                                    <span id="priceValue">${{ request('price_range', 500) }}</span>
                                    <span>$1000+</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <label for="sortBy" class="form-label">Sort By</label>
                            <select class="form-select" id="sortBy" name="sort_by">
                                <option value="distance" {{ request('sort_by') == 'distance' ? 'selected' : '' }}>Distance</option>
                                <option value="rating" {{ request('sort_by') == 'rating' ? 'selected' : '' }}>Rating</option>
                                <option value="price_low" {{ request('sort_by') == 'price_low' ? 'selected' : '' }}>Price (Low to High)</option>
                                <option value="price_high" {{ request('sort_by') == 'price_high' ? 'selected' : '' }}>Price (High to Low)</option>
                            </select>
                        </div>
                        
                        <div class="col-md-4">
                            <label for="gymType" class="form-label">Gym Type</label>
                            <select class="form-select" id="gymType" name="gym_type">
                                <option value="">All Types</option>
                                <option value="fitness" {{ request('gym_type') == 'fitness' ? 'selected' : '' }}>Fitness Center</option>
                                <option value="crossfit" {{ request('gym_type') == 'crossfit' ? 'selected' : '' }}>CrossFit</option>
                                <option value="yoga" {{ request('gym_type') == 'yoga' ? 'selected' : '' }}>Yoga Studio</option>
                                <option value="boxing" {{ request('gym_type') == 'boxing' ? 'selected' : '' }}>Boxing</option>
                                <option value="martial" {{ request('gym_type') == 'martial' ? 'selected' : '' }}>Martial Arts</option>
                            </select>
                        </div>
                        
                        <div class="col-md-4">
                            <label for="rating" class="form-label">Minimum Rating</label>
                            <select class="form-select" id="rating" name="rating">
                                <option value="0" {{ request('rating') == '0' ? 'selected' : '' }}>Any Rating</option>
                                <option value="3" {{ request('rating') == '3' ? 'selected' : '' }}>3+ Stars</option>
                                <option value="4" {{ request('rating') == '4' ? 'selected' : '' }}>4+ Stars</option>
                                <option value="5" {{ request('rating') == '5' ? 'selected' : '' }}>5 Stars</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Results Section -->
    <div class="row">
        <div class="col-12 mb-3">
            <h4 class="text-light">
                <i class="fas fa-list me-2"></i> Search Results
                <small class="text-secondary">(Showing 10 of 24 gyms)</small>
            </h4>
        </div>
        
        <!-- Gym Cards - This would be a loop in actual implementation -->
        @for ($i = 1; $i <= 6; $i++)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <img src="https://source.unsplash.com/random/300x200/?gym,fitness&sig={{ $i }}" class="card-img-top" alt="Gym Image">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="card-title mb-0">FitZone Gym {{ $i }}</h5>
                        <div class="text-warning">
                            @for ($j = 1; $j <= 5; $j++)
                                <i class="fas fa-star{{ $j <= 4 ? '' : '-half-alt' }}"></i>
                            @endfor
                            <span class="text-light ms-1">(4.5)</span>
                        </div>
                    </div>
                    <p class="card-text text-secondary mb-1"><i class="fas fa-map-marker-alt me-2"></i> 123 Fitness Street, City</p>
                    <p class="card-text text-secondary mb-2"><i class="fas fa-dumbbell me-2"></i> Fitness Center</p>
                    
                    <div class="d-flex flex-wrap gap-1 mb-3">
                        <span class="badge bg-secondary"><i class="fas fa-parking me-1"></i> Parking</span>
                        <span class="badge bg-secondary"><i class="fas fa-shower me-1"></i> Shower</span>
                        <span class="badge bg-secondary"><i class="fas fa-wifi me-1"></i> Wi-Fi</span>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fs-5 fw-bold text-success">$49<small class="fs-6 fw-normal">/month</small></span>
                        <div>
                            <button class="btn btn-sm btn-outline-light me-1" title="Add to favorites">
                                <i class="far fa-heart"></i>
                            </button>
                            <a href="#" class="btn btn-sm btn-purple">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor
        
        <!-- Pagination -->
        <div class="col-12 mt-3">
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Price Range Slider
    const priceSlider = document.getElementById('priceRange');
    const priceValue = document.getElementById('priceValue');
    
    priceSlider.addEventListener('input', function() {
        priceValue.textContent = '$' + this.value;
    });
</script>
@endpush
@endsection 