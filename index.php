<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Joshua G. Rolloque · Software Engineer</title>
  <link href="https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;500;600;700&family=Cabinet+Grotesk:wght@300;400;500;700&family=JetBrains+Mono:wght@300;400;500&display=swap" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    :root {
      --bg: #080b10;
      --bg2: #0d1117;
      --surface: #111720;
      --surface2: #161d28;
      --border: #1e2d3d;
      --border2: #253447;
      --text: #e8edf5;
      --muted: #8899aa;
      --dim: #3d5166;
      --accent: #00d4ff;
      --accent2: #7c3aed;
      --accent3: #10b981;
      --accent-glow: rgba(0,212,255,0.15);
      --red: #ef4444;
      --yellow: #f59e0b;
    }
    html { scroll-behavior: smooth; }
    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'Cabinet Grotesk', sans-serif;
      font-size: 16px;
      line-height: 1.6;
      overflow-x: hidden;
      cursor: none;
    }
    .cursor {
      position: fixed;
      width: 10px;
      height: 10px;
      background: var(--accent);
      border-radius: 50%;
      pointer-events: none;
      z-index: 9999;
      transform: translate(-50%, -50%);
      transition: transform 0.1s, width 0.2s, height 0.2s, opacity 0.2s;
      mix-blend-mode: screen;
    }
    .cursor-ring {
      position: fixed;
      width: 36px;
      height: 36px;
      border: 1px solid rgba(0,212,255,0.5);
      border-radius: 50%;
      pointer-events: none;
      z-index: 9998;
      transform: translate(-50%, -50%);
      transition: transform 0.12s ease-out, width 0.2s, height 0.2s;
    }
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image:
        linear-gradient(rgba(0,212,255,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(0,212,255,0.03) 1px, transparent 1px);
      background-size: 60px 60px;
      pointer-events: none;
      z-index: 0;
    }
    body::after {
      content: '';
      position: fixed;
      inset: 0;
      background: radial-gradient(ellipse at 50% 0%, rgba(0,212,255,0.05) 0%, transparent 60%);
      pointer-events: none;
      z-index: 0;
    }
    nav {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 100;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 48px;
      background: rgba(8,11,16,0.85);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--border);
      transition: padding 0.3s;
    }
    .nav-logo {
      font-family: 'JetBrains Mono', monospace;
      font-size: 14px;
      font-weight: 500;
      color: var(--accent);
      letter-spacing: 0.05em;
    }
    .nav-logo span { color: var(--muted); }
    .nav-links { display: flex; gap: 36px; list-style: none; }
    .nav-links a {
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--muted);
      text-decoration: none;
      transition: color 0.2s;
      position: relative;
    }
    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: -4px;
      left: 0;
      right: 0;
      height: 1px;
      background: var(--accent);
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.25s;
    }
    .nav-links a:hover { color: var(--text); }
    .nav-links a:hover::after { transform: scaleX(1); }
    .nav-cta {
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--accent);
      border: 1px solid var(--accent);
      padding: 8px 20px;
      text-decoration: none;
      transition: background 0.2s, color 0.2s;
    }
    .nav-cta:hover { background: var(--accent); color: var(--bg); }
    .nav-hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; background: none; border: none; padding: 4px; }
    .nav-hamburger span { display: block; width: 24px; height: 1.5px; background: var(--text); transition: all 0.3s; }
    .hero {
      position: relative;
      z-index: 1;
      min-height: 100vh;
      display: flex;
      align-items: center;
      padding: 120px 48px 80px;
      max-width: 1200px;
      margin: 0 auto;
    }
    .hero-inner { max-width: 760px; }
    .hero-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--accent);
      margin-bottom: 28px;
    }
    .hero-eyebrow::before {
      content: '';
      width: 32px;
      height: 1px;
      background: var(--accent);
    }
    .hero-eyebrow-dot {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: var(--accent3);
      animation: blink 2s infinite;
    }
    @keyframes blink { 0%,100%{opacity:1} 50%{opacity:0.2} }
    .hero h1 {
      font-family: 'Clash Display', sans-serif;
      font-size: clamp(48px, 8vw, 96px);
      font-weight: 700;
      line-height: 0.95;
      letter-spacing: -0.03em;
      color: var(--text);
      margin-bottom: 8px;
    }
    .hero h1 .line2 {
      display: block;
      -webkit-text-stroke: 1px var(--border2);
      color: transparent;
      transition: color 0.3s, -webkit-text-stroke 0.3s;
    }
    .hero h1 .line2:hover { color: var(--text); -webkit-text-stroke: 0px transparent; }
    .hero-role {
      font-family: 'JetBrains Mono', monospace;
      font-size: 14px;
      color: var(--accent);
      letter-spacing: 0.05em;
      margin-bottom: 28px;
      margin-top: 16px;
    }
    .hero-desc {
      font-size: 18px;
      font-weight: 300;
      color: var(--muted);
      max-width: 540px;
      line-height: 1.7;
      margin-bottom: 48px;
    }
    .hero-desc strong { color: var(--text); font-weight: 500; }
    .hero-actions { display: flex; gap: 16px; flex-wrap: wrap; }
    .btn-primary {
      display: inline-block;
      padding: 16px 36px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      background: var(--accent);
      color: var(--bg);
      text-decoration: none;
      font-weight: 500;
      transition: background 0.2s, transform 0.15s;
      clip-path: polygon(0 0, calc(100% - 12px) 0, 100% 12px, 100% 100%, 12px 100%, 0 calc(100% - 12px));
    }
    .btn-primary:hover { background: #33ddff; transform: translateY(-2px); }
    .btn-outline {
      display: inline-block;
      padding: 16px 36px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      border: 1px solid var(--border2);
      color: var(--muted);
      text-decoration: none;
      transition: border-color 0.2s, color 0.2s, transform 0.15s;
      clip-path: polygon(0 0, calc(100% - 12px) 0, 100% 12px, 100% 100%, 12px 100%, 0 calc(100% - 12px));
    }
    .btn-outline:hover { border-color: var(--accent); color: var(--accent); transform: translateY(-2px); }
    .hero-stats {
      display: flex;
      gap: 48px;
      flex-wrap: wrap;
      margin-top: 64px;
      padding-top: 40px;
      border-top: 1px solid var(--border);
    }
    .stat-num {
      font-family: 'Clash Display', sans-serif;
      font-size: 40px;
      font-weight: 700;
      color: var(--accent);
      line-height: 1;
    }
    .stat-label {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: var(--muted);
      margin-top: 4px;
    }
    .hero-scroll {
      position: absolute;
      bottom: 40px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 10px;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--dim);
      animation: float 3s ease-in-out infinite;
    }
    @keyframes float { 0%,100%{transform:translateX(-50%) translateY(0)} 50%{transform:translateX(-50%) translateY(-8px)} }
    .scroll-line { width: 1px; height: 48px; background: linear-gradient(var(--accent), transparent); }
    section { position: relative; z-index: 1; }
    .section-inner { max-width: 1200px; margin: 0 auto; padding: 100px 48px; }
    .section-header { margin-bottom: 60px; }
    .section-tag {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      letter-spacing: 0.25em;
      text-transform: uppercase;
      color: var(--accent);
      margin-bottom: 12px;
      display: block;
    }
    .section-title {
      font-family: 'Clash Display', sans-serif;
      font-size: clamp(32px, 5vw, 56px);
      font-weight: 700;
      letter-spacing: -0.02em;
      line-height: 1.05;
      color: var(--text);
    }
    .section-title em { font-style: italic; color: transparent; -webkit-text-stroke: 1px var(--accent); }
    .about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: start; }
    .about-text p { font-size: 17px; font-weight: 300; color: var(--muted); line-height: 1.8; margin-bottom: 20px; }
    .about-text p strong { color: var(--text); font-weight: 500; }
    .about-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 28px; }
    .tag {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      letter-spacing: 0.08em;
      padding: 6px 14px;
      border: 1px solid var(--border2);
      color: var(--muted);
      background: var(--surface);
      transition: border-color 0.2s, color 0.2s;
    }
    .tag:hover { border-color: var(--accent); color: var(--accent); }
    .tag.accent { border-color: rgba(0,212,255,0.4); color: var(--accent); background: rgba(0,212,255,0.05); }
    .about-card {
      background: var(--surface);
      border: 1px solid var(--border);
      padding: 28px;
      margin-bottom: 16px;
      position: relative;
      overflow: hidden;
      transition: border-color 0.2s, transform 0.2s;
    }
    .about-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 3px;
      height: 100%;
      background: var(--accent);
      transform: scaleY(0);
      transform-origin: top;
      transition: transform 0.25s;
    }
    .about-card:hover { border-color: var(--border2); transform: translateX(4px); }
    .about-card:hover::before { transform: scaleY(1); }
    .card-icon { font-size: 20px; margin-bottom: 12px; }
    .card-title { font-family: 'Clash Display', sans-serif; font-size: 18px; font-weight: 600; color: var(--text); margin-bottom: 6px; }
    .card-desc { font-size: 14px; color: var(--muted); line-height: 1.6; }
    .skills-section { background: var(--bg2); }
    .skills-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
    .skill-group {
      background: var(--surface);
      border: 1px solid var(--border);
      padding: 28px;
      transition: border-color 0.2s, transform 0.2s;
    }
    .skill-group:hover { border-color: var(--border2); transform: translateY(-4px); }
    .skill-group-title {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--accent);
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .skill-group-title::after { content: ''; flex: 1; height: 1px; background: var(--border); }
    .skill-item { display: flex; align-items: center; justify-content: space-between; margin-bottom: 14px; }
    .skill-name { font-size: 14px; color: var(--text); font-weight: 400; }
    .skill-bar { flex: 1; height: 2px; background: var(--border); margin: 0 16px; position: relative; overflow: hidden; }
    .skill-fill {
      position: absolute; top: 0; left: 0; height: 100%;
      background: linear-gradient(90deg, var(--accent), var(--accent2));
      transition: width 1s ease; border-radius: 2px;
    }
    .skill-pct { font-family: 'JetBrains Mono', monospace; font-size: 11px; color: var(--muted); min-width: 32px; text-align: right; }
    .projects-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; }
    .project-card {
      background: var(--surface);
      border: 1px solid var(--border);
      overflow: hidden;
      transition: border-color 0.3s, transform 0.3s;
      position: relative;
    }
    .project-card:hover { border-color: var(--accent); transform: translateY(-6px); }
    .project-card.featured { grid-column: span 2; }
    .project-thumb {
      height: 220px;
      background: var(--surface2);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 64px;
      position: relative;
      overflow: hidden;
      border-bottom: 1px solid var(--border);
    }
    .project-card.featured .project-thumb { height: 300px; }
    .project-thumb-bg { position: absolute; inset: 0; background: linear-gradient(135deg, var(--bg2), var(--surface2)); }
    .project-thumb-grid {
      position: absolute; inset: 0;
      background-image: linear-gradient(rgba(0,212,255,0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(0,212,255,0.05) 1px, transparent 1px);
      background-size: 30px 30px;
    }
    .project-thumb-icon { position: relative; z-index: 1; font-size: 48px; }
    .project-label {
      position: absolute; top: 16px; left: 16px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 10px; letter-spacing: 0.15em; text-transform: uppercase;
      padding: 4px 10px; border: 1px solid;
    }
    .label-web { color: var(--accent); border-color: var(--accent); background: rgba(0,212,255,0.1); }
    .label-mobile { color: var(--accent3); border-color: var(--accent3); background: rgba(16,185,129,0.1); }
    .label-desktop { color: var(--yellow); border-color: var(--yellow); background: rgba(245,158,11,0.1); }
    .label-fullstack { color: var(--accent2); border-color: var(--accent2); background: rgba(124,58,237,0.1); }
    .project-body { padding: 24px; }
    .project-title { font-family: 'Clash Display', sans-serif; font-size: 22px; font-weight: 600; color: var(--text); margin-bottom: 8px; }
    .project-desc { font-size: 14px; color: var(--muted); line-height: 1.65; margin-bottom: 20px; }
    .project-stack { display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 20px; }
    .stack-pill {
      font-family: 'JetBrains Mono', monospace;
      font-size: 10px; letter-spacing: 0.08em; text-transform: uppercase;
      padding: 4px 10px; background: var(--surface2);
      border: 1px solid var(--border2); color: var(--muted);
    }
    .project-links { display: flex; gap: 12px; }
    .proj-link {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase;
      color: var(--accent); text-decoration: none;
      border-bottom: 1px solid transparent;
      transition: border-color 0.2s;
      display: flex; align-items: center; gap: 6px;
    }
    .proj-link:hover { border-color: var(--accent); }
    .proj-link.muted { color: var(--muted); }
    .proj-link.muted:hover { color: var(--text); border-color: var(--muted); }
    .experience-section { background: var(--bg2); }
    .timeline { position: relative; padding-left: 32px; }
    .timeline::before {
      content: '';
      position: absolute;
      left: 0; top: 0; bottom: 0;
      width: 1px;
      background: linear-gradient(var(--accent), transparent);
    }
    .timeline-item { position: relative; margin-bottom: 48px; }
    .timeline-dot {
      position: absolute; left: -38px; top: 4px;
      width: 12px; height: 12px; border-radius: 50%;
      background: var(--accent); border: 2px solid var(--bg2);
      box-shadow: 0 0 12px rgba(0,212,255,0.5);
    }
    .timeline-period { font-family: 'JetBrains Mono', monospace; font-size: 11px; letter-spacing: 0.15em; text-transform: uppercase; color: var(--accent); margin-bottom: 8px; }
    .timeline-role { font-family: 'Clash Display', sans-serif; font-size: 22px; font-weight: 600; color: var(--text); margin-bottom: 4px; }
    .timeline-company { font-size: 15px; color: var(--muted); margin-bottom: 14px; }
    .timeline-desc { font-size: 14px; color: var(--muted); line-height: 1.7; margin-bottom: 14px; }
    .timeline-tags { display: flex; flex-wrap: wrap; gap: 6px; }
    .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: start; }
    .contact-desc { font-size: 17px; font-weight: 300; color: var(--muted); line-height: 1.7; margin-bottom: 36px; }
    .contact-links { display: flex; flex-direction: column; gap: 16px; }
    .contact-link {
      display: flex; align-items: center; gap: 16px;
      text-decoration: none; font-size: 15px; color: var(--muted);
      padding: 16px 20px; border: 1px solid var(--border); background: var(--surface);
      transition: border-color 0.2s, color 0.2s, transform 0.2s;
    }
    .contact-link:hover { border-color: var(--accent); color: var(--text); transform: translateX(6px); }
    .contact-link-icon { width: 36px; height: 36px; border-radius: 4px; background: var(--surface2); display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; }
    .contact-link-label { font-family: 'JetBrains Mono', monospace; font-size: 10px; letter-spacing: 0.15em; text-transform: uppercase; color: var(--dim); }
    .contact-link-val { font-size: 14px; color: inherit; }
    .contact-form { display: flex; flex-direction: column; gap: 16px; }
    .form-group { display: flex; flex-direction: column; gap: 6px; }
    .form-label { font-family: 'JetBrains Mono', monospace; font-size: 10px; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); }
    .form-input, .form-textarea {
      font-family: 'Cabinet Grotesk', sans-serif; font-size: 15px; color: var(--text);
      background: var(--surface); border: 1px solid var(--border);
      padding: 14px 16px; outline: none; transition: border-color 0.2s; width: 100%;
    }
    .form-input:focus, .form-textarea:focus { border-color: var(--accent); }
    .form-textarea { resize: vertical; min-height: 120px; }
    .form-submit {
      font-family: 'JetBrains Mono', monospace; font-size: 13px; letter-spacing: 0.1em; text-transform: uppercase;
      background: var(--accent); color: var(--bg); border: none; padding: 16px; cursor: pointer; font-weight: 500;
      transition: background 0.2s, transform 0.1s;
      clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 10px, 100% 100%, 10px 100%, 0 calc(100% - 10px));
    }
    .form-submit:hover { background: #33ddff; }
    footer {
      position: relative; z-index: 1;
      border-top: 1px solid var(--border);
      padding: 32px 48px;
      display: flex; align-items: center; justify-content: space-between;
      gap: 16px; flex-wrap: wrap; background: var(--bg2);
    }
    .footer-copy { font-family: 'JetBrains Mono', monospace; font-size: 11px; letter-spacing: 0.08em; color: var(--dim); }
    .footer-copy span { color: var(--accent); }
    .footer-status { display: flex; align-items: center; gap: 8px; font-family: 'JetBrains Mono', monospace; font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--accent3); }
    .status-dot { width: 6px; height: 6px; border-radius: 50%; background: var(--accent3); animation: blink 2s infinite; }
    .mobile-menu { display: none; position: fixed; inset: 0; z-index: 99; background: rgba(8,11,16,0.97); backdrop-filter: blur(20px); flex-direction: column; align-items: center; justify-content: center; gap: 36px; }
    .mobile-menu.open { display: flex; }
    .mobile-menu a { font-family: 'Clash Display', sans-serif; font-size: 36px; font-weight: 700; color: var(--text); text-decoration: none; letter-spacing: -0.01em; transition: color 0.2s; }
    .mobile-menu a:hover { color: var(--accent); }
    .mobile-close { position: absolute; top: 24px; right: 48px; font-family: 'JetBrains Mono', monospace; font-size: 12px; letter-spacing: 0.1em; color: var(--muted); background: none; border: none; cursor: pointer; }
    .reveal { opacity: 0; transform: translateY(30px); transition: opacity 0.7s ease, transform 0.7s ease; }
    .reveal.visible { opacity: 1; transform: none; }
    .reveal-delay-1 { transition-delay: 0.1s; }
    .reveal-delay-2 { transition-delay: 0.2s; }
    .reveal-delay-3 { transition-delay: 0.3s; }
    @media (max-width: 900px) {
      nav { padding: 18px 24px; }
      .nav-links, .nav-cta { display: none; }
      .nav-hamburger { display: flex; }
      .hero { padding: 100px 24px 60px; }
      .section-inner { padding: 80px 24px; }
      .about-grid, .contact-grid { grid-template-columns: 1fr; gap: 40px; }
      .skills-grid { grid-template-columns: 1fr; }
      .projects-grid { grid-template-columns: 1fr; }
      .project-card.featured { grid-column: span 1; }
      .project-card.featured .project-thumb { height: 220px; }
      footer { padding: 24px; }
      .hero-stats { gap: 32px; }
    }
    @media (max-width: 480px) {
      h1 { font-size: 40px; }
      .hero-actions { flex-direction: column; }
      .btn-primary, .btn-outline { text-align: center; }
    }
  </style>
