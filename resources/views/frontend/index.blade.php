<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $siteTitle }}">
    <title>{{ $siteTitle }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <style>
        :root {
            --black: #050505;
            --dark: #0d0d0d;
            --card: #111111;
            --border: rgba(255,255,255,0.06);
            --white: #f5f5f0;
            --muted: rgba(245,245,240,0.45);
            --gold: #c9a84c;
            --gold-light: #e8c96b;
            --gold-dim: rgba(201,168,76,0.15);
            --radius: 16px;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            background: var(--black);
            color: var(--white);
            font-family: 'DM Sans', sans-serif;
            font-size: 16px;
            line-height: 1.7;
            overflow-x: hidden;
        }

        /* ── NOISE TEXTURE ── */
        body::before {
            content: '';
            position: fixed; inset: 0; z-index: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
        }

        /* ── NAV ── */
        nav {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            padding: 20px 5%;
            display: flex; align-items: center; justify-content: space-between;
            background: linear-gradient(to bottom, rgba(5,5,5,0.95) 0%, transparent 100%);
            backdrop-filter: blur(2px);
        }

        .nav-logo {
            font-family: 'Syne', sans-serif;
            font-size: 1.4rem; font-weight: 800;
            color: var(--white);
            text-decoration: none;
            letter-spacing: -0.02em;
        }

        .nav-logo span { color: var(--gold); }

        .nav-links {
            display: flex; gap: 2.5rem; list-style: none;
        }

        .nav-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            transition: color 0.3s;
        }

        .nav-links a:hover { color: var(--white); }

        .nav-cta {
            background: var(--gold);
            color: var(--black) !important;
            padding: 8px 20px;
            border-radius: 100px;
            font-weight: 600 !important;
            transition: background 0.3s, transform 0.2s !important;
        }

        .nav-cta:hover { background: var(--gold-light) !important; transform: translateY(-1px); }

        /* ── SECTIONS GENERAL ── */
        section { position: relative; z-index: 1; padding: 120px 5%; }

        .section-label {
            display: inline-flex; align-items: center; gap: 8px;
            font-size: 0.7rem; font-weight: 600; letter-spacing: 0.15em;
            text-transform: uppercase; color: var(--gold);
            margin-bottom: 16px;
        }

        .section-label::before {
            content: '';
            width: 24px; height: 1px; background: var(--gold);
        }

        h2.section-title {
            font-family: 'Syne', sans-serif;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            line-height: 1.1;
            color: var(--white);
            margin-bottom: 16px;
        }

        .section-sub {
            color: var(--muted);
            font-size: 1rem;
            max-width: 480px;
            margin-bottom: 64px;
        }

        /* ── HERO ── */
        #hero {
            min-height: 100vh;
            display: flex; align-items: center;
            padding-top: 100px;
            position: relative;
            overflow: hidden;
        }

        .hero-glow {
            position: absolute;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(201,168,76,0.12) 0%, transparent 70%);
            top: 50%; left: 55%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 80px;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .hero-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: var(--gold-dim);
            border: 1px solid rgba(201,168,76,0.3);
            border-radius: 100px;
            padding: 6px 16px;
            font-size: 0.8rem; color: var(--gold);
            margin-bottom: 28px;
            animation: fadeUp 0.6s ease both;
        }

        .hero-badge::before {
            content: ''; width: 6px; height: 6px;
            background: var(--gold); border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; } 50% { opacity: 0.3; }
        }

        h1 {
            font-family: 'Syne', sans-serif;
            font-size: clamp(3rem, 7vw, 5.5rem);
            font-weight: 800;
            letter-spacing: -0.04em;
            line-height: 1.0;
            margin-bottom: 24px;
            animation: fadeUp 0.6s 0.1s ease both;
        }

        h1 .highlight {
            color: transparent;
            -webkit-text-stroke: 1px rgba(201,168,76,0.6);
        }

        .hero-desc {
            color: var(--muted);
            font-size: 1.05rem;
            max-width: 440px;
            margin-bottom: 40px;
            animation: fadeUp 0.6s 0.2s ease both;
        }

        .hero-actions {
            display: flex; gap: 16px; align-items: center;
            flex-wrap: wrap;
            animation: fadeUp 0.6s 0.3s ease both;
        }

        .btn-primary {
            background: var(--gold);
            color: var(--black);
            padding: 14px 32px;
            border-radius: 100px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 0.02em;
            transition: all 0.3s;
            display: inline-flex; align-items: center; gap: 8px;
        }

        .btn-primary:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(201,168,76,0.3);
        }

        .btn-outline {
            background: transparent;
            color: var(--white);
            padding: 13px 28px;
            border-radius: 100px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            border: 1px solid var(--border);
            transition: all 0.3s;
        }

        .btn-outline:hover {
            border-color: rgba(255,255,255,0.2);
            background: rgba(255,255,255,0.04);
        }

        .hero-social {
            display: flex; gap: 12px; margin-top: 48px;
            animation: fadeUp 0.6s 0.4s ease both;
        }

        .social-link {
            width: 40px; height: 40px;
            border: 1px solid var(--border);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            color: var(--muted);
            text-decoration: none;
            transition: all 0.3s;
            font-size: 1rem;
        }

        .social-link:hover {
            border-color: var(--gold);
            color: var(--gold);
            background: var(--gold-dim);
        }

        .hero-photo-wrap {
            animation: fadeUp 0.6s 0.2s ease both;
        }

        .hero-photo {
            width: 320px; height: 400px;
            object-fit: cover;
            border-radius: 24px;
            border: 1px solid var(--border);
        }

        .hero-photo-placeholder {
            width: 320px; height: 400px;
            border-radius: 24px;
            border: 1px solid var(--border);
            background: var(--card);
            display: flex; align-items: center; justify-content: center;
            font-size: 5rem;
            color: var(--gold);
            font-family: 'Syne', sans-serif;
            font-weight: 800;
        }

        /* ── ABOUT ── */
        #about { background: var(--dark); }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: start;
            max-width: 1200px;
            margin: 0 auto;
        }

        .about-bio {
            color: rgba(245,245,240,0.7);
            font-size: 1.05rem;
            line-height: 1.8;
            margin-bottom: 32px;
        }

        .about-info {
            display: grid; grid-template-columns: 1fr 1fr; gap: 12px;
            margin-bottom: 32px;
        }

        .info-item {
            padding: 16px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        .info-label {
            font-size: 0.7rem; letter-spacing: 0.1em; text-transform: uppercase;
            color: var(--gold); margin-bottom: 4px;
        }

        .info-value {
            font-size: 0.9rem; color: var(--white); font-weight: 500;
        }

        .stats-grid {
            display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;
        }

        .stat-card {
            padding: 24px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            text-align: center;
        }

        .stat-num {
            font-family: 'Syne', sans-serif;
            font-size: 2.5rem; font-weight: 800;
            color: var(--gold);
            letter-spacing: -0.04em;
        }

        .stat-label {
            font-size: 0.75rem; color: var(--muted);
            text-transform: uppercase; letter-spacing: 0.08em; margin-top: 4px;
        }

        /* ── SKILLS ── */
        #skills { max-width: 1200px; margin: 0 auto; }

        .skills-categories {
            display: flex; flex-direction: column; gap: 48px;
            max-width: 1200px; margin: 0 auto;
        }

        .skill-category-title {
            font-family: 'Syne', sans-serif;
            font-size: 0.7rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.1em;
            color: var(--muted);
            margin-bottom: 20px;
        }

        .skills-row {
            display: flex; flex-wrap: wrap; gap: 12px;
        }

        .skill-chip {
            padding: 10px 20px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 100px;
            font-size: 0.875rem;
            color: var(--white);
            display: flex; align-items: center; gap: 10px;
            transition: all 0.3s;
        }

        .skill-chip:hover {
            border-color: var(--gold);
            background: var(--gold-dim);
            color: var(--gold);
        }

        .skill-level {
            width: 32px; height: 3px;
            background: rgba(255,255,255,0.1);
            border-radius: 100px; overflow: hidden;
        }

        .skill-level-bar {
            height: 100%; background: var(--gold); border-radius: 100px;
            transition: width 1s ease;
        }

        /* ── PORTFOLIO ── */
        #portfolio { background: var(--dark); }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .portfolio-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            transition: transform 0.3s, border-color 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .portfolio-card:hover {
            transform: translateY(-6px);
            border-color: rgba(201,168,76,0.3);
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }

        .portfolio-card.featured {
            grid-column: span 2;
        }

        .card-img {
            width: 100%; height: 220px;
            object-fit: cover;
            display: block;
        }

        .card-img-placeholder {
            width: 100%; height: 220px;
            background: linear-gradient(135deg, #1a1a1a 0%, #111 100%);
            display: flex; align-items: center; justify-content: center;
            font-size: 3rem;
        }

        .card-body {
            padding: 24px;
        }

        .card-category {
            font-size: 0.65rem; font-weight: 600;
            letter-spacing: 0.12em; text-transform: uppercase;
            color: var(--gold); margin-bottom: 8px;
        }

        .card-title {
            font-family: 'Syne', sans-serif;
            font-size: 1.2rem; font-weight: 700;
            color: var(--white); margin-bottom: 10px;
            letter-spacing: -0.02em;
        }

        .card-desc {
            font-size: 0.875rem; color: var(--muted);
            line-height: 1.6; margin-bottom: 20px;
        }

        .card-tags {
            display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 20px;
        }

        .tag {
            padding: 4px 10px;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--border);
            border-radius: 100px;
            font-size: 0.7rem; color: var(--muted);
        }

        .card-links {
            display: flex; gap: 12px;
        }

        .card-link {
            font-size: 0.8rem; font-weight: 500;
            color: var(--gold); text-decoration: none;
            display: flex; align-items: center; gap: 4px;
            transition: opacity 0.2s;
        }

        .card-link:hover { opacity: 0.7; }

        /* ── CONTACT ── */
        #contact {
            max-width: 700px;
            margin: 0 auto;
            text-align: center;
        }

        #contact .section-label, #contact .section-sub {
            margin-left: auto; margin-right: auto;
        }

        .contact-form {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 48px;
            text-align: left;
            margin-top: 48px;
        }

        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 0.75rem; font-weight: 600;
            letter-spacing: 0.08em; text-transform: uppercase;
            color: var(--muted); margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            background: rgba(255,255,255,0.04);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 12px 16px;
            color: var(--white);
            font-family: inherit;
            font-size: 0.9rem;
            outline: none;
            transition: border-color 0.3s;
        }

        input:focus, textarea:focus {
            border-color: var(--gold);
            background: rgba(201,168,76,0.04);
        }

        textarea { resize: vertical; min-height: 120px; }

        .form-submit {
            width: 100%;
            background: var(--gold);
            color: var(--black);
            padding: 14px 32px;
            border-radius: 100px;
            font-family: inherit;
            font-weight: 700;
            font-size: 0.95rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 8px;
        }

        .form-submit:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(201,168,76,0.25);
        }

        .alert-success {
            padding: 12px 16px;
            background: rgba(34,197,94,0.1);
            border: 1px solid rgba(34,197,94,0.3);
            border-radius: 10px;
            color: #4ade80;
            font-size: 0.875rem;
            margin-bottom: 20px;
        }

        /* ── FOOTER ── */
        footer {
            border-top: 1px solid var(--border);
            padding: 32px 5%;
            text-align: center;
            position: relative; z-index: 1;
        }

        footer p {
            font-size: 0.825rem; color: var(--muted);
        }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            opacity: 0; transform: translateY(24px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in.visible { opacity: 1; transform: translateY(0); }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: var(--black); }
        ::-webkit-scrollbar-thumb { background: rgba(201,168,76,0.3); border-radius: 2px; }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            nav { padding: 16px 5%; }
            .nav-links { display: none; }

            #hero { padding-top: 80px; }

            .hero-grid {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }

            .hero-photo-wrap { order: -1; display: flex; justify-content: center; }
            .hero-photo-placeholder { width: 200px; height: 240px; }
            .hero-photo { width: 200px; height: 240px; }

            .hero-social { justify-content: center; }
            .hero-actions { justify-content: center; }

            .about-grid { grid-template-columns: 1fr; }
            .portfolio-card.featured { grid-column: span 1; }

            .form-row { grid-template-columns: 1fr; }
            .contact-form { padding: 28px 24px; }
        }
    </style>
