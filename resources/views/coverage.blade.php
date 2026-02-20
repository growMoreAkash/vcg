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

        /* Initial states for GSAP animations */
        .reveal-text,
        .reveal-para {
            opacity: 0;
            transform: translateY(20px);
        }

        .strategy-bullet {
            opacity: 0;
            transform: translateX(80px);
            cursor: pointer;
            /* Indicate interactivity */
        }

        .vertical-text {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            white-space: nowrap;
        }
    </style>
@endpush

@section('content')
    <section class="w-full relative bg-white overflow-x-hidden">

        <div class="relative h-[80vh] w-full">
            <img src="{{ asset('b3.png') }}" class="w-full h-full object-cover" alt="Hero Background">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="absolute top-[40%] left-[5%] text-white max-w-3xl z-10">
                <h1 class="text-4xl italic mb-6">
                    We offer <span id="typing-text" class="text-red-600"></span>
                    <span class="animate-pulse">|</span>
                </h1>
                <p class="text-lg mb-6 reveal-text">Empowering your business with strategic insights and data-driven
                    solutions.</p>
                <button class="bg-red-800 px-8 py-4 text-xl font-bold hover:bg-white hover:text-red-800 transition">Know
                    More</button>
            </div>
        </div>

        <div class="max-w-7xl mx-auto py-16 px-6">

            <div class="flex justify-center border-b border-gray-200 mb-12">
                <button id="default-tab-btn" onclick="switchTab(event, 'strategy')"
                    class="tab-btn px-8 py-4 font-bold text-gray-500 active">Industry Coverage</button>
                <button onclick="switchTab(event, 'highlights')"
                    class="tab-btn px-8 py-4 font-bold text-gray-500">Highlights</button>
                <button onclick="switchTab(event, 'contact')" class="tab-btn px-8 py-4 font-bold text-gray-500">Contact
                    Us</button>
            </div>

            <div id="strategy" class="tab-content active">
                <div class="max-w-4xl mx-auto space-y-8 text-gray-800 text-lg leading-relaxed">
                    <p class="reveal-para">We are a broad-based Strategy Consulting and M&A advisory firm with the resources
                        and expertise to advise clients operating in a wide range of industry and service sectors.
                        Furthermore, we are constantly expanding our activities in order to respond to the needs of growing
                        multi-sector businesses which benefit from our agility and professional approach as an organization.
                    </p>

                    <h3 class="text-2xl font-bold text-red-800 reveal-para mb-8">Below is a selection of industry sectors in
                        which members of the team have advised:</h3>

                    <div id="strategy" class="tab-content active">
                        <div class="max-w-4xl mx-auto space-y-8 text-gray-800 text-lg leading-relaxed">
                            <p class="reveal-para">We are a broad-based Strategy Consulting and M&A advisory firm...</p>

                            <h3 class="text-2xl font-bold text-red-800 reveal-para mb-8">
                                Below is a selection of industry sectors...
                            </h3>

                            <div class="mt-24 flex gap-12 relative items-start" id="industrials-section">
                                <div class="sticky top-40 flex items-center">
                                    <div class="relative">
                                        <h3
                                            class="text-6xl font-black text-red-800/10 text-center uppercase tracking-tighter vertical-text leading-none select-none">
                                            Industrials
                                        </h3>
                                    </div>
                                </div>

                                <div class="relative flex flex-col gap-6 w-full pl-12" id="bullet-container">

                                    <div class="absolute left-0 top-0 h-full w-1 z-0">
                                        <svg width="4" height="100%" class="h-full overflow-visible">
                                            <line id="industrials-line" x1="2" y1="0" x2="2"
                                                y2="100%" stroke="#991b1b" stroke-width="4" stroke-linecap="round" />
                                        </svg>
                                    </div>

                                    @php
                                        $bullets = [
                                            'Corporate Strategy & Planning',
                                            'Growth & Market Entry Strategy',
                                            'M&A and Portfolio Optimization',
                                            'Competitive Intelligence & Wargaming',
                                            'Commercial Due Diligence',
                                            'Target Screening & Private Equity Support',
                                            'Shareholder Value Management',
                                        ];
                                    @endphp

                                    @foreach ($bullets as $bullet)
                                        <div
                                            class="strategy-bullet relative z-10 flex items-center gap-4 bg-gray-50 p-6 rounded-xl border-l-4 border-red-800 shadow-sm w-full transition-all group hover:bg-white hover:shadow-xl">
                                            <span
                                                class="text-red-800 font-bold text-2xl transform transition-transform group-hover:translate-x-2">→</span>
                                            <span class="font-bold text-gray-800 text-lg">{{ $bullet }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-24 flex gap-12 relative items-start" id="industrials-section">
                                <div class="sticky top-40 flex items-center">
                                    <div class="relative">
                                        <h3
                                            class="text-6xl font-black text-red-800/10 text-center uppercase tracking-tighter vertical-text leading-none select-none">
                                            Industrials
                                        </h3>
                                    </div>
                                </div>

                                <div class="relative flex flex-col gap-6 w-full pl-12" id="bullet-container">

                                    <div class="absolute left-0 top-0 h-full w-1 z-0">
                                        <svg width="4" height="100%" class="h-full overflow-visible">
                                            <line id="industrials-line" x1="2" y1="0" x2="2"
                                                y2="100%" stroke="#991b1b" stroke-width="4" stroke-linecap="round" />
                                        </svg>
                                    </div>

                                    @php
                                        $bullets = [
                                            'Corporate Strategy & Planning',
                                            'Growth & Market Entry Strategy',
                                            'M&A and Portfolio Optimization',
                                            'Competitive Intelligence & Wargaming',
                                            'Commercial Due Diligence',
                                            'Target Screening & Private Equity Support',
                                            'Shareholder Value Management',
                                        ];
                                    @endphp

                                    @foreach ($bullets as $bullet)
                                        <div
                                            class="strategy-bullet relative z-10 flex items-center gap-4 bg-gray-50 p-6 rounded-xl border-l-4 border-red-800 shadow-sm w-full transition-all group hover:bg-white hover:shadow-xl">
                                            <span
                                                class="text-red-800 font-bold text-2xl transform transition-transform group-hover:translate-x-2">→</span>
                                            <span class="font-bold text-gray-800 text-lg">{{ $bullet }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

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

        // --- GSAP Scroll & Hover Animations ---
        gsap.to(".reveal-text", {
            opacity: 1,
            y: 0,
            duration: 1,
            delay: 0.3
        });

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

        // 2. Line Drawing Animation
        const line = document.querySelector("#industrials-line");
        const container = document.querySelector("#bullet-container");
        const fullHeight = container.scrollHeight;

        gsap.set(line, {
            strokeDasharray: fullHeight,
            strokeDashoffset: fullHeight
        });

        gsap.to(line, {
            strokeDashoffset: 0,
            ease: "none",
            scrollTrigger: {
                trigger: "#industrials-section",
                start: "top 60%",
                end: "bottom 80%",
                scrub: 1,
            }
        });

        // 3. Bullet Animation & Hover Fix
        const bullets = gsap.utils.toArray('.strategy-bullet');

        bullets.forEach((bullet, index) => {
            // Entrance Animation
            gsap.to(bullet, {
                opacity: 1,
                x: 0,
                duration: 0.8,
                ease: "back.out(1.2)",
                scrollTrigger: {
                    trigger: bullet,
                    start: "top 92%",
                    toggleActions: "play none none none"
                }
            });

            // Clean Hover Animation (Prevents transparency issues)
            bullet.addEventListener("mouseenter", () => {
                gsap.to(bullet, {
                    x: 20,
                    scale: 1.03,
                    duration: 0.4,
                    ease: "power2.out",
                    overwrite: "auto" // Prevents conflict with scroll animation
                });
            });

            bullet.addEventListener("mouseleave", () => {
                gsap.to(bullet, {
                    x: 0,
                    scale: 1,
                    duration: 0.4,
                    ease: "power2.inOut",
                    overwrite: "auto"
                });
            });
        });
        // --- Tab Switching Logic ---
        function switchTab(evt, tabId) {
            const contents = document.querySelectorAll('.tab-content');
            const buttons = document.querySelectorAll('.tab-btn');

            buttons.forEach(btn => btn.classList.remove('active'));
            evt.currentTarget.classList.add('active');

            const currentActive = document.querySelector('.tab-content.active');

            gsap.to(currentActive, {
                opacity: 0,
                y: 20,
                duration: 0.3,
                onComplete: () => {
                    contents.forEach(c => c.classList.remove('active'));
                    const nextTab = document.getElementById(tabId);
                    nextTab.classList.add('active');

                    gsap.fromTo(nextTab, {
                        opacity: 0,
                        y: 20
                    }, {
                        opacity: 1,
                        y: 0,
                        duration: 0.5
                    });

                    ScrollTrigger.refresh();
                }
            });
        }

        // window.addEventListener("load", initAnimations);
    </script>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", () => {
            gsap.registerPlugin(ScrollTrigger);

            const line = document.querySelector("#industrials-line");
            const container = document.querySelector("#bullet-container");

            // Use scrollHeight to get the real pixel height of the container
            const fullHeight = container.scrollHeight;

            // Set initial state: Line hidden
            gsap.set(line, {
                strokeDasharray: fullHeight,
                strokeDashoffset: fullHeight
            });

            // 1. Line Drawing Animation
            gsap.to(line, {
                strokeDashoffset: 0,
                ease: "none",
                scrollTrigger: {
                    trigger: "#industrials-section",
                    start: "top 60%",
                    end: "bottom 80%",
                    scrub: 1,
                }
            });

            // 2. Staggered Bullet Entrance
            // This ensures the 2nd and 3rd bullets feel intentional
            gsap.from(".strategy-bullet", {
                x: 100,
                opacity: 0,
                duration: 0.8,
                stagger: 0.2, // Time delay between each bullet
                ease: "power2.out",
                scrollTrigger: {
                    trigger: "#bullet-container",
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            });
        });
    </script> --}}
@endpush