</head>
<body>

<div class="cursor" id="cursor"></div>
<div class="cursor-ring" id="cursor-ring"></div>

<div class="mobile-menu" id="mobile-menu">
  <button class="mobile-close" onclick="closeMenu()">[ close ]</button>
  <a href="#about" onclick="closeMenu()">About</a>
  <a href="#skills" onclick="closeMenu()">Skills</a>
  <a href="#projects" onclick="closeMenu()">Projects</a>
  <a href="#experience" onclick="closeMenu()">Experience</a>
  <a href="#contact" onclick="closeMenu()">Contact</a>
</div>

<nav>
  <div class="nav-logo"><span>//</span> JRolloque.dev</div>
  <ul class="nav-links">
    <li><a href="#about">About</a></li>
    <li><a href="#skills">Skills</a></li>
    <li><a href="#projects">Projects</a></li>
    <li><a href="#experience">Experience</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>
  <a href="#contact" class="nav-cta">Hire me</a>
  <button class="nav-hamburger" onclick="openMenu()">
    <span></span><span></span><span></span>
  </button>
</nav>

<!-- Hero -->
<section class="hero-section">
  <div class="hero">
    <div class="hero-inner">
      <div class="hero-eyebrow">
        <span class="hero-eyebrow-dot"></span>
        Available for work
      </div>
      <h1>
        Joshua G.
        <span class="line2">Rolloque.</span>
      </h1>
      <div class="hero-role">// Software Engineer · Full-Stack · SAP Admin</div>
      <p class="hero-desc">
        I build <strong>scalable digital systems</strong> — from pixel-perfect web apps to robust desktop solutions and backend APIs. Crafting software that works flawlessly and <strong>drives real business value</strong>.
      </p>
      <div class="hero-actions">
        <a href="#projects" class="btn-primary">View my work</a>
        <a href="#contact" class="btn-outline">Let's talk</a>
      </div>
      <div class="hero-stats">
        <div class="stat-item">
          <div class="stat-num" data-count="3">0</div>
          <div class="stat-label">Years exp.</div>
        </div>
        <div class="stat-item">
          <div class="stat-num" data-count="9">0</div>
          <div class="stat-label">Apps built</div>
        </div>
        <div class="stat-item">
          <div class="stat-num" data-count="5">0</div>
          <div class="stat-label">Tech stacks</div>
        </div>
        <div class="stat-item">
          <div class="stat-num" data-count="2">0</div>
          <div class="stat-label">Platforms</div>
        </div>
      </div>
    </div>
    <div class="hero-scroll">
      <div class="scroll-line"></div>
      scroll
    </div>
  </div>
