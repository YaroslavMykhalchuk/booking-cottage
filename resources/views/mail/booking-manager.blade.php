<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>New Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body style="margin:0;padding:0;background:#f6f7fb;font-family:Arial,Helvetica,sans-serif;color:#111;">
<table role="presentation" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center" style="padding:32px 16px;">
            <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="max-width:640px;background:#fff;border:1px solid #e8eaf2;border-radius:12px;overflow:hidden;">
                <tr>
                    <td style="padding:18px 20px;background:#111;color:#fff;">
                        <h1 style="margin:0;font-size:18px;line-height:1.4;">New booking</h1>
                        <p style="margin:6px 0 0;font-size:12px;opacity:.85;">
                            Order #{{ $booking->id }} on {{ \Carbon\Carbon::parse($booking->created_at)->format('d.m.Y H:i') }}
                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="padding:20px;">
                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:separate;border-spacing:0 10px;">
                            <tr>
                                <td style="width:200px;color:#6b7280;font-size:13px;">Cottage</td>
                                <td style="font-size:14px;"><strong>{{ $booking->cottage ? 'No. 2' : 'No. 1' }}</strong></td>
                            </tr>
                            <tr>
                                <td style="color:#6b7280;font-size:13px;">Check-in date</td>
                                <td style="font-size:14px;"><strong>{{ \Carbon\Carbon::parse($booking->date_from)->format('d.m.Y') }}</strong></td>
                            </tr>
                            <tr>
                                <td style="color:#6b7280;font-size:13px;">Check-out date</td>
                                <td style="font-size:14px;">
                                    <strong>{{ \Carbon\Carbon::parse($booking->date_to)->format('d.m.Y') }}</strong>
                                    <span style="color:#6b7280;font-size:12px;">(the check-out day is not counted as occupied)</span>
                                </td>
                            </tr>
                        </table>

                        <hr style="border:none;border-top:1px solid #e5e7eb;margin:16px 0;" />

                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:separate;border-spacing:0 10px;">
                            <tr>
                                <td style="width:200px;color:#6b7280;font-size:13px;">Name</td>
                                <td style="font-size:14px;">{{ $booking->name }}</td>
                            </tr>
                            <tr>
                                <td style="color:#6b7280;font-size:13px;">Email</td>
                                <td style="font-size:14px;"><a href="mailto:{{ $booking->email }}" style="color:#111;">{{ $booking->email }}</a></td>
                            </tr>
                            <tr>
                                <td style="color:#6b7280;font-size:13px;">Phone</td>
                                <td style="font-size:14px;"><a href="tel:{{ preg_replace('/\s+/', '', $booking->phone) }}" style="color:#111;">{{ $booking->phone }}</a></td>
                            </tr>
                            @if(!empty($booking->note))
                                <tr>
                                    <td style="color:#6b7280;font-size:13px;vertical-align:top;">Comment</td>
                                    <td style="font-size:14px;white-space:pre-wrap;">{{ $booking->note }}</td>
                                </tr>
                            @endif
                        </table>

                        <div style="margin-top:16px;padding:12px 14px;background:#f3f4f6;border:1px solid #e5e7eb;border-radius:8px;font-size:12px;color:#374151;">
                            Please check the calendar and confirm the booking in the internal system.
                        </div>
                    </td>
                </tr>

                <tr>
                    <td style="text-align:center;padding:12px;color:#6b7280;font-size:12px;background:#fafafa;">
                        © {{ now()->year }} {{ config('app.name') }} — notification service
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
