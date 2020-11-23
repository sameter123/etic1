<?php
use App\Models\Settings;
?>
<div class="header-left">
    <a href="{{route('home')}}" class="logo">
        <img src="{{Settings::first()->logo}}" class="logo-dark" alt="{{Settings::first()->site_name}} Logo">
        <img src="{{Settings::first()->logo_white}}" class="logo-light" alt="{{Settings::first()->site_name}} Logo">
    </a>
</div><!-- End .header-left -->