</section>

<!-- About -->
<section id="about">
  <div class="section-inner">
    <div class="section-header reveal">
      <span class="section-tag">01 — About</span>
      <h2 class="section-title">Who I <em>am</em></h2>
    </div>
    <div class="about-grid">
      <div class="about-text reveal">
        <p>I'm <strong>Joshua G. Rolloque</strong>, a Software Engineer based in Binondo, Philippines. I graduated with a <strong>BS in Information Technology</strong> from City of Malabon University and have been building enterprise-grade systems since 2022.</p>
        <p>Currently at <strong>Co Ban Kiat Hardware Inc.</strong>, I design and maintain web and desktop applications, manage databases, implement CI/CD pipelines, and serve as an <strong>SAP System Administrator</strong> — handling user roles, transport management, and system landscapes.</p>
        <p>I believe great software is <strong>reliable, maintainable, and built to last</strong>.</p>
        <div class="about-tags">
          <span class="tag accent">PHP / Laravel</span>
          <span class="tag accent">Livewire / Vite</span>
          <span class="tag accent">JavaScript</span>
          <span class="tag accent">React.js</span>
          <span class="tag accent">Node.js</span>
          <span class="tag">VB.NET</span>
          <span class="tag">MySQL</span>
          <span class="tag">SQL Server</span>
          <span class="tag">SAP</span>
          <span class="tag">CI/CD & Version Control</span>
          <span class="tag">Tailwind CSS</span>
        </div>
      </div>
      <div class="about-right reveal reveal-delay-2">
        <div class="about-card">
          <div class="card-icon">🌐</div>
          <div class="card-title">Web Development</div>
          <div class="card-desc">Full-stack web applications using PHP, Laravel, React, and Node.js with RESTful APIs, JWT auth, and responsive UI design.</div>
        </div>
        <div class="about-card">
          <div class="card-icon">🖥️</div>
          <div class="card-title">Desktop Development</div>
          <div class="card-desc">Windows desktop applications with VB.NET and .NET technologies. LDAP login integration, offline capability, and native OS features.</div>
        </div>
        <div class="about-card">
          <div class="card-icon">⚙️</div>
          <div class="card-title">SAP Administration</div>
          <div class="card-desc">User/role management, authorization concepts, transport management across DEV/QAS/PRD system landscapes via CTS.</div>
        </div>
        <div class="about-card">
          <div class="card-icon">🗄️</div>
          <div class="card-title">Database Management</div>
          <div class="card-desc">MySQL, SQL Server, and MariaDB design, optimization, indexing, normalization, and large-scale data operations.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Skills -->
