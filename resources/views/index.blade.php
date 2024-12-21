@extends('layouts.app')
@section('content')
@guest
<div class="main-content">
    <div class="header">
        <h1 class="header-title">Share Your Event Moments</h1>
        <p class="header-subtitle">Capture and share memories instantly with our QR-based photo sharing system</p>
    </div>

    <!-- Carousel for Multiple Photos -->
    <div id="photoCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('images/eps1.jpg')}}" class="d-block w-100" alt="Photo 1">
            </div>
            <div class="carousel-item">
                <img src="{{asset('images/eps2.jpg')}}" class="d-block w-100" alt="Photo 2">
            </div>
            <div class="carousel-item">
                <img src="{{asset('images/eps1.jpg')}}" class="d-block w-100" alt="Photo 3">
            </div>
            <!-- Add more carousel items as needed -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#photoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#photoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <a href="{{route('login')}}" class="btn-custom" style="text-decoration: none;">Get Started</a>

    <!-- How It Works Section -->
    <div class="center-text">
        <h2 style="position: center;">How It Works</h2>
        <div class="step">
            <div class="step-icon">📱</div>
            <div class="step-content">
                <h3>Scan QR Code</h3>
                <p>Find QR codes at your table</p>
            </div>
        </div>
        <div class="step">
            <div class="step-icon">📸</div>
            <div class="step-content">
                <h3>Take Photos</h3>
                <p>Capture beautiful moments</p>
            </div>
        </div>
        <div class="step">
            <div class="step-icon">🚀</div>
            <div class="step-content">
                <h3>Share Instantly</h3>
                <p>Upload and share with everyone</p>
            </div>
        </div>
    </div>
</div>
@else

<div class="container">
    <!-- Statistics Section -->
    <div class="row">
        <div class="col-12 col-md-6 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Photos</h5>
                    <p class="card-text display-4">{{ $folders->sum(fn($folder) => $folder->images->count()) }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Folders</h5>
                    <p class="card-text display-4">{{ $folders->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h2>Event Booking Form</h2>
    @if(Session::has('status'))
        <p class="alert alert-success">{{Session::get('status')}}</p>
    @endif
    <form action="{{route('admin.event.booking')}}" method="POST">
        @csrf
        <!-- Name -->
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email address" required>
        </div>

        <!-- Phone -->
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
        </div>

        <!-- Event Type -->
        <div class="form-group">
            <label for="event_type">Event Type</label>
            <select id="event_type" name="event_type" required>
                <option value="" disabled selected>Select event type</option>
                <option value="wedding">Wedding</option>
                <option value="birthday">Birthday</option>
                <option value="corporate">Corporate Event</option>
                <option value="party">Private Party</option>
                <option value="others">Others</option>
            </select>
        </div>

        <!-- Event Date -->
        <div class="form-group">
            <label for="event_date">Event Date</label>
            <input type="date" id="event_date" name="event_date" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-submit">Book Event</button>
    </form>
</div>
@endguest
@endsection
