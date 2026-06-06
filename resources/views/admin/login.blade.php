@extends('layouts.app')

@section('title', 'Admin Login - Western Dental')

@section('content')
<div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: var(--grad-hero); padding: 20px;">
    <div style="width: 100%; max-width: 440px; background: white; padding: 48px; border-radius: 32px; box-shadow: 0 30px 70px rgba(0,0,0,0.5);">
        <div style="text-align: center; margin-bottom: 32px;">
            <div style="width: 64px; height: 64px; background: var(--grad-teal); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; font-size: 28px; box-shadow: 0 10px 25px rgba(125, 211, 252, 0.4);">
                🦷
            </div>
            <h2 style="font-family: 'Playfair Display', serif; font-size: 32px; color: var(--navy);">Admin Access</h2>
            <p style="color: var(--muted); font-size: 15px;">Western Dental & Orthodontics</p>
        </div>

        @if($errors->any())
            <div style="background: #fef2f2; color: #b91c1c; padding: 12px; border-radius: 12px; font-size: 14px; margin-bottom: 24px; border: 1px solid #fee2e2;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 14px; font-weight: 600; color: var(--navy); margin-bottom: 8px;">Email Address</label>
                <input type="email" name="email" required style="width: 100%; padding: 14px 20px; border-radius: 12px; border: 1px solid var(--border); font-family: 'Outfit', sans-serif; transition: border-color .3s; outline: none;" placeholder="admin@example.com">
            </div>

            <div style="margin-bottom: 32px;">
                <label style="display: block; font-size: 14px; font-weight: 600; color: var(--navy); margin-bottom: 8px;">Password</label>
                <input type="password" name="password" required style="width: 100%; padding: 14px 20px; border-radius: 12px; border: 1px solid var(--border); font-family: 'Outfit', sans-serif; transition: border-color .3s; outline: none;" placeholder="••••••••">
            </div>

            <button type="submit" style="width: 100%; padding: 16px; background: var(--grad-teal); color: white; border: none; border-radius: 12px; font-weight: 700; font-size: 16px; cursor: pointer; box-shadow: 0 10px 30px rgba(125, 211, 252, 0.4); transition: transform .3s;">
                Secure Login →
            </button>
        </form>

        <div style="margin-top: 32px; text-align: center; font-size: 13px; color: var(--muted);">
            <a href="{{ route('home') }}" style="color: var(--teal); text-decoration: none; font-weight: 600;">← Back to Public Website</a>
        </div>
    </div>
</div>
@endsection