</head>
<body>

<!-- NAV -->
<nav>
    <a href="#" class="nav-logo">{{ substr($hero->name ?? 'Alex', 0, 1) }}<span>.</span></a>
    <ul class="nav-links">
        <li><a href="#about">Tentang</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#portfolio">Portfolio</a></li>
        <li><a href="#contact" class="nav-cta">Hubungi Saya</a></li>
    </ul>
</nav>

<!-- HERO -->
<section id="hero">
    <div class="hero-glow"></div>
    <div class="hero-grid">
        <div>
            <div class="hero-badge">Available for work</div>
            <h1>
                {{ $hero->name ?? 'Your Name' }}<br>
                <span class="highlight">{{ $hero->tagline ?? 'Developer' }}</span>
            </h1>
            <p class="hero-desc">{{ $hero->description ?? 'Welcome to my portfolio.' }}</p>
            <div class="hero-actions">
                <a href="#portfolio" class="btn-primary">
                    Lihat Portfolio
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                @if($hero->cv_file)
                    <a href="{{ asset('storage/'.$hero->cv_file) }}" target="_blank" class="btn-outline">Download CV</a>
                @else
                    <a href="#contact" class="btn-outline">Hubungi Saya</a>
                @endif
            </div>
            <div class="hero-social">
                @if($hero->github_url)
                    <a href="{{ $hero->github_url }}" target="_blank" class="social-link" title="GitHub">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                @endif
                @if($hero->linkedin_url)
                    <a href="{{ $hero->linkedin_url }}" target="_blank" class="social-link" title="LinkedIn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                @endif
                @if($hero->instagram_url)
                    <a href="{{ $hero->instagram_url }}" target="_blank" class="social-link" title="Instagram">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                @endif
            </div>
        </div>
        <div class="hero-photo-wrap">
            @if($hero->profile_photo)
                <img src="{{ asset('storage/'.$hero->profile_photo) }}" alt="{{ $hero->name }}" class="hero-photo">
            @else
                <div class="hero-photo-placeholder">{{ strtoupper(substr($hero->name ?? 'A', 0, 1)) }}</div>
            @endif
        </div>
    </div>
