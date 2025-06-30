@component('mail::message')
# Inquiry Received

Thank you for reaching out to **The Haven**!

We have received your inquiry and will get back to you as soon as possible.  
Here are the details:

**Name:** {{ $data['name'] }}  
**Email:** {{ $data['email'] }}  
@if(!empty($data['subject']))
**Subject:** {{ $data['subject'] }}  
@endif
**Message:**  
{{ $data['subject'] }}

If you have any additional information or questions, feel free to reply to this email.

Thanks again,  
**The Haven Team**
@endcomponent
