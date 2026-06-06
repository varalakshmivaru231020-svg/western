<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Western Dental & Orthodontics</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ============================================================
           COMPLETE ADMIN RESET — No public site styles imported
           ============================================================ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --navy:      #0a1628;
            --teal:      #7dd3fc;
            --teal-glow: rgba(125, 211, 252, 0.35);
            --teal-pale: rgba(125, 211, 252, 0.08);
            --muted:     #6b7280;
            --border:    #e5e7eb;
            --bg:        #f4f7fb;
            --white:     #ffffff;
            --font:      'Outfit', sans-serif;
            --serif:     'Playfair Display', serif;
        }

        html { height: 100%; }

        body {
            font-family: var(--font);
            background: var(--bg);
            color: var(--navy);
            min-height: 100vh;
            display: flex;
        }

        /* =================== SIDEBAR =================== */
        .adm-sidebar {
            width: 260px;
            min-width: 260px;
            background: var(--navy);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; bottom: 0; left: 0;
            z-index: 100;
            overflow-y: auto;
        }

        .adm-logo {
            padding: 32px 26px 24px;
            border-bottom: 1px solid rgba(255,255,255,0.07);
        }
        .adm-logo h2 {
            font-family: var(--serif);
            font-size: 18px;
            color: var(--teal);
            font-weight: 700;
            line-height: 1.2;
        }
        .adm-logo p {
            font-size: 11px;
            color: rgba(255,255,255,0.35);
            margin-top: 4px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .adm-nav { padding: 10px 0; flex: 1; }

        .adm-nav-link {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 13px 26px;
            color: rgba(255,255,255,0.5);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border-left: 3px solid transparent;
            transition: all 0.2s ease;
        }
        .adm-nav-link:hover {
            color: rgba(255,255,255,0.9);
            background: rgba(255,255,255,0.04);
            border-left-color: rgba(125,211,252,0.3);
        }
        .adm-nav-link.is-active {
            color: #fff;
            background: var(--teal-pale);
            border-left-color: var(--teal);
            font-weight: 700;
        }
        .adm-nav-link .icon { font-size: 15px; }

        .adm-sidebar-foot {
            padding: 18px 26px;
            border-top: 1px solid rgba(255,255,255,0.07);
        }
        .adm-logout {
            width: 100%;
            padding: 11px;
            background: rgba(239,68,68,0.12);
            color: #f87171;
            border: 1px solid rgba(239,68,68,0.2);
            border-radius: 10px;
            font-family: var(--font);
            font-size: 13.5px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s;
        }
        .adm-logout:hover { background: rgba(239,68,68,0.22); }

        /* =================== MAIN CONTENT =================== */
        .adm-main {
            margin-left: 260px;
            flex: 1;
            padding: 44px 40px;
            min-height: 100vh;
            width: calc(100% - 260px);
        }

        /* =================== UTILITY =================== */
        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    <div class="adm-sidebar">
        <div class="adm-logo">
            <h2>Western Dental</h2>
            <p>Admin Panel</p>
        </div>

        <nav class="adm-nav">
            <a href="{{ route('admin.dashboard') }}"
               class="adm-nav-link {{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">
                <span class="icon">📊</span> Dashboard
            </a>
            <a href="{{ route('admin.services.index') }}"
               class="adm-nav-link {{ request()->routeIs('admin.services.*') ? 'is-active' : '' }}">
                <span class="icon">🦷</span> Services
            </a>
            <a href="{{ route('admin.banners.index') }}"
               class="adm-nav-link {{ request()->routeIs('admin.banners.*') ? 'is-active' : '' }}">
                <span class="icon">🖼️</span> Banners
            </a>
            <a href="{{ route('admin.blogs.index') }}"
               class="adm-nav-link {{ request()->routeIs('admin.blogs.*') ? 'is-active' : '' }}">
                <span class="icon">📝</span> Blogs
            </a>
            <a href="{{ route('admin.gallery.index') }}"
               class="adm-nav-link {{ request()->routeIs('admin.gallery.*') ? 'is-active' : '' }}">
                <span class="icon">📸</span> Gallery
            </a>
            <a href="{{ route('admin.settings.edit') }}"
               class="adm-nav-link {{ request()->routeIs('admin.settings.*') ? 'is-active' : '' }}">
                <span class="icon">⚙️</span> Settings
            </a>
        </nav>

        <div class="adm-sidebar-foot">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="adm-logout">🚪 Logout</button>
            </form>
        </div>
    </div>

    {{-- Main Content --}}
    <main class="adm-main">
        @yield('admin-content')
    </main>

</body>
</html>