</section>

<!-- ABOUT -->
<section id="about">
    <div class="about-grid">
        <div class="fade-in">
            <span class="section-label">Tentang Saya</span>
            <h2 class="section-title">{{ $about->title ?? 'Tentang Saya' }}</h2>
            <p class="about-bio">{{ $about->bio ?? '' }}</p>
            <div class="about-info">
                @if($about->location)
                    <div class="info-item">
                        <div class="info-label">Lokasi</div>
                        <div class="info-value">{{ $about->location }}</div>
                    </div>
                @endif
                @if($about->email)
                    <div class="info-item">
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ $about->email }}</div>
                    </div>
                @endif
                @if($about->phone)
                    <div class="info-item">
                        <div class="info-label">Telepon</div>
                        <div class="info-value">{{ $about->phone }}</div>
                    </div>
                @endif
            </div>
        </div>
        <div class="fade-in">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-num">{{ $about->years_experience ?? 0 }}+</div>
                    <div class="stat-label">Tahun Pengalaman</div>
                </div>
                <div class="stat-card">
                    <div class="stat-num">{{ $about->projects_done ?? 0 }}+</div>
                    <div class="stat-label">Proyek Selesai</div>
                </div>
                <div class="stat-card">
                    <div class="stat-num">{{ $about->clients ?? 0 }}+</div>
                    <div class="stat-label">Klien Puas</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SKILLS -->
