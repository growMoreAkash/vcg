@extends('layouts.app')

@push('styles')
    <style>
img {
            will-change: transform;
        }

        /* --- 3D Card Physics --- */
        .card-3d-wrapper {
            perspective: 1200px; /* Gives the depth illusion */
        }

        .card-3d-inner {
            transform-style: preserve-3d;
            transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        }

        /* The tilt effect on hover */
        .card-3d-wrapper:hover .card-3d-inner {
            transform: rotateX(8deg) rotateY(-8deg) scale(1.02);
            box-shadow: -15px 20px 30px rgba(0, 0, 0, 0.4);
        }

        /* Pushes the text layer OUT towards the user */
        .content-3d {
            transform: translateZ(60px); 
            transform-style: preserve-3d;
        }
        
        /* Pushes the background slightly back */
        .bg-3d {
            transform: translateZ(-20px);
        }
    </style>
@endpush

@section('content')
    <section class="w-full relative bg-white overflow-x-hidden">

        <div class="relative h-[55vh] w-full">
            <img src="{{ asset('b1.png') }}" class="w-full h-full object-cover" alt="Hero Background">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="absolute top-[40%] left-[5%] text-white max-w-[800px] z-10">
                <h1 class="text-4xl italic mb-6">
                    We offer
                    <span id="typing-text" class="text-red-600"></span>
                    <span class="animate-pulse">|</span>
                </h1>
                <p class="text-lg mb-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, dolorem.
                </p>
                {{-- <button
                    class="bg-red-800 px-8 py-4 text-xl font-bold cursor-pointer hover:bg-white hover:text-red-800 transition">
                    Know More
                </button> --}}
            </div>
        </div>

        <div class="my-20 px-10 flex flex-col items-center gap-10 text-center max-w-5xl mx-auto">
            <h1 class="text-5xl font-semibold text-gray-900">Our Strategic Expertise</h1>
            <p class="text-gray-600 text-lg">
                Vortex Consulting Group supports clients in crafting competitive strategies to help navigate market
                ambiguity and business expansion through the following core pillars.
            </p>
        </div>

        <section class="bg-gray-300 text-gray-900 relative py-20">
            <div id="animation-container" class="relative px-6 md:px-12 lg:px-20 max-w-7xl mx-auto">

                @php
                    $sections = [
                        [
                            'img' => 's1.jpg',
                            'title' => 'Customer & Channel Strategy',
                            'desc' =>
                                'In an increasingly dynamic and competitive business environment, a well-defined Customer & Channel Strategy is essential for companies looking to expand.',
                        ],
                        [
                            'img' => 's2.jpg',
                            'title' => 'Competitive Benchmarking and Analytics',
                            'desc' =>
                                'In today’s fast-moving business environment, outpacing the competition requires more than just instinct—it demands data-driven insights and industry intelligence.',
                        ],
                        [
                            'img' => 's3.jpg',
                            'title' => 'Strategic Wargaming',
                            'desc' =>
                                'Institutions must constantly assess their positioning and strategic fit within the industry. We help you simulate competitor moves and prepare.',
                        ],
                        [
                            'img' => 's4.jpg',
                            'title' => 'Market Entry Strategy',
                            'desc' =>
                                'Vortex Consulting Group supports clients in crafting competitive strategies for market entry to help navigate market ambiguity.',
                        ],
                        [
                            'img' => 's5.jpg',
                            'title' => 'Corporate & Business Unit Strategy',
                            'desc' =>
                                'Empowering institutions with strategic thought leadership that drives impactful decisions and game-changing strategies.',
                        ],
                    ];
                @endphp

<div class="flex flex-wrap justify-center gap-8 relative z-10">

    @foreach ($sections as $section)
        <div class="card-3d-wrapper opacity-0 b-item w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] h-[400px]">
            
            <div class="card-3d-inner relative w-full h-full rounded-3xl overflow-hidden bg-black group cursor-pointer border border-gray-700/50">

                <img src="{{ asset('strategy/' . $section['img']) }}" alt="{{ $section['title'] }}"
                    class="bg-3d absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100 z-0">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-90 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>

                <div class="content-3d absolute inset-0 p-8 flex flex-col justify-end z-20 pointer-events-none">
                    
                    <h3 class="text-2xl font-bold text-white mb-2 transform translate-y-12 group-hover:translate-y-0 transition-transform duration-500 ease-out drop-shadow-lg">
                        {{ $section['title'] }}
                    </h3>

                    <div class="opacity-0 transform translate-y-12 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-out flex flex-col pointer-events-auto">
                        
                        <p class="text-gray-300 text-sm leading-relaxed mb-6 line-clamp-3 drop-shadow-md">
                            {{ $section['desc'] }}
                        </p>

                        <button class="self-start px-6 py-2 bg-red-700 text-white rounded-lg hover:bg-red-600 transition-colors duration-300 font-semibold shadow-[0_4px_14px_0_rgba(185,28,28,0.39)]">
                            Read More
                        </button>
                        
                    </div>
                </div>

            </div>
        </div>
    @endforeach

</div>
            </div>
        </section>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            gsap.registerPlugin(ScrollTrigger);

            /* ---------------- 1. TYPING EFFECT (Unchanged) ---------------- */
            const words = [
                "Customer & Channel Strategy",
                "Competitive Benchmarking and Analytics",
                "Strategic Wargaming",
                "Market Entry Strategy",
                "Corporate & Business Unit Strategy"
            ];

            let wordIndex = 0,
                charIndex = 0,
                isDeleting = false;
            const typingSpeed = 100,
                deletingSpeed = 50,
                pauseTime = 2000;
            const typingElement = document.getElementById("typing-text");

            function typeEffect() {
                const currentWord = words[wordIndex];
                if (!isDeleting) {
                    typingElement.textContent = currentWord.substring(0, charIndex + 1);
                    charIndex++;
                    if (charIndex === currentWord.length) {
                        setTimeout(() => isDeleting = true, pauseTime);
                    }
                } else {
                    typingElement.textContent = currentWord.substring(0, charIndex - 1);
                    charIndex--;
                    if (charIndex === 0) {
                        isDeleting = false;
                        wordIndex = (wordIndex + 1) % words.length;
                    }
                }
                setTimeout(typeEffect, isDeleting ? deletingSpeed : typingSpeed);
            }
            typeEffect();

            /* ---------------- 2. NEW STAGGERED GRID ANIMATION ---------------- */
            // This pulls all cards up beautifully one after the other 
            // as soon as the grid enters the viewport.
            gsap.fromTo(".b-item", {
                y: 80,
                opacity: 0,
                scale: 0.95
            }, {
                y: 0,
                opacity: 1,
                scale: 1,
                duration: 0.8,
                ease: "back.out(1.2)", // Gives a slight, premium bounce effect
                stagger: 0.15, // Delay between each card appearing
                scrollTrigger: {
                    trigger: "#animation-container",
                    start: "top 75%", // Triggers when the top of the container hits 75% down the screen
                    toggleActions: "play none none reverse" // Replays if you scroll back up
                }
            });
        });
    </script>
@endpush
