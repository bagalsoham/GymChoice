@extends('layouts.main')

@section('title', 'My Bookings')

@section('content')
<div class="dashboard-header d-flex justify-content-between align-items-center">
    <h2 class="mb-0"><i class="fas fa-calendar-check me-2"></i> My Bookings</h2>
    <div>
        <a href="{{ route('user.browse-gyms') }}" class="btn btn-purple">
            <i class="fas fa-plus me-2"></i> New Booking
        </a>
    </div>
</div>

<div class="content-wrapper">
    <!-- Booking Tabs -->
    <ul class="nav nav-tabs mb-4" id="bookingTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="active-tab" data-bs-toggle="tab" data-bs-target="#active-bookings" type="button" role="tab" aria-controls="active-bookings" aria-selected="true">
                <i class="fas fa-calendar-alt me-2"></i> Active Bookings
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="past-tab" data-bs-toggle="tab" data-bs-target="#past-bookings" type="button" role="tab" aria-controls="past-bookings" aria-selected="false">
                <i class="fas fa-history me-2"></i> Past Bookings
            </button>
        </li>
    </ul>
    
    <div class="tab-content" id="bookingTabsContent">
        <!-- Active Bookings Tab -->
        <div class="tab-pane fade show active" id="active-bookings" role="tabpanel" aria-labelledby="active-tab">
            @if(true) <!-- Replace with actual condition to check active bookings -->
                <div class="row">
                    <!-- Booking Cards - This would be a loop in actual implementation -->
                    @for ($i = 1; $i <= 3; $i++)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Booking #{{ 1000 + $i }}</h5>
                                <span class="badge bg-success">Active</span>
                            </div>
                            <div class="card-body">
                                <div class="d-flex mb-3">
                                    <img src="https://source.unsplash.com/random/80x80/?gym,fitness&sig={{ $i }}" class="rounded me-3" alt="Gym Image" style="width: 80px; height: 80px; object-fit: cover;">
                                    <div>
                                        <h5 class="card-title">FitZone Gym {{ $i }}</h5>
                                        <p class="text-secondary mb-1"><i class="fas fa-map-marker-alt me-2"></i> 123 Fitness Street, City</p>
                                        <div class="text-warning">
                                            @for ($j = 1; $j <= 5; $j++)
                                                <i class="fas fa-star{{ $j <= 4 ? '' : '-half-alt' }}"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-secondary"><i class="fas fa-clock me-2"></i> Plan:</span>
                                        <span>Monthly Unlimited Access</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-secondary"><i class="fas fa-calendar-alt me-2"></i> Start Date:</span>
                                        <span>{{ date('M d, Y', strtotime('+' . $i . ' days')) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-secondary"><i class="fas fa-calendar-alt me-2"></i> End Date:</span>
                                        <span>{{ date('M d, Y', strtotime('+' . ($i + 30) . ' days')) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-secondary"><i class="fas fa-money-bill-wave me-2"></i> Price:</span>
                                        <span class="text-success fw-bold">${{ 49 + ($i * 10) }}</span>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="#" class="btn btn-sm btn-outline-light">
                                        <i class="fas fa-building me-1"></i> View Gym
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#cancelBookingModal">
                                        <i class="fas fa-times-circle me-1"></i> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i> You don't have any active bookings. 
                    <a href="{{ route('user.browse-gyms') }}" class="alert-link">Find a gym</a> to make a booking.
                </div>
            @endif
        </div>
        
        <!-- Past Bookings Tab -->
        <div class="tab-pane fade" id="past-bookings" role="tabpanel" aria-labelledby="past-tab">
            @if(true) <!-- Replace with actual condition to check past bookings -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Gym</th>
                                <th>Plan</th>
                                <th>Dates</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 5; $i++)
                            <tr>
                                <td>#{{ 1000 - $i }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://source.unsplash.com/random/40x40/?gym,fitness&sig={{ $i + 10 }}" class="rounded me-2" alt="Gym Image" style="width: 40px; height: 40px; object-fit: cover;">
                                        <span>PowerFit Gym {{ $i }}</span>
                                    </div>
                                </td>
                                <td>{{ ['Monthly Access', 'Day Pass', 'Weekly Pass'][$i % 3] }}</td>
                                <td>{{ date('M d', strtotime('-' . ($i * 20) . ' days')) }} - {{ date('M d, Y', strtotime('-' . ($i * 10) . ' days')) }}</td>
                                <td>${{ 35 + ($i * 5) }}</td>
                                <td><span class="badge bg-secondary">Completed</span></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-purple" data-bs-toggle="modal" data-bs-target="#rateGymModal">
                                            <i class="fas fa-star me-1"></i> Rate
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-light">
                                            <i class="fas fa-redo me-1"></i> Rebook
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    <nav>
                        <ul class="pagination">
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
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i> You don't have any past bookings.
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Cancel Booking Modal -->
<div class="modal fade" id="cancelBookingModal" tabindex="-1" aria-labelledby="cancelBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelBookingModalLabel">Cancel Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to cancel this booking? Please review the cancellation policy:</p>
                <ul>
                    <li>Cancellations made 24 hours before the start date: 100% refund</li>
                    <li>Cancellations made within 24 hours: 50% refund</li>
                    <li>No refund for plans already in progress</li>
                </ul>
                <div class="form-group">
                    <label for="cancellationReason">Reason for cancellation (optional):</label>
                    <textarea class="form-control mt-2" id="cancellationReason" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Confirm Cancellation</button>
            </div>
        </div>
    </div>
</div>

<!-- Rate Gym Modal -->
<div class="modal fade" id="rateGymModal" tabindex="-1" aria-labelledby="rateGymModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rateGymModalLabel">Rate Your Experience</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <h4>PowerFit Gym</h4>
                    <div class="rating-stars fs-2 mb-3">
                        <i class="far fa-star rating-star" data-rating="1"></i>
                        <i class="far fa-star rating-star" data-rating="2"></i>
                        <i class="far fa-star rating-star" data-rating="3"></i>
                        <i class="far fa-star rating-star" data-rating="4"></i>
                        <i class="far fa-star rating-star" data-rating="5"></i>
                    </div>
                    <p class="selected-rating-text">Select your rating</p>
                </div>
                <div class="form-group">
                    <label for="reviewText">Write a review (optional):</label>
                    <textarea class="form-control mt-2" id="reviewText" rows="4" placeholder="Share your experience..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-purple">Submit Review</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Rating functionality
    const ratingStars = document.querySelectorAll('.rating-star');
    const ratingText = document.querySelector('.selected-rating-text');
    const ratingTexts = ['Poor', 'Fair', 'Good', 'Very Good', 'Excellent'];
    let selectedRating = 0;
    
    ratingStars.forEach(star => {
        star.addEventListener('mouseover', function() {
            const rating = parseInt(this.getAttribute('data-rating'));
            highlightStars(rating);
            ratingText.textContent = ratingTexts[rating-1];
        });
        
        star.addEventListener('mouseout', function() {
            highlightStars(selectedRating);
            ratingText.textContent = selectedRating > 0 ? ratingTexts[selectedRating-1] : 'Select your rating';
        });
        
        star.addEventListener('click', function() {
            selectedRating = parseInt(this.getAttribute('data-rating'));
            highlightStars(selectedRating);
            ratingText.textContent = ratingTexts[selectedRating-1];
        });
    });
    
    function highlightStars(count) {
        ratingStars.forEach((star, index) => {
            if (index < count) {
                star.classList.remove('far');
                star.classList.add('fas');
            } else {
                star.classList.remove('fas');
                star.classList.add('far');
            }
        });
    }
</script>
@endpush
@endsection 