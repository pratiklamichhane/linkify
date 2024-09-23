<style>
    div {
        background-color: #f8f8f8;
        padding: 10px;
        margin: 10px;
    }
    h1 {
        color: #333;
    }
    p {
        color: #666;
    }
</style>

<div>
<h1>Welcome {{env('APP_NAME')}}</h1>

<p>Hi, {{ $name }}</p>
<p>Thank you for registering with us.</p>
<p>Here is your OTP to verify</p>
<b>{{$otp}}</b>
<p>Thank you</p>
</div>