<section id="skills" class="skills-section">
  <div class="section-inner">
    <div class="section-header reveal">
      <span class="section-tag">02 — Skills</span>
      <h2 class="section-title">What I <em>know</em></h2>
    </div>
    <div class="skills-grid">
      <div class="skill-group reveal">
        <div class="skill-group-title">Frontend</div>
        <div class="skill-item"><span class="skill-name">HTML5 / CSS3</span><div class="skill-bar"><div class="skill-fill" style="width:0%" data-width="95%"></div></div><span class="skill-pct">95%</span></div>
        <div class="skill-item"><span class="skill-name">JavaScript / jQuery</span><div class="skill-bar"><div class="skill-fill" style="width:0%" data-width="90%"></div></div><span class="skill-pct">90%</span></div>
        <div class="skill-item"><span class="skill-name">React.js</span><div class="skill-bar"><div class="skill-fill" style="width:0%" data-width="85%"></div></div><span class="skill-pct">85%</span></div>
        <div class="skill-item"><span class="skill-name">Tailwind / Bootstrap</span><div class="skill-bar"><div class="skill-fill" style="width:0%" data-width="92%"></div></div><span class="skill-pct">92%</span></div>
        <div class="skill-item"><span class="skill-name">UI/UX Design</span><div class="skill-bar"><div class="skill-fill" style="width:0%" data-width="80%"></div></div><span class="skill-pct">80%</span></div>
      </div>
      <div class="skill-group reveal reveal-delay-1">
        <div class="skill-group-title">Backend & Desktop</div>
        <div class="skill-item"><span class="skill-name">PHP / Laravel</span><div class="skill-bar"><div class="skill-fill" style="width:0%" data-width="92%"></div></div><span class="skill-pct">92%</span></div>
        <div class="skill-item"><span class="skill-name">Node.js</span><div class="skill-bar"><div class="skill-fill" style="width:0%" data-width="80%"></div></div><span class="skill-pct">80%</span></div>
        <div class="skill-item"><span class="skill-name">VB.NET / .NET</span><div class="skill-bar"><div class="skill-fill" style="width:0%" data-width="85%"></div></div><span class="skill-pct">85%</span></div>
        <div class="skill-item"><span class="skill-name">RESTful APIs</span><div class="skill-bar"><div class="skill-fill" style="width:0%" data-width="88%"></div></div><span class="skill-pct">88%</span></div>
        <div class="skill-item"><span class="skill-name">React Native</span><div class="skill-bar"><div class="skill-fill" style="width:0%" data-width="70%"></div></div><span class="skill-pct">70%</span></div>
      </div>
      <div class="skill-group reveal reveal-delay-2">
        <div class="skill-group-title">Database & DevOps</div>
        <div class="skill-item"><span class="skill-name">MySQL / MariaDB</span><div class="skill-bar"><div class="skill-fill" style="width:0%" data-width="93%"></div></div><span class="skill-pct">93%</span></div>
        <div class="skill-item"><span class="skill-name">SQL Server (MSSQL)</span><div class="skill-bar"><div class="skill-fill" style="width:0%" data-width="88%"></div></div><span class="skill-pct">88%</span></div>
        <div class="skill-item"><span class="skill-name">Git / GitHub / GitLab</span><div class="skill-bar"><div class="skill-fill" style="width:0%" data-width="90%"></div></div><span class="skill-pct">90%</span></div>
        <div class="skill-item"><span class="skill-name">CI/CD (GitHub Actions)</span><div class="skill-bar"><div class="skill-fill" style="width:0%" data-width="78%"></div></div><span class="skill-pct">78%</span></div>
        <div class="skill-item"><span class="skill-name">SAP CTS / User Mgmt</span><div class="skill-bar"><div class="skill-fill" style="width:0%" data-width="82%"></div></div><span class="skill-pct">82%</span></div>
      </div>
    </div>
  </div>