<section id="skills">
    <div class="fade-in" style="max-width:1200px;margin:0 auto;">
        <span class="section-label">Keahlian</span>
        <h2 class="section-title">Skills & Tools</h2>
        <p class="section-sub">Teknologi yang saya kuasai untuk membangun solusi digital yang handal.</p>
    </div>
    <div class="skills-categories" style="max-width:1200px;margin:0 auto;">
        @foreach($skills as $category => $categorySkills)
            <div class="fade-in">
                <div class="skill-category-title">{{ $category }}</div>
                <div class="skills-row">
                    @foreach($categorySkills as $skill)
                        <div class="skill-chip">
                            {{ $skill->name }}
                            <div class="skill-level">
                                <div class="skill-level-bar" style="width: {{ $skill->level }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- PORTFOLIO -->
<section id="portfolio">
    <div class="fade-in" style="max-width:1200px;margin:0 auto;">
        <span class="section-label">Portfolio</span>
        <h2 class="section-title">Proyek Terpilih</h2>
        <p class="section-sub">Beberapa karya terbaik yang telah saya kerjakan.</p>
    </div>
    <div class="portfolio-grid">
        @foreach($portfolios as $project)
            <div class="portfolio-card fade-in {{ $project->is_featured ? 'featured' : '' }}">
                @if($project->image)
                    <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}" class="card-img">
                @else
                    <div class="card-img-placeholder">🚀</div>
                @endif
                <div class="card-body">
                    <div class="card-category">{{ $project->category }}</div>
                    <div class="card-title">{{ $project->title }}</div>
                    <p class="card-desc">{{ $project->description }}</p>
                    @if($project->tech_stack)
                        <div class="card-tags">
                            @foreach($project->tech_stack as $tech)
                                <span class="tag">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                    @endif
                    <div class="card-links">
                        @if($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" class="card-link">
                                Live Demo
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6M15 3h6v6M10 14L21 3"/></svg>
                            </a>
                        @endif
                        @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" class="card-link">
                                GitHub
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6M15 3h6v6M10 14L21 3"/></svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- CONTACT -->
<section id="contact">
    <div class="fade-in">
        <span class="section-label" style="justify-content:center">Kontak</span>
        <h2 class="section-title" style="text-align:center">Mari Berkolaborasi</h2>
        <p class="section-sub" style="text-align:center;margin:0 auto 0 auto;">Punya proyek menarik? Saya siap membantu mewujudkannya.</p>
    </div>
    <div class="contact-form fade-in">
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('contact') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" placeholder="John Doe" required value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="john@email.com" required value="{{ old('email') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="subject">Subjek</label>
                <input type="text" id="subject" name="subject" placeholder="Tentang proyek..." value="{{ old('subject') }}">
            </div>
            <div class="form-group">
                <label for="message">Pesan</label>
                <textarea id="message" name="message" placeholder="Ceritakan proyek Anda..." required>{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="form-submit">Kirim Pesan →</button>
        </form>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <p>{{ \App\Models\SiteSetting::get('footer_text', '© '.date('Y').' Portfolio. All rights reserved.') }}</p>
</footer>

<script>
    // Intersection Observer for scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => entry.target.classList.add('visible'), i * 80);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

    // Smooth nav active state
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-links a[href^="#"]');

    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(s => {
            if (window.scrollY >= s.offsetTop - 100) current = s.id;
        });
        navLinks.forEach(a => {
            a.style.color = a.getAttribute('href') === '#' + current
                ? 'var(--white)' : 'var(--muted)';
        });
    });
</script>

</body>
</html>
