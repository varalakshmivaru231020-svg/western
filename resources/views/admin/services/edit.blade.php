@extends('layouts.admin')

@section('admin-content')
<div style="max-width: 600px;">
    <h1 style="color: #0a1628; margin-bottom: 30px; margin-top: 0; font-family: 'Playfair Display';">Edit Service</h1>
    
    @if($errors->any())
        <div style="background: #ffebee; color: #c62828; padding: 15px; border-radius: 5px; margin-bottom: 20px; border-left: 4px solid #c62828;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 20px;">
            <label for="title" style="display: block; color: #0a1628; font-weight: 600; margin-bottom: 8px;">Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title', $service->title) }}" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-family: inherit; font-size: 14px; box-sizing: border-box;">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="subtitle" style="display: block; color: #0a1628; font-weight: 600; margin-bottom: 8px;">Subtitle</label>
            <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle', $service->subtitle) }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-family: inherit; font-size: 14px; box-sizing: border-box;">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="description" style="display: block; color: #0a1628; font-weight: 600; margin-bottom: 8px;">Description *</label>
            <textarea id="description" name="description" required rows="5" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-family: inherit; font-size: 14px; box-sizing: border-box; resize: vertical;">{{ old('description', $service->description) }}</textarea>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="content" style="display: block; color: #0a1628; font-weight: 600; margin-bottom: 8px;">Detailed Content (shown on detail page)</label>
            <textarea id="content" name="content" rows="10" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-family: inherit; font-size: 14px; box-sizing: border-box; resize: vertical;" placeholder="Add detailed information about this service. Use separate paragraphs for better readability.">{{ old('content', $service->content) }}</textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="icon" style="display: block; color: #0a1628; font-weight: 600; margin-bottom: 8px;">Service Image</label>
            @if($service->icon)
                <div style="margin-bottom: 10px;">
                    <p style="color: #555; font-size: 13px; margin: 0 0 6px;">Current image:</p>
                    <img src="{{ $service->icon }}" alt="Current icon" style="max-width: 200px; max-height: 150px; border-radius: 5px; border: 1px solid #ddd;">
                </div>
            @endif
            <input type="file" id="icon" name="icon" accept="image/png,image/jpeg,image/jpg,image/gif,image/svg+xml"
                style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-family: inherit; font-size: 14px; box-sizing: border-box; background: #fafafa; cursor: pointer;"
                onchange="previewImage(this, 'icon-preview')">
            <div id="icon-preview" style="margin-top: 10px; display: none;">
                <p style="color: #555; font-size: 13px; margin: 0 0 6px;">New image preview:</p>
                <img src="" alt="Preview" style="max-width: 200px; max-height: 150px; border-radius: 5px; border: 1px solid #ddd;">
            </div>
            <small style="color: #888;">Leave empty to keep the current image. Accepted: PNG, JPG, JPEG, GIF, SVG. Max: 2MB.</small>
        </div>
        
        <div style="margin-bottom: 30px;">
            <label for="order" style="display: block; color: #0a1628; font-weight: 600; margin-bottom: 8px;">Display Order</label>
            <input type="number" id="order" name="order" value="{{ old('order', $service->order) }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-family: inherit; font-size: 14px; box-sizing: border-box;">
        </div>
        
        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #18b4d4; color: white; padding: 12px 25px; border: none; border-radius: 5px; cursor: pointer; font-weight: 600; font-size: 14px;">Update Service</button>
            <a href="{{ route('admin.services.index') }}" style="background: #ccc; color: #333; padding: 12px 25px; border-radius: 5px; text-decoration: none; font-weight: 600; font-size: 14px;">Cancel</a>
        </div>
    </form>
</div>
<script>
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.style.display = 'block';
            preview.querySelector('img').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
