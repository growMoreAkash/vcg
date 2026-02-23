@extends('layouts.app')

@push('styles')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <style>
        #map {
            width: 100%;
            height: 650px;
            /* border-radius: 1.5rem; */
            background-color: #111;
            /* Prevents white flash during load */
        }

        /* Custom Logo Marker Container */
        .marker-logo {
            width: 50px;
            height: 50px;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            cursor: pointer;
            filter: drop-shadow(0 5px 15px rgba(0, 0, 0, 0.5));
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .marker-logo:hover {
            transform: scale(1.2) translateY(-5px);
        }

        /* Customizing the Popup style to match your theme */
        .mapboxgl-popup-content {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            border-radius: 12px !important;
            padding: 15px !important;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2) !important;
        }

        <style>.marker-wrapper {
            position: relative;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Ensure the wrapper doesn't block other map elements */
            pointer-events: auto;
        }

        .logo-reveal-container {
            position: absolute;
            width: max-content;
            bottom: 120%;
            /* Space above the pin */
            display: flex;
            gap: 12px;
            background: rgba(255, 255, 255, 0.95);
            padding: 12px;
            border-radius: 1rem;
            box-shadow: 0 15px 35px rgba(197, 188, 188, 0.2);
            backdrop-filter: blur(10px);
            opacity: 0;
            transform: translateY(10px);

            /* IMPORTANT: This prevents the invisible box from triggering
                                           hovers or blocking the map when it's hidden */
            pointer-events: none;
            white-space: nowrap;
            z-index: 10000000000000;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .reveal-logo {
            width: 85px;
            height: 85px;
            object-fit: contain;
            flex-direction: column
                /* Prevent dragging the logo images */
                user-select: none;
            z-index: 1000;
            -webkit-user-drag: none;
        }

        .standard-pointer {
            width: 24px;
            height: 24px;
            background-color: #991b1b;
            border-radius: 50% 50% 50% 0;
            transform: rotate(-45deg);
            border: 2px solid white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }
    </style>
    </style>
@endpush
@section('content')
    <section x-data="mapHandler()" class="w-full relative  overflow-x-hidden">

        <div class="relative h-[55vh] w-full">
            <img src="{{ asset('b1.png') }}" class="w-full h-full object-cover" alt="Hero Background">
            <div class="absolute inset-0 bg-black/70"></div>
            <div class="absolute top-[40%] left-[5%] text-white max-w-3xl z-10">
                <h1 class="text-4xl italic mb-6">
                    We offer <span id="typing-text" class="text-red-600"></span>
                    <span class="animate-pulse">|</span>
                </h1>
                <p class="text-lg mb-6">Empowering your business with strategic insights across North America, Europe,
                    APAC-J.</p>
            </div>
        </div>
    </section>
    <section class="py-12 bg-[#e5e7eb] ">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold mb-10 text-gray-600 reveal-text px-10">Our Global Clientele</h2>
            <div id="map" class="shadow-2xl border border-white"></div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <script src='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js'></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            mapboxgl.accessToken =
                'pk.eyJ1IjoiYWthc2hncm93bW9yZSIsImEiOiJjbWx0cjVsaTUwMzZmM2RxdGFzZ3JuN3IyIn0.FKNDqIiiWivJGoZ2Bw2lRQ';

            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/light-v11',
                center: [10, 30],
                zoom: 1.8,
                projection: 'mercator'
            });

            // Data from your Client Geographies
            const locations = [{
                    city: "Chicago",
                    coords: [-87.6298, 41.8781],
                    logos: ["{{ asset('logo/l1.png') }}"]
                },
                {
                    city: "USA	Minnesota	Bloomington",
                    coords: [-93.2644, 44.8408],
                    logos: ["{{ asset('logo/l2.png') }}"]
                },
                {
                    city: "USA	New York	New York City",
                    coords: [-74.0060, 40.7128],
                    logos: ["{{ asset('logo/l3.png') }}", "{{ asset('logo/l8.png') }}",
                        "{{ asset('logo/l14.png') }}", "{{ asset('logo/l17.png') }}"
                    ]
                },
                {
                    city: "USA	Texas	Irving",
                    coords: [-96.9489, 32.8140],
                    logos: ["{{ asset('logo/l4.png') }}"]
                },
                {
                    city: "USA	North Carolina	Davidson",
                    coords: [-80.8425, 35.4972],
                    logos: ["{{ asset('logo/l5.png') }}"]
                },
                {
                    city: "USA	Delaware	Frederica",
                    coords: [-75.4360, 39.0458],
                    logos: ["{{ asset('logo/l6.png') }}"]
                },
                {
                    city: "USA	California	Mountain View",
                    coords: [-122.0842, 37.3861],
                    logos: ["{{ asset('logo/l7.png') }}", "{{ asset('logo/l11.png') }}"]
                },
                {
                    city: "USA	Mississippi	Bay St. Louis",
                    coords: [-89.0892, 30.3842],
                    logos: ["{{ asset('logo/l9.png') }}"]
                },
                {
                    city: "USA	Florida	Fort Lauderdale",
                    coords: [-80.1373, 26.1224],
                    logos: ["{{ asset('logo/l10.png') }}"]
                },
                {
                    city: "USA	Indiana	Columbus",
                    coords: [-82.9988, 39.1620],
                    logos: ["{{ asset('logo/l12.png') }}"]
                },
                {
                    city: "USA	Connecticut	Norwalk",
                    coords: [-73.4052, 41.1170],
                    logos: ["{{ asset('logo/l13.png') }}"]
                },
                {
                    city: "USA	Nebraska	Omaha",
                    coords: [-95.9928, 41.2565],
                    logos: ["{{ asset('logo/l15.png') }}"]
                },
                {
                    city: "USA	Maryland	Chevy Chase",
                    coords: [-77.0428, 39.0128],
                    logos: ["{{ asset('logo/l16.png') }}"]
                },
                {
                    city: "USA	Colorado	Boulder",
                    coords: [-105.2705, 40.0149],
                    logos: ["{{ asset('logo/l18.png') }}"]
                },
                {
                    city: "USA	Wisconsin	Milwaukee",
                    coords: [-87.9065, 43.0389],
                    logos: ["{{ asset('logo/l19.png') }}"]
                },
                {
                    city: "USA	New Jersey	Morristown",
                    coords: [-74.4809, 40.7934],
                    logos: ["{{ asset('logo/l20.png') }}"]
                },
                {
                    city: "USA	Georgia	Evans",
                    coords: [-83.5428, 33.5489],
                    logos: ["{{ asset('logo/l21.png') }}"]
                },
                {
                    city: "USA	Ohio	Maumee",
                    coords: [-83.6500, 41.5928],
                    logos: ["{{ asset('logo/l22.png') }}"]
                },
                {
                    city: "Canada	Ontario	Mississauga",
                    coords: [-79.6300, 43.5890],
                    // logos: ["{{ asset('logo/l23.png') }}"]
                    logos: []
                },
                {
                    city: "Canada	Ontario	Toronto",
                    coords: [-79.3832, 43.6532],
                    // logos: ["{{ asset('logo/l24.png') }}","{{ asset('logo/l28.png') }}"]
                    logos: []
                },
                {
                    city: "Canada	Manitoba	Winnipeg",
                    coords: [-96.9489, 49.8951],
                    // logos: ["{{ asset('logo/l25.png') }}"]
                    logos: []
                },
                {
                    city: "Canada	Ontario	Brampton",
                    coords: [-79.7624, 43.6842],
                    // logos: ["{{ asset('logo/l26.png') }}"]
                    logos: []
                },
                {
                    city: "Canada	Ontario	Ottawa",
                    coords: [-75.6972, 45.4215],
                    // logos: ["{{ asset('logo/l27.png') }}"]
                    logos: []
                },
                {
                    city: "Canada	Quebec	Quebec City",
                    coords: [-71.2183, 46.8139],
                    // logos: ["{{ asset('logo/l29.png') }}","{{ asset('logo/l32.png') }}"]
                    logos: []
                },
                {
                    city: "Canada	British Columbia	Vancouver",
                    coords: [-123.1207, 49.2827],
                    // logos: ["{{ asset('logo/l30.png') }}"]
                    logos: []
                },
                {
                    city: "Canada	Ontario	Waterloo",
                    coords: [-80.5204, 43.4643],
                    // logos: ["{{ asset('logo/l31.png') }}"]
                    logos: []
                },
                {
                    city: "Canada	Saskatchewan	Regina",
                    coords: [-104.6037, 50.4452],
                    // logos: ["{{ asset('logo/l33.png') }}"]
                    logos: []
                },
                {
                    city: "France	Île-de-France	Rueil-Malmaison",
                    coords: [2.3520, 48.8867],
                    // logos: ["{{ asset('logo/l34.png') }}"]
                    logos: []
                },
                {
                    city: "Switzerland	Basel-Stadt	Basel",
                    coords: [7.5886, 47.5596],
                    // logos: ["{{ asset('logo/l35.png') }}"]
                    logos: []
                },
                {
                    city: "United Kingdom	Berkshire	Newbury",
                    coords: [-1.3250, 51.4083],
                    // logos: ["{{ asset('logo/l36.png') }}"]
                    logos: []
                },
                {
                    city: "Germany	Bavaria	Munich",
                    coords: [11.5820, 48.1351],
                    // logos: ["{{ asset('logo/l37.png') }}"]
                    logos: []
                },
                {
                    city: "Belgium	Antwerp Province	Oevel ",
                    coords: [4.4020, 51.1800],
                    // logos: ["{{ asset('logo/l38.png') }}"]
                    logos: []
                },
                {
                    city: "Germany	Bavaria	Munich",
                    coords: [11.5820, 48.1351],
                    // logos: ["{{ asset('logo/l39.png') }}"]
                    logos: []
                },
                {
                    city: "France	Île-de-France	Paris",
                    coords: [2.3522, 48.8566],
                    // logos: ["{{ asset('logo/l40.png') }}"]
                    logos: []
                },
                {
                    city: "Italy	Friuli-Venezia Giulia	Trieste",
                    coords: [13.7863, 45.6482],
                    // logos: ["{{ asset('logo/l41.png') }}"]
                    logos: []
                },
                {
                    city: "Spain	A Coruña	Arteixo",
                    coords: [-8.5420, 43.5167],
                    // logos: ["{{ asset('logo/l42.png') }}"]
                    logos: []
                },
                {
                    city: "Germany	Bavaria	Munich",
                    coords: [11.5820, 48.1351],
                    // logos: ["{{ asset('logo/l43.png') }}"]
                    logos: []
                },
                {
                    city: "Australia	Queensland	Brisbane",
                    coords: [153.0210, -27.4698],
                    // logos: ["{{ asset('logo/l44.png') }}"]
                    logos: []
                },
                {
                    city: "Australia	New South Wales	Sydney",
                    coords: [151.2093, -33.8688],
                    // logos: ["{{ asset('logo/l45.png') }}","{{ asset('logo/l46.png') }}","{{ asset('logo/l48.png') }}","{{ asset('logo/l49.png') }}"]
                    logos: []
                },
                {
                    city: "Australia	Victoria	Melbourne",
                    coords: [151.2093, -37.8136],
                    // logos: ["{{ asset('logo/l50.png') }}","{{ asset('logo/l51.png') }}"]
                    logos: []
                },
                {
                    city: "New Zealand	Auckland Region	Auckland",
                    coords: [174.7634, -36.8485],
                    // logos: ["{{ asset('logo/l52.png') }}"]
                    logos: []
                },
                {
                    city: "New Zealand	Wellington Region	Wellington",
                    coords: [174.7830, -41.2865],
                    // logos: ["{{ asset('logo/l53.png') }}"]
                    logos: []
                },
                {
                    city: "Japan	Tokyo	Minato City (Tokyo)",
                    coords: [139.7795, 35.6762],
                    // logos: ["{{ asset('logo/l54.png') }}","{{ asset('logo/l57.png') }}"]
                    logos: []
                },
                {
                    city: "Japan    Aichi toyota City",
                    coords: [137.1562, 35.0828], // [Longitude, Latitude]
                    // logos: ["{{ asset('logo/l55.png') }}"]
                    logos: []
                },
                {
                    city: "Japan	Tokyo	Tokyo",
                    coords: [139.6917, 35.6895],
                    // logos: ["{{ asset('logo/l56.png') }}"]
                    logos: []
                },
                {
                    city: "India	Tamil Nadu	Chennai",
                    coords: [80.2707, 13.0827],
                    // logos: ["{{ asset('logo/l58.png') }}"]
                    logos: []
                },
                {
                    city: "South Korea	Seoul	Seoul",
                    coords: [126.9780, 37.5665],
                    // logos: ["{{ asset('logo/l59.png') }}"]
                    logos: []
                },
            ];

            // Global Reset Function: Ensures only one hover is active at a time
            const closeAllLogos = () => {
                gsap.to('.logo-reveal-container', {
                    opacity: 0,
                    y: 10,
                    duration: 0.3,
                    ease: "power2.in"
                });
                gsap.to('.standard-pointer', {
                    scale: 1,
                    backgroundColor: '#991b1b',
                    duration: 0.3
                });
                // Reset z-index of all marker parents
                document.querySelectorAll('.mapboxgl-marker').forEach(m => m.style.zIndex = "1");
            };

            map.on('click', () => {
                closeAllLogos();
            });

            locations.forEach(loc => {
                const container = document.createElement('div');
                container.className = 'marker-wrapper';

                const logoList = document.createElement('div');
                logoList.className = 'logo-reveal-container';

                loc.logos.forEach(logoUrl => {
                    const img = document.createElement('img');
                    img.src = logoUrl;
                    img.className = 'reveal-logo';
                    logoList.appendChild(img);
                });

                const pin = document.createElement('div');
                pin.className = 'standard-pointer';

                container.appendChild(logoList);
                container.appendChild(pin);

                // HOVER ON
                container.addEventListener('mouseenter', () => {
                    // 1. Close any other open logos first
                    closeAllLogos();

                    // 2. Bring this specific marker to the very front
                    container.parentElement.style.zIndex = "999";

                    // 3. Animate this specific set of logos
                    gsap.to(logoList, {
                        opacity: 1,
                        y: 0,
                        duration: 0.5,
                        ease: "expo.out"
                    });
                    gsap.to(pin, {
                        scale: 1.25,
                        backgroundColor: '#dc2626',
                        duration: 0.3
                    });
                });

                // HOVER OFF
                container.addEventListener('mouseleave', () => {
                    closeAllLogos();
                });

                new mapboxgl.Marker(container)
                    .setLngLat(loc.coords)
                    .addTo(map);
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            gsap.registerPlugin(ScrollTrigger);

            // 1. Typing Effect
            const words = ["M&A Strategy", "Strategic Wargaming", "Target Screening"];
            let wordIndex = 0,
                charIndex = 0,
                isDeleting = false;
            const typingElement = document.getElementById("typing-text");

            function typeEffect() {
                const currentWord = words[wordIndex];
                typingElement.textContent = isDeleting ? currentWord.substring(0, charIndex--) : currentWord
                    .substring(0, charIndex++);
                if (!isDeleting && charIndex > currentWord.length) {
                    isDeleting = true;
                    setTimeout(typeEffect, 2000);
                    return;
                }
                if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    wordIndex = (wordIndex + 1) % words.length;
                }
                setTimeout(typeEffect, isDeleting ? 50 : 100);
            }
            typeEffect();

            // 2. Initial Animation for Slide 1 (The base slide)
            gsap.to(".z-1 .slide-heading", {
                opacity: 1,
                y: 0,
                duration: 1.2,
                ease: "power4.out"
            });
            gsap.to(".z-1 .slide-content", {
                opacity: 1,
                scale: 1,
                duration: 1,
                delay: 0.4,
                ease: "back.out(1.7)"
            });

            // 3. Stacking Timeline for Slide 2, 3, and 4
            const mainTl = gsap.timeline({
                scrollTrigger: {
                    trigger: "#stack-container",
                    start: "top top",
                    end: "+=4000",
                    scrub: 1,
                    pin: true,
                    anticipatePin: 1
                }
            });

            const overlayItems = gsap.utils.toArray(".item-overlay");

            overlayItems.forEach((item) => {
                // First, slide the layer in
                mainTl.to(item, {
                        xPercent: -100,
                        ease: "none"
                    })
                    // Immediately animate the heading inside THIS slide
                    .to(item.querySelector(".slide-heading"), {
                        opacity: 1,
                        y: 0,
                        duration: 0.8,
                        ease: "power3.out"
                    }, "-=0.4") // Overlap animation slightly with the slide-in
                    // Immediately animate the map content inside THIS slide
                    .to(item.querySelector(".slide-content"), {
                        opacity: 1,
                        scale: 1,
                        duration: 0.6,
                        ease: "back.out(1.2)"
                    }, "-=0.3");
            });
        });
    </script>
@endpush
