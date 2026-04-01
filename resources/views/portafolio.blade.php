<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio — Desarrollo de Sistemas a la Medida</title>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,600;0,9..144,700;0,9..144,900;1,9..144,300;1,9..144,600&family=DM+Mono:wght@300;400;500&family=Instrument+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        :root {
            --bg: #0a0908;
            --surface: #131210;
            --surface2: #1c1a17;
            --border: #2a2721;
            --border2: #3a3630;
            --text: #f0ebe2;
            --muted: #7a7268;
            --muted2: #4a4640;
            --amber: #d4952a;
            --amber-dim: #a07020;
            --amber-glow: rgba(212, 149, 42, 0.12);
            --amber-glow2: rgba(212, 149, 42, 0.06);
            --green: #3d8b5e;
            --green-dim: #2a6b46;
            --red: #c04a35;
        }

        html {
            scroll-behavior: smooth
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Instrument Sans', sans-serif;
            font-size: 15px;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* ─── NOISE TEXTURE OVERLAY ─── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 1000;
            opacity: .5;
        }

        /* ─── NAV ─── */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 900;
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(10, 9, 8, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
        }

        .nav-logo {
            font-family: 'Fraunces', serif;
            font-size: 17px;
            font-weight: 700;
            color: var(--amber);
            letter-spacing: -0.5px;
        }

        .nav-logo span {
            color: var(--text);
            font-weight: 300;
            font-style: italic;
        }

        .nav-links {
            display: flex;
            gap: 28px;
        }

        .nav-links a {
            font-size: 12.5px;
            font-weight: 500;
            letter-spacing: 0.5px;
            color: var(--muted);
            text-decoration: none;
            text-transform: uppercase;
            transition: color .2s;
        }

        .nav-links a:hover {
            color: var(--text);
        }

        /* ─── HERO ─── */
        .hero {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 0 40px 80px;
            position: relative;
            overflow: hidden;
        }

        .hero-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(212, 149, 42, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(212, 149, 42, 0.04) 1px, transparent 1px);
            background-size: 60px 60px;
            mask-image: radial-gradient(ellipse 80% 60% at 50% 100%, black 30%, transparent 80%);
        }

        .hero-glow {
            position: absolute;
            bottom: -200px;
            left: 50%;
            transform: translateX(-50%);
            width: 800px;
            height: 500px;
            background: radial-gradient(ellipse, rgba(212, 149, 42, 0.15) 0%, transparent 65%);
            pointer-events: none;
        }

        .hero-eyebrow {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            font-weight: 400;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--amber);
            margin-bottom: 24px;
            opacity: 0;
            animation: fadeUp .8s .1s forwards;
        }

        .hero h1 {
            font-family: 'Fraunces', serif;
            font-size: clamp(42px, 7vw, 88px);
            font-weight: 900;
            line-height: .97;
            letter-spacing: -3px;
            max-width: 780px;
            margin-bottom: 28px;
            opacity: 0;
            animation: fadeUp .8s .25s forwards;
        }

        .hero h1 em {
            font-style: italic;
            font-weight: 300;
            color: var(--amber);
        }

        .hero-sub {
            font-size: 16px;
            color: var(--muted);
            font-weight: 400;
            max-width: 500px;
            line-height: 1.7;
            margin-bottom: 40px;
            opacity: 0;
            animation: fadeUp .8s .4s forwards;
        }

        .hero-cta {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            opacity: 0;
            animation: fadeUp .8s .55s forwards;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 26px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .3px;
            text-decoration: none;
            transition: all .2s;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: var(--amber);
            color: #0a0908;
        }

        .btn-primary:hover {
            background: #e8a830;
            transform: translateY(-1px);
        }

        .btn-outline {
            background: transparent;
            color: var(--text);
            border: 1px solid var(--border2);
        }

        .btn-outline:hover {
            border-color: var(--amber);
            color: var(--amber);
        }

        /* ─── STATS BAR ─── */
        .stats-bar {
            background: var(--surface);
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            padding: 28px 40px;
            display: flex;
            gap: 0;
            overflow-x: auto;
        }

        .stat {
            flex: 1;
            min-width: 140px;
            padding: 0 32px;
            border-right: 1px solid var(--border);
        }

        .stat:first-child {
            padding-left: 0;
        }

        .stat:last-child {
            border-right: none;
        }

        .stat-num {
            font-family: 'Fraunces', serif;
            font-size: 36px;
            font-weight: 700;
            color: var(--amber);
            line-height: 1;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 12px;
            color: var(--muted);
            font-weight: 400;
            letter-spacing: .3px;
        }

        /* ─── SECTIONS ─── */
        section {
            padding: 80px 40px;
        }

        .section-label {
            font-family: 'DM Mono', monospace;
            font-size: 10.5px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--amber);
            margin-bottom: 12px;
        }

        .section-title {
            font-family: 'Fraunces', serif;
            font-size: clamp(28px, 4vw, 42px);
            font-weight: 700;
            letter-spacing: -1.5px;
            line-height: 1.1;
            margin-bottom: 8px;
        }

        .section-title em {
            font-style: italic;
            font-weight: 300;
            color: var(--amber);
        }

        .section-desc {
            font-size: 15px;
            color: var(--muted);
            max-width: 540px;
            line-height: 1.7;
            margin-bottom: 52px;
        }

        /* ─── PROJECTS ─── */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2px;
        }

        .project-card {
            background: var(--surface);
            border: 1px solid var(--border);
            padding: 36px;
            position: relative;
            overflow: hidden;
            transition: border-color .25s, background .25s;
            cursor: default;
        }

        .project-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--amber), transparent);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .35s;
        }

        .project-card:hover {
            background: var(--surface2);
            border-color: var(--border2);
        }

        .project-card:hover::before {
            transform: scaleX(1);
        }

        .project-card.featured {
            grid-column: span 2;
            background: var(--surface2);
        }

        .project-card.featured::before {
            transform: scaleX(1);
        }

        @media(max-width:700px) {
            .project-card.featured {
                grid-column: span 1;
            }
        }

        .project-tag {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-family: 'DM Mono', monospace;
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 2px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .tag-amber {
            background: var(--amber-glow);
            color: var(--amber);
            border: 1px solid rgba(212, 149, 42, .2);
        }

        .tag-green {
            background: rgba(61, 139, 94, .1);
            color: var(--green);
            border: 1px solid rgba(61, 139, 94, .25);
        }

        .tag-blue {
            background: rgba(60, 120, 200, .1);
            color: #6aabff;
            border: 1px solid rgba(60, 120, 200, .25);
        }

        .tag-red {
            background: rgba(192, 74, 53, .1);
            color: #e07060;
            border: 1px solid rgba(192, 74, 53, .25);
        }

        .project-title {
            font-family: 'Fraunces', serif;
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -.5px;
            margin-bottom: 10px;
            line-height: 1.15;
        }

        .project-client {
            font-size: 12px;
            color: var(--muted);
            margin-bottom: 16px;
            font-family: 'DM Mono', monospace;
            letter-spacing: .5px;
        }

        .project-desc {
            font-size: 13.5px;
            color: var(--muted);
            line-height: 1.7;
            margin-bottom: 24px;
        }

        .project-modules {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 24px;
        }

        .module-chip {
            font-size: 11.5px;
            padding: 4px 10px;
            background: rgba(255, 255, 255, .04);
            border: 1px solid var(--border2);
            border-radius: 3px;
            color: var(--text);
        }

        .project-meta {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        .meta-item {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .meta-label {
            font-size: 10px;
            color: var(--muted2);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-family: 'DM Mono', monospace;
        }

        .meta-val {
            font-size: 13px;
            color: var(--text);
            font-weight: 500;
        }

        .meta-val.amber {
            color: var(--amber);
        }

        /* MOCKUP SCREENS */
        .mockup-area {
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 28px;
            overflow: hidden;
        }

        .mockup-bar {
            display: flex;
            gap: 5px;
            margin-bottom: 14px;
        }

        .mockup-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .d-red {
            background: #ff5f57;
        }

        .d-yellow {
            background: #ffbd2e;
        }

        .d-green {
            background: #28c840;
        }

        .screen-grid {
            display: grid;
            gap: 8px;
        }

        .screen-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }

        .screen-item {
            background: var(--surface2);
            border-radius: 5px;
            padding: 12px 14px;
            border: 1px solid var(--border2);
        }

        .screen-header {
            font-family: 'DM Mono', monospace;
            font-size: 9px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--amber-dim);
            margin-bottom: 8px;
        }

        .screen-rows {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .screen-row-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .screen-label {
            font-size: 10px;
            color: var(--muted);
        }

        .screen-bar {
            height: 4px;
            border-radius: 2px;
            background: var(--border2);
            flex: 1;
            margin: 0 8px;
        }

        .screen-bar-fill {
            height: 100%;
            border-radius: 2px;
            background: var(--amber);
        }

        .screen-val {
            font-size: 10px;
            color: var(--text);
            font-family: 'DM Mono', monospace;
        }

        .ticket-preview {
            background: var(--surface2);
            border: 1px solid var(--border2);
            border-radius: 5px;
            padding: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ticket-left h4 {
            font-family: 'Fraunces', serif;
            font-size: 13px;
            margin-bottom: 2px;
        }

        .ticket-left p {
            font-size: 10px;
            color: var(--muted);
        }

        .ticket-qr {
            width: 32px;
            height: 32px;
            background: var(--text);
            border-radius: 3px;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 1px;
            padding: 2px;
        }

        .qr-px {
            background: var(--bg);
        }

        .qr-px.on {
            background: transparent;
        }

        .pos-screen {
            display: grid;
            grid-template-columns: 1fr 100px;
            gap: 8px;
        }

        .pos-items {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .pos-item {
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 3px;
            padding: 7px 10px;
            display: flex;
            justify-content: space-between;
            font-size: 10px;
        }

        .pos-item-name {
            color: var(--text);
        }

        .pos-item-price {
            color: var(--amber);
            font-family: 'DM Mono', monospace;
        }

        .pos-total {
            background: var(--amber);
            border-radius: 3px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--bg);
            font-family: 'Fraunces', serif;
            font-size: 11px;
            font-weight: 700;
            text-align: center;
            padding: 8px;
            gap: 2px;
        }

        /* ─── PRECIOS ─── */
        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 16px;
            margin-bottom: 48px;
        }

        .price-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 32px 28px;
            position: relative;
            transition: border-color .25s, transform .25s;
        }

        .price-card:hover {
            border-color: var(--border2);
            transform: translateY(-3px);
        }

        .price-card.recommended {
            border-color: var(--amber);
            background: var(--surface2);
        }

        .recommended-badge {
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--amber);
            color: var(--bg);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 3px 12px;
            border-radius: 20px;
            white-space: nowrap;
            font-family: 'DM Mono', monospace;
        }

        .price-tier {
            font-family: 'DM Mono', monospace;
            font-size: 10.5px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 10px;
        }

        .price-name {
            font-family: 'Fraunces', serif;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 6px;
            letter-spacing: -.5px;
        }

        .price-desc {
            font-size: 12.5px;
            color: var(--muted);
            margin-bottom: 24px;
            line-height: 1.6;
        }

        .price-amount {
            display: flex;
            align-items: baseline;
            gap: 5px;
            margin-bottom: 6px;
        }

        .price-currency {
            font-size: 14px;
            color: var(--muted);
            font-weight: 600;
        }

        .price-num {
            font-family: 'Fraunces', serif;
            font-size: 40px;
            font-weight: 700;
            color: var(--amber);
            letter-spacing: -2px;
            line-height: 1;
        }

        .price-period {
            font-size: 12px;
            color: var(--muted);
        }

        .price-note {
            font-size: 11.5px;
            color: var(--muted);
            margin-bottom: 24px;
            padding-bottom: 24px;
            border-bottom: 1px solid var(--border);
            font-style: italic;
        }

        .price-features {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .price-features li {
            font-size: 13px;
            display: flex;
            gap: 9px;
            align-items: flex-start;
            color: var(--muted);
        }

        .price-features li::before {
            content: '—';
            color: var(--amber);
            font-weight: 700;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .price-features li strong {
            color: var(--text);
        }

        /* MANTENIMIENTO */
        .maint-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 14px;
        }

        .maint-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 24px;
        }

        .maint-icon {
            font-size: 24px;
            margin-bottom: 12px;
        }

        .maint-title {
            font-family: 'Fraunces', serif;
            font-size: 17px;
            font-weight: 600;
            margin-bottom: 4px;
            letter-spacing: -.3px;
        }

        .maint-price {
            font-family: 'DM Mono', monospace;
            font-size: 13px;
            color: var(--amber);
            margin-bottom: 10px;
        }

        .maint-desc {
            font-size: 12.5px;
            color: var(--muted);
            line-height: 1.6;
        }

        /* PAYMENT PLAN */
        .payment-timeline {
            display: flex;
            gap: 0;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 6px;
            overflow: hidden;
            margin-bottom: 14px;
        }

        .payment-step {
            flex: 1;
            padding: 24px 20px;
            border-right: 1px solid var(--border);
            position: relative;
        }

        .payment-step:last-child {
            border-right: none;
        }

        .payment-step-num {
            font-family: 'DM Mono', monospace;
            font-size: 10px;
            letter-spacing: 2px;
            color: var(--amber);
            margin-bottom: 8px;
        }

        .payment-step-title {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .payment-step-pct {
            font-family: 'Fraunces', serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--amber);
            letter-spacing: -1px;
        }

        .payment-step-desc {
            font-size: 11.5px;
            color: var(--muted);
            margin-top: 4px;
        }

        @media(max-width:600px) {
            .payment-timeline {
                flex-direction: column;
            }

            .payment-step {
                border-right: none;
                border-bottom: 1px solid var(--border);
            }

            .payment-step:last-child {
                border-bottom: none;
            }
        }

        /* ─── CONTACT ─── */
        .contact-wrap {
            max-width: 560px;
        }

        .contact-cta-card {
            max-width: 760px;
            padding: 32px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 24px;
            box-shadow: 0 24px 60px rgba(0, 0, 0, .22);
            margin-top: 24px;
        }

        .cta-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            margin-top: 22px;
        }

        .contact-cta-features {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin-top: 22px;
        }

        .contact-cta-features span {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.65;
        }

        .contact-form {
            display: grid;
            gap: 18px;
            margin-top: 26px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .input-group {
            display: grid;
            gap: 8px;
        }

        .input-group label {
            font-size: 12px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-family: 'DM Mono', monospace;
        }

        .input-group input,
        .input-group textarea,
        .input-group select {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--surface2);
            color: var(--text);
            padding: 14px 16px;
            font-size: 14px;
            resize: vertical;
        }

        .input-group textarea {
            min-height: 160px;
        }

        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        .form-note {
            font-size: 13px;
            color: var(--muted);
        }

        .alert {
            background: rgba(61, 139, 94, .12);
            border: 1px solid rgba(61, 139, 94, .25);
            color: var(--text);
            padding: 16px;
            border-radius: 8px;
        }

        .contact-item {
            display: flex;
            gap: 16px;
            align-items: flex-start;
            padding: 18px 0;
            border-bottom: 1px solid var(--border);
            color: inherit;
            text-decoration: none;
        }

        .contact-item:last-child {
            border-bottom: none;
        }

        .contact-item:hover {
            background: rgba(255, 166, 68, .08);
        }

        .contact-item a {
            color: inherit;
            text-decoration: none;
        }

        .contact-icon {
            width: 36px;
            height: 36px;
            background: var(--amber-glow2);
            border: 1px solid rgba(212, 149, 42, .15);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .contact-info h4 {
            font-size: 12px;
            color: var(--muted);
            margin-bottom: 2px;
            text-transform: uppercase;
            letter-spacing: .5px;
            font-family: 'DM Mono', monospace;
        }

        .contact-info p {
            font-size: 14px;
            color: var(--text);
        }

        /* ─── FOOTER ─── */
        footer {
            background: var(--surface);
            border-top: 1px solid var(--border);
            padding: 28px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .footer-logo {
            font-family: 'Fraunces', serif;
            font-size: 15px;
            font-weight: 700;
            color: var(--amber);
        }

        .footer-copy {
            font-size: 12px;
            color: var(--muted);
        }

        @include('components.social-floating-styles')

        /* ─── ANIMATIONS ─── */
        @@keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ─── RESPONSIVE ─── */
        @media(max-width:768px) {
            nav {
                padding: 14px 20px;
            }

            .nav-links {
                display: none;
            }

            section {
                padding: 60px 20px;
            }

            .hero {
                padding: 0 20px 64px;
            }

            .stats-bar {
                padding: 24px 20px;
            }

            footer {
                padding: 24px 20px;
            }
        }
    </style>
</head>

<body>

    <!-- NAV -->
    <nav>
        <div class="nav-logo">Dev<span>Systems</span></div>
        <div class="nav-links">
            <a href="#proyectos">Proyectos</a>
            <a href="#precios">Precios</a>
            <a href="{{ route('contacto.form') }}">Contacto</a>
        </div>
    </nav>

    <!-- HERO -->
    <div class="hero">
        <div class="hero-grid"></div>
        <div class="hero-glow"></div>
        <div class="hero-eyebrow">// Desarrollo de Software · México</div>
        <h1>Sistemas que hacen<br><em>crecer</em> tu negocio.</h1>
        <p class="hero-sub">Soluciones a la medida para tiendas, farmacias, eventos y más. Software hecho por alguien que entiende cómo funciona tu negocio.</p>
        <div class="hero-cta">
            <a href="#proyectos" class="btn btn-primary">Ver proyectos →</a>
            <a href="#precios" class="btn btn-outline">Cotizar mi sistema</a>
            <a href="{{ route('contacto.form') }}" class="btn btn-primary">Contáctame</a>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats-bar">
        <div class="stat">
            <div class="stat-num">4</div>
            <div class="stat-label">Sistemas entregados</div>
        </div>
        <div class="stat">
            <div class="stat-num">3</div>
            <div class="stat-label">Industrias atendidas</div>
        </div>
        <div class="stat">
            <div class="stat-num">100%</div>
            <div class="stat-label">A la medida del cliente</div>
        </div>
        <div class="stat">
            <div class="stat-num">∞</div>
            <div class="stat-label">Soporte post-entrega</div>
        </div>
    </div>

    <!-- PROYECTOS -->
    <section id="proyectos">
        <div class="section-label">// 01 — Portafolio</div>
        <h2 class="section-title">Proyectos <em>reales</em>,<br>negocios reales.</h2>
        <p class="section-desc">Cada sistema fue construido desde cero, adaptado al flujo de trabajo del cliente, no al revés.</p>

        <div class="projects-grid">

            <!-- PROYECTO 1: CHARRERÍA — FEATURED -->
            <div class="project-card featured">
                <div class="project-tag tag-amber">⭐ Proyecto Destacado</div>
                <div class="project-title">Sistema Integral de Gestión para Eventos de Charrería</div>
                <div class="project-client">// Asociación Charra · Guanajuato</div>
                <div class="project-desc">Sistema completo de tres módulos para la administración de eventos charros: sitio web con venta de boletos en línea, aplicación de escritorio para punto de venta en taquilla, y sistema interno de consumibles. Todo sincronizado y operando en tiempo real durante el evento.</div>

                <!-- MOCKUP -->
                <div class="mockup-area">
                    <div class="mockup-bar">
                        <div class="mockup-dot d-red"></div>
                        <div class="mockup-dot d-yellow"></div>
                        <div class="mockup-dot d-green"></div>
                    </div>
                    <div class="screen-grid">
                        <!-- Ticket preview -->
                        <div class="screen-item">
                            <div class="screen-header">Venta de Boletos Online</div>
                            <div style="display:flex;flex-direction:column;gap:6px;">
                                <div class="ticket-preview">
                                    <div class="ticket-left">
                                        <h4>Jaripeo Nocturno</h4>
                                        <p>Sábado 15 Marzo · Butaca A-12</p>
                                    </div>
                                    <div class="ticket-qr">
                                        <div class="qr-px on"></div>
                                        <div class="qr-px"></div>
                                        <div class="qr-px on"></div>
                                        <div class="qr-px"></div>
                                        <div class="qr-px on"></div>
                                        <div class="qr-px"></div>
                                        <div class="qr-px on"></div>
                                        <div class="qr-px"></div>
                                        <div class="qr-px on"></div>
                                        <div class="qr-px"></div>
                                        <div class="qr-px on"></div>
                                        <div class="qr-px on"></div>
                                        <div class="qr-px"></div>
                                        <div class="qr-px on"></div>
                                        <div class="qr-px on"></div>
                                        <div class="qr-px"></div>
                                        <div class="qr-px"></div>
                                        <div class="qr-px on"></div>
                                        <div class="qr-px"></div>
                                        <div class="qr-px on"></div>
                                        <div class="qr-px on"></div>
                                        <div class="qr-px"></div>
                                        <div class="qr-px on"></div>
                                        <div class="qr-px on"></div>
                                        <div class="qr-px"></div>
                                    </div>
                                </div>
                                <div style="display:flex;gap:6px;">
                                    <div style="flex:1;background:var(--bg);border:1px solid var(--border);border-radius:3px;padding:6px 10px;text-align:center;">
                                        <div style="font-size:9px;color:var(--muted);margin-bottom:2px;">General</div>
                                        <div style="font-size:11px;color:var(--amber);font-family:'DM Mono',monospace;">$150</div>
                                    </div>
                                    <div style="flex:1;background:var(--amber-glow);border:1px solid rgba(212,149,42,.3);border-radius:3px;padding:6px 10px;text-align:center;">
                                        <div style="font-size:9px;color:var(--amber);margin-bottom:2px;">VIP</div>
                                        <div style="font-size:11px;color:var(--amber);font-family:'DM Mono',monospace;">$350</div>
                                    </div>
                                    <div style="flex:1;background:var(--bg);border:1px solid var(--border);border-radius:3px;padding:6px 10px;text-align:center;">
                                        <div style="font-size:9px;color:var(--muted);margin-bottom:2px;">Palco</div>
                                        <div style="font-size:11px;color:var(--amber);font-family:'DM Mono',monospace;">$500</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- POS consumibles -->
                        <div class="screen-item">
                            <div class="screen-header">POS de Consumibles</div>
                            <div class="pos-screen">
                                <div class="pos-items">
                                    <div class="pos-item"><span class="pos-item-name">Cerveza 355ml</span><span class="pos-item-price">$45</span></div>
                                    <div class="pos-item"><span class="pos-item-name">Taco de barbacoa</span><span class="pos-item-price">$35</span></div>
                                    <div class="pos-item"><span class="pos-item-name">Agua 600ml</span><span class="pos-item-price">$20</span></div>
                                    <div class="pos-item"><span class="pos-item-name">Refresco lata</span><span class="pos-item-price">$30</span></div>
                                </div>
                                <div class="pos-total">
                                    <div style="font-size:8px;letter-spacing:1px;text-transform:uppercase;font-family:'DM Mono',monospace;">Total</div>
                                    <div style="font-size:18px;letter-spacing:-1px;">$130</div>
                                    <div style="font-size:7px;color:rgba(10,9,8,.6);font-family:'DM Mono',monospace;">COBRAR</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="project-modules">
                    <span class="module-chip">Sitio Web Público</span>
                    <span class="module-chip">Venta de Boletos Online</span>
                    <span class="module-chip">POS Taquilla (Escritorio)</span>
                    <span class="module-chip">POS Consumibles</span>
                    <span class="module-chip">Control de Acceso</span>
                    <span class="module-chip">Reportes por Evento</span>
                </div>
                <div class="project-meta">
                    <div class="meta-item">
                        <span class="meta-label">Módulos</span>
                        <span class="meta-val">3 sistemas</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Soporte activo</span>
                        <span class="meta-val amber">$2,500 / evento</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Tipo</span>
                        <span class="meta-val">Web + Escritorio</span>
                    </div>
                </div>
            </div>

            <!-- PROYECTO 2: FARMACIA -->
            <div class="project-card">
                <div class="project-tag tag-green">Salud</div>
                <div class="project-title">Sistema de Administración para Farmacia-Consultorio</div>
                <div class="project-client">// Farmacia con consultorio anexo</div>
                <div class="project-desc">Sistema que integra la gestión de inventario de medicamentos, ventas en caja, control de caducidades y registro de consultas del médico en un solo sistema. Manejo de recetas y seguimiento de pacientes.</div>

                <!-- MOCKUP farmacia -->
                <div class="mockup-area">
                    <div class="mockup-bar">
                        <div class="mockup-dot d-red"></div>
                        <div class="mockup-dot d-yellow"></div>
                        <div class="mockup-dot d-green"></div>
                    </div>
                    <div class="screen-item">
                        <div class="screen-header">Inventario de Medicamentos</div>
                        <div class="screen-rows">
                            <div class="screen-row-item">
                                <span class="screen-label">Paracetamol 500mg</span>
                                <div class="screen-bar">
                                    <div class="screen-bar-fill" style="width:82%"></div>
                                </div>
                                <span class="screen-val">82u</span>
                            </div>
                            <div class="screen-row-item">
                                <span class="screen-label">Amoxicilina 500mg</span>
                                <div class="screen-bar">
                                    <div class="screen-bar-fill" style="width:45%;background:var(--amber)"></div>
                                </div>
                                <span class="screen-val">45u</span>
                            </div>
                            <div class="screen-row-item">
                                <span class="screen-label">Ibuprofeno 400mg</span>
                                <div class="screen-bar">
                                    <div class="screen-bar-fill" style="width:12%;background:#c04a35"></div>
                                </div>
                                <span class="screen-val" style="color:#e07060">12u ⚠</span>
                            </div>
                            <div class="screen-row-item">
                                <span class="screen-label">Omeprazol 20mg</span>
                                <div class="screen-bar">
                                    <div class="screen-bar-fill" style="width:60%"></div>
                                </div>
                                <span class="screen-val">60u</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="project-modules">
                    <span class="module-chip">Caja y ventas</span>
                    <span class="module-chip">Control de caducidades</span>
                    <span class="module-chip">Inventario con alertas</span>
                    <span class="module-chip">Registro de consultas</span>
                    <span class="module-chip">Expediente de pacientes</span>
                </div>
                <div class="project-meta">
                    <div class="meta-item">
                        <span class="meta-label">Módulos</span>
                        <span class="meta-val">2 áreas</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Tipo</span>
                        <span class="meta-val">Escritorio</span>
                    </div>
                </div>
            </div>

            <!-- PROYECTO 3: REFACCIONARIA -->
            <div class="project-card">
                <div class="project-tag tag-blue">Autopartes</div>
                <div class="project-title">Sistema de Administración para Refaccionaria</div>
                <div class="project-client">// Refaccionaria automotriz local</div>
                <div class="project-desc">Control total del negocio: catálogo de piezas con compatibilidad por modelo y año, inventario con múltiples almacenes, cuentas por cobrar a talleres y ventas en mostrador con búsqueda rápida por número de parte.</div>

                <!-- MOCKUP refaccionaria -->
                <div class="mockup-area">
                    <div class="mockup-bar">
                        <div class="mockup-dot d-red"></div>
                        <div class="mockup-dot d-yellow"></div>
                        <div class="mockup-dot d-green"></div>
                    </div>
                    <div style="display:flex;flex-direction:column;gap:6px;">
                        <div style="background:var(--bg);border:1px solid var(--border);border-radius:3px;padding:7px 10px;display:flex;align-items:center;gap:8px;">
                            <span style="font-size:9px;color:var(--muted);font-family:'DM Mono',monospace;">BUSCAR:</span>
                            <span style="font-size:10px;color:var(--amber);">Balata delantera Tsuru 2015</span>
                        </div>
                        <div class="screen-item">
                            <div class="screen-header">Resultados — 3 coincidencias</div>
                            <div style="display:flex;flex-direction:column;gap:4px;">
                                <div style="display:flex;justify-content:space-between;padding:5px 0;border-bottom:1px solid var(--border);">
                                    <div>
                                        <div style="font-size:10px;color:var(--text);">Balata D. Brembo #BS-1140</div>
                                        <div style="font-size:9px;color:var(--muted);">Nissan Tsuru 2010–2017</div>
                                    </div>
                                    <div style="text-align:right;">
                                        <div style="font-size:10px;color:var(--amber);font-family:'DM Mono',monospace;">$320</div>
                                        <div style="font-size:9px;color:var(--green);">4 en stock</div>
                                    </div>
                                </div>
                                <div style="display:flex;justify-content:space-between;padding:5px 0;">
                                    <div>
                                        <div style="font-size:10px;color:var(--text);">Balata D. Hella #HB-440</div>
                                        <div style="font-size:9px;color:var(--muted);">Compatible Tsuru</div>
                                    </div>
                                    <div style="text-align:right;">
                                        <div style="font-size:10px;color:var(--amber);font-family:'DM Mono',monospace;">$280</div>
                                        <div style="font-size:9px;color:var(--green);">8 en stock</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="project-modules">
                    <span class="module-chip">Catálogo de piezas</span>
                    <span class="module-chip">Compatibilidad por vehículo</span>
                    <span class="module-chip">Inventario multi-almacén</span>
                    <span class="module-chip">Cuentas por cobrar</span>
                    <span class="module-chip">Ventas en mostrador</span>
                </div>
                <div class="project-meta">
                    <div class="meta-item">
                        <span class="meta-label">Módulos</span>
                        <span class="meta-val">4 módulos</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Tipo</span>
                        <span class="meta-val">Escritorio</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- PRECIOS -->
    <section id="precios" style="background:var(--surface);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
        <div class="section-label">// 02 — Inversión</div>
        <h2 class="section-title">Precios <em>claros</em>,<br>sin sorpresas.</h2>
        <p class="section-desc">Cada proyecto es único, pero estos paquetes son una referencia directa de lo que incluye cada nivel de desarrollo.</p>

        <div class="pricing-grid">

            <!-- BÁSICO -->
            <div class="price-card">
                <div class="price-tier">Paquete 01</div>
                <div class="price-name">Esencial</div>
                <div class="price-desc">Para negocios pequeños que necesitan control de ventas e inventario básico.</div>
                <div class="price-amount">
                    <span class="price-currency">$</span>
                    <span class="price-num">8,500</span>
                </div>
                <div class="price-period">pago único · MXN</div>
                <div class="price-note">Ideal para: tiendas de abarrotes, misceláneas, puestos de mercado.</div>
                <ul class="price-features">
                    <li><strong>Caja registradora</strong> con productos ilimitados</li>
                    <li><strong>Inventario</strong> con alertas de stock bajo</li>
                    <li>Registro de ventas del día</li>
                    <li>Corte de caja diario</li>
                    <li>Hasta <strong>2 usuarios</strong></li>
                    <li>Capacitación incluida (2 hrs)</li>
                </ul>
            </div>

            <!-- PROFESIONAL -->
            <div class="price-card recommended">
                <div class="recommended-badge">★ Más elegido</div>
                <div class="price-tier">Paquete 02</div>
                <div class="price-name">Profesional</div>
                <div class="price-desc">Sistema completo con reportes, múltiples módulos y funciones avanzadas.</div>
                <div class="price-amount">
                    <span class="price-currency">$</span>
                    <span class="price-num">18,000</span>
                </div>
                <div class="price-period">pago único · MXN</div>
                <div class="price-note">Ideal para: farmacias, refaccionarias, restaurantes, tiendas medianas.</div>
                <ul class="price-features">
                    <li>Todo lo del paquete Esencial</li>
                    <li><strong>Módulos específicos del giro</strong> (consultas, autopartes, etc.)</li>
                    <li>Reportes avanzados y estadísticas</li>
                    <li>Control de cuentas por cobrar</li>
                    <li>Hasta <strong>5 usuarios</strong> con permisos</li>
                    <li>Capacitación (4 hrs) + manual PDF</li>
                    <li>1 mes de soporte incluido</li>
                </ul>
            </div>

            <!-- EMPRESARIAL -->
            <div class="price-card">
                <div class="price-tier">Paquete 03</div>
                <div class="price-name">Integral</div>
                <div class="price-desc">Múltiples sistemas interconectados: web, escritorio y operaciones en tiempo real.</div>
                <div class="price-amount">
                    <span class="price-currency">$</span>
                    <span class="price-num">35,000</span>
                </div>
                <div class="price-period">desde · MXN</div>
                <div class="price-note">Ideal para: eventos (charrería, deportes), negocios con varios puntos de venta.</div>
                <ul class="price-features">
                    <li>Todo lo del paquete Profesional</li>
                    <li><strong>Sitio web</strong> con dominio y hosting</li>
                    <li>Venta en línea / boletos digitales</li>
                    <li>Múltiples puntos de venta sincronizados</li>
                    <li><strong>Usuarios ilimitados</strong></li>
                    <li>Capacitación completa del equipo</li>
                    <li>3 meses de soporte incluido</li>
                </ul>
            </div>

        </div>

        <!-- MANTENIMIENTO -->
        <div class="section-label" style="margin-top:12px;">// Servicios de soporte y mantenimiento</div>
        <h3 style="font-family:'Fraunces',serif;font-size:22px;font-weight:700;letter-spacing:-.5px;margin-bottom:8px;margin-top:8px;">Después de la entrega, <em style="font-style:italic;font-weight:300;color:var(--amber)">seguimos contigo.</em></h3>
        <p style="font-size:14px;color:var(--muted);margin-bottom:28px;max-width:480px;">El software necesita cuidado. Ofrezco planes de mantenimiento para que tu negocio no se detenga.</p>

        <div class="maint-grid">
            <div class="maint-card">
                <div class="maint-icon">🔧</div>
                <div class="maint-title">Mantenimiento Mensual</div>
                <div class="maint-price">$500 – $1,500 / mes</div>
                <div class="maint-desc">Soporte por WhatsApp/llamada, corrección de errores, actualizaciones menores y respaldo de datos. Precio según complejidad del sistema.</div>
            </div>
            <div class="maint-card">
                <div class="maint-icon">🎪</div>
                <div class="maint-title">Soporte en Evento</div>
                <div class="maint-price">$2,500 / día de evento</div>
                <div class="maint-desc">Administración en tiempo real del sistema durante el evento. Resolución inmediata de cualquier incidencia. Disponibilidad total el día del evento.</div>
            </div>
            <div class="maint-card">
                <div class="maint-icon">☁️</div>
                <div class="maint-title">Hosting Administrado</div>
                <div class="maint-price">$400 – $800 / mes</div>
                <div class="maint-desc">Servidor, dominio, SSL y respaldo automático en la nube. Todo gestionado, sin que el cliente tenga que preocuparse por la infraestructura.</div>
            </div>
            <div class="maint-card">
                <div class="maint-icon">⚡</div>
                <div class="maint-title">Modificaciones y Mejoras</div>
                <div class="maint-price">$400 / hora</div>
                <div class="maint-desc">Nuevas funciones, módulos adicionales o cambios importantes al sistema original. Cotización previa sin compromiso.</div>
            </div>
        </div>

        <!-- ESQUEMA DE PAGO -->
        <div style="margin-top:48px;">
            <div class="section-label">// Forma de pago</div>
            <h3 style="font-family:'Fraunces',serif;font-size:22px;font-weight:700;letter-spacing:-.5px;margin-bottom:8px;margin-top:8px;">Sin pagar <em style="font-style:italic;font-weight:300;color:var(--amber)">todo de golpe.</em></h3>
            <p style="font-size:14px;color:var(--muted);margin-bottom:24px;max-width:480px;">Los proyectos se pagan en etapas vinculadas a avances reales del sistema.</p>
            <div class="payment-timeline">
                <div class="payment-step">
                    <div class="payment-step-num">ETAPA 01</div>
                    <div class="payment-step-title">Anticipo</div>
                    <div class="payment-step-pct">40%</div>
                    <div class="payment-step-desc">Al firmar el contrato e iniciar el desarrollo.</div>
                </div>
                <div class="payment-step">
                    <div class="payment-step-num">ETAPA 02</div>
                    <div class="payment-step-title">Avance</div>
                    <div class="payment-step-pct">40%</div>
                    <div class="payment-step-desc">Al mostrar el sistema funcional para revisión.</div>
                </div>
                <div class="payment-step">
                    <div class="payment-step-num">ETAPA 03</div>
                    <div class="payment-step-title">Entrega final</div>
                    <div class="payment-step-pct">20%</div>
                    <div class="payment-step-desc">Al entregar e instalar el sistema definitivo.</div>
                </div>
            </div>
            <p style="font-size:12px;color:var(--muted);font-style:italic;">* Para proyectos grandes se pueden emitir pagarés en los pagos de avance y entrega final.</p>
        </div>

    </section>

    <!-- CONTACTO -->
    <section id="contacto">
        <div class="contact-cta-card">
            <div class="section-label">// 03 — Contacto</div>
            <h2 class="section-title">¿Quieres cotizar tu sistema?</h2>
            <p class="section-desc">Comparte tu idea, presupuesto o problema actual y te envío una propuesta clara en menos de 24 horas hábiles.</p>
            <div class="cta-buttons">
                <a href="{{ route('contacto.form') }}" class="btn btn-primary">Ir a contacto</a>
                <a href="https://wa.me/5215512345678" class="btn btn-outline" target="_blank" rel="noopener noreferrer">WhatsApp</a>
            </div>
            <div class="contact-cta-features">
                <span>✅ Respuesta rápida</span>
                <span>✅ Sin compromiso</span>
                <span>✅ Cotización transparente</span>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-logo">DevSystems</div>
        <div class="footer-copy">Desarrollo de Software a la Medida · México · {{ date('Y') }}</div>
    </footer>

    @include('components.social-floating')
</body>

</html>