@extends('layouts.app')

@push('styles')
    <style>
        /* Tab Visibility */
        .tab-content {
            display: none;
            opacity: 0;
            transform: translateY(20px);
        }

        .tab-content.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .tab-btn.active {
            border-bottom: 4px solid #991b1b;
            color: #991b1b;
        }

        /* Initial states for GSAP text animations */
        .reveal-text,
        .reveal-para {
            opacity: 0;
            transform: translateY(20px);
        }
    </style>
@endpush

@section('content')
    <section class="w-full relative bg-white overflow-x-hidden">

        <div class="relative h-[55vh] w-full">
            <img src="{{ asset('b1.png') }}" class="w-full h-full object-cover" alt="Hero Background">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="absolute top-[40%] left-[5%] text-white max-w-3xl z-10">
                <h1 class="text-4xl italic mb-6">
                    We offer <span id="typing-text" class="text-red-600"></span>
                    <span class="animate-pulse">|</span>
                </h1>
                <p class="text-lg mb-6 reveal-text">
                    Empowering your business with strategic insights and data-driven solutions.
                </p>
                {{-- <button class="bg-red-800 px-8 py-4 text-xl font-bold hover:bg-white hover:text-red-800 transition">
                    Know More
                </button> --}}
            </div>
        </div>

        <div class="max-w-7xl mx-auto py-16 px-6">

            <div class="flex justify-center border-b border-gray-200 mb-12">
                <button id="default-tab-btn" onclick="switchTab(event, 'strategy')"
                    class="tab-btn px-8 py-4 font-bold text-gray-500 active">Corporate Strategy</button>
                <button onclick="switchTab(event, 'highlights')"
                    class="tab-btn px-8 py-4 font-bold text-gray-500">Highlights</button>
                <button onclick="switchTab(event, 'contact')" class="tab-btn px-8 py-4 font-bold text-gray-500">Contact
                    Us</button>
            </div>

            <div id="strategy" class="tab-content active px-10">
                <h1
                    class="text-3xl font-semibold text-gray-700 relative w-fit pb-2 cursor-pointer after:content-[''] after:absolute after:left-0 after:bottom-0 after:h-[3px] after:bg-red-800 after:w-0 hover:after:w-1/2 after:transition-all after:duration-500 after:ease-out">
             M&A Strategy
                </h1>
                <div class="flex flex-col gap-5">
                    <p class="mt-4 text-gray-600 reveal-para">

                     In today’s layered and dynamic industry framework, M&A transactions require a deep understanding of deal intricacies, capital allocation strategies, and value drivers.
                    </p>
                    <p class="mt-4 text-gray-600 reveal-para">
 However, as market volatility rises and regulatory scrutiny intensifies, business leaders face mounting pressure to execute flawless deals—yet many transactions still fail to deliver their intended value.
                    </p>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-4">
                        @foreach ([
                                'At Vortex Consulting Group, we understand that M&A success is not just about closing the deal—it’s about unlocking long-term value. Our expertise helps companies:',
                                ' Leverage Core Strengths: Identify and capitalize on unique competitive advantages to drive deal success.',
                                ' Optimize Capital Allocation: Ensure financial efficiency through strategic investment, risk assessment, and deal structuring.',
                                'Identify Key Value Drivers: Uncover critical synergies and opportunities that maximize post-merger growth.',
                            ] as $point)
                            <li class="strategy-bullet group bg-white border border-gray-100 rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all duration-400 ease-out flex items-start gap-4 cursor-pointer hover:-translate-y-1">
                                
                                <div class="relative flex-shrink-0 w-8 h-8 rounded-full bg-gray-100 group-hover:bg-red-800 flex items-center justify-center transition-colors duration-500 ease-out mt-0.5">
                                    
                                    <div class="absolute inset-0 rounded-full bg-red-800 opacity-0 group-hover:opacity-20 group-hover:scale-150 transition-all duration-500 ease-out pointer-events-none"></div>

                                    <svg class="w-4 h-4 text-gray-400 group-hover:text-white transform group-hover:scale-125 group-hover:rotate-[-5deg] transition-all duration-500 ease-out" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>

                                <span class="text-gray-700 font-medium text-base leading-relaxed group-hover:text-red-800 transition-all duration-500 transform group-hover:translate-x-1.5 ease-out">
                                    {{ $point }}
                                </span>
                                
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>




            <div id="highlights" class="tab-content">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach (range(1, 3) as $i)
                        <div class="highlight-card bg-red-800 text-white p-8 rounded-lg shadow-lg">
                            <h4 class="text-4xl font-bold mb-2">95%</h4>
                            <p class="text-red-100 italic">Success rate in market entry strategies for Global 500 firms.</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="contact" class="tab-content">
                <div class="max-w-2xl mx-auto bg-gray-50 p-10 rounded-2xl shadow-lg border border-gray-100">
                    <form action="#" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" placeholder="Name"
                                class="p-4 border rounded-lg focus:ring-2 focus:ring-red-800 outline-none transition">
                            <input type="email" placeholder="Email"
                                class="p-4 border rounded-lg focus:ring-2 focus:ring-red-800 outline-none transition">
                        </div>
                        <textarea placeholder="Your Message" rows="5"
                            class="w-full p-4 border rounded-lg focus:ring-2 focus:ring-red-800 outline-none transition"></textarea>
                        <button
                            class="w-full bg-red-800 text-white font-bold py-4 rounded-lg hover:bg-black transition-all duration-300">Send
                            Message</button>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        // --- Typing Effect ---
        const words = ["M&A Strategy", "Target Screening", "Commercial Due Diligence", "Shareholder Value Management",
            "Portfolio Strategy"
        ];
        let wordIndex = 0,
            charIndex = 0,
            isDeleting = false;
        const typingElement = document.getElementById("typing-text");

        function typeEffect() {
            const currentWord = words[wordIndex];
            typingElement.textContent = isDeleting ? currentWord.substring(0, charIndex--) : currentWord.substring(0,
                charIndex++);
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

        // --- GSAP Scroll Animations ---
        function initAnimations() {
            // Hero Text Reveal
            gsap.to(".reveal-text", {
                opacity: 1,
                y: 0,
                duration: 1,
                delay: 0.3
            });

            // Paragraph Reveal
            gsap.utils.toArray('.reveal-para').forEach(para => {
                gsap.to(para, {
                    opacity: 1,
                    y: 0,
                    duration: 1,
                    scrollTrigger: {
                        trigger: para,
                        start: "top 90%",
                        toggleActions: "play none none none"
                    }
                });
            });

            // --- Staggered 3D Bullet Reveal ---
            // 1. Set initial hidden/tilted state
            gsap.set('.strategy-bullet', {
                opacity: 0,
                y: 30,
                rotationX: -45,
                transformPerspective: 800
            });

            // 2. Animate them rippling in all together
            ScrollTrigger.create({
                trigger: ".strategy-bullet",
                start: "top 85%",
                onEnter: () => {
                    gsap.to('.strategy-bullet', {
                        opacity: 1,
                        y: 0,
                        rotationX: 0,
                        duration: 0.8,
                        stagger: 0.15, // 0.15s delay between each card
                        ease: "back.out(1.2)",
                    });
                }
            });
        }

        // --- Tab Switching Logic ---
        function switchTab(evt, tabId) {
            const contents = document.querySelectorAll('.tab-content');
            const buttons = document.querySelectorAll('.tab-btn');

            buttons.forEach(btn => btn.classList.remove('active'));
            evt.currentTarget.classList.add('active');

            const currentActive = document.querySelector('.tab-content.active');

            // Fade out current tab
            gsap.to(currentActive, {
                opacity: 0,
                y: 20,
                duration: 0.3,
                onComplete: () => {
                    contents.forEach(c => c.classList.remove('active'));

                    // Show next tab
                    const nextTab = document.getElementById(tabId);
                    nextTab.classList.add('active');

                    // Fade in next tab
                    gsap.fromTo(nextTab, {
                        opacity: 0,
                        y: 20
                    }, {
                        opacity: 1,
                        y: 0,
                        duration: 0.5
                    });

                    // Refresh ScrollTrigger calculations after DOM change
                    ScrollTrigger.refresh();
                }
            });
        }

        window.addEventListener("load", initAnimations);
    </script>
@endpush
