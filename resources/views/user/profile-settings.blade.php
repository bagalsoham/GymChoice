@extends('layouts.main')

@section('title', 'Profile Settings')

@section('content')
<div class="dashboard-header d-flex justify-content-between align-items-center">
    <h2 class="mb-0"><i class="fas fa-user-cog me-2"></i> Profile Settings</h2>
</div>

<div class="content-wrapper">
    <!-- Settings Tabs -->
    <ul class="nav nav-tabs mb-4" id="settingsTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-settings" type="button" role="tab" aria-controls="profile-settings" aria-selected="true">
                <i class="fas fa-user me-2"></i> Profile
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security-settings" type="button" role="tab" aria-controls="security-settings" aria-selected="false">
                <i class="fas fa-shield-alt me-2"></i> Security
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="preferences-tab" data-bs-toggle="tab" data-bs-target="#preferences-settings" type="button" role="tab" aria-controls="preferences-settings" aria-selected="false">
                <i class="fas fa-sliders-h me-2"></i> Preferences
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="notifications-tab" data-bs-toggle="tab" data-bs-target="#notifications-settings" type="button" role="tab" aria-controls="notifications-settings" aria-selected="false">
                <i class="fas fa-bell me-2"></i> Notifications
            </button>
        </li>
    </ul>
    
    <div class="tab-content" id="settingsTabsContent">
        <!-- Profile Tab -->
        <div class="tab-pane fade show active" id="profile-settings" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Personal Information</h5>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data" class="row g-3">
                        @csrf
                        @method('PUT')
                        
                        <div class="col-12 mb-4 text-center">
                            <div class="position-relative d-inline-block">
                                <img src="https://source.unsplash.com/random/200x200/?portrait&sig=1" 
                                     class="rounded-circle img-thumbnail" 
                                     alt="Profile Picture" 
                                     style="width: 150px; height: 150px; object-fit: cover;">
                                
                                <label for="profilePicture" class="position-absolute bottom-0 end-0 bg-purple rounded-circle p-2 cursor-pointer" style="cursor: pointer;">
                                    <i class="fas fa-camera text-white"></i>
                                    <input type="file" id="profilePicture" name="profile_picture" class="d-none">
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name" value="John" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="last_name" value="Doe" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="john.doe@example.com" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="+1 (555) 123-4567">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="birthdate" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" value="1990-01-01">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender">
                                <option value="">Select Gender</option>
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                                <option value="prefer_not_to_say">Prefer not to say</option>
                            </select>
                        </div>
                        
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="123 Main Street">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="New York">
                        </div>
                        
                        <div class="col-md-4">
                            <label for="state" class="form-label">State/Province</label>
                            <input type="text" class="form-control" id="state" name="state" value="NY">
                        </div>
                        
                        <div class="col-md-2">
                            <label for="zipCode" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="zipCode" name="zip_code" value="10001">
                        </div>
                        
                        <div class="col-12">
                            <label for="bio" class="form-label">Short Bio</label>
                            <textarea class="form-control" id="bio" name="bio" rows="3">Fitness enthusiast looking to improve my workout routines and find great gyms near me.</textarea>
                        </div>
                        
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-purple">
                                <i class="fas fa-save me-2"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Security Tab -->
        <div class="tab-pane fade" id="security-settings" role="tabpanel" aria-labelledby="security-tab">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Change Password</h5>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" class="row g-3">
                        @csrf
                        @method('PUT')
                        
                        <div class="col-md-12">
                            <label for="currentPassword" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" name="current_password" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="new_password" required>
                            <div class="form-text text-light">
                                Password must be at least 8 characters long with at least one uppercase letter, one number, and one special character.
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="confirmNewPassword" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirmNewPassword" name="new_password_confirmation" required>
                        </div>
                        
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-purple">
                                <i class="fas fa-key me-2"></i> Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Two-Factor Authentication</h5>
                </div>
                <div class="card-body">
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="enable2FA">
                        <label class="form-check-label" for="enable2FA">Enable Two-Factor Authentication</label>
                    </div>
                    
                    <div class="mt-3 d-none" id="twoFactorSetup">
                        <p>Scan this QR code with your authenticator app:</p>
                        <div class="text-center my-4">
                            <div class="bg-white p-3 d-inline-block">
                                <img src="https://via.placeholder.com/150" alt="2FA QR Code">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="verificationCode" class="form-label">Enter the 6-digit verification code:</label>
                            <input type="text" class="form-control" id="verificationCode" placeholder="Enter code">
                        </div>
                        
                        <button type="button" class="btn btn-purple">
                            <i class="fas fa-check me-2"></i> Verify and Enable
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Preferences Tab -->
        <div class="tab-pane fade" id="preferences-settings" role="tabpanel" aria-labelledby="preferences-tab">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Gym Preferences</h5>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" class="row g-3">
                        @csrf
                        @method('PUT')
                        
                        <div class="col-md-6">
                            <label class="form-label">Preferred Gym Types</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="typeFitness" name="preferred_types[]" value="fitness" checked>
                                <label class="form-check-label" for="typeFitness">Fitness Centers</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="typeCrossfit" name="preferred_types[]" value="crossfit">
                                <label class="form-check-label" for="typeCrossfit">CrossFit</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="typeYoga" name="preferred_types[]" value="yoga" checked>
                                <label class="form-check-label" for="typeYoga">Yoga Studios</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="typeBoxing" name="preferred_types[]" value="boxing">
                                <label class="form-check-label" for="typeBoxing">Boxing Gyms</label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Must-Have Amenities</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="amenityParking" name="must_have_amenities[]" value="parking" checked>
                                <label class="form-check-label" for="amenityParking">Parking</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="amenityShower" name="must_have_amenities[]" value="shower" checked>
                                <label class="form-check-label" for="amenityShower">Shower</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="amenityWifi" name="must_have_amenities[]" value="wifi">
                                <label class="form-check-label" for="amenityWifi">Wi-Fi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="amenityTrainer" name="must_have_amenities[]" value="trainer">
                                <label class="form-check-label" for="amenityTrainer">Personal Trainers</label>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mt-4">
                            <label for="preferredDistance" class="form-label">Preferred Maximum Distance</label>
                            <select class="form-select" id="preferredDistance" name="preferred_distance">
                                <option value="5">Within 5 km</option>
                                <option value="10" selected>Within 10 km</option>
                                <option value="20">Within 20 km</option>
                                <option value="50">Within 50 km</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6 mt-4">
                            <label for="priceRange" class="form-label">Price Range</label>
                            <div class="range-slider mt-2">
                                <input type="range" class="form-range" id="priceRange" name="price_range" min="0" max="1000" step="50" value="500">
                                <div class="d-flex justify-content-between">
                                    <span>$0</span>
                                    <span id="priceValue">$500</span>
                                    <span>$1000+</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-purple">
                                <i class="fas fa-save me-2"></i> Save Preferences
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Notifications Tab -->
        <div class="tab-pane fade" id="notifications-settings" role="tabpanel" aria-labelledby="notifications-tab">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Notification Settings</h5>
                </div>
                <div class="card-body">
                    <form action="#" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-light mb-3">Email Notifications</h6>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailBookingConfirmation" name="email_notifications[]" value="booking_confirmation" checked>
                                    <label class="form-check-label" for="emailBookingConfirmation">Booking Confirmations</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailBookingReminder" name="email_notifications[]" value="booking_reminder" checked>
                                    <label class="form-check-label" for="emailBookingReminder">Booking Reminders</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailPromotion" name="email_notifications[]" value="promotions">
                                    <label class="form-check-label" for="emailPromotion">Promotions and Offers</label>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailNewsletter" name="email_notifications[]" value="newsletter">
                                    <label class="form-check-label" for="emailNewsletter">Newsletters</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailFeaturedGym" name="email_notifications[]" value="featured_gym" checked>
                                    <label class="form-check-label" for="emailFeaturedGym">New Featured Gyms</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailAccountActivity" name="email_notifications[]" value="account_activity" checked>
                                    <label class="form-check-label" for="emailAccountActivity">Account Activity</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-light mb-3">Push Notifications</h6>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="pushBookingConfirmation" name="push_notifications[]" value="booking_confirmation" checked>
                                    <label class="form-check-label" for="pushBookingConfirmation">Booking Confirmations</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="pushBookingReminder" name="push_notifications[]" value="booking_reminder" checked>
                                    <label class="form-check-label" for="pushBookingReminder">Booking Reminders</label>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="pushPromotion" name="push_notifications[]" value="promotions" checked>
                                    <label class="form-check-label" for="pushPromotion">Promotions and Offers</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="pushNewGymNearby" name="push_notifications[]" value="new_gym_nearby" checked>
                                    <label class="form-check-label" for="pushNewGymNearby">New Gym Nearby</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <h6 class="text-light mb-3">SMS Notifications</h6>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="smsBookingReminder" name="sms_notifications[]" value="booking_reminder">
                                    <label class="form-check-label" for="smsBookingReminder">Booking Reminders</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="smsUrgentAlerts" name="sms_notifications[]" value="urgent_alerts" checked>
                                    <label class="form-check-label" for="smsUrgentAlerts">Urgent Alerts (e.g., Gym Closures)</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <button type="submit" class="btn btn-purple">
                                <i class="fas fa-save me-2"></i> Save Notification Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Profile picture preview
    document.getElementById('profilePicture').addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('.img-thumbnail').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        }
    });
    
    // Two-factor authentication toggle
    document.getElementById('enable2FA').addEventListener('change', function() {
        const twoFactorSetup = document.getElementById('twoFactorSetup');
        twoFactorSetup.classList.toggle('d-none', !this.checked);
    });
    
    // Price Range Slider
    const priceSlider = document.getElementById('priceRange');
    const priceValue = document.getElementById('priceValue');
    
    priceSlider.addEventListener('input', function() {
        priceValue.textContent = '$' + this.value;
    });
</script>
@endpush
@endsection 