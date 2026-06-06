@extends('layouts.admin')

@section('admin-content')
<div style="max-width: 1200px; margin: 0 auto; margin-top: -10px;">
    <div style="margin-bottom: 40px; display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="color: var(--navy); margin: 0; font-family: 'Playfair Display', serif; font-size: 36px;">Practice Overview</h1>
            <p style="color: var(--muted); margin: 5px 0 0 0; font-size: 16px;">Welcome back to Western Dental Administration.</p>
        </div>
        <div style="padding: 12px 24px; background: white; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.03); font-weight: 600; color: var(--navy);">
            {{ date('l, d M Y') }}
        </div>
    </div>
    
    <!-- Stats Grid -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px; margin-bottom: 50px;">
        <!-- Services Card -->
        <div style="background: white; padding: 32px; border-radius: 24px; box-shadow: 0 10px 30px rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.05); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
            <div style="width: 48px; height: 48px; background: rgba(125, 211, 252, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; font-size: 20px;">🦷</div>
            <h3 style="margin: 0 0 8px 0; font-size: 15px; color: var(--muted); text-transform: uppercase; letter-spacing: 1px;">Clinical Services</h3>
            <p style="margin: 0; font-size: 42px; font-weight: 700; color: var(--navy);">{{ $services ?? 0 }}</p>
            <a href="{{ route('admin.services.index') }}" style="display: inline-block; margin-top: 20px; color: var(--teal); text-decoration: none; font-weight: 700; font-size: 14px;">Manage Portfolio →</a>
        </div>
        
        <!-- Banners Card -->
        <div style="background: white; padding: 32px; border-radius: 24px; box-shadow: 0 10px 30px rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.05); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
            <div style="width: 48px; height: 48px; background: rgba(240, 160, 48, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; font-size: 20px;">🖼️</div>
            <h3 style="margin: 0 0 8px 0; font-size: 15px; color: var(--muted); text-transform: uppercase; letter-spacing: 1px;">Hero Banners</h3>
            <p style="margin: 0; font-size: 42px; font-weight: 700; color: var(--navy);">{{ $banners ?? 0 }}</p>
            <a href="{{ route('admin.banners.index') }}" style="display: inline-block; margin-top: 20px; color: #f0a030; text-decoration: none; font-weight: 700; font-size: 14px;">Edit Visuals →</a>
        </div>
        
        <!-- Blogs Card -->
        <div style="background: white; padding: 32px; border-radius: 24px; box-shadow: 0 10px 30px rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.05); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
            <div style="width: 48px; height: 48px; background: rgba(56, 189, 248, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; font-size: 20px;">📝</div>
            <h3 style="margin: 0 0 8px 0; font-size: 15px; color: var(--muted); text-transform: uppercase; letter-spacing: 1px;">Blog Posts</h3>
            <p style="margin: 0; font-size: 42px; font-weight: 700; color: var(--navy);">{{ $blogs ?? 0 }}</p>
            <a href="{{ route('admin.blogs.index') }}" style="display: inline-block; margin-top: 20px; color: #38bdf8; text-decoration: none; font-weight: 700; font-size: 14px;">View Content →</a>
        </div>
        
        <!-- Gallery Card -->
        <div style="background: white; padding: 32px; border-radius: 24px; box-shadow: 0 10px 30px rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.05); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
            <div style="width: 48px; height: 48px; background: rgba(125, 211, 252, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; font-size: 20px;">📸</div>
            <h3 style="margin: 0 0 8px 0; font-size: 15px; color: var(--muted); text-transform: uppercase; letter-spacing: 1px;">Gallery Items</h3>
            <p style="margin: 0; font-size: 42px; font-weight: 700; color: var(--navy);">{{ $gallery ?? 0 }}</p>
            <a href="{{ route('admin.gallery.index') }}" style="display: inline-block; margin-top: 20px; color: var(--teal); text-decoration: none; font-weight: 700; font-size: 14px;">Update Photos →</a>
        </div>
    </div>
    
    <!-- Quick Actions Section -->
    <div style="background: white; padding: 48px; border-radius: 32px; box-shadow: 0 15px 50px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.04);">
        <h2 style="color: var(--navy); margin-top: 0; margin-bottom: 32px; font-family: 'Playfair Display', serif; font-size: 28px;">Quick Administrative Actions</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px;">
            <a href="{{ route('admin.services.create') }}" style="background: var(--teal); color: white; padding: 18px; border-radius: 16px; text-decoration: none; text-align: center; font-weight: 700; font-size: 15px; box-shadow: 0 10px 25px rgba(125, 211, 252, 0.4); transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='none'">+ Create Service</a>
            <a href="{{ route('admin.banners.create') }}" style="background: #f0a030; color: white; padding: 18px; border-radius: 16px; text-decoration: none; text-align: center; font-weight: 700; font-size: 15px; box-shadow: 0 10px 25px rgba(240, 160, 48, 0.3); transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='none'">+ Add Banner</a>
            <a href="{{ route('admin.blogs.create') }}" style="background: #38bdf8; color: white; padding: 18px; border-radius: 16px; text-decoration: none; text-align: center; font-weight: 700; font-size: 15px; box-shadow: 0 10px 25px rgba(56, 189, 248, 0.3); transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='none'">+ Write Blog Post</a>
            <a href="{{ route('admin.gallery.create') }}" style="background: var(--navy); color: white; padding: 18px; border-radius: 16px; text-decoration: none; text-align: center; font-weight: 700; font-size: 15px; box-shadow: 0 10px 25px rgba(10, 22, 40, 0.2); transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='none'">+ Upload Photos</a>
        </div>
    </div>
</div>
@endsection