</section>

<!-- Projects -->
<section id="projects">
  <div class="section-inner">
    <div class="section-header reveal">
      <span class="section-tag">03 — Projects</span>
      <h2 class="section-title">What I've <em>built</em></h2>
    </div>
    <div class="projects-grid">

      <!-- Featured -->
      <div class="project-card featured reveal">
        <div class="project-thumb">
          <div class="project-thumb-bg"></div>
          <div class="project-thumb-grid"></div>
          <span class="project-label label-fullstack">Full-stack</span>
          <div class="project-thumb-icon">💻</div>
        </div>
        <div class="project-body">
          <div class="project-title">IT Asset Management System</div>
          <div class="project-desc">A comprehensive system for tracking and managing IT hardware and software assets, including assignment history, depreciation tracking, and audit logs.</div>
          <div class="project-stack">
            <span class="stack-pill">PHP</span><span class="stack-pill">MySQL</span>
            <span class="stack-pill">Laravel</span><span class="stack-pill">Livewire</span><span class="stack-pill">Tailwind & CSS</span>
          </div>
          <div class="project-links">
            <a href="#" class="proj-link">↗ View project</a>
            <a href="#" class="proj-link muted">⌥ Source</a>
          </div>
        </div>
      </div>

      <div class="project-card reveal reveal-delay-1">
        <div class="project-thumb">
          <div class="project-thumb-bg"></div>
          <div class="project-thumb-grid"></div>
          <span class="project-label label-fullstack">Full-stack</span>
          <div class="project-thumb-icon">⚡</div>
        </div>
        <div class="project-body">
          <div class="project-title">Electronics Request System</div>
          <div class="project-desc">Streamlined digital platform for managing internal electronics requests, approval workflows, and inventory tracking with real-time status updates.</div>
          <div class="project-stack">
            <span class="stack-pill">PHP</span>
            <span class="stack-pill">Laravel & Livewire</span>
            <span class="stack-pill">MySQL</span>
            <span class="stack-pill">JWT Token</span>
            <span class="stack-pill">REST API</span>
            <span class="stack-pill">MVC</span>
            <span class="stack-pill">OOP</span>
          </div>
          <div class="project-links">
            <a href="#" class="proj-link">↗ View project</a>
            <a href="#" class="proj-link muted">⌥ Source</a>
          </div>
        </div>
      </div>

      <div class="project-card reveal reveal-delay-1">
        <div class="project-thumb">
          <div class="project-thumb-bg"></div>
          <div class="project-thumb-grid"></div>
          <span class="project-label label-fullstack">Full-stack</span>
          <div class="project-thumb-icon">📋</div>
        </div>
        <div class="project-body">
          <div class="project-title">Star Sales Booking</div>
          <div class="project-desc">Sales order and delivery order management system designed for high-volume transaction processing, with integrated approval flows and real-time inventory sync.</div>
          <div class="project-stack">
            <span class="stack-pill">PHP</span>
            <span class="stack-pill">Laravel & Livewire</span>
            <span class="stack-pill">MySQL</span>
            <span class="stack-pill">REST API</span>
            <span class="stack-pill">Laravel Sanctum</span>
            <span class="stack-pill">MVC</span>
            <span class="stack-pill">OOP</span>
          </div>
          <div class="project-links">
            <a href="#" class="proj-link">↗ View project</a>
            <a href="#" class="proj-link muted">⌥ Source</a>
          </div>
        </div>
      </div>

      <div class="project-card reveal reveal-delay-1">
        <div class="project-thumb">
          <div class="project-thumb-bg"></div>
          <div class="project-thumb-grid"></div>
          <span class="project-label label-fullstack">Full-stack</span>
          <div class="project-thumb-icon">📊</div>
        </div>
        <div class="project-body">
          <div class="project-title">Performance Management System</div>
          <div class="project-desc">An employee performance evaluation web app with configurable KPIs, rating systems, review cycles, and manager/HR dashboards for insights and reporting.</div>
          <div class="project-stack">
            <span class="stack-pill">PHP</span><span class="stack-pill">Javascript & Bootstrap</span>
            <span class="stack-pill">MySQL</span><span class="stack-pill">HTML</span><span class="stack-pill">CSS & Tailwind</span>
          </div>
          <div class="project-links">
            <a href="#" class="proj-link">↗ View project</a>
            <a href="#" class="proj-link muted">⌥ Source</a>
          </div>
        </div>
      </div>

      <div class="project-card reveal reveal-delay-1">
        <div class="project-thumb">
          <div class="project-thumb-bg"></div>
          <div class="project-thumb-grid"></div>
          <span class="project-label label-fullstack">Full-stack</span>
          <div class="project-thumb-icon">🎫</div>
        </div>
        <div class="project-body">
          <div class="project-title">IT Ticketing System</div>
          <div class="project-desc">A helpdesk ticketing platform for logging, tracking, and resolving IT issues. Features ticket categorization, SLA tracking, and real-time status updates for requestors and technicians.</div>
          <div class="project-stack">
            <span class="stack-pill">PHP</span><span class="stack-pill">Javascript & Bootstrap</span>
            <span class="stack-pill">MySQL</span><span class="stack-pill">HTML</span><span class="stack-pill">CSS & Tailwind</span>
          </div>
          <div class="project-links">
            <a href="#" class="proj-link">↗ View project</a>
            <a href="#" class="proj-link muted">⌥ Source</a>
          </div>
        </div>
      </div>

      <div class="project-card reveal reveal-delay-1">
        <div class="project-thumb">
          <div class="project-thumb-bg"></div>
          <div class="project-thumb-grid"></div>
          <span class="project-label label-fullstack">Full-stack</span>
          <div class="project-thumb-icon">💰</div>
        </div>
        <div class="project-body">
          <div class="project-title">Incentives Commission System</div>
          <div class="project-desc">A web-based commission tracking and incentives management system. Automates computation of employee commissions based on configurable rules and performance metrics.</div>
          <div class="project-stack">
            <span class="stack-pill">.NET Frameworks</span><span class="stack-pill">Window Forms</span>
            <span class="stack-pill">MySQL</span><span class="stack-pill"></span>OOP<span class="stack-pill">UI/UX</span>
          </div>
          <div class="project-links">
            <a href="#" class="proj-link">↗ View project</a>
            <a href="#" class="proj-link muted">⌥ Source</a>
          </div>
        </div>
      </div>

      <div class="project-card reveal reveal-delay-2">
        <div class="project-thumb">
          <div class="project-thumb-bg"></div>
          <div class="project-thumb-grid"></div>
          <span class="project-label label-fullstack">Full-stack</span>
          <div class="project-thumb-icon">🏥</div>
        </div>
        <div class="project-body">
          <div class="project-title">Medical Benefits System</div>
          <div class="project-desc">An HR-integrated web application for managing employee medical benefits, claims processing, and coverage tracking with admin approval workflows.</div>
          <div class="project-stack">
            <span class="stack-pill">PHP</span><span class="stack-pill">Laravel</span><span class="stack-pill">React</span>
            <span class="stack-pill">MySQL</span><span class="stack-pill">Tailwind CSS</span><span class="stack-pill">REST API</span>
          </div>
          <div class="project-links">
            <a href="#" class="proj-link">↗ View project</a>
            <a href="#" class="proj-link muted">⌥ Source</a>
          </div>
        </div>
      </div>

      <div class="project-card reveal">
        <div class="project-thumb">
          <div class="project-thumb-bg"></div>
          <div class="project-thumb-grid"></div>
          <span class="project-label label-fullstack">Full-stack</span>
          <div class="project-thumb-icon">🏦</div>
        </div>
        <div class="project-body">
          <div class="project-title">Bank Balancing System</div>
          <div class="project-desc">A full-stack financial reconciliation system for tracking and balancing bank transactions. Features secure authentication, real-time balance computation, transaction history, and exportable reports — built with a Laravel backend API and a modern React frontend.</div>
          <div class="project-stack">
            <span class="stack-pill">Laravel</span><span class="stack-pill">React.js</span>
            <span class="stack-pill">RESTful API</span><span class="stack-pill">MySQL</span>
            <span class="stack-pill">JWT Auth</span><span class="stack-pill">Tailwind CSS</span>
          </div>
          <div class="project-links">
            <a href="#" class="proj-link">↗ View project</a>
            <a href="#" class="proj-link muted">⌥ Source</a>
          </div>
        </div>
      </div>

      <div class="project-card reveal reveal-delay-2">
        <div class="project-thumb">
          <div class="project-thumb-bg"></div>
          <div class="project-thumb-grid"></div>
          <span class="project-label label-fullstack">Full-stack</span>
          <div class="project-thumb-icon">🛎️</div>
        </div>
        <div class="project-body">
          <div class="project-title">Point of Sale System</div>
          <div class="project-desc">A modern point of sale system for retail environments, featuring inventory management, sales tracking, and customer loyalty programs.</div>
          <div class="project-stack">
            <span class="stack-pill">PHP</span><span class="stack-pill">MySQL</span><span class="stack-pill">HTML</span>
            <span class="stack-pill">JavaScript</span><span class="stack-pill">Tailwind CSS</span><span class="stack-pill">Oauth</span>
          </div>
          <div class="project-links">
            <a href="#" class="proj-link">↗ View project</a>
            <a href="#" class="proj-link muted">⌥ Source</a>
          </div>
        </div>
      </div>

      <div class="project-card reveal">
        <div class="project-thumb">
          <div class="project-thumb-bg"></div>
          <div class="project-thumb-grid"></div>
          <span class="project-label label-desktop">Desktop</span>
          <div class="project-thumb-icon">✅</div>
        </div>
        <div class="project-body">
          <div class="project-title">Verifier System</div>
          <div class="project-desc">A Windows desktop application for document and data verification workflows. Features LDAP login integration, batch processing, and validation rule configuration.</div>
          <div class="project-stack">
            <span class="stack-pill">VB.NET</span><span class="stack-pill">.NET Framework</span>
            <span class="stack-pill">MySQL</span><span class="stack-pill">LDAP</span>
          </div>
          <div class="project-links">
            <a href="#" class="proj-link">↗ View project</a>
            <a href="#" class="proj-link muted">⌥ Source</a>
          </div>
        </div>
      </div>

      <div class="project-card reveal reveal-delay-2">
        <div class="project-thumb">
          <div class="project-thumb-bg"></div>
          <div class="project-thumb-grid"></div>
          <span class="project-label label-mobile">Mobile</span>
          <div class="project-thumb-icon">📱</div>
        </div>
        <div class="project-body">
          <div class="project-title">Mobile App (React Native)</div>
          <div class="project-desc">A cross-platform mobile application built with React Native, providing on-the-go access to core business features with offline support and a smooth native experience on iOS and Android.</div>
          <div class="project-stack">
            <span class="stack-pill">React Native</span><span class="stack-pill">JavaScript</span>
            <span class="stack-pill">REST API</span><span class="stack-pill">Node.js</span>
          </div>
          <div class="project-links">
            <a href="#" class="proj-link">↗ View project</a>
            <a href="#" class="proj-link muted">⌥ Source</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Experience -->
