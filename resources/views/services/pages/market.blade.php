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
                    Market Entry Strategy & New Product Development
                </h1>
                <div class="flex flex-col gap-5">
                    <p class="mt-4 text-gray-600 reveal-para">
                        Vortex Consulting Group supports clients in crafting competitive strategies for market entry to help
                        clients navigate market ambiguity and business expansion goals with precision and confidence.
                    </p>
                    <p class="mt-4 text-gray-600 reveal-para">
                        By providing in-depth analysis and forecasted roadmaps, we enable companies to minimize costs and
                        setup times, streamline execution, and make well-informed strategic decisions. Typically, by this
                        stage, the Board or Management has already conducted an initial go/no-go assessment and chosen to
                        move forward with the expansion.
                    </p>
                    <p class="mt-4 text-gray-600 reveal-para">
                        Our team has successfully supported a diverse range of companies, ranging from global enterprises to
                        Indian SMEs, in formulating effective market entry strategies and implementation roadmaps. We
                        harness deep industry engagement and rigorous market research and analyses to deliver actionable
                        insights that drive informed decision-making. Whether the goal is geographical expansion, a merger,
                        or an acquisition, we equip our clients with the strategic clarity needed to drive successful market
                        entry and long-term growth.
                    </p>
                    <p class="mt-4 text-gray-600 reveal-para">In our market entry strategy engagements, we help clients
                        address critical questions to ensure a well-informed and successful expansion. Key areas we analyze
                        include:</p>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-4">
                        @foreach ([
            'Market Opportunity: What is the size of the prize, growth potential, and competitive landscape of the target market?',
            'Strategic Positioning: How should the proposed business be positioned to maximize impact and differentiation?',
            'Demand Assessment: What is the potential demand for the product or service, and how will it evolve over time?',
            'Pricing Strategy: What pricing model will optimize market penetration, profitability, and competitive advantage?',
            'Customer Insights: What are the customer preferences, key bottlenecks, and desired enhancements to elevate the product or service offering?',
            'Business Model: What is the most effective business model to drive long-term success and scalability?',
            'Operating Model & Go-To-Market Plan: How should the operations as well as market entry strategies be structured for efficient execution?',
            'Financial Projections: What are the expected revenues, cost structures, and financial viability of the business?',
            'Return on Investment (ROI) & Breakeven Analysis: What is the projected timeline and financial return for the investment?',
            'Implementation Roadmap: What are the key milestones and action plans to achieve business objectives?',
            'Risk Assessment & Mitigation: What potential risks could impact the business, and how can they be proactively managed?',
            'Risk Assessment & Mitigation: What potential risks could impact the business, and how can they be proactively managed?',
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
                    <p class="mt-4 text-gray-600 reveal-para">By addressing these fundamental aspects, we empower our
                        clients with a data-driven approach to market entry, ensuring strategic clarity and execution
                        excellence.</p>
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
