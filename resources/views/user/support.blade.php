@extends('layouts.main')

@section('title', 'Support')

@section('content')
<div class="dashboard-header d-flex justify-content-between align-items-center">
    <h2 class="mb-0"><i class="fas fa-headset me-2"></i> Support</h2>
</div>

<div class="content-wrapper">
    <div class="row">
        <!-- New Support Request Form -->
        <div class="col-lg-7 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-0">Create Support Request</h5>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data" class="mb-3">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" required placeholder="Brief description of your issue">
                        </div>
                        
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="" selected disabled>Select a category</option>
                                <option value="booking">Booking Issues</option>
                                <option value="payment">Payment Problems</option>
                                <option value="gym">Gym Related</option>
                                <option value="account">Account Access</option>
                                <option value="refund">Refund Request</option>
                                <option value="feedback">General Feedback</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="priority" class="form-label">Priority</label>
                            <select class="form-select" id="priority" name="priority" required>
                                <option value="low">Low</option>
                                <option value="medium" selected>Medium</option>
                                <option value="high">High</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="booking" class="form-label">Related Booking (Optional)</label>
                            <select class="form-select" id="booking" name="booking_id">
                                <option value="" selected>Not related to a booking</option>
                                <option value="1001">Booking #1001 - FitZone Gym (Nov 15, 2023)</option>
                                <option value="1002">Booking #1002 - PowerFit Gym (Dec 2, 2023)</option>
                                <option value="1003">Booking #1003 - CrossFit Box (Jan 10, 2024)</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="6" required placeholder="Describe your issue in detail..."></textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label for="attachments" class="form-label">Attachments (Optional)</label>
                            <input class="form-control" type="file" id="attachments" name="attachments[]" multiple>
                            <div class="form-text text-light">
                                You can upload multiple files (max 5MB each). Supported formats: PDF, JPG, PNG.
                            </div>
                        </div>
                        
                        <div class="text-end">
                            <button type="submit" class="btn btn-purple">
                                <i class="fas fa-paper-plane me-2"></i> Submit Request
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Support Information -->
        <div class="col-lg-5 mb-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Need Immediate Help?</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3 text-purple">
                            <i class="fas fa-phone-alt fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Call Support</h6>
                            <p class="mb-0">+1 (555) 123-4567</p>
                            <small class="text-secondary">Monday to Friday, 9 AM - 6 PM</small>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3 text-purple">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Email Support</h6>
                            <p class="mb-0">support@fitchoice.com</p>
                            <small class="text-secondary">We respond within 24 hours</small>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center">
                        <div class="me-3 text-purple">
                            <i class="fas fa-comments fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Live Chat</h6>
                            <p class="mb-0">
                                <button class="btn btn-sm btn-outline-light">
                                    <i class="fas fa-comment-dots me-2"></i> Start Chat
                                </button>
                            </p>
                            <small class="text-secondary">Available now</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">FAQs</h5>
                </div>
                <div class="card-body">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item bg-transparent border-0 mb-2">
                            <h2 class="accordion-header" id="faqHeadingOne">
                                <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="false" aria-controls="faqCollapseOne">
                                    How do I cancel a booking?
                                </button>
                            </h2>
                            <div id="faqCollapseOne" class="accordion-collapse collapse" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-secondary">
                                    To cancel a booking, go to My Bookings page, find the booking you wish to cancel, 
                                    and click the "Cancel" button. Cancellation policies may vary by gym.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item bg-transparent border-0 mb-2">
                            <h2 class="accordion-header" id="faqHeadingTwo">
                                <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                                    How do refunds work?
                                </button>
                            </h2>
                            <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-secondary">
                                    Refunds are processed according to each gym's policy. Generally, cancellations 
                                    made 24 hours before are eligible for full refunds. Later cancellations may receive 
                                    partial refunds.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item bg-transparent border-0">
                            <h2 class="accordion-header" id="faqHeadingThree">
                                <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                                    Can I change my membership plan?
                                </button>
                            </h2>
                            <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-secondary">
                                    Yes, you can change your membership plan at any time. Visit the gym details page 
                                    and select a new plan. Changes typically take effect at the next billing cycle.
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-3">
                        <a href="#" class="text-purple">View all FAQs <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- Previous Tickets -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Support Tickets</h5>
                    <a href="#" class="btn btn-sm btn-outline-light">View All</a>
                </div>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action bg-transparent text-light border-secondary d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1">Payment Failed for Booking #1002</h6>
                            <small class="text-secondary">
                                <i class="fas fa-clock me-1"></i> Created: Jan 15, 2024
                            </small>
                        </div>
                        <span class="badge bg-warning text-dark">Pending</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-transparent text-light border-secondary d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1">Request for Membership Cancellation</h6>
                            <small class="text-secondary">
                                <i class="fas fa-clock me-1"></i> Created: Dec 10, 2023
                            </small>
                        </div>
                        <span class="badge bg-success">Resolved</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-transparent text-light border-secondary d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1">Issue with Gym Amenities</h6>
                            <small class="text-secondary">
                                <i class="fas fa-clock me-1"></i> Created: Nov 28, 2023
                            </small>
                        </div>
                        <span class="badge bg-success">Resolved</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 