<section id="experience" class="experience-section">
  <div class="section-inner">
    <div class="section-header reveal">
      <span class="section-tag">04 — Experience</span>
      <h2 class="section-title">Where I've <em>worked</em></h2>
    </div>
    <div class="timeline">
      <div class="timeline-item reveal">
        <div class="timeline-dot"></div>
        <div class="timeline-period">Feb 2023 — Present</div>
        <div class="timeline-role">Software Engineer</div>
        <div class="timeline-company">Co Ban Kiat Hardware Inc. · Binondo, PH</div>
        <div class="timeline-desc">Full-time software engineer responsible for designing, developing, and maintaining web and desktop applications. Manages databases, implements CI/CD workflows, provides technical support, and serves as SAP System Administrator overseeing user management, transport systems, and system landscape (DEV/QAS/PRD).</div>
        <div class="timeline-tags">
          <span class="tag">Laravel & Livewire</span><span class="tag">PHP</span><span class="tag">Javascript</span><span class="tag">React.js</span><span class="tag">VB.NET</span><span class="tag">MySQL</span><span class="tag">SAP</span><span class="tag">GitHub Actions</span>
        </div>
      </div>
      <div class="timeline-item reveal reveal-delay-1">
        <div class="timeline-dot"></div>
        <div class="timeline-period">Jan 2022 — Feb 2023</div>
        <div class="timeline-role">Freelance Web Developer</div>
        <div class="timeline-company">Co Ban Kiat Hardware Inc. · Contract</div>
        <div class="timeline-desc">Contracted to build and deliver web applications from scratch. Designed system architecture, developed frontend and backend components, and delivered production-ready applications with full documentation.</div>
        <div class="timeline-tags">
          <span class="tag">HTML & Tailwind CWW</span><span class="tag">PHP</span><span class="tag">JavaScript</span><span class="tag">MySQL</span><span class="tag">Bootstrap</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact -->
