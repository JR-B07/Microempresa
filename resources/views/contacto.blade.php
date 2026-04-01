<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto — DevSystems</title>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,600;0,9..144,700;0,9..144,900;1,9..144,300;1,9..144,600&family=DM+Mono:wght@300;400;500&family=Instrument+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --bg: #0a0908;
            --surface: #131210;
            --surface2: #1c1a17;
            --border: #2a2721;
            --border2: #3a3630;
            --text: #f0ebe2;
            --muted: #7a7268;
            --amber: #d4952a;
            --amber-glow: rgba(212, 149, 42, 0.12);
            --amber-glow2: rgba(212, 149, 42, 0.06);
            --green: #3d8b5e;
            --red: #c04a35;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            background: var(--bg);
            color: var(--text);
            font-family: 'Instrument Sans', sans-serif;
            font-size: 15px;
            line-height: 1.7;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            opacity: .35;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 40px;
            position: sticky;
            top: 0;
            background: rgba(10, 9, 8, 0.92);
            border-bottom: 1px solid var(--border);
            z-index: 10;
        }

        .nav-logo {
            font-family: 'Fraunces', serif;
            font-weight: 700;
            font-size: 18px;
            color: var(--amber);
        }

        .nav-logo span {
            color: var(--text);
            font-weight: 300;
            font-style: italic;
        }

        .nav-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: .7px;
            transition: color .2s;
        }

        .nav-links a:hover {
            color: var(--text);
        }

        .page-header {
            padding: 100px 40px 40px;
            max-width: 1080px;
            margin: 0 auto;
        }

        .section-label {
            font-family: 'DM Mono', monospace;
            color: var(--amber);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 18px;
        }

        .section-title {
            font-family: 'Fraunces', serif;
            font-size: clamp(36px, 4vw, 56px);
            line-height: 1.05;
            margin-bottom: 18px;
        }

        .section-desc,
        .hero-note {
            max-width: 680px;
            color: var(--muted);
            font-size: 16px;
            margin-bottom: 24px;
        }

        .hero-note em {
            color: var(--text);
            font-style: normal;
            font-weight: 700;
        }

        .page-grid {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 32px;
            max-width: 1080px;
            margin: 0 auto 48px;
            padding: 0 40px;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 32px;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.18);
        }

        .contact-form {
            display: grid;
            gap: 18px;
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
            border-radius: 10px;
            background: var(--surface2);
            color: var(--text);
            padding: 16px;
            font-size: 14px;
        }

        .input-group textarea {
            min-height: 180px;
            resize: vertical;
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
            border-radius: 12px;
            margin-bottom: 18px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 24px;
            border-radius: 999px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            letter-spacing: .3px;
            text-decoration: none;
            transition: transform .2s, background .2s;
        }

        .btn-primary {
            background: var(--amber);
            color: #0a0908;
        }

        .btn-primary:hover {
            background: #e8a830;
            transform: translateY(-1px);
        }

        .support-panel {
            display: grid;
            gap: 20px;
        }

        .contact-item {
            display: flex;
            gap: 16px;
            align-items: flex-start;
            padding: 18px 0;
            border-bottom: 1px solid var(--border);
        }

        .contact-item:last-child {
            border-bottom: none;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            background: var(--amber-glow2);
            border: 1px solid rgba(212, 149, 42, .15);
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 18px;
        }

        .contact-info h4 {
            font-size: 12px;
            color: var(--muted);
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: .5px;
            font-family: 'DM Mono', monospace;
        }

        .contact-info p {
            font-size: 14px;
            color: var(--text);
            line-height: 1.5;
        }

        .testimonial-grid {
            display: grid;
            gap: 18px;
            margin-top: 24px;
        }

        .testimonial-card {
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 26px;
        }

        .testimonial-card p {
            color: var(--text);
            margin-bottom: 18px;
        }

        .testimonial-card strong {
            display: block;
            color: var(--amber);
            font-size: 13px;
            margin-bottom: 6px;
        }

        .faq {
            max-width: 1080px;
            margin: 0 auto 40px;
            padding: 0 40px;
        }

        .faq-grid {
            display: grid;
            gap: 18px;
            margin-top: 24px;
        }

        .faq-card {
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 24px;
        }

        .faq-question {
            font-weight: 700;
            line-height: 1.4;
            margin-bottom: 12px;
        }

        .faq-answer {
            color: var(--muted);
            line-height: 1.7;
            font-size: 15px;
        }

        .how-work {
            max-width: 1080px;
            margin: 0 auto 40px;
            padding: 0 40px;
        }

        .how-work-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-top: 24px;
        }

        .how-work-card {
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 24px;
        }

        .how-work-card strong {
            display: block;
            color: var(--amber);
            margin-bottom: 10px;
        }

        .how-work-card p {
            color: var(--text);
            font-size: 14px;
            line-height: 1.7;
        }

        .quick-quote {
            background: rgba(212, 149, 42, .07);
            border: 1px solid rgba(212, 149, 42, .15);
            border-radius: 20px;
            padding: 24px;
        }

        .quick-quote h3 {
            margin-bottom: 12px;
            font-size: 18px;
        }

        .quick-quote p {
            color: var(--muted);
            margin-bottom: 20px;
        }

        .quick-quote .btn {
            width: 100%;
        }

        @include('components.social-floating-styles') footer {
            padding: 28px 40px 40px;
            text-align: center;
            color: var(--muted);
            font-size: 13px;
        }

        footer .footer-logo {
            font-family: 'Fraunces', serif;
            color: var(--amber);
            font-weight: 700;
            margin-bottom: 8px;
            display: inline-block;
        }

        @media (max-width: 860px) {
            .page-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 620px) {
            nav {
                flex-direction: column;
                gap: 12px;
                padding: 18px 20px;
            }

            .page-header,
            .page-grid,
            footer {
                padding-left: 20px;
                padding-right: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav-logo">Dev<span>Systems</span></div>
        <div class="nav-links">
            <a href="{{ url('/') }}">Inicio</a>
        </div>
    </nav>

    <main>
        <section class="page-header">
            <div class="section-label">// 03 — Contacto</div>
            <h1 class="section-title">¿Listo para llevar tu sistema al siguiente nivel?</h1>
            <p class="section-desc">Desarrollo sistemas a la medida para microempresas. Respondo en menos de 24 horas y sin compromiso.</p>
            <p class="hero-note">Describe tu proyecto, presupuesto o dolor actual, y te daré una propuesta clara en pocos pasos.</p>
        </section>

        <section class="how-work">
            <div class="section-label">// Cómo trabajo</div>
            <div class="how-work-grid">
                <article class="how-work-card">
                    <strong>1. Hablamos claro</strong>
                    <p>Me cuentas tu problema y lo que esperas del sistema. Con esa información preparo una propuesta ajustada a tu negocio.</p>
                </article>
                <article class="how-work-card">
                    <strong>2. Cotización transparente</strong>
                    <p>Recibes ideas de solución y costos reales, sin sorpresas. Te explico qué incluye el desarrollo y cómo avanzamos por etapas.</p>
                </article>
                <article class="how-work-card">
                    <strong>3. Desarrollo organizado</strong>
                    <p>Trabajo con entregas claras, pruebas y seguimiento. Así avanzamos rápido y aseguro que el sistema cumpla lo acordado.</p>
                </article>
            </div>
        </section>

        <section class="page-grid">
            <div class="card">
                <div class="section-label">// Escríbeme</div>
                <h2 class="section-title" style="font-size:32px; margin-bottom:16px;">Formulario de contacto</h2>

                @if(session('success'))
                <div class="alert">{{ session('success') }}</div>
                @endif

                <form id="form" action="{{ route('contacto.submit') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="form-grid">
                        <div class="input-group">
                            <label for="name">Nombre</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Tu nombre completo" required>
                            @error('name')<span class="form-note" style="color:#c04a35;">{{ $message }}</span>@enderror
                        </div>
                        <div class="input-group">
                            <label for="email">Correo</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="tunombre@dominio.com" required>
                            @error('email')<span class="form-note" style="color:#c04a35;">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-grid">
                        <div class="input-group">
                            <label for="business">Empresa / Negocio</label>
                            <input id="business" name="business" type="text" value="{{ old('business') }}" placeholder="Nombre de tu microempresa" required>
                            @error('business')<span class="form-note" style="color:#c04a35;">{{ $message }}</span>@enderror
                        </div>
                        <div class="input-group">
                            <label for="project_type">Tipo de proyecto</label>
                            <select id="project_type" name="project_type">
                                <option value="">Elige una opción</option>
                                <option value="sitio_web" {{ old('project_type') == 'sitio_web' ? 'selected' : '' }}>Sitio web</option>
                                <option value="app_movil" {{ old('project_type') == 'app_movil' ? 'selected' : '' }}>App móvil</option>
                                <option value="sistema_admin" {{ old('project_type') == 'sistema_admin' ? 'selected' : '' }}>Sistema administrativo</option>
                                <option value="ecommerce" {{ old('project_type') == 'ecommerce' ? 'selected' : '' }}>E-commerce</option>
                                <option value="otro" {{ old('project_type') == 'otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('project_type')<span class="form-note" style="color:#c04a35;">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-grid">
                        <div class="input-group">
                            <label for="budget">Presupuesto aproximado</label>
                            <input id="budget" name="budget" type="text" value="{{ old('budget') }}" placeholder="Ej. 10,000 - 20,000 MXN">
                            @error('budget')<span class="form-note" style="color:#c04a35;">{{ $message }}</span>@enderror
                        </div>
                        <div class="input-group">
                            <label for="contact_preference">Prefiero contacto por</label>
                            <select id="contact_preference" name="contact_preference">
                                <option value="">Cualquiera está bien</option>
                                <option value="whatsapp" {{ old('contact_preference') == 'whatsapp' ? 'selected' : '' }}>WhatsApp</option>
                                <option value="correo" {{ old('contact_preference') == 'correo' ? 'selected' : '' }}>Correo</option>
                            </select>
                            @error('contact_preference')<span class="form-note" style="color:#c04a35;">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="input-group visually-hidden">
                        <label for="website">¿Tienes web?</label>
                        <input id="website" name="website" type="text" autocomplete="off" tabindex="-1">
                    </div>
                    <div class="input-group">
                        <label for="message">Mensaje</label>
                        <textarea id="message" name="message" placeholder="Cuéntame qué necesitas" required>{{ old('message') }}</textarea>
                        @error('message')<span class="form-note" style="color:#c04a35;">{{ $message }}</span>@enderror
                    </div>
                    <p class="form-note">También puedes contactarme por <a href="https://wa.me/5215512345678" target="_blank" rel="noopener noreferrer" style="color:var(--amber);">WhatsApp</a> o <a href="mailto:contacto@micrompresa.com" style="color:var(--amber);">correo</a>.</p>
                    <button type="submit" class="btn btn-primary">Enviar mensaje</button>
                </form>
            </div>

            <aside class="support-panel card">
                <div class="section-label">// Canales directos</div>
                <div class="contact-item">
                    <div class="contact-icon">📱</div>
                    <div class="contact-info">
                        <h4>WhatsApp</h4>
                        <p><a href="https://wa.me/5215512345678" target="_blank" rel="noopener noreferrer" style="color:inherit; text-decoration:none;">+52 1 55 1234 5678</a></p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">✉️</div>
                    <div class="contact-info">
                        <h4>Correo</h4>
                        <p><a href="mailto:contacto@micrompresa.com" style="color:inherit; text-decoration:none;">contacto@micrompresa.com</a></p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">📍</div>
                    <div class="contact-info">
                        <h4>Ubicación</h4>
                        <p>Guanajuato, México · Atención en todo el país</p>
                    </div>
                </div>
                <div class="section-label" style="margin-top:24px;">// Respuesta rápida</div>
                <p class="form-note">Te respondo dentro de las primeras 24 horas hábiles. Sin compromiso ni costos ocultos.</p>
                <div class="quick-quote">
                    <h3>Presupuesto rápido</h3>
                    <p>¿Tienes un monto aproximado? Cuéntame y te envío una respuesta más rápida.</p>
                    <a href="#form" class="btn btn-primary">Ir al formulario</a>
                </div>
            </aside>
        </section>

        <section class="faq">
            <div class="section-label">// Preguntas frecuentes</div>
            <h2 class="section-title" style="font-size:32px; margin-bottom:18px;">Respuestas rápidas para clientes</h2>
            <div class="faq-grid">
                <article class="faq-card">
                    <div class="faq-question">¿Cuánto tarda una cotización?</div>
                    <div class="faq-answer">Respondo normalmente en menos de 24 horas hábiles. Si ya tienes una idea clara, puedo darte un estimado inicial en el primer contacto.</div>
                </article>
                <article class="faq-card">
                    <div class="faq-question">¿Cuál es el proceso de trabajo?</div>
                    <div class="faq-answer">Charlamos sobre tu necesidad, te presento una propuesta con etapas y costos, y desarrollo el sistema con entregas parciales para que siempre veas avance real.</div>
                </article>
                <article class="faq-card">
                    <div class="faq-question">¿Puedo pagar por etapas?</div>
                    <div class="faq-answer">Sí. Trabajo con pagos por fases: anticipo, avance y entrega final. Así reduces riesgos y el proyecto avanza con transparencia.</div>
                </article>
                <article class="faq-card">
                    <div class="faq-question">¿Incluyes soporte después de la entrega?</div>
                    <div class="faq-answer">Sí, puedo ofrecer soporte y ajustes iniciales tras la entrega. Hablamos el alcance y el plazo en la cotización para que tengas claro cómo sigue el proyecto.</div>
                </article>
            </div>
        </section>

        <section style="max-width:1080px;margin:0 auto 40px;padding:0 40px;">
            <div class="section-label">// Testimonios</div>
            <h2 class="section-title" style="font-size:32px; margin-bottom:18px;">Clientes que ya impulsaron su negocio</h2>
            <div class="testimonial-grid">
                <article class="testimonial-card">
                    <strong>Mariana, farmacia local</strong>
                    <p>"El sistema de inventario me ahorra horas cada semana y ya no pierdo ventas por falta de stock. Todo se hizo rápido y con buena comunicación."</p>
                </article>
                <article class="testimonial-card">
                    <strong>Juan, agencia de eventos</strong>
                    <p>"Recibí una propuesta clara con precio justo y mi app quedó tal como la pedí. La respuesta en 24 horas fue real."</p>
                </article>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-logo">DevSystems</div>
        <div>Desarrollo de Software a la Medida · México · {{ date('Y') }}</div>
    </footer>

    @include('components.social-floating')
</body>

</html>