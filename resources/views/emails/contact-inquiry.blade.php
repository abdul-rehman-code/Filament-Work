<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Inquiry</title>
</head>
<body style="margin:0; padding:40px 20px; background-color:#f3f4f6; font-family: 'Segoe UI', Arial, sans-serif;">

    <div style="max-width:600px; margin:0 auto; background:#ffffff; border-radius:16px; overflow:hidden; border:1px solid #e5e7eb; box-shadow: 0 10px 40px rgba(0,0,0,0.08);">

        {{-- Header --}}
        <div style="background:#4f46e5; padding:32px 24px; text-align:center;">
            <h2 style="margin:0; color:#ffffff; font-size:22px; font-weight:800; letter-spacing:1px; text-transform:uppercase;">New Inquiry Received</h2>
            <p style="margin:6px 0 0 0; color:#c7d2fe; font-size:13px;">Website Contact Form</p>
        </div>

        {{-- Body --}}
        <div style="padding:36px 32px;">

            {{-- Name --}}
            <div style="display:flex; padding-bottom:20px; margin-bottom:20px; border-bottom:1px solid #f3f4f6;">
                <div style="width:33%; font-size:12px; font-weight:600; text-transform:uppercase; letter-spacing:1px; color:#9ca3af; padding-top:2px;">Name</div>
                <div style="width:67%; font-size:15px; font-weight:700; color:#1f2937;">{{ $formData['name'] }}</div>
            </div>

            {{-- Email --}}
            <div style="display:flex; padding-bottom:20px; margin-bottom:20px; border-bottom:1px solid #f3f4f6;">
                <div style="width:33%; font-size:12px; font-weight:600; text-transform:uppercase; letter-spacing:1px; color:#9ca3af; padding-top:2px;">Email</div>
                <div style="width:67%;">
                    <a href="mailto:{{ $formData['email'] }}" style="font-size:15px; font-weight:600; color:#4f46e5; text-decoration:none;">{{ $formData['email'] }}</a>
                </div>
            </div>

            {{-- Subject --}}
            <div style="display:flex; padding-bottom:20px; margin-bottom:20px; border-bottom:1px solid #f3f4f6;">
                <div style="width:33%; font-size:12px; font-weight:600; text-transform:uppercase; letter-spacing:1px; color:#9ca3af; padding-top:2px;">Subject</div>
                <div style="width:67%; font-size:15px; font-weight:600; color:#1f2937;">{{ $formData['subject'] ?? 'No subject' }}</div>
            </div>

            {{-- Message --}}
            <div style="margin-top:8px;">
                <div style="font-size:12px; font-weight:600; text-transform:uppercase; letter-spacing:1px; color:#9ca3af; margin-bottom:12px;">Message Content</div>
                <div style="background:#f9fafb; border:1px solid #f3f4f6; border-radius:10px; padding:20px; font-size:14px; color:#374151; font-style:italic; line-height:1.8;">
                    "{{ $formData['message'] }}"
                </div>
            </div>

        </div>

        {{-- Footer --}}
        <div style="background:#f9fafb; border-top:1px solid #e5e7eb; padding:24px; text-align:center;">
            <p style="margin:0; font-size:12px; color:#9ca3af; line-height:1.8;">
                This email was sent from your website's automated contact system.<br>
                &copy; {{ date('Y') }} PakTools. All rights reserved.
            </p>
        </div>

    </div>

</body>
</html>
