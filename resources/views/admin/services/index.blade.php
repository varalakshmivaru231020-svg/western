@extends('layouts.admin')

@section('admin-content')
<div style="max-width: 1200px; margin: 0 auto;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
        <div>
            <h1 style="color: var(--navy); margin: 0; font-family: 'Playfair Display', serif; font-size: 32px;">Clinical Services</h1>
            <p style="color: var(--muted); margin: 5px 0 0 0; font-size: 14px;">Manage your practice's professional portfolio and specialities.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" style="background: var(--teal); color: white; padding: 14px 28px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 14px; box-shadow: 0 10px 25px rgba(125, 211, 252, 0.4); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'">+ Add New Service</a>
    </div>
    
    @if(session('success'))
        <div style="background: #f0fdf4; color: #16a34a; padding: 16px 24px; border-radius: 12px; margin-bottom: 30px; border: 1px solid #dcfce7; display: flex; align-items: center; gap: 12px; font-weight: 500;">
            <span>✅</span> {{ session('success') }}
        </div>
    @endif
    
    @if($services->isEmpty())
        <div style="background: white; padding: 80px 40px; border-radius: 24px; text-align: center; border: 1px dashed var(--border);">
            <div style="font-size: 48px; margin-bottom: 20px;">🦷</div>
            <h3 style="color: var(--navy); margin-bottom: 10px;">No services defined</h3>
            <p style="color: var(--muted); margin-bottom: 24px;">Start by adding your first clinical treatment to the public site.</p>
            <a href="{{ route('admin.services.create') }}" style="color: var(--teal); font-weight: 700; text-decoration: none;">Add Your First Service →</a>
        </div>
    @else
        <div style="background: white; border-radius: 24px; box-shadow: 0 10px 40px rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.05); overflow: hidden;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="background: #fafcfe; border-bottom: 1px solid var(--border);">
                        <th style="padding: 20px 24px; color: var(--muted); font-size: 13px; text-transform: uppercase; letter-spacing: 1px; font-weight: 700;">Thumbnail</th>
                        <th style="padding: 20px 24px; color: var(--muted); font-size: 13px; text-transform: uppercase; letter-spacing: 1px; font-weight: 700;">Service Title</th>
                        <th style="padding: 20px 24px; color: var(--muted); font-size: 13px; text-transform: uppercase; letter-spacing: 1px; font-weight: 700;">Category</th>
                        <th style="padding: 20px 24px; color: var(--muted); font-size: 13px; text-transform: uppercase; letter-spacing: 1px; font-weight: 700;">Sort Order</th>
                        <th style="padding: 20px 24px; color: var(--muted); font-size: 13px; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                        <tr style="border-bottom: 1px solid #f8fafc; transition: background 0.2s;" onmouseover="this.style.background='#fafcfe'" onmouseout="this.style.background='white'">
                            <td style="padding: 16px 24px;">
                                <div style="width: 48px; height: 48px; border-radius: 8px; overflow: hidden; background: var(--teal-pale);">
                                    @if($service->icon)
                                        <img src="{{ asset($service->icon) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 20px;">🦷</div>
                                    @endif
                                </div>
                            </td>
                            <td style="padding: 16px 24px;">
                                <div style="font-weight: 700; color: var(--navy); margin-bottom: 2px;">{{ $service->title }}</div>
                                <div style="font-size: 13px; color: var(--muted);">{{ Str::limit($service->description, 60) }}</div>
                            </td>
                            <td style="padding: 16px 24px;">
                                <span style="background: rgba(125, 211, 252, 0.15); color: var(--teal); padding: 4px 12px; border-radius: 100px; font-size: 12px; font-weight: 700;">
                                    {{ $service->subtitle ?? 'General' }}
                                </span>
                            </td>
                            <td style="padding: 16px 24px; font-weight: 600; color: var(--muted);">{{ $service->order ?? '0' }}</td>
                            <td style="padding: 16px 24px; text-align: right;">
                                <div style="display: flex; gap: 8px; justify-content: flex-end;">
                                    <a href="{{ route('admin.services.edit', $service->id) }}" style="padding: 8px 16px; background: var(--navy); color: white; text-decoration: none; border-radius: 8px; font-size: 13px; font-weight: 600;">Edit</a>
                                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Archive this service?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="padding: 8px 16px; background: #fef2f2; color: #ef4444; border: 1px solid #fee2e2; border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer;">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
