<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8" />
    <title>{{ __('mail.form_title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body style="margin:0;padding:0;background:#f6f7fb;font-family:Arial,Helvetica,sans-serif;color:#111;">
<table role="presentation" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center" style="padding:32px 16px;">
            <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="max-width:640px;background:#fff;border:1px solid #e8eaf2;border-radius:12px;overflow:hidden;">
                <tr>
                    <td style="padding:18px 20px;background:#111;color:#fff;">
                        <h1 style="margin:0;font-size:18px;line-height:1.4;">{{ __('mail.form_title') }}</h1>
                        @isset($form->created_at)
                            <p style="margin:6px 0 0;font-size:12px;opacity:.85;">
                                {{ __('mail.form_line', [
                                    'id' => $form->id ?? '—',
                                    'datetime' => \Carbon\Carbon::parse($form->created_at)->format('d.m.Y H:i')
                                ]) }}
                            </p>
                        @endisset
                    </td>
                </tr>

                <tr>
                    <td style="padding:20px;">
                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:separate;border-spacing:0 10px;">
                            <tr>
                                <td style="width:200px;color:#6b7280;font-size:13px;">{{ __('mail.name') }}</td>
                                <td style="font-size:14px;">{{ $form->name }}</td>
                            </tr>
                            <tr>
                                <td style="color:#6b7280;font-size:13px;">{{ __('mail.email') }}</td>
                                <td style="font-size:14px;">
                                    <a href="mailto:{{ $form->email }}" style="color:#111;">{{ $form->email }}</a>
                                </td>
                            </tr>
                            @if(!empty($form->note))
                                <tr>
                                    <td style="color:#6b7280;font-size:13px;vertical-align:top;">{{ __('mail.message') }}</td>
                                    <td style="font-size:14px;white-space:pre-wrap;">{{ $form->note }}</td>
                                </tr>
                            @endif
                        </table>

                        <div style="margin-top:16px;padding:12px 14px;background:#f3f4f6;border:1px solid #e5e7eb;border-radius:8px;font-size:12px;color:#374151;">
                            {{ __('mail.manager_form_note') }}
                        </div>
                    </td>
                </tr>

                <tr>
                    <td style="text-align:center;padding:12px;color:#6b7280;font-size:12px;background:#fafafa;">
                        {{ __('mail.footer', ['year' => now()->year, 'app' => config('app.name')]) }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
