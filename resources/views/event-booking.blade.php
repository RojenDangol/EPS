@extends('layouts.app')
@section('content')
<div class="main-content">
    <div class="header">
        <h1 class="header-title">Share Your Event Moments</h1>
        <p class="header-subtitle">Capture and share memories instantly with our QR-based photo sharing system</p>
    </div>

    <!-- Data Display Section -->
    <div class="data-display">
        <h2>Event Data</h2>
        <div id="eventDetails"></div>
        <div class="qr-button">
            <button id="generateQr">Generate QR Code</button>
        </div>
    </div>
    {{$storedEvent->name}}
</div>
@endsection
@push('scripts')
<script>
    // Simulate fetching specific data from the backend
    const eventData = [
        { name: "{{$storedEvent->name}}", date: "{{$storedEvent->event_date}}", event_type: "{{$storedEvent->event_type}}", email: "{{$storedEvent->email}}" }
    ];

    const eventDetailsContainer = document.getElementById("eventDetails");

    // Display only relevant event details dynamically
    const relevantEvent = eventData[0]; // Assume only one relevant event for simplicity

    if (relevantEvent) {
        const eventDiv = document.createElement("div");
        eventDiv.classList.add("event-details");
        eventDiv.innerHTML = `
            <h3>${relevantEvent.name}</h3>
            <p><strong>Date:</strong> ${relevantEvent.date}</p>
            <p><strong>Event Type:</strong> ${relevantEvent.event_type}</p>
            <p><strong>Email:</strong> ${relevantEvent.email}</p>
        `;
        eventDetailsContainer.appendChild(eventDiv);
    }

    // Redirect to generate.html when QR button is clicked
    document.getElementById("generateQr").addEventListener("click", () => {
        window.location.href = "generate.html";
    });
</script>
@endpush