<section id="contact">
  <div class="section-inner">
    <div class="section-header reveal">
      <span class="section-tag">05 — Contact</span>
      <h2 class="section-title">Let's <em>build</em></h2>
    </div>
    <div class="contact-grid">
      <div class="contact-left reveal">
        <p class="contact-desc">Have a project in mind? Looking for a developer who can handle the full picture — from UI to database to deployment? Let's talk.</p>
        <div class="contact-links">
          <a href="mailto:Jayrrolloque16@gmail.com" class="contact-link">
            <div class="contact-link-icon">✉</div>
            <div class="contact-link-text">
              <div class="contact-link-label">Email</div>
              <div class="contact-link-val">Jayrrolloque16@gmail.com</div>
            </div>
          </a>
          <a href="tel:+639304151395" class="contact-link">
            <div class="contact-link-icon">📞</div>
            <div class="contact-link-text">
              <div class="contact-link-label">Phone</div>
              <div class="contact-link-val">+63 930 415 1395</div>
            </div>
          </a>
          <a href="https://github.com/jayr4443/" target="_blank" class="contact-link">
            <div class="contact-link-icon">⌥</div>
            <div class="contact-link-text">
              <div class="contact-link-label">GitHub</div>
              <div class="contact-link-val">github.com/jayr4443</div>
            </div>
          </a>
          <a href="https://www.linkedin.com/in/jayr-rolloque-5565a5246?utm_source=share_via&utm_content=profile&utm_medium=member_ios" target="_blank" class="contact-link">
            <div class="contact-link-icon">in</div>
            <div class="contact-link-text">
              <div class="contact-link-label">LinkedIn</div>
              <div class="contact-link-val">linkedin.com/in/joshuarolloque</div>
            </div>
          </a>
        </div>
      </div>
      <div class="contact-form reveal reveal-delay-2">
        <div class="form-group">
          <label class="form-label">Your name</label>
          <input class="form-input" type="text" placeholder="Juan dela Cruz" />
        </div>
        <div class="form-group">
          <label class="form-label">Email address</label>
          <input class="form-input" type="email" placeholder="juan@company.com" />
        </div>
        <div class="form-group">
          <label class="form-label">Project type</label>
          <select class="form-input">
            <option value="">Select a type...</option>
            <option>Web Application</option>
            <option>Mobile Application</option>
            <option>Desktop Application</option>
            <!-- <option>Full-stack / API</option> -->
            <!-- <option>SAP Administration</option> -->
            <option>Other</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Tell me about your project</label>
          <textarea class="form-textarea" placeholder="What are you building? What's the timeline?"></textarea>
        </div>
        <button class="form-submit" onclick="handleSubmit(this)">Send message →</button>
      </div>
    </div>
  </div>
</section>

<footer>
  <div class="footer-copy">© 2026 <span>JRolloque.dev</span> — All rights reserved</div>
  <div class="footer-status"><div class="status-dot"></div>Available for projects</div>
</footer>

<script>
  const cursor = document.getElementById('cursor');
  const ring = document.getElementById('cursor-ring');
  let mx=0, my=0, rx=0, ry=0;
  document.addEventListener('mousemove', e => {
    mx = e.clientX; my = e.clientY;
    cursor.style.left = mx + 'px'; cursor.style.top = my + 'px';
  });
  function animateRing() {
    rx += (mx - rx) * 0.12; ry += (my - ry) * 0.12;
    ring.style.left = rx + 'px'; ring.style.top = ry + 'px';
    requestAnimationFrame(animateRing);
  }
  animateRing();
  document.querySelectorAll('a,button,.project-card,.about-card,.contact-link').forEach(el => {
    el.addEventListener('mouseenter', () => { cursor.style.width='18px'; cursor.style.height='18px'; ring.style.width='54px'; ring.style.height='54px'; });
    el.addEventListener('mouseleave', () => { cursor.style.width='10px'; cursor.style.height='10px'; ring.style.width='36px'; ring.style.height='36px'; });
  });
  function openMenu() { document.getElementById('mobile-menu').classList.add('open'); }
  function closeMenu() { document.getElementById('mobile-menu').classList.remove('open'); }

  const observer = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.1 });
  document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

  const skillObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.querySelectorAll('.skill-fill').forEach(bar => { bar.style.width = bar.dataset.width; });
      }
    });
  }, { threshold: 0.3 });
  document.querySelectorAll('.skill-group').forEach(g => skillObs.observe(g));

  function animateCounter(el, target, duration = 1500) {
    let start = 0;
    const step = timestamp => {
      if (!start) start = timestamp;
      const progress = Math.min((timestamp - start) / duration, 1);
      el.textContent = Math.floor(progress * target);
      if (progress < 1) requestAnimationFrame(step);
      else el.textContent = target + '+';
    };
    requestAnimationFrame(step);
  }
  const statObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.querySelectorAll('[data-count]').forEach(el => { animateCounter(el, parseInt(el.dataset.count)); });
        statObs.unobserve(e.target);
      }
    });
  }, { threshold: 0.5 });
  const heroStats = document.querySelector('.hero-stats');
  if (heroStats) statObs.observe(heroStats);

  function handleSubmit(btn) {
    btn.textContent = 'Message sent ✓'; btn.style.background = '#10b981';
    setTimeout(() => { btn.textContent = 'Send message →'; btn.style.background = ''; }, 3000);
  }
  window.addEventListener('scroll', () => {
    document.querySelector('nav').style.padding = window.scrollY > 50 ? '12px 48px' : '20px 48px';
  });
</script>
</body>
</html>