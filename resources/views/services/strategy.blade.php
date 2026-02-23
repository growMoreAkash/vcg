@extends('layouts.app')

@push('styles')
    <style>
        .scroll-item {
            opacity: 1;
            transform: translateX(120px);
            transition: all 0.9s ease-out;
        }

        .scroll-item.show {
            opacity: 1;
            transform: translateX(0);
        }

        img {
            will-change: transform;
        }
    </style>
@endpush

@section('content')
    {{-- <section class="w-full relative bg-white overflow-x-hidden">
        
        <div class="relative h-[80vh] w-full">
            <img src="{{ asset('b1.png') }}" class="w-full h-full object-cover" alt="Hero Background">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="absolute top-[40%] left-[5%] text-white max-w-3xl z-10">
                <h1 class="text-4xl italic mb-6">
                    We offer
                    <span id="typing-text" class="text-red-600"></span>
                    <span class="animate-pulse">|</span>
                </h1>

                <p class="text-lg mb-6">
                    Empowering your business with strategic insights and data-driven solutions to navigate complex market landscapes.
                </p>

                <button class="bg-red-800 px-8 py-4 text-xl font-bold cursor-pointer hover:bg-white hover:text-red-800 transition">
                    Know More
                </button>
            </div>
        </div>

        <div class="my-20 px-10 flex flex-col items-center gap-10 text-center max-w-5xl mx-auto">
            <h1 class="text-5xl font-semibold text-gray-900">Our Strategic Expertise</h1>
            <p class="text-gray-600 text-lg">
                Vortex Consulting Group supports clients in crafting competitive strategies to help navigate market ambiguity and business expansion through the following core pillars.
            </p>
        </div>

        <section class="bg-gray-300 text-white relative py-20">
            <div id="animation-container" class="relative min-h-screen px-6 md:px-20">

                <div class="mx-auto flex flex-col gap-32 relative z-10 max-w-5xl">

                    @php
                        $sections = [
                            [
                                'img' => 's1.jpg',
                                'title' => 'Customer & Channel Strategy',
                                'desc' => 'In an increasingly dynamic and competitive business environment, a well-defined Customer & Channel Strategy is essential for companies looking to expand.',
                            ],
                            [
                                'img' => 's2.jpg',
                                'title' => 'Competitive Benchmarking and Analytics',
                                'desc' => 'In today’s fast-moving business environment, outpacing the competition requires more than just instinct—it demands data-driven insights and industry intelligence.',
                            ],
                            [
                                'img' => 's3.jpg',
                                'title' => 'Strategic Wargaming',
                                'desc' => 'Institutions must constantly assess their positioning and strategic fit within the industry. We help you simulate competitor moves and prepare.',
                            ],
                            [
                                'img' => 's4.jpg',
                                'title' => 'Market Entry Strategy',
                                'desc' => 'Vortex Consulting Group supports clients in crafting competitive strategies for market entry to help navigate market ambiguity.',
                            ],
                            [
                                'img' => 's5.jpg',
                                'title' => 'Corporate & Business Unit Strategy',
                                'desc' => 'Empowering institutions with strategic thought leadership that drives impactful decisions and game-changing strategies.',
                            ],
                        ];
                    @endphp

                    @foreach ($sections as $section)
                        <div class="opacity-0 b-item flex flex-col lg:flex-row gap-10 items-center bg-gray-200/40 p-8 rounded-3xl border border-gray-700 backdrop-blur-md shadow-2xl">
                            <div class="w-full lg:w-1/2">
                                <img src="{{ asset('strategy/' . $section['img']) }}" alt="{{ $section['title'] }}"
                                    class="rounded-xl shadow-lg w-full object-cover aspect-video hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="w-full lg:w-1/2">
                                <h3 class="text-3xl font-bold mb-4 text-red-600">{{ $section['title'] }}</h3>
                                <p class="text-gray-300 text-lg leading-relaxed text-gray-800">{{ $section['desc'] }}</p>
                                <button class="mt-4 px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-300 cursor-pointer">Read More</button>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </section> --}}
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            gsap.registerPlugin(ScrollTrigger);

            /* ---------------- 1. TYPING EFFECT ---------------- */
            const words = [
                "Customer & Channel Strategy",
                "Competitive Benchmarking and Analytics",
                "Strategic Wargaming",
                "Market Entry Strategy",
                "Corporate & Business Unit Strategy"
            ];

            let wordIndex = 0, charIndex = 0, isDeleting = false;
            const typingSpeed = 100, deletingSpeed = 50, pauseTime = 2000;
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

            /* ---------------- 2. ITEM REVEAL ANIMATION ---------------- */
            const items = document.querySelectorAll('.b-item');

            items.forEach((item) => {
                gsap.fromTo(item, 
                { 
                    x: 100, 
                    opacity: 0, 
                    scale: 0.9 
                }, 
                { 
                    x: 0, 
                    opacity: 1, 
                    scale: 1,
                    duration: 1.2,
                    ease: "power3.out",
                    scrollTrigger: {
                        trigger: item,
                        start: "top 85%",
                        end: "top 50%",
                        scrub: 1,
                    }
                });
            });
        });
    </script>
@endpush