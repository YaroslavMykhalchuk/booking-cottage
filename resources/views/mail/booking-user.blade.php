<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @media (prefers-color-scheme: dark) {
            body, table, td { background: #111 !important; color: #fff !important; }
            .card { background: #1a1a1a !important; }
            .muted { color: #bbb !important; }
            .btn { background:#3b82f6 !important; color:#fff !important; }
        }
    </style>
</head>
<body style="margin:0;padding:0;background:#f6f7fb;font-family:Arial,Helvetica,sans-serif;color:#111;">
<table role="presentation" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center" style="padding:32px 16px;">
            <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="max-width:640px;">
                <tr>
                    <td style="padding:24px 20px;text-align:center;background:#111;color:#fff;border-radius:12px 12px 0 0;">
                        <h1 style="margin:0;font-size:20px;line-height:1.4;">Booking confirmed</h1>
                        <p style="margin:8px 0 0;font-size:13px;opacity:.9;">Thank you for choosing us!</p>
                    </td>
                </tr>

                <tr>
                    <td class="card" style="background:#ffffff;border:1px solid #e8eaf2;border-top:none;border-radius:0 0 12px 12px;padding:24px;">
                        <p style="margin:0 0 16px;font-size:15px;">
                            Hello, <strong>{{ $booking->name }}</strong>!<br>
                            Your booking has been created successfully.
                        </p>

                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:separate;border-spacing:0 10px;">
                            <tr>
                                <td class="muted" style="width:180px;font-size:13px;color:#6b7280;">Cottage</td>
                                <td style="font-size:14px;"><strong>{{ $booking->cottage ? 'No. 2' : 'No. 1' }}</strong></td>
                            </tr>
                            <tr>
                                <td class="muted" style="font-size:13px;color:#6b7280;">Check-in date</td>
                                <td style="font-size:14px;">
                                    <strong>{{ \Illuminate\Support\Carbon::parse($booking->date_from)->isoFormat('DD.MM.YYYY') }}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="muted" style="font-size:13px;color:#6b7280;">Check-out date</td>
                                <td style="font-size:14px;">
                                    <strong>{{ \Illuminate\Support\Carbon::parse($booking->date_to)->isoFormat('DD.MM.YYYY') }}</strong>
                                    <span class="muted" style="font-size:12px;color:#6b7280;">(the check-out day is not treated as occupied)</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="muted" style="font-size:13px;color:#6b7280;">E-mail</td>
                                <td style="font-size:14px;">{{ $booking->email }}</td>
                            </tr>
                            <tr>
                                <td class="muted" style="font-size:13px;color:#6b7280;">Phone</td>
                                <td style="font-size:14px;">{{ $booking->phone }}</td>
                            </tr>
                            @if(!empty($booking->note))
                                <tr>
                                    <td class="muted" style="font-size:13px;color:#6b7280;vertical-align:top;">Comment</td>
                                    <td style="font-size:14px;white-space:pre-wrap;">{{ $booking->note }}</td>
                                </tr>
                            @endif
                        </table>

                        <p class="muted" style="margin:16px 0 0;font-size:12px;color:#6b7280;">
                            This is an automated message. Please do not share it with third parties.
                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="text-align:center;padding:16px 0;color:#6b7280;font-size:12px;">
                        © {{ now()->year }} {{ config('app.name') }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
