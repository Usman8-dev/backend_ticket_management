<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bus Ticket</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            padding: 30px;
            background-color: #f4f4f4;
        }
        .ticket {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .company-logo {
            text-align: center;
            margin-bottom: 15px;
        }
        .company-logo h1 {
            color: #2980b9;
            margin: 0;
            font-size: 2.5em;
        }
        .ticket-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .ticket-header h2 {
            color: #333;
            margin: 0;
            font-size: 1.8em;
        }
        .ticket-details {
            display: grid;
            grid-template-columns: auto auto;
            gap: 10px 20px;
            margin-bottom: 20px;
            font-size: 1em;
        }
        .ticket-details strong {
            font-weight: bold;
            color: #555;
        }
        .barcode {
            text-align: center;
            margin-bottom: 15px;
            font-size: 0.9em;
            color: #777;
        }
        .important-note {
            padding: 15px;
            background-color: #f9f9f9;
            border: 1px solid #eee;
            border-radius: 5px;
            font-size: 0.9em;
            color: #e74c3c;
        }
        .paid-stamp {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #27ae60;
            color: #fff;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 0.9em;
            font-weight: bold;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="paid-stamp">PAID</div>
        <div class="company-logo">
            <h1>CSC Movers</h1>
        </div>
        <div class="ticket-header">
            <h2>Bus Ticket</h2>
        </div>
        <div class="ticket-details">
            <p><strong>Passenger:</strong> {{ $ticket->name }}</p>
            <p><strong>CNIC:</strong> {{ $ticket->cnic }}</p>
            <p><strong>Route:</strong> {{ $ticket->trip->route }}</p>
            <p><strong>Seat:</strong> {{ $ticket->seat_number }}</p>
            <p><strong>Departure:</strong> {{ \Carbon\Carbon::parse($ticket->trip->departure_time)->format('D, d M Y, h:i A') }}</p>
            <p><strong>Bus No:</strong> {{ $ticket->trip->bus->bus_number }}</p>
            <p><strong>Fare:</strong> ₨ {{ $ticket->trip->price }}</p>
            <p><strong>Booking ID:</strong> #{{ $ticket->id }}</p>
            <p><strong>Booked On:</strong> {{ $ticket->created_at->timezone('Asia/Karachi')->format('d M Y, h:i A') }}</p>
        </div>
        <div class="important-note">
            <strong>Important:</strong> Please arrive at least <strong>30 minutes</strong> before the scheduled departure time. This allows for timely boarding and ensures a smooth journey for all passengers.
        </div>
    </div>
</body>
</html>