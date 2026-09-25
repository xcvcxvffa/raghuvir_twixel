{{--
    ==========================================================================
    RAGHUVIR ATTA — ULTRA-PRO BANNER POSITION STUDIO & REAL HERO SIMULATOR
    ==========================================================================
    - Interactive Artboard with Simulated Browser Topbar & Mobile Device Shell
    - Real-Time Mini Navigator Map / Radar showing full panoramic crop box
    - Direct Point-and-Click Focal Point Positioning with Canvas Ripple
    - Silky 2D Dragging & Live Crosshair Reticle with Exact Coordinates HUD
    - 3×3 Tactile Alignment Pad + 5 Purpose-Built Visual Focal Presets
    - Dual Precision Stepper Inputs & Smooth Gradient Range Sliders (X & Y)
    - Contrast Tint Controller (0% to 70% Overlay) to preview readability
    - Multi-Device Viewport Engine (Desktop Browser, iPad Tablet, iPhone Mobile)
    - Safe-Zone Packaging Guidelines & Real Glass Header Replica
    - Keyboard Shortcuts (Arrow keys to nudge 1%, Shift+Arrow for 10%)
    - One-Click CSS background-position Copy with Toast Feedback
    - 100% Theme Adaptive (Looks breathtaking in Dark and Light Modes)
--}}

@php
    $idPrefix = $idPrefix ?? 'banner_adj_' . uniqid();
    $currentPosition = $currentPosition ?? 'center center';
    $fileInputName = $fileInputName ?? 'banner_image';
    $positionInputName = $positionInputName ?? 'banner_position';
    $previewHeight = $previewHeight ?? '430px';
    $recommendedText = $recommendedText ?? '1920 × 500 px (Panoramic)';
    $titleSimulation = $titleSimulation ?? 'Our Products';
    $routeSimulation = $routeSimulation ?? 'Page Details';

    // Parse initial X and Y coordinates
    $xPercent = 50;
    $yPercent = 50;

    if (str_contains($currentPosition, 'left')) {
        $xPercent = 0;
    } elseif (str_contains($currentPosition, 'right')) {
        $xPercent = 100;
    }

    if (str_contains($currentPosition, 'bottom')) {
        $yPercent = 100;
    } elseif (str_contains($currentPosition, 'top')) {
        $yPercent = 0;
    }

    if (preg_match_all('/(\d+)%/', $currentPosition, $matches)) {
        if (count($matches[1]) === 1) {
            $yPercent = (int) $matches[1][0];
        } elseif (count($matches[1]) >= 2) {
            $xPercent = (int) $matches[1][0];
            $yPercent = (int) $matches[1][1];
        }
    }
@endphp

<div class="banner-pro-studio-root" id="{{ $idPrefix }}_root" tabindex="0">
    {{-- Hidden Input for form submission --}}
    <input type="hidden" name="{{ $positionInputName }}" id="{{ $idPrefix }}_position_input" value="{{ $currentPosition }}">

    <style>
        #{{ $idPrefix }}_root {
            --studio-saffron: #EF801C;
            --studio-saffron-light: #ff9838;
            --studio-saffron-glow: rgba(239, 128, 28, 0.4);
            --studio-sky: #0284c7;
            --studio-emerald: #10b981;
            --studio-surface: #0e1422;
            --studio-card: #151d30;
            --studio-subcard: #1b253d;
            --studio-border: rgba(255, 255, 255, 0.08);
            --studio-border-hover: rgba(239, 128, 28, 0.45);
            --studio-text: #f8fafc;
            --studio-muted: #94a3b8;
            --studio-canvas-bg: #070a12;
            font-family: inherit;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
            margin-bottom: 2rem;
            user-select: none;
            outline: none;
        }

        /* Light Mode Overrides */
        body:not(.dark) #{{ $idPrefix }}_root,
        html:not(.dark) #{{ $idPrefix }}_root {
            --studio-surface: #f8fafc;
            --studio-card: #ffffff;
            --studio-subcard: #f1f5f9;
            --studio-border: #e2e8f0;
            --studio-border-hover: #EF801C;
            --studio-text: #0f172a;
            --studio-muted: #64748b;
            --studio-canvas-bg: #090d16;
        }

        /* Container Shell with Container Query */
        #{{ $idPrefix }}_root .studio-shell {
            container-type: inline-size;
            container-name: bannerStudio;
            border: 1px solid var(--studio-border);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.25), 0 0 0 1px var(--studio-border);
            background: var(--studio-card);
            transition: all 0.25s ease;
        }

        /* Studio Top Navigation Bar */
        #{{ $idPrefix }}_root .studio-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.85rem 1.25rem;
            background: var(--studio-card);
            border-bottom: 1px solid var(--studio-border);
            gap: 10px;
            flex-wrap: wrap;
        }

        #{{ $idPrefix }}_root .brand-badge {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        #{{ $idPrefix }}_root .brand-sparkle-icon {
            width: 32px;
            height: 32px;
            border-radius: 9px;
            background: linear-gradient(135deg, var(--studio-saffron) 0%, #ea580c 100%);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            box-shadow: 0 4px 12px var(--studio-saffron-glow);
            flex-shrink: 0;
        }

        /* Segmented Viewport Switcher */
        #{{ $idPrefix }}_root .viewport-pill-group {
            display: inline-flex;
            align-items: center;
            background: var(--studio-subcard);
            padding: 3px;
            border-radius: 10px;
            border: 1px solid var(--studio-border);
            gap: 2px;
        }
        #{{ $idPrefix }}_root .vp-tab-btn {
            padding: 5px 11px;
            font-size: 0.74rem;
            font-weight: 700;
            border-radius: 7px;
            border: none;
            background: transparent;
            color: var(--studio-muted);
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.16s ease;
        }
        #{{ $idPrefix }}_root .vp-tab-btn:hover {
            color: var(--studio-text);
        }
        #{{ $idPrefix }}_root .vp-tab-btn.active {
            background: var(--studio-sky);
            color: #ffffff;
            box-shadow: 0 2px 8px rgba(2, 132, 199, 0.4);
        }

        /* Top Action Buttons */
        #{{ $idPrefix }}_root .action-btn {
            padding: 5px 11px;
            font-size: 0.73rem;
            font-weight: 700;
            border-radius: 8px;
            border: 1px solid var(--studio-border);
            background: var(--studio-subcard);
            color: var(--studio-muted);
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.15s ease;
        }
        #{{ $idPrefix }}_root .action-btn:hover {
            border-color: var(--studio-saffron);
            color: var(--studio-text);
        }
        #{{ $idPrefix }}_root .action-btn.active-hdr {
            background: rgba(16, 185, 129, 0.12);
            border-color: #10b981;
            color: #10b981;
        }
        #{{ $idPrefix }}_root .action-btn.active-safe {
            background: rgba(2, 132, 199, 0.12);
            border-color: #0284c7;
            color: #0284c7;
        }

        /* Artboard Stage */
        #{{ $idPrefix }}_root .artboard-stage {
            background: radial-gradient(circle at 50% 15%, #182238 0%, var(--studio-canvas-bg) 100%);
            padding: 16px 14px 20px;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        #{{ $idPrefix }}_root .artboard-stage::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.06) 1px, transparent 1px);
            background-size: 20px 20px;
            pointer-events: none;
        }

        /* Device Frame Simulation */
        #{{ $idPrefix }}_root .device-chassis {
            width: 100%;
            max-width: 100%;
            transition: max-width 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 2;
        }

        /* Simulated Browser Desktop Bar */
        #{{ $idPrefix }}_root .browser-topbar {
            background: #1e293b;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-bottom: none;
            border-radius: 12px 12px 0 0;
            padding: 7px 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-sizing: border-box;
        }
        #{{ $idPrefix }}_root .window-dots {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        #{{ $idPrefix }}_root .w-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
        }
        #{{ $idPrefix }}_root .w-dot.red { background: #ef4444; }
        #{{ $idPrefix }}_root .w-dot.yellow { background: #f59e0b; }
        #{{ $idPrefix }}_root .w-dot.green { background: #10b981; }

        #{{ $idPrefix }}_root .browser-address {
            flex: 1;
            max-width: 320px;
            background: rgba(0, 0, 0, 0.35);
            border-radius: 6px;
            padding: 2px 8px;
            font-size: 0.65rem;
            color: #94a3b8;
            display: flex;
            align-items: center;
            gap: 5px;
            margin: 0 auto;
            border: 1px solid rgba(255, 255, 255, 0.06);
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* The Hero Interactive Canvas */
        #{{ $idPrefix }}_root .hero-artboard-canvas {
            position: relative;
            width: 100%;
            height: {{ $previewHeight }};
            min-height: 180px;
            border-radius: 0 0 12px 12px;
            overflow: hidden;
            background-color: #0d131f;
            background-image: url('{{ $currentImageUrl }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: {{ $currentPosition }};
            box-shadow: 0 14px 35px -6px rgba(0, 0, 0, 0.75), 0 0 0 1px rgba(255, 255, 255, 0.12);
            cursor: crosshair;
            transition: height 0.3s ease;
        }

        /* ================================================================= */
        /* CONTAINER QUERY: ADAPT TO COMPACT CONTAINERS (SIDEBARS & MOBILE)   */
        /* ================================================================= */
        @container bannerStudio (max-width: 600px) {
            #{{ $idPrefix }}_root .hero-artboard-canvas {
                height: 200px !important;
            }
            #{{ $idPrefix }}_root #{{ $idPrefix }}_nav_menu {
                display: none !important;
            }
            #{{ $idPrefix }}_root #{{ $idPrefix }}_cta_btn {
                display: none !important;
            }
            #{{ $idPrefix }}_root #{{ $idPrefix }}_burger_icon {
                display: block !important;
            }
            #{{ $idPrefix }}_root .vp-tab-btn span {
                display: none;
            }
            #{{ $idPrefix }}_root .action-btn span {
                display: none;
            }
            #{{ $idPrefix }}_root .browser-topbar {
                display: none !important;
            }
            #{{ $idPrefix }}_root .hero-artboard-canvas {
                border-radius: 12px !important;
            }
            #{{ $idPrefix }}_root #{{ $idPrefix }}_title_sim {
                font-size: 1.15rem !important;
                margin-bottom: 4px !important;
            }
            #{{ $idPrefix }}_root .brand-badge > div {
                display: none;
            }
        }
        #{{ $idPrefix }}_root.is-mobile-view .hero-artboard-canvas {
            border-radius: 20px;
        }

        /* Dynamic Click Ripple */
        @keyframes studioRipple {
            0% { transform: translate(-50%, -50%) scale(0.3); opacity: 1; }
            100% { transform: translate(-50%, -50%) scale(2.4); opacity: 0; }
        }
        #{{ $idPrefix }}_root .canvas-click-ripple {
            position: absolute;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            border: 2px solid var(--studio-saffron);
            background: rgba(239, 128, 28, 0.25);
            pointer-events: none;
            animation: studioRipple 0.65s cubic-bezier(0.1, 0.8, 0.3, 1) forwards;
            z-index: 20;
        }

        /* Living Focal Reticle Pin */
        #{{ $idPrefix }}_root .focal-target-pin {
            position: absolute;
            transform: translate(-50%, -50%);
            width: 48px;
            height: 48px;
            pointer-events: none;
            z-index: 22;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: left 0.08s ease-out, top 0.08s ease-out;
        }
        #{{ $idPrefix }}_root .pin-outer-glow {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: radial-gradient(circle, var(--studio-saffron-glow) 0%, transparent 70%);
            animation: pulseGlow 2s infinite ease-in-out;
        }
        @keyframes pulseGlow {
            0%, 100% { transform: scale(1); opacity: 0.6; }
            50% { transform: scale(1.3); opacity: 1; }
        }
        #{{ $idPrefix }}_root .pin-ring {
            position: absolute;
            inset: 5px;
            border-radius: 50%;
            border: 2px solid #ffffff;
            box-shadow: 0 0 0 2px var(--studio-saffron), 0 4px 14px rgba(0,0,0,0.8);
            background: rgba(239, 128, 28, 0.25);
        }
        #{{ $idPrefix }}_root .pin-cross-h {
            position: absolute;
            left: -8px;
            right: -8px;
            height: 2px;
            background: rgba(255,255,255,0.95);
            box-shadow: 0 0 3px rgba(0,0,0,0.8);
        }
        #{{ $idPrefix }}_root .pin-cross-v {
            position: absolute;
            top: -8px;
            bottom: -8px;
            width: 2px;
            background: rgba(255,255,255,0.95);
            box-shadow: 0 0 3px rgba(0,0,0,0.8);
        }
        #{{ $idPrefix }}_root .pin-center-dot {
            position: absolute;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #ffffff;
            box-shadow: 0 0 4px #000;
        }
        #{{ $idPrefix }}_root .pin-coords-chip {
            position: absolute;
            top: 52px;
            background: rgba(15, 23, 42, 0.92);
            backdrop-filter: blur(8px);
            color: #ffffff;
            font-size: 0.68rem;
            font-weight: 800;
            padding: 3px 9px;
            border-radius: 8px;
            border: 1px solid rgba(255,255,255,0.25);
            white-space: nowrap;
            letter-spacing: 0.03em;
            box-shadow: 0 6px 16px rgba(0,0,0,0.6);
        }

        /* 3×3 Tactile Alignment Matrix */
        #{{ $idPrefix }}_root .pad-3x3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 7px;
        }
        #{{ $idPrefix }}_root .pad-cell {
            padding: 9px 4px;
            font-size: 0.73rem;
            font-weight: 700;
            border-radius: 9px;
            border: 1px solid var(--studio-border);
            background: var(--studio-card);
            color: var(--studio-text);
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 4px;
            transition: all 0.16s ease;
        }
        #{{ $idPrefix }}_root .pad-cell:hover {
            border-color: var(--studio-saffron);
            background: var(--studio-subcard);
            transform: translateY(-1px);
        }
        #{{ $idPrefix }}_root .pad-cell.active {
            background: linear-gradient(135deg, var(--studio-saffron) 0%, #ea580c 100%) !important;
            border-color: var(--studio-saffron) !important;
            color: #ffffff !important;
            box-shadow: 0 4px 14px var(--studio-saffron-glow);
            transform: translateY(-1px);
        }

        /* Purpose-Built Preset Cards */
        #{{ $idPrefix }}_root .preset-card-item {
            padding: 7px 11px;
            font-size: 0.72rem;
            font-weight: 700;
            border-radius: 9px;
            border: 1px solid var(--studio-border);
            background: var(--studio-card);
            color: var(--studio-text);
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: all 0.16s ease;
        }
        #{{ $idPrefix }}_root .preset-card-item:hover {
            border-color: var(--studio-saffron);
            background: var(--studio-subcard);
            transform: translateY(-1px);
        }
        #{{ $idPrefix }}_root .preset-card-item.featured {
            border-color: var(--studio-saffron);
            background: rgba(239, 128, 28, 0.12);
            color: var(--studio-saffron);
        }

        /* Number Inputs & Steppers */
        #{{ $idPrefix }}_root .stepper-input-box {
            display: inline-flex;
            align-items: center;
            background: var(--studio-card);
            border: 1px solid var(--studio-border);
            border-radius: 8px;
            padding: 2px 6px;
            gap: 4px;
        }
        #{{ $idPrefix }}_root .stepper-val {
            width: 44px;
            border: none;
            background: transparent;
            font-size: 0.82rem;
            font-weight: 800;
            text-align: right;
            color: var(--studio-text);
            padding: 3px 0;
            outline: none;
        }
        #{{ $idPrefix }}_root .step-icon-btn {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            border: 1px solid var(--studio-border);
            background: var(--studio-subcard);
            color: var(--studio-text);
            cursor: pointer;
            font-size: 0.7rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.15s ease;
        }
        #{{ $idPrefix }}_root .step-icon-btn:hover {
            background: var(--studio-saffron);
            color: #ffffff;
            border-color: var(--studio-saffron);
        }

        /* Range Slider Styling */
        #{{ $idPrefix }}_root input[type=range] {
            -webkit-appearance: none;
            width: 100%;
            height: 6px;
            border-radius: 6px;
            background: var(--studio-border);
            outline: none;
            margin: 0;
            cursor: pointer;
        }
        #{{ $idPrefix }}_root input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #ffffff;
            border: 2px solid var(--studio-saffron);
            box-shadow: 0 2px 8px rgba(0,0,0,0.4);
            cursor: grab;
            transition: transform 0.12s ease;
        }
        #{{ $idPrefix }}_root input[type=range]::-webkit-slider-thumb:hover {
            transform: scale(1.2);
        }
        #{{ $idPrefix }}_root input[type=range].y-slider::-webkit-slider-thumb {
            border-color: var(--studio-sky);
        }
        #{{ $idPrefix }}_root input[type=range].x-slider::-webkit-slider-thumb {
            border-color: var(--studio-emerald);
        }

        /* Radar Mini-Map Thumbnail */
        #{{ $idPrefix }}_root .radar-minimap {
            position: relative;
            width: 100%;
            height: 64px;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid var(--studio-border);
            background-color: #050811;
            background-image: url('{{ $currentImageUrl }}');
            background-size: cover;
            background-position: center;
            cursor: crosshair;
        }
        #{{ $idPrefix }}_root .radar-view-box {
            position: absolute;
            border: 2px solid var(--studio-saffron);
            background: rgba(239, 128, 28, 0.25);
            border-radius: 4px;
            pointer-events: none;
            box-shadow: 0 0 10px rgba(239, 128, 28, 0.5);
            transition: left 0.1s ease, top 0.1s ease;
        }
    </style>

    <div class="studio-shell">
        {{-- STUDIO HEADER TOOLBAR --}}
        <div class="studio-header">
            {{-- Brand Identity & Coordinate Tag --}}
            <div style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
                <div class="brand-badge">
                    <div class="brand-sparkle-icon">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                    </div>
                    <div>
                        <div style="font-size: 0.92rem; font-weight: 800; color: var(--studio-text); letter-spacing: -0.01em; display: flex; align-items: center; gap: 6px;">
                            <span>Hero Banner Positioning Studio</span>
                            <span style="font-size: 0.65rem; font-weight: 800; background: rgba(239, 128, 28, 0.15); color: var(--studio-saffron); padding: 1px 6px; border-radius: 4px; text-transform: uppercase;">Pro 2.0</span>
                        </div>
                        <div style="font-size: 0.72rem; color: var(--studio-muted);">
                            Click image to position &bull; Recommended: <strong>{{ $recommendedText }}</strong>
                        </div>
                    </div>
                </div>

                {{-- Live Coordinate Badge --}}
                <div id="{{ $idPrefix }}_pos_badge" style="font-size: 0.75rem; font-weight: 800; color: var(--studio-sky); background: rgba(2, 132, 199, 0.1); border: 1px solid rgba(2, 132, 199, 0.28); padding: 3px 10px; border-radius: 8px; display: inline-flex; align-items: center; gap: 6px;">
                    <i class="fa-solid fa-location-crosshairs" style="font-size: 0.7rem;"></i>
                    <span id="{{ $idPrefix }}_pos_badge_text">{{ $currentPosition }}</span>
                </div>
            </div>

            {{-- Studio Navigation Tools --}}
            <div style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                {{-- Viewport Switcher --}}
                <div class="viewport-pill-group">
                    <button type="button" class="vp-tab-btn active" id="{{ $idPrefix }}_vp_desktop" onclick="{{ $idPrefix }}_setViewport('desktop')" title="Desktop View (1920px Full Width)">
                        <i class="fa-solid fa-desktop"></i> <span>Desktop</span>
                    </button>
                    <button type="button" class="vp-tab-btn" id="{{ $idPrefix }}_vp_tablet" onclick="{{ $idPrefix }}_setViewport('tablet')" title="Laptop / Tablet View (768px)">
                        <i class="fa-solid fa-tablet-screen-button"></i> <span>Tablet</span>
                    </button>
                    <button type="button" class="vp-tab-btn" id="{{ $idPrefix }}_vp_mobile" onclick="{{ $idPrefix }}_setViewport('mobile')" title="Mobile View (390px)">
                        <i class="fa-solid fa-mobile-screen"></i> <span>Mobile</span>
                    </button>
                </div>

                {{-- Safe-Zone Overlay Toggle --}}
                <button type="button" class="action-btn" id="{{ $idPrefix }}_btn_guide" onclick="{{ $idPrefix }}_toggleGuide()" title="Toggle Product Safe-Zone guidelines">
                    <i class="fa-solid fa-table-cells"></i> <span>Safe Zone</span>
                </button>

                {{-- Header Overlay Toggle --}}
                <button type="button" class="action-btn active-hdr" id="{{ $idPrefix }}_btn_hdr" onclick="{{ $idPrefix }}_toggleHeader()" title="Toggle simulated website header">
                    <i class="fa-solid fa-bars"></i> <span>Header</span>
                </button>

                {{-- Expand Canvas --}}
                <button type="button" class="action-btn" id="{{ $idPrefix }}_btn_expand" onclick="{{ $idPrefix }}_toggleExpand()" title="Expand canvas preview height">
                    <i class="fa-solid fa-expand" id="{{ $idPrefix }}_expand_icon"></i>
                </button>
            </div>
        </div>

        {{-- STUDIO STAGE / ARTBOARD --}}
        <div class="artboard-stage" id="{{ $idPrefix }}_stage">
            <div class="device-chassis" id="{{ $idPrefix }}_device_frame">

                {{-- Simulated Browser Desktop Bar --}}
                <div class="browser-topbar" id="{{ $idPrefix }}_browser_bar">
                    <div class="window-dots">
                        <span class="w-dot red"></span>
                        <span class="w-dot yellow"></span>
                        <span class="w-dot green"></span>
                    </div>
                    <div class="browser-address">
                        <i class="fa-solid fa-lock" style="font-size: 0.6rem; color: #10b981;"></i>
                        <span>raghuviratta.com / {{ strtolower(str_replace(' ', '-', $routeSimulation)) }}</span>
                    </div>
                    <div style="font-size: 0.65rem; color: #64748b; font-weight: 700;" class="d-none d-md-block">
                        1920 × 500 px
                    </div>
                </div>

                {{-- The Panoramic Hero Artboard Canvas --}}
                <div class="hero-artboard-canvas"
                     id="{{ $idPrefix }}_preview_box"
                     title="Click anywhere to set focal point or drag in any direction">

                    {{-- Dynamic Brand Tint Overlay (.page-header:before) --}}
                    <div id="{{ $idPrefix }}_tint_overlay" style="position: absolute; inset: 0; background-color: #EF801C; opacity: 0.28; mix-blend-mode: multiply; pointer-events: none; z-index: 1; transition: opacity 0.2s;"></div>
                    
                    {{-- Vignette Contrast Gradients --}}
                    <div style="position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(0,0,0,0.52) 0%, transparent 34%, transparent 62%, rgba(0,0,0,0.78) 100%); pointer-events: none; z-index: 2;"></div>

                    {{-- Simulated Authentic Glassmorphism Website Header (.main-header) --}}
                    <div id="{{ $idPrefix }}_header_layer" style="position: absolute; top: 12px; left: 16px; right: 16px; z-index: 10; pointer-events: none; transition: opacity 0.2s ease;">
                        <div style="background: rgba(255, 255, 255, 0.12); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.22); border-radius: 12px; padding: 7px 18px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);">
                            {{-- Brand Logo --}}
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <img src="{{ asset('images/Raghuvir Logo White.png') }}"
                                     alt="Raghuvir Atta"
                                     onerror="this.onerror=null; this.src='{{ asset('images/Raghuvir Logo.png') }}';"
                                     style="height: 32px; max-width: 140px; object-fit: contain; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.6));">
                            </div>

                            {{-- Desktop Menu Links --}}
                            <div id="{{ $idPrefix }}_nav_menu" style="display: flex; align-items: center; gap: 18px;">
                                <span style="color: #ffffff; font-size: 0.78rem; font-weight: 600; text-shadow: 0 1px 4px rgba(0,0,0,0.85);">Home</span>
                                <span style="color: rgba(255,255,255,0.85); font-size: 0.78rem; font-weight: 500; text-shadow: 0 1px 4px rgba(0,0,0,0.85);">About Us</span>
                                <span style="color: #EF801C; font-size: 0.78rem; font-weight: 700; text-shadow: 0 1px 4px rgba(0,0,0,0.85); display: flex; align-items: center; gap: 4px;">
                                    Our Products <i class="fa-solid fa-chevron-down" style="font-size: 0.6rem;"></i>
                                </span>
                                <span style="color: rgba(255,255,255,0.85); font-size: 0.78rem; font-weight: 500; text-shadow: 0 1px 4px rgba(0,0,0,0.85);">Blog</span>
                                <span style="color: rgba(255,255,255,0.85); font-size: 0.78rem; font-weight: 500; text-shadow: 0 1px 4px rgba(0,0,0,0.85);">Contact Us</span>
                            </div>

                            {{-- CTA Button --}}
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div id="{{ $idPrefix }}_cta_btn" style="background: linear-gradient(135deg, #EF801C, #d97706); color: #fff; font-size: 0.74rem; font-weight: 700; padding: 5px 14px; border-radius: 9999px; box-shadow: 0 2px 10px rgba(239, 128, 28, 0.45); display: flex; align-items: center; gap: 5px;">
                                    <span>Get Started</span>
                                    <i class="fa-solid fa-arrow-right" style="font-size: 0.65rem;"></i>
                                </div>
                                <div id="{{ $idPrefix }}_burger_icon" style="display: none; color: #fff; font-size: 1.05rem; padding: 2px;">
                                    <i class="fa-solid fa-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Simulated Centered Page Title & Breadcrumb --}}
                    <div style="position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 75px 20px 25px; z-index: 5; pointer-events: none;">
                        <h1 id="{{ $idPrefix }}_title_sim" style="color: #ffffff; font-size: clamp(1.4rem, 3.4vw, 2.75rem); font-weight: 800; margin: 0 0 8px 0; text-shadow: 0 3px 14px rgba(0,0,0,0.95); line-height: 1.15; letter-spacing: -0.015em; max-width: 90%;">
                            {{ $titleSimulation }}
                        </h1>
                        <div style="display: inline-flex; align-items: center; gap: 7px; background: rgba(0, 0, 0, 0.45); backdrop-filter: blur(8px); padding: 4px 14px; border-radius: 9999px; border: 1px solid rgba(255, 255, 255, 0.18); box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                            <i class="fa-solid fa-house" style="font-size: 0.68rem; color: #EF801C;"></i>
                            <span style="color: #ffffff; font-size: 0.74rem; font-weight: 600;">Home</span>
                            <span style="color: #EF801C; font-size: 0.7rem;">/</span>
                            <span style="color: #EF801C; font-size: 0.74rem; font-weight: 700;">{{ $routeSimulation }}</span>
                        </div>
                    </div>

                    {{-- Safe-Zone Overlay Guidelines (Toggleable) --}}
                    <div id="{{ $idPrefix }}_guide_overlay" style="display: none; position: absolute; inset: 0; z-index: 6; pointer-events: none;">
                        <div style="position: absolute; top: 0; left: 0; right: 0; height: 32%; background: rgba(2, 132, 199, 0.15); border-bottom: 2px dashed #0284c7; display: flex; align-items: flex-end; padding: 4px 12px;">
                            <span style="font-size: 0.65rem; font-weight: 700; color: #fff; background: rgba(2, 132, 199, 0.92); padding: 2px 7px; border-radius: 4px;">
                                <i class="fa-solid fa-triangle-exclamation"></i> Top Navbar Zone (Do not place packaging seals/logos here)
                            </span>
                        </div>
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 68%; border: 2px dashed rgba(16, 185, 129, 0.85); display: flex; align-items: flex-start; justify-content: flex-end; padding: 4px 12px;">
                            <span style="font-size: 0.65rem; font-weight: 700; color: #fff; background: rgba(16, 185, 129, 0.95); padding: 2px 7px; border-radius: 4px;">
                                <i class="fa-solid fa-check"></i> Safe Subject / Packaging Focus Zone
                            </span>
                        </div>
                    </div>

                    {{-- Living Focal Reticle Pin --}}
                    <div class="focal-target-pin" id="{{ $idPrefix }}_reticle" style="top: {{ $yPercent }}%; left: {{ $xPercent }}%;">
                        <div class="pin-outer-glow"></div>
                        <div class="pin-ring"></div>
                        <div class="pin-cross-h"></div>
                        <div class="pin-cross-v"></div>
                        <div class="pin-center-dot"></div>
                        <div class="pin-coords-chip" id="{{ $idPrefix }}_reticle_tag">{{ $xPercent }}%, {{ $yPercent }}%</div>
                    </div>

                    {{-- Real-Time HUD Coordinate Badge --}}
                    <div style="position: absolute; bottom: 12px; right: 14px; z-index: 15; pointer-events: none; background: rgba(15, 23, 42, 0.88); backdrop-filter: blur(8px); color: #fff; font-size: 0.72rem; font-weight: 700; padding: 4px 11px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.2); display: flex; align-items: center; gap: 7px; box-shadow: 0 4px 14px rgba(0,0,0,0.5);">
                        <i class="fa-solid fa-crosshairs" style="color: #EF801C;"></i>
                        <span id="{{ $idPrefix }}_hud_text">{{ $currentPosition }}</span>
                    </div>

                    {{-- Point-and-Click Hint --}}
                    <div id="{{ $idPrefix }}_click_hint" style="position: absolute; bottom: 12px; left: 14px; z-index: 15; pointer-events: none; background: rgba(15, 23, 42, 0.82); backdrop-filter: blur(8px); color: rgba(255,255,255,0.9); font-size: 0.7rem; font-weight: 600; padding: 4px 12px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.15); display: flex; align-items: center; gap: 7px; transition: opacity 0.4s ease;">
                        <i class="fa-solid fa-hand-pointer" style="color: #EF801C;"></i>
                        <span>Click anywhere or drag to reposition focal point</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- STUDIO CONTROL DECK --}}
        <div style="background: var(--studio-card); padding: 1.35rem 1.5rem; border-top: 1px solid var(--studio-border);">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(310px, 1fr)); gap: 1.5rem; align-items: stretch;">

                {{-- ZONE 1: 3×3 Focal Matrix & Radar Minimap --}}
                <div style="background: var(--studio-subcard); border: 1px solid var(--studio-border); border-radius: 14px; padding: 1.15rem; display: flex; flex-direction: column; justify-content: space-between; gap: 1rem;">
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.85rem;">
                            <span style="font-size: 0.82rem; font-weight: 800; color: var(--studio-text); display: flex; align-items: center; gap: 7px;">
                                <i class="fa-solid fa-table-cells-large" style="color: var(--studio-saffron);"></i>
                                <span>3×3 Alignment Matrix &amp; Radar</span>
                            </span>
                            <button type="button" onclick="{{ $idPrefix }}_reset()" title="Reset to Center Default (50% 50%)" style="background: var(--studio-card); border: 1px solid var(--studio-border); border-radius: 6px; padding: 3px 9px; font-size: 0.7rem; font-weight: 700; color: var(--studio-muted); cursor: pointer; display: flex; align-items: center; gap: 5px;">
                                <i class="fa-solid fa-rotate-left"></i> <span>Reset</span>
                            </button>
                        </div>

                        {{-- 3×3 Tactile Grid --}}
                        <div class="pad-3x3" style="margin-bottom: 0.9rem;">
                            <button type="button" class="pad-cell" id="{{ $idPrefix }}_mat_0_0" onclick="{{ $idPrefix }}_setXY(0, 0)">
                                <i class="fa-solid fa-arrow-up-left" style="font-size: 0.75rem;"></i>
                                <span>Top Left</span>
                            </button>
                            <button type="button" class="pad-cell" id="{{ $idPrefix }}_mat_50_0" onclick="{{ $idPrefix }}_setXY(50, 0)">
                                <i class="fa-solid fa-arrow-up" style="font-size: 0.75rem;"></i>
                                <span>Top</span>
                            </button>
                            <button type="button" class="pad-cell" id="{{ $idPrefix }}_mat_100_0" onclick="{{ $idPrefix }}_setXY(100, 0)">
                                <i class="fa-solid fa-arrow-up-right" style="font-size: 0.75rem;"></i>
                                <span>Top Right</span>
                            </button>

                            <button type="button" class="pad-cell" id="{{ $idPrefix }}_mat_0_50" onclick="{{ $idPrefix }}_setXY(0, 50)">
                                <i class="fa-solid fa-arrow-left" style="font-size: 0.75rem;"></i>
                                <span>Left</span>
                            </button>
                            <button type="button" class="pad-cell" id="{{ $idPrefix }}_mat_50_50" onclick="{{ $idPrefix }}_setXY(50, 50)">
                                <i class="fa-solid fa-arrows-to-dot" style="font-size: 0.85rem;"></i>
                                <span>Center</span>
                            </button>
                            <button type="button" class="pad-cell" id="{{ $idPrefix }}_mat_100_50" onclick="{{ $idPrefix }}_setXY(100, 50)">
                                <i class="fa-solid fa-arrow-right" style="font-size: 0.75rem;"></i>
                                <span>Right</span>
                            </button>

                            <button type="button" class="pad-cell" id="{{ $idPrefix }}_mat_0_100" onclick="{{ $idPrefix }}_setXY(0, 100)">
                                <i class="fa-solid fa-arrow-down-left" style="font-size: 0.75rem;"></i>
                                <span>Bottom Left</span>
                            </button>
                            <button type="button" class="pad-cell" id="{{ $idPrefix }}_mat_50_85" onclick="{{ $idPrefix }}_setXY(50, 85)" title="Best for Products and Flour Pouches">
                                <i class="fa-solid fa-shield-halved" style="font-size: 0.75rem; color: var(--studio-saffron);"></i>
                                <span style="font-weight: 800;">Bottom (Safe)</span>
                            </button>
                            <button type="button" class="pad-cell" id="{{ $idPrefix }}_mat_100_100" onclick="{{ $idPrefix }}_setXY(100, 100)">
                                <i class="fa-solid fa-arrow-down-right" style="font-size: 0.75rem;"></i>
                                <span>Bottom Right</span>
                            </button>
                        </div>

                        {{-- Panoramic Radar Minimap --}}
                        <div style="margin-top: 0.6rem;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">
                                <span style="font-size: 0.68rem; font-weight: 700; color: var(--studio-muted); text-transform: uppercase; letter-spacing: 0.05em;">
                                    <i class="fa-solid fa-radar" style="color: var(--studio-saffron);"></i> Radar Viewport Map
                                </span>
                                <span style="font-size: 0.68rem; color: var(--studio-muted);">Click to pan</span>
                            </div>
                            <div class="radar-minimap" id="{{ $idPrefix }}_radar_map" onclick="{{ $idPrefix }}_onRadarClick(event)">
                                <div class="radar-view-box" id="{{ $idPrefix }}_radar_box"></div>
                            </div>
                        </div>
                    </div>

                    {{-- Purpose-Built Presets --}}
                    <div style="padding-top: 0.75rem; border-top: 1px dashed var(--studio-border);">
                        <div style="font-size: 0.68rem; font-weight: 700; color: var(--studio-muted); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 6px;">
                            Quick Focus Presets:
                        </div>
                        <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                            <button type="button" class="preset-card-item featured" onclick="{{ $idPrefix }}_setXY(50, 85)" title="Recommended for Flour Pouches & Packaging">
                                <i class="fa-solid fa-award"></i> <span>Product Safe (50% 85%)</span>
                            </button>
                            <button type="button" class="preset-card-item" onclick="{{ $idPrefix }}_setXY(50, 50)">
                                <i class="fa-solid fa-crosshairs"></i> <span>Center (50% 50%)</span>
                            </button>
                            <button type="button" class="preset-card-item" onclick="{{ $idPrefix }}_setXY(50, 20)">
                                <i class="fa-solid fa-mountain-sun"></i> <span>Top Horizon (20%)</span>
                            </button>
                            <button type="button" class="preset-card-item" onclick="{{ $idPrefix }}_setXY(15, 60)">
                                <i class="fa-solid fa-align-left"></i> <span>Left Focus (15%)</span>
                            </button>
                            <button type="button" class="preset-card-item" onclick="{{ $idPrefix }}_setXY(85, 60)">
                                <i class="fa-solid fa-align-right"></i> <span>Right Focus (85%)</span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- ZONE 2: Precision Dual-Axis Sliders & Stepper Inputs --}}
                <div style="background: var(--studio-subcard); border: 1px solid var(--studio-border); border-radius: 14px; padding: 1.15rem; display: flex; flex-direction: column; justify-content: space-between; gap: 1.1rem;">
                    
                    {{-- Vertical Axis (Y) --}}
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.45rem;">
                            <span style="font-size: 0.8rem; font-weight: 800; color: var(--studio-text); display: flex; align-items: center; gap: 6px;">
                                <i class="fa-solid fa-arrows-up-down" style="color: var(--studio-sky);"></i>
                                <span>Vertical Focus (Y-Axis)</span>
                            </span>
                            <div class="stepper-input-box">
                                <button type="button" class="step-icon-btn" onclick="{{ $idPrefix }}_nudgeY(-1)" title="Nudge Up 1%"><i class="fa-solid fa-minus"></i></button>
                                <input type="number"
                                       id="{{ $idPrefix }}_num_y"
                                       min="0"
                                       max="100"
                                       value="{{ $yPercent }}"
                                       class="stepper-val"
                                       oninput="{{ $idPrefix }}_onYInput(this.value)">
                                <span style="font-size: 0.74rem; font-weight: 800; color: var(--studio-sky);">%</span>
                                <button type="button" class="step-icon-btn" onclick="{{ $idPrefix }}_nudgeY(1)" title="Nudge Down 1%"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>

                        {{-- Vertical Slider --}}
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <span style="font-size: 0.68rem; font-weight: 700; color: var(--studio-muted); min-width: 44px;">Top 0%</span>
                            <input type="range"
                                   id="{{ $idPrefix }}_slider_y"
                                   min="0"
                                   max="100"
                                   step="1"
                                   value="{{ $yPercent }}"
                                   class="y-slider"
                                   oninput="{{ $idPrefix }}_onYInput(this.value)">
                            <span style="font-size: 0.68rem; font-weight: 700; color: var(--studio-muted); min-width: 66px; text-align: right;">Bottom 100%</span>
                        </div>
                    </div>

                    {{-- Horizontal Axis (X) --}}
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.45rem;">
                            <span style="font-size: 0.8rem; font-weight: 800; color: var(--studio-text); display: flex; align-items: center; gap: 6px;">
                                <i class="fa-solid fa-arrows-left-right" style="color: var(--studio-emerald);"></i>
                                <span>Horizontal Focus (X-Axis)</span>
                            </span>
                            <div class="stepper-input-box">
                                <button type="button" class="step-icon-btn" onclick="{{ $idPrefix }}_nudgeX(-1)" title="Nudge Left 1%"><i class="fa-solid fa-minus"></i></button>
                                <input type="number"
                                       id="{{ $idPrefix }}_num_x"
                                       min="0"
                                       max="100"
                                       value="{{ $xPercent }}"
                                       class="stepper-val"
                                       oninput="{{ $idPrefix }}_onXInput(this.value)">
                                <span style="font-size: 0.74rem; font-weight: 800; color: var(--studio-emerald);">%</span>
                                <button type="button" class="step-icon-btn" onclick="{{ $idPrefix }}_nudgeX(1)" title="Nudge Right 1%"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>

                        {{-- Horizontal Slider --}}
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <span style="font-size: 0.68rem; font-weight: 700; color: var(--studio-muted); min-width: 44px;">Left 0%</span>
                            <input type="range"
                                   id="{{ $idPrefix }}_slider_x"
                                   min="0"
                                   max="100"
                                   step="1"
                                   value="{{ $xPercent }}"
                                   class="x-slider"
                                   oninput="{{ $idPrefix }}_onXInput(this.value)">
                            <span style="font-size: 0.68rem; font-weight: 700; color: var(--studio-muted); min-width: 66px; text-align: right;">Right 100%</span>
                        </div>
                    </div>

                    {{-- Contrast Tint Controller --}}
                    <div style="background: var(--studio-card); border: 1px solid var(--studio-border); border-radius: 9px; padding: 8px 12px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">
                            <span style="font-size: 0.7rem; font-weight: 700; color: var(--studio-text); display: flex; align-items: center; gap: 5px;">
                                <i class="fa-solid fa-circle-half-stroke" style="color: var(--studio-saffron);"></i>
                                <span>Preview Overlay Tint (Darkness)</span>
                            </span>
                            <span id="{{ $idPrefix }}_tint_val" style="font-size: 0.7rem; font-weight: 800; color: var(--studio-saffron);">28%</span>
                        </div>
                        <input type="range"
                               id="{{ $idPrefix }}_tint_slider"
                               min="0"
                               max="70"
                               step="5"
                               value="28"
                               oninput="{{ $idPrefix }}_onTintInput(this.value)">
                    </div>

                    {{-- Smart Packaging Advisory Box --}}
                    <div style="background: rgba(239, 128, 28, 0.08); border-left: 3px solid var(--studio-saffron); border-radius: 8px; padding: 8px 12px; font-size: 0.73rem; color: var(--studio-text); line-height: 1.45; display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                        <div>
                            <strong><i class="fa-solid fa-lightbulb" style="color: var(--studio-saffron); margin-right: 4px;"></i> Packaging Pro Tip:</strong>
                            Keep Vertical (Y) at <strong>80% – 85%</strong> so product pouches never hide behind the transparent navbar.
                        </div>
                        <button type="button"
                                onclick="{{ $idPrefix }}_copyCss()"
                                title="Copy CSS rule"
                                style="border: none; background: transparent; color: var(--studio-saffron); font-size: 0.76rem; cursor: pointer; white-space: nowrap; font-weight: 800; display: inline-flex; align-items: center; gap: 5px;">
                            <i class="fa-regular fa-copy"></i> Copy CSS
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<script>
(function() {
    const prefix = '{{ $idPrefix }}';
    const root = document.getElementById(prefix + '_root');
    const canvas = document.getElementById(prefix + '_preview_box');
    const deviceFrame = document.getElementById(prefix + '_device_frame');
    const browserBar = document.getElementById(prefix + '_browser_bar');
    const posInput = document.getElementById(prefix + '_position_input');
    const posBadgeText = document.getElementById(prefix + '_pos_badge_text');
    const hudText = document.getElementById(prefix + '_hud_text');
    const clickHint = document.getElementById(prefix + '_click_hint');
    const reticle = document.getElementById(prefix + '_reticle');
    const reticleTag = document.getElementById(prefix + '_reticle_tag');
    const headerLayer = document.getElementById(prefix + '_header_layer');
    const navMenu = document.getElementById(prefix + '_nav_menu');
    const ctaBtn = document.getElementById(prefix + '_cta_btn');
    const burgerIcon = document.getElementById(prefix + '_burger_icon');
    const guideOverlay = document.getElementById(prefix + '_guide_overlay');
    const tintOverlay = document.getElementById(prefix + '_tint_overlay');
    const tintVal = document.getElementById(prefix + '_tint_val');

    const sliderY = document.getElementById(prefix + '_slider_y');
    const sliderX = document.getElementById(prefix + '_slider_x');
    const numY = document.getElementById(prefix + '_num_y');
    const numX = document.getElementById(prefix + '_num_x');

    const radarMap = document.getElementById(prefix + '_radar_map');
    const radarBox = document.getElementById(prefix + '_radar_box');

    const vpDesktop = document.getElementById(prefix + '_vp_desktop');
    const vpTablet = document.getElementById(prefix + '_vp_tablet');
    const vpMobile = document.getElementById(prefix + '_vp_mobile');

    let currentX = {{ $xPercent }};
    let currentY = {{ $yPercent }};
    let isExpanded = false;

    // Convert (x, y) coordinates into clean CSS background-position string
    function formatPosition(x, y) {
        if (x === 50 && y === 100) return 'center bottom';
        if (x === 50 && y === 50) return 'center center';
        if (x === 50 && y === 0) return 'center top';
        if (x === 0 && y === 50) return 'left center';
        if (x === 100 && y === 50) return 'right center';
        if (x === 50) return 'center ' + y + '%';
        if (y === 50) return x + '% center';
        if (y === 100) return x + '% bottom';
        if (y === 0) return x + '% top';
        return x + '% ' + y + '%';
    }

    // Update coordinates across canvas, input, sliders, HUD, and matrix
    function setPosition(x, y) {
        currentX = Math.max(0, Math.min(100, Math.round(x)));
        currentY = Math.max(0, Math.min(100, Math.round(y)));

        const posStr = formatPosition(currentX, currentY);

        if (canvas) canvas.style.backgroundPosition = posStr;
        if (posInput) posInput.value = posStr;
        if (posBadgeText) posBadgeText.textContent = posStr;
        if (hudText) hudText.textContent = posStr + ' (' + currentX + '%, ' + currentY + '%)';

        if (sliderX) sliderX.value = currentX;
        if (sliderY) sliderY.value = currentY;
        if (numX) numX.value = currentX;
        if (numY) numY.value = currentY;

        // Update focal reticle indicator
        if (reticle) {
            reticle.style.left = currentX + '%';
            reticle.style.top = currentY + '%';
        }
        if (reticleTag) {
            reticleTag.textContent = currentX + '%, ' + currentY + '%';
        }

        // Update Radar Minimap Box
        updateRadarBox();

        // Highlight matching matrix button
        syncMatrixButtons();
    }

    function updateRadarBox() {
        if (!radarBox || !radarMap) return;
        const boxWidth = 36; // percentage width of visible frame
        const boxHeight = 44; // percentage height of visible frame

        const leftPos = (currentX / 100) * (100 - boxWidth);
        const topPos = (currentY / 100) * (100 - boxHeight);

        radarBox.style.width = boxWidth + '%';
        radarBox.style.height = boxHeight + '%';
        radarBox.style.left = leftPos + '%';
        radarBox.style.top = topPos + '%';
    }

    function syncMatrixButtons() {
        const matrixButtons = [
            ['0_0', 0, 0], ['50_0', 50, 0], ['100_0', 100, 0],
            ['0_50', 0, 50], ['50_50', 50, 50], ['100_50', 100, 50],
            ['0_100', 0, 100], ['50_85', 50, 85], ['100_100', 100, 100]
        ];

        matrixButtons.forEach(([idKey, targetX, targetY]) => {
            const btn = document.getElementById(prefix + '_mat_' + idKey);
            if (btn) {
                const isMatch = Math.abs(currentX - targetX) <= 6 && Math.abs(currentY - targetY) <= 6;
                if (isMatch) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            }
        });
    }

    // Exposed methods
    window[prefix + '_setXY'] = function(x, y) {
        setPosition(x, y);
    };

    window[prefix + '_onYInput'] = function(val) {
        let v = parseInt(val, 10);
        if (isNaN(v)) v = 50;
        setPosition(currentX, v);
    };

    window[prefix + '_onXInput'] = function(val) {
        let v = parseInt(val, 10);
        if (isNaN(v)) v = 50;
        setPosition(v, currentY);
    };

    window[prefix + '_nudgeY'] = function(delta) {
        setPosition(currentX, currentY + delta);
    };

    window[prefix + '_nudgeX'] = function(delta) {
        setPosition(currentX + delta, currentY);
    };

    window[prefix + '_reset'] = function() {
        setPosition(50, 50);
    };

    window[prefix + '_onTintInput'] = function(val) {
        if (tintOverlay) {
            tintOverlay.style.opacity = (val / 100).toString();
        }
        if (tintVal) {
            tintVal.textContent = val + '%';
        }
    };

    window[prefix + '_onRadarClick'] = function(e) {
        if (!radarMap) return;
        const rect = radarMap.getBoundingClientRect();
        const clickX = ((e.clientX - rect.left) / rect.width) * 100;
        const clickY = ((e.clientY - rect.top) / rect.height) * 100;
        setPosition(clickX, clickY);
    };

    window[prefix + '_copyCss'] = function() {
        const css = 'background-position: ' + formatPosition(currentX, currentY) + ';';
        if (navigator.clipboard) {
            navigator.clipboard.writeText(css).then(() => {
                if (window.showSonnerToast) {
                    window.showSonnerToast({ message: 'Copied: ' + css, type: 'success' });
                } else {
                    alert('Copied to clipboard: ' + css);
                }
            });
        }
    };

    // Viewport Mode Switcher
    window[prefix + '_setViewport'] = function(mode) {
        [vpDesktop, vpTablet, vpMobile].forEach(btn => {
            if (btn) btn.classList.remove('active');
        });

        if (mode === 'desktop') {
            if (vpDesktop) vpDesktop.classList.add('active');
            if (deviceFrame) deviceFrame.style.maxWidth = '100%';
            if (browserBar) browserBar.style.display = 'flex';
            if (canvas) canvas.style.height = isExpanded ? '520px' : '{{ $previewHeight }}';
            if (navMenu) navMenu.style.display = 'flex';
            if (ctaBtn) ctaBtn.style.display = 'flex';
            if (burgerIcon) burgerIcon.style.display = 'none';
            if (root) root.classList.remove('is-mobile-view');
        } else if (mode === 'tablet') {
            if (vpTablet) vpTablet.classList.add('active');
            if (deviceFrame) deviceFrame.style.maxWidth = '768px';
            if (browserBar) browserBar.style.display = 'flex';
            if (canvas) canvas.style.height = '340px';
            if (navMenu) navMenu.style.display = 'flex';
            if (ctaBtn) ctaBtn.style.display = 'flex';
            if (burgerIcon) burgerIcon.style.display = 'none';
            if (root) root.classList.remove('is-mobile-view');
        } else if (mode === 'mobile') {
            if (vpMobile) vpMobile.classList.add('active');
            if (deviceFrame) deviceFrame.style.maxWidth = '390px';
            if (browserBar) browserBar.style.display = 'none';
            if (canvas) canvas.style.height = '310px';
            if (navMenu) navMenu.style.display = 'none';
            if (ctaBtn) ctaBtn.style.display = 'none';
            if (burgerIcon) burgerIcon.style.display = 'block';
            if (root) root.classList.add('is-mobile-view');
        }
    };

    // Toggle Safe-Zone Overlay
    window[prefix + '_toggleGuide'] = function() {
        if (!guideOverlay) return;
        const isHidden = guideOverlay.style.display === 'none';
        guideOverlay.style.display = isHidden ? 'block' : 'none';
        const btn = document.getElementById(prefix + '_btn_guide');
        if (btn) {
            if (isHidden) {
                btn.classList.add('active-safe');
            } else {
                btn.classList.remove('active-safe');
            }
        }
    };

    // Toggle Simulated Header Overlay
    window[prefix + '_toggleHeader'] = function() {
        if (!headerLayer) return;
        const isHidden = headerLayer.style.display === 'none';
        headerLayer.style.display = isHidden ? 'block' : 'none';
        const btn = document.getElementById(prefix + '_btn_hdr');
        if (btn) {
            if (isHidden) {
                btn.classList.add('active-hdr');
            } else {
                btn.classList.remove('active-hdr');
            }
        }
    };

    // Expand / Fullscreen Canvas Mode
    window[prefix + '_toggleExpand'] = function() {
        isExpanded = !isExpanded;
        const icon = document.getElementById(prefix + '_expand_icon');
        if (isExpanded) {
            if (canvas) canvas.style.height = '560px';
            if (icon) icon.className = 'fa-solid fa-compress';
        } else {
            if (canvas) canvas.style.height = '{{ $previewHeight }}';
            if (icon) icon.className = 'fa-solid fa-expand';
        }
    };

    // Dynamic Image File Preview Update
    window[prefix + '_updateImage'] = function(file) {
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(e) {
            if (canvas) {
                canvas.style.backgroundImage = "url('" + e.target.result + "')";
            }
            if (radarMap) {
                radarMap.style.backgroundImage = "url('" + e.target.result + "')";
            }
        };
        reader.readAsDataURL(file);
    };

    // =========================================================================
    // POINT-AND-CLICK DIRECT FOCUS + DRAGGING LOGIC
    // =========================================================================
    let isDragging = false;
    let didMove = false;
    let startClientX = 0;
    let startClientY = 0;
    let initialXPercent = currentX;
    let initialYPercent = currentY;

    function createClickRipple(x, y) {
        if (!canvas) return;
        const ripple = document.createElement('div');
        ripple.className = 'canvas-click-ripple';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        canvas.appendChild(ripple);
        setTimeout(() => ripple.remove(), 700);
    }

    function handleDragStart(clientX, clientY) {
        isDragging = true;
        didMove = false;
        startClientX = clientX;
        startClientY = clientY;
        initialXPercent = currentX;
        initialYPercent = currentY;
        if (canvas) canvas.style.cursor = 'grabbing';
    }

    function handleDragMove(clientX, clientY) {
        if (!isDragging || !canvas) return;
        const deltaX = clientX - startClientX;
        const deltaY = clientY - startClientY;

        if (Math.abs(deltaX) > 4 || Math.abs(deltaY) > 4) {
            didMove = true;
            if (clickHint) clickHint.style.opacity = '0';
        }

        const rect = canvas.getBoundingClientRect();
        const percentDeltaX = (deltaX / rect.width) * 100;
        const percentDeltaY = (deltaY / rect.height) * 100;

        const newX = initialXPercent + percentDeltaX;
        const newY = initialYPercent + percentDeltaY;

        setPosition(newX, newY);
    }

    function handleDragEnd(clientX, clientY) {
        if (isDragging) {
            isDragging = false;
            if (canvas) canvas.style.cursor = 'crosshair';

            // If user clicked without dragging, immediately set position directly to the click coordinates!
            if (!didMove && canvas) {
                const rect = canvas.getBoundingClientRect();
                const clickX = ((clientX - rect.left) / rect.width) * 100;
                const clickY = ((clientY - rect.top) / rect.height) * 100;
                createClickRipple(clientX - rect.left, clientY - rect.top);
                setPosition(clickX, clickY);
                if (clickHint) clickHint.style.opacity = '0';
            }
        }
    }

    if (canvas) {
        // Mouse Listeners
        canvas.addEventListener('mousedown', function(e) {
            handleDragStart(e.clientX, e.clientY);
            e.preventDefault();
        });

        window.addEventListener('mousemove', function(e) {
            if (isDragging) handleDragMove(e.clientX, e.clientY);
        });

        window.addEventListener('mouseup', function(e) {
            if (isDragging) handleDragEnd(e.clientX, e.clientY);
        });

        // Touch Listeners
        canvas.addEventListener('touchstart', function(e) {
            if (e.touches && e.touches.length === 1) {
                handleDragStart(e.touches[0].clientX, e.touches[0].clientY);
            }
        }, { passive: true });

        window.addEventListener('touchmove', function(e) {
            if (e.touches && e.touches.length === 1) {
                handleDragMove(e.touches[0].clientX, e.touches[0].clientY);
            }
        }, { passive: true });

        window.addEventListener('touchend', function(e) {
            if (isDragging) {
                const touch = e.changedTouches ? e.changedTouches[0] : null;
                handleDragEnd(touch ? touch.clientX : startClientX, touch ? touch.clientY : startClientY);
            }
        });
    }

    // Keyboard Arrow Keys Support (Pro feature)
    if (root) {
        root.addEventListener('keydown', function(e) {
            const step = e.shiftKey ? 10 : 1;
            if (e.key === 'ArrowUp') {
                e.preventDefault();
                setPosition(currentX, currentY - step);
            } else if (e.key === 'ArrowDown') {
                e.preventDefault();
                setPosition(currentX, currentY + step);
            } else if (e.key === 'ArrowLeft') {
                e.preventDefault();
                setPosition(currentX - step, currentY);
            } else if (e.key === 'ArrowRight') {
                e.preventDefault();
                setPosition(currentX + step, currentY);
            }
        });
    }

    // Auto fade hint after 4.5s
    setTimeout(function() {
        if (clickHint) clickHint.style.opacity = '0';
    }, 4500);

    // Initial sync
    setPosition(currentX, currentY);
})();
</script>
