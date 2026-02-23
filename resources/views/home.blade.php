@extends('layouts.app')

@section('title', 'Home')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        /* --- PERFORMANCE & SMOOTHING --- */
        .swiper-slide,
        .card-container,
        .card-image,
        .content-overlay,
        .article-info-box {
            will-change: transform, opacity;
            backface-visibility: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* --- SLIDER DIMENSIONS --- */
        .swiper {
            width: 100%;
            /* padding: 100px 0;  */
            padding-top: 60px;
            padding-bottom: 100px;
            max-width: 1400px;
            /* Limits width to keep 3 cards looking elegant */
            margin: 0 auto;
        }

        .swiper-slide {
            /* slidesPerView: 3 handles width automatically */
            transition: all 0.8s cubic-bezier(0.2, 1, 0.3, 1);
            filter: grayscale(100%) brightness(0.5);
            opacity: 0.4;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Reset for the active center card */
        .swiper-slide-active {
            filter: grayscale(0%) brightness(1);
            opacity: 1;
            z-index: 50;
        }

        /* --- CARD DESIGN --- */
        .card-container {
            position: relative;
            height: 400px;
            width: 90%;
            /* Creates space between the 3 columns */
            background: #000;
            /* border-radius: 1.25rem; */
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.3);
            transform: scale(0.8);
            /* Side cards scale */
            transition: transform 0.8s cubic-bezier(0.2, 1, 0.3, 1);
        }

        /* Center Card Scale-up */
        .swiper-slide-active .card-container {
            transform: scale(1.2);
        }

        .card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 8px 20px;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 99px;
            color: white;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            z-index: 10;
        }

        .article-info-box {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 25px;
            border-radius: 1.5rem;
            z-index: 15;
        }

        .content-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(112, 7, 7, 0.842);
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(15px);
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            text-align: left;
            transform: translateY(101%);
            z-index: 20;
        }

        @media (max-width: 1024px) {
            .card-container {
                height: 400px;
            }
        }

        @media (max-width: 640px) {
            .swiper-slide {
                width: 100%;
            }

            /* Stack on mobile */
        }
    </style>

    {{-- custom button styles --}}
    <style>
        .animated-button1 {
            background: linear-gradient(-30deg, #3d0b0b 50%, #2b0808 50%);
            padding: 15px 25px;
            margin: 12px 0px;
            display: inline-block;
            -webkit-transform: translate(0%, 0%);
            transform: translate(0%, 0%);
            overflow: hidden;
            color: #f7d4d4;
            font-size: 14px;
            font-style: semibold;
            letter-spacing: 2.5px;
            text-align: center;
            text-transform: uppercase;
            text-decoration: none;
            -webkit-box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
        }

        .animated-button1::before {
            content: '';
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            background-color: #ad8585;
            opacity: 0;
            -webkit-transition: .2s opacity ease-in-out;
            transition: .2s opacity ease-in-out;
        }

        .animated-button1:hover::before {
            opacity: 0.2;
        }

        .animated-button1 span {
            position: absolute;
        }

        .animated-button1 span:nth-child(1) {
            top: 0px;
            left: 0px;
            width: 100%;
            height: 2px;
            background: -webkit-gradient(linear, right top, left top, from(rgba(43, 8, 8, 0)), to(#d92626));
            background: linear-gradient(to left, rgba(43, 8, 8, 0), #d92626);
            -webkit-animation: 2s animateTop linear infinite;
            animation: 2s animateTop linear infinite;
        }

        @keyframes animateTop {
            0% {
                -webkit-transform: translateX(100%);
                transform: translateX(100%);
            }

            100% {
                -webkit-transform: translateX(-100%);
                transform: translateX(-100%);
            }
        }

        .animated-button1 span:nth-child(2) {
            top: 0px;
            right: 0px;
            height: 100%;
            width: 2px;
            background: -webkit-gradient(linear, left bottom, left top, from(rgba(43, 8, 8, 0)), to(#d92626));
            background: linear-gradient(to top, rgba(43, 8, 8, 0), #d92626);
            -webkit-animation: 2s animateRight linear -1s infinite;
            animation: 2s animateRight linear -1s infinite;
        }

        @keyframes animateRight {
            0% {
                -webkit-transform: translateY(100%);
                transform: translateY(100%);
            }

            100% {
                -webkit-transform: translateY(-100%);
                transform: translateY(-100%);
            }
        }

        .animated-button1 span:nth-child(3) {
            bottom: 0px;
            left: 0px;
            width: 100%;
            height: 2px;
            background: -webkit-gradient(linear, left top, right top, from(rgba(43, 8, 8, 0)), to(#d92626));
            background: linear-gradient(to right, rgba(43, 8, 8, 0), #d92626);
            -webkit-animation: 2s animateBottom linear infinite;
            animation: 2s animateBottom linear infinite;
        }

        @keyframes animateBottom {
            0% {
                -webkit-transform: translateX(-100%);
                transform: translateX(-100%);
            }

            100% {
                -webkit-transform: translateX(100%);
                transform: translateX(100%);
            }
        }

        .animated-button1 span:nth-child(4) {
            top: 0px;
            left: 0px;
            height: 100%;
            width: 2px;
            background: -webkit-gradient(linear, left top, left bottom, from(rgba(43, 8, 8, 0)), to(#d92626));
            background: linear-gradient(to bottom, rgba(43, 8, 8, 0), #d92626);
            -webkit-animation: 2s animateLeft linear -1s infinite;
            animation: 2s animateLeft linear -1s infinite;
        }

        @keyframes animateLeft {
            0% {
                -webkit-transform: translateY(-100%);
                transform: translateY(-100%);
            }

            100% {
                -webkit-transform: translateY(100%);
                transform: translateY(100%);
            }
        }

        .btn-three {
            color: #FFF;
            transition: all 0.5s;
            position: relative;
            width: fit-content;
            padding: 1rem 2rem;
            cursor: pointer;
        }

        .btn-three::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            background-color: rgba(255, 6, 6, 0.938);
            transition: all 0.3s;
        }

        .btn-three:hover::before {
            opacity: 0;
            transform: scale(0.5, 0.5);
        }

        .btn-three::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            opacity: 0;
            transition: all 0.3s;
            border: 1px solid rgba(224, 6, 6, 0.5);
            transform: scale(1.2, 1.2);
        }

        .btn-three:hover::after {
            opacity: 1;
            transform: scale(1, 1);
        }
    </style>


    <style>
        .image-tilt-wrapper {
            transform-style: preserve-3d;
            will-change: transform;
        }

        .founder-image {
            /* Prevents image from looking "flat" when tilted */
            transform: translateZ(50px);
            will-change: transform;
        }
    </style>

    <style>
        .fade-up {
            opacity: 0;
            transform: translateY(60px);
            transition: all 0.8s ease;
        }

        .fade-left {
            opacity: 0;
            transform: translateX(-120px);
            transition: all 0.8s ease;
        }

        .fade-right {
            opacity: 0;
            transform: translateX(120px);
            transition: all 0.8s ease;
        }

        .show {
            opacity: 1;
            transform: translate(0, 0);
        }

        /* vertical timeline (React-like) */
        .vertical-timeline {
            position: relative;
            padding: 2rem 0;
        }

        .vertical-timeline::before {
            content: "";
            position: absolute;
            top: 0;
            left: 50%;
            width: 4px;
            height: 100%;
            background: #7f1d1d;
            transform: translateX(-50%);
        }

        .vertical-timeline-element {
            position: relative;
            margin: 0 0 4rem;
        }

        .vertical-timeline-element:last-child {
            margin-bottom: 0;
        }

        .vertical-timeline-element-icon {
            position: absolute;
            top: 0;
            left: 50%;
            width: 56px;
            height: 56px;
            margin-left: -28px;
            border-radius: 50%;
            background: #5e1210;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            box-shadow: 0 0 0 6px rgba(94, 18, 16, 0.25);
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.7s ease;
        }

        .vertical-timeline-element-content {
            position: relative;
            width: 44%;
            background: #5e1210;
            color: #ffffff;
            padding: 1.5rem;
            border-radius: 0.75rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.7s ease;
        }

        .vertical-timeline-element-content::after {
            content: "";
            position: absolute;
            top: 24px;
            width: 0;
            height: 0;
            border: 10px solid transparent;
        }

        .vertical-timeline-element-date {
            display: inline-block;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .vertical-timeline-element:nth-child(odd) .vertical-timeline-element-content {
            margin-left: 0;
            margin-right: auto;
        }

        .vertical-timeline-element:nth-child(odd) .vertical-timeline-element-content::after {
            right: -20px;
            border-left-color: #5e1210;
        }

        .vertical-timeline-element:nth-child(even) .vertical-timeline-element-content {
            margin-left: auto;
            margin-right: 0;
        }

        .vertical-timeline-element:nth-child(even) .vertical-timeline-element-content::after {
            left: -20px;
            border-right-color: #5e1210;
        }

        .vertical-timeline-element--visible .vertical-timeline-element-content,
        .vertical-timeline-element--visible .vertical-timeline-element-icon {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        @media (max-width: 900px) {
            .vertical-timeline::before {
                left: 24px;
            }

            .vertical-timeline-element-icon {
                left: 24px;
                margin-left: 0;
            }

            .vertical-timeline-element-content {
                width: calc(100% - 72px);
                margin-left: 72px !important;
            }

            .vertical-timeline-element-content::after {
                left: -20px;
                border-right-color: #5e1210;
            }
        }
    </style>

    <style>
        /* Swiper Wrapper */
        .cinematicSwiper {
            width: 100%;
            overflow: hidden;
            /* Keeps the slider strictly inside the right column */
            padding-top: 20px;
            padding-bottom: 40px;
        }

        /* The Card Slide */
        .cinematic-card {
            width: 140px;
            /* Slim base width so 3-4 fit nicely */
            height: 400px;
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            cursor: pointer;
            transition: width 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            margin-right: 16px;
            /* Space between cards */
        }

        /* Hover Expansion */
        .cinematic-card:hover {
            width: 320px;
            /* Expanded width on hover */
        }

        /* Image Styling */
        .card-image-wrapper {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .card-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(60%) brightness(0.5);
            transition: filter 0.4s ease;
        }

        .cinematic-card:hover .card-image-wrapper img {
            filter: grayscale(0%) brightness(1);
        }

        /* Gradient Overlay */
        .overlay-gradient {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .cinematic-card:hover .overlay-gradient {
            opacity: 1;
        }

        /* Text Content inside Cards */
        .card-content {
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 24px;
            width: 320px;
            /* Matches hover width to prevent text wrap snapping */
            color: #fff;
            opacity: 0;
            transform: translateY(15px);
            transition: all 0.4s ease 0.1s;
            /* Slight delay so box expands first */
            pointer-events: none;
        }

        .cinematic-card:hover .card-content {
            opacity: 1;
            transform: translateY(0);
        }

        .card-content h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 8px;
            white-space: nowrap;
        }

        .card-content p {
            font-size: 0.9rem;
            color: #cbd5e1;
            line-height: 1.4;
        }

        /* Swiper Pagination Styling */
        .swiper-pagination {
            position: relative !important;
            bottom: 0 !important;
            text-align: left !important;
            padding-left: 10px;
        }

        .swiper-pagination-bullet {
            background-color: #555 !important;
            opacity: 1 !important;
        }

        .swiper-pagination-bullet-active {
            background-color: #b91c1c !important;
            /* Tailwind red-700 */
            width: 24px !important;
            border-radius: 10px !important;
            transition: width 0.3s ease;
        }
    </style>
@endpush

@section('content')

    {{-- banner --}}
    <section class=" bg-[#e5e7eb] overflow-hidden">
        <div class="text-center my-14">
            <h1 class="text-xl text-gray-700 font-verdana">
                Welcome to Vortex Consulting Group
            </h1>
            <h2 class="text-3xl text-gray-900 font-semibold font-verdana"> Partnering with Leaders to Shape Strategy and Unlock Growth
            </h2>
        </div>

        <div class="max-w-full mx-auto px-10">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @php
                        $cards = [
                            [
                                'cat' => 'Qualitative market research',
                                'date' => 'MM DD, YYYY',
                                'title' => 'Global Industrial Products Manufacturer',
                                'desc' =>
                                    'A leading US company, dealing in flow creation & industrial products, planning to acquire a contract manufacturer of bio pharma products and medical devices, approached us to perform a commercial dili...',
                                'img' => 'https://www.vortexconsultgroup.com/public/uploads/cases/1754024637.jpg',
                            ],
                            [
                                'cat' => 'Market sizing',
                                'date' => 'MM DD, YYYY',
                                'title' => 'Global Visibility & Tracking Solutions Provider',
                                'desc' =>
                                    'A leading US-based developer of sensor technology, software and ml tools to improve real-time transportation visibility, approached us to refresh its growth strategy',
                                'img' => 'https://www.vortexconsultgroup.com/public/uploads/cases/1754025409.jpg',
                            ],
                            [
                                'cat' => 'Regulatory Analysis',
                                'date' => 'MM DD, YYYY',
                                'title' => 'Global Automotive Manufacturer',
                                'desc' =>
                                    'A leading global automotive company planned to increase investment in a Class 8 HFCV truck manufacturing & operating startup',
                                'img' => 'https://www.vortexconsultgroup.com/public/uploads/cases/1754026513.jpg',
                            ],
                            [
                                'cat' => 'Voice of Customer Analysis',
                                'date' => 'MM DD, YYYY',
                                'title' => 'Japanese Aircraft Manufacturer',
                                'desc' =>
                                    'The client wanted to develop a deeper understanding of customer segments, service offerings, and go-to-market customer strategy of key fractional players in the US',
                                'img' => 'https://www.vortexconsultgroup.com/public/uploads/cases/1754027090.jpg',
                            ],
                            [
                                'cat' => 'Strategic Advisory',
                                'date' => 'MM DD, YYYY',
                                'title' => 'Global Two-Wheeler Manufacturer',
                                'desc' =>
                                    'A leading Indian automotive manufacturer, operating in the two-wheeler segment, had plans to acquire a global leader in small-wheeled electric carts',
                                'img' => 'https://www.vortexconsultgroup.com/public/uploads/cases/1754027736.jpg',
                            ],
                        ];
                    @endphp

                    @foreach ($cards as $card)
                        <div class="swiper-slide">
                            <div class="card-container">
                                <div class="category-badge">{{ $card['cat'] }}</div>
                                <img src="{{ $card['img'] }}" class="card-image" alt="Article">

                                <div class="article-info-box">
                                    <p class="text-gray-500 text-[10px] font-bold uppercase mb-2">ARTICLE •
                                        {{ $card['date'] }}</p>
                                    <h3 class="text-lg font-bold text-gray-900 leading-tight">{{ $card['title'] }}</h3>
                                </div>

                                <div class="content-overlay">
                                    <p class="text-white/70 text-[10px] font-bold uppercase mb-4 tracking-widest">ARTICLE •
                                        {{ $card['date'] }}</p>
                                    <h3 class="text-2xl font-black text-white leading-tight mb-6">{{ $card['title'] }}</h3>
                                    <p class="text-white/80 text-sm mb-auto">{{ $card['desc'] }}</p>
                                    <button
                                        class="mt-8 px-10 py-4 bg-white text-gray-800 font-bold text-xs tracking-widest rounded-full transition-all">LEARN
                                        MORE →</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    {{-- leadership section --}}
    <section id="leadership-section" class="px-6 md:px-20 py-20 bg-white overflow-hidden">
        <div class="flex flex-wrap gap-12 lg:gap-16 items-start">

            <div class="leadership-img-container w-full lg:w-[calc(50%-2rem)]" style="perspective: 1000px;">
                <div class="relative image-tilt-wrapper group">
                    <div
                        class="spotlight-glow absolute -inset-10 bg-red-800/20 blur-[900px] rounded-full opacity-0 scale-50 transition-opacity duration-500 pointer-events-none">
                    </div>
                    <img src="{{ asset('founder.jpg') }}"
                        class="founder-image h-[50vh] lg:h-[75vh] w-full object-cover rounded-2xl shadow-2xl relative z-10"
                        alt="Founder">
                </div>
            </div>

            <div class="leadership-text w-full lg:w-[calc(50%-2rem)]">
                <h1 class="text-4xl font-extrabold text-red-800 mb-6 uppercase tracking-tight reveal-text">
                    Leadership
                </h1>

                <h2 class="text-3xl font-bold mb-8 text-gray-900 leading-tight reveal-text">
                    Vaibhav focuses on creating <span
                        class="text-red-800 underline decoration-red-800/30 underline-offset-8">tangible and exponential
                        value</span> for firms looking to leapfrog the marketplace!
                </h2>

                <div class="text-lg text-gray-700 leading-relaxed space-y-6">
                    <p class="reveal-text font-medium text-gray-900">
                        Vaibhav Ranjan is the Founder & Principal of Vortex Consulting Group, leading the Strategy and M&A
                        Consulting practice. He has over 20 years of global experience serving clients on key inorganic and
                        organic growth initiatives across North America, Western Europe and APAC Japan.
                    </p>

                    <button id="read-more-btn"
                        class="flex cursor-pointer items-center gap-3 text-red-800 font-bold uppercase tracking-widest text-sm hover:gap-5 transition-all group">
                        <span class="btn-text">Read More</span>
                        <span class="text-xl group-hover:translate-x-1 transition-transform">→</span>
                    </button>
                </div>
            </div>

            <div id="extra-content" class="w-full h-0 opacity-0 overflow-hidden mt-4 lg:mt-0">
                <div class="pt-12 border-t border-gray-100 space-y-8 text-lg text-gray-700 leading-relaxed">
                    <div class="grid grid-cols-1 gap-12">
                        <p>
                            Previously, he served as Principal and Head of International Business for the consulting service
                            line at Transjovan Capital Advisors Pvt Ltd, where he delivered 75+ engagements, driving over
                            $15M in sales revenue within 3.5 years.
                            Before that, he worked with Monitor Deloitte in the Strategy & Business Design and Financial
                            Services Industry practices with a focus on strategy, new ventures, and M&A.
                        </p>
                        <p>
                            Earlier, he headed the Strategy, Planning, and Venture Capital arm of the Suncorp Group in
                            Australia, an ASX 20 banking, insurance, and financial services conglomerate.
                        </p>
                    </div>

                    <p
                        class="border-l-4 border-red-800 pl-8 py-2 italic font-medium text-gray-600 bg-gray-50/50 rounded-r-xl">
                        Vaibhav has advised Boards, CEOs and CFOs and executive management teams across North American,
                        Australian and European geographies on the evolving market landscape and global best practices,
                        delivering significant client impact through levers of dominant strategy, growth options and the
                        creation of sustainable competitive advantages that protect market leadership.
                    </p>
                </div>
            </div>

        </div>
    </section>



    <!-- SERVICES SECTION -->
    <section class="bg-[#363b46] py-20 px-6 md:px-20 min-h-[400px]">

        <!-- Heading -->
        <h1 class="text-4xl font-extrabold text-white text-center fade-up">
            Our Services
        </h1>

        <!-- Services Timeline -->
        <div class="mt-20 flex flex-col gap-20 text-white">

            <!-- Service 1 -->
            <div class="flex flex-col md:flex-row justify-center items-center gap-10 text-xl md:text-2xl">

                <img src="{{ asset('sev1.jpeg') }}" class="fade-left max-w-sm" alt="Service 1">

                <div class="fade-up max-w-xl text-xl">
                    <h1 class="text-lg font-bold text-red-600"> M&A</h1>
                    <p class="text-xl mt-4 text-gray-300">
                        We build deal conviction and value creation through market grounded insights, supported by target
                        screening, commercial due diligence, portfolio strategy, and shareholder value management.
                    </p>
                    <br>


                    <a href="#" class="animated-button1">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Know More
                    </a>


                </div>

            </div>

            <!-- Service 2 -->
            <div class="flex flex-col md:flex-row-reverse justify-center items-center gap-10 text-xl md:text-2xl">

                <img src="{{ asset('sev2.jpeg') }}" class="fade-right max-w-sm" alt="Service 2">

                <div class="fade-up max-w-xl text-xl">
                    <h1 class="text-lg font-bold text-red-600">Strategy</h1>
                    <p class="text-xl mt-4 text-gray-300">
                        We shape winning choices on where to play and how to win, supported by corporate and business unit
                        strategy, market entry, strategic wargaming, competitive benchmarking, and customer and channel
                        strategy.
                    </p>
                    <br>
                    <a href="#" class="animated-button1">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Know More
                    </a>
                </div>

            </div>

        </div>
    </section>


    <!-- CREDENTIALS SECTION -->
    <section class="bg-red-800 py-20 text-white overflow-hidden">

        <div class="max-w-6xl mx-auto px-6 text-center">
            <h1 class="text-4xl font-semibold mb-4">Our Credentials</h1>
            <h2 class="text-2xl mb-20">Transforming businesses globally</h2>
        </div>

        <!-- TIMELINE -->
        <div class="vertical-timeline max-w-6xl mx-auto px-6">

            <div class="vertical-timeline-element">
                <span class="vertical-timeline-element-icon">
                    <i class="ri-team-line"></i>
                </span>
                <div class="vertical-timeline-element-content">
                    <span class="vertical-timeline-element-date">TEAM</span>
                    <h3 class="text-xl">
                        The leadership team comprises ex-EY, Monitor Deloitte, Kearney, and KPMG professionals.
                    </h3>
                </div>
            </div>

            <div class="vertical-timeline-element">
                <span class="vertical-timeline-element-icon">
                    <i class="ri-global-fill"></i>
                </span>
                <div class="vertical-timeline-element-content">
                    <span class="vertical-timeline-element-date">GLOBAL COVERAGE</span>
                    <h3 class="text-xl">
                        With offices in New Delhi, Los Angeles, & Sydney, we offer extensive coverage across geographies.
                    </h3>
                </div>
            </div>

            <div class="vertical-timeline-element">
                <span class="vertical-timeline-element-icon">
                    <i class="ri-user-3-fill"></i>
                </span>
                <div class="vertical-timeline-element-content">
                    <span class="vertical-timeline-element-date">MARQUEE CLIENTELE</span>
                    <h3 class="text-xl">
                        Executed 250+ client engagements across the globe for various industries.
                    </h3>
                </div>
            </div>

            <div class="vertical-timeline-element">
                <span class="vertical-timeline-element-icon">
                    <i class="ri-user-star-fill"></i>
                </span>
                <div class="vertical-timeline-element-content">
                    <span class="vertical-timeline-element-date">SPECIALISTS</span>
                    <h3 class="text-xl">
                        For Strategy, M&A and Deal Advisory.
                    </h3>
                </div>
            </div>

        </div>
    </section>

    <section class="bg-[#ffffff] py-24 px-6 overflow-hidden">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-12 lg:gap-20">

            <div class="w-full lg:w-[35%] text-gray-800 flex-shrink-0">
                <h3 class="text-red-700 uppercase tracking-widest text-sm font-bold mb-4">
                    Who do we assist?
                </h3>
                <h2 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                    We advise across industries and stages
                </h2>
                <p class="text-gray-400 text-lg leading-relaxed">
                    We are sector and stage agnostic. We have been engaged by global PE & VC funds, Fortune-500
                    corporations, Indian conglomerates and SMEs.
                </p>
            </div>

            <div class="w-full lg:w-[65%] min-w-0">
                <div class="swiper cinematicSwiper pb-12">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide cinematic-card group">
                            <div class="card-image-wrapper">
                                <img src="{{ asset('h1.jpeg') }}" alt="PE & VC Funds" />
                                <div class="overlay-gradient"></div>
                            </div>
                            <div class="card-content">
                                <h3>PE & VC Funds</h3>
                                <p>Delivering strategic due diligence and portfolio value creation.</p>
                            </div>
                        </div>

                        <div class="swiper-slide cinematic-card group">
                            <div class="card-image-wrapper">
                                <img src="{{ asset('h2.jpeg') }}" alt="Fortune 500" />
                                <div class="overlay-gradient"></div>
                            </div>
                            <div class="card-content">
                                <h3>Fortune-500</h3>
                                <p>Guiding global enterprises through complex M&A and market entry.</p>
                            </div>
                        </div>

                        <div class="swiper-slide cinematic-card group">
                            <div class="card-image-wrapper">
                                <img src="{{ asset('h3.jpeg') }}" alt="Conglomerates" />
                                <div class="overlay-gradient"></div>
                            </div>
                            <div class="card-content">
                                <h3>Conglomerates</h3>
                                <p>Transforming legacy businesses with modern growth strategies.</p>
                            </div>
                        </div>

                        <div class="swiper-slide cinematic-card group">
                            <div class="card-image-wrapper">
                                <img src="{{ asset('h3.jpeg') }}" alt="SMEs" />
                                <div class="overlay-gradient"></div>
                            </div>
                            <div class="card-content">
                                <h3>SMEs</h3>
                                <p>Scaling small and medium enterprises for exponential growth.</p>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination mt-8"></div>
                </div>
            </div>

        </div>
    </section>

    <section class="bg-[#363b46] py-20 px-6">
        <div class="max-w-6xl mx-auto flex flex-col lg:flex-row justify-center items-start gap-16">

            <div class="w-full lg:w-1/2 text-white">

                <div class="flex gap-8 mb-10 border-b border-gray-500">
                    <button id="tabBtn-contact" onclick="switchTab('contact')"
                        class="pb-3 text-xl font-bold uppercase tracking-wide border-b-2 border-red-800 text-white transition-colors cursor-pointer">
                        Contact Us
                    </button>
                    <button id="tabBtn-career" onclick="switchTab('career')"
                        class="pb-3 text-xl font-bold uppercase tracking-wide border-b-2 border-transparent text-gray-400 hover:text-white transition-colors cursor-pointer">
                        Career
                    </button>
                </div>

                <div id="tab-contact" class="block">
                    <h1 class="text-xl font-semibold text-gray-400 text-center lg:text-left mb-4">
                        Contact us for more information about our services.
                    </h1>

                    <form class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <input type="text" placeholder="Your Name*"
                            class="bg-gray-100 border border-gray-300 text-gray-800 px-6 py-4 text-lg outline-none"
                            required>
                        <input type="email" placeholder="Email*"
                            class="bg-gray-100 border border-gray-300 text-gray-800 px-6 py-4 text-lg outline-none"
                            required>

                        <input type="tel" placeholder="Phone Number"
                            class="bg-gray-100 border border-gray-300 text-gray-800 px-6 py-4 text-lg outline-none">
                        <input type="text" placeholder="Subject"
                            class="bg-gray-100 border border-gray-300 text-gray-800 px-6 py-4 text-lg outline-none">

                        <textarea rows="5" placeholder="Message*"
                            class="md:col-span-2 bg-gray-100 border border-gray-300 text-gray-800 px-6 py-4 text-lg outline-none resize-none"
                            required></textarea>

                        <div class="md:col-span-2">
                            <div class="box-3">
                                <div class="btn btn-three">
                                    <span class="text-white relative z-10">SUBMIT</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="tab-career" class="hidden">
                    <h1 class="text-xl font-semibold text-center text-gray-400 lg:text-left mb-4">Join Us in Shaping
                        Decision</h1>

                    <form class="grid grid-cols-1 md:grid-cols-2 gap-8" enctype="multipart/form-data">
                        <input type="text" placeholder="Full Name*"
                            class="bg-gray-100 border border-gray-300 text-gray-800 px-6 py-4 text-lg outline-none"
                            required>

                        <input type="email" placeholder="Email Address*"
                            class="bg-gray-100 border border-gray-300 text-gray-800 px-6 py-4 text-lg outline-none"
                            required>

                        <input type="tel" placeholder="Phone Number*"
                            class="bg-gray-100 border border-gray-300 text-gray-800 px-6 py-4 text-lg outline-none"
                            required>

                        <select
                            class="bg-gray-100 border border-gray-300 text-gray-800 px-6 py-4 text-lg outline-none cursor-pointer"
                            required>
                            <option value="" disabled selected>Select Job Role*</option>
                            <option value="Junior Analyst">Junior Analyst</option>
                            <option value="Analyst">Analyst</option>
                            <option value="Senior Analyst">Senior Analyst</option>
                            <option value="Associate">Associate</option>
                            <option value="Consultant">Consultant</option>
                            <option value="Engagement Manager">Engagement Manager</option>
                        </select>

                        <input type="text" placeholder="Location*"
                            class="bg-gray-100 border border-gray-300 text-gray-800 px-6 py-4 text-lg outline-none"
                            required>

                        <input type="url" placeholder="LinkedIn Profile URL*"
                            class="bg-gray-100 border border-gray-300 text-gray-800 px-6 py-4 text-lg outline-none"
                            required>

                        <div class="md:col-span-2">
                            <label class="block mb-2 text-gray-300 text-sm tracking-widest uppercase">Resume Upload (PDF
                                Only)*</label>
                            <input type="file" accept="application/pdf"
                                class="w-full bg-gray-100 border border-gray-300 text-gray-800 px-6 py-3 text-lg outline-none cursor-pointer file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-bold file:bg-[#363b46] file:text-white hover:file:bg-gray-700"
                                required>
                        </div>

                        <div class="md:col-span-2">
                            <div class="box-3">
                                <div class="btn btn-three">
                                    <span class="text-white relative z-10">APPLY NOW</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    </div>

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- slider --}}
    <script>
        var swiper = new Swiper(".mySwiper", {
            grabCursor: true,
            centeredSlides: true,
            loop: true,
            // SlidesPerView: 3 ensures center logic works and exactly 3 cards show
            slidesPerView: 1, // Default for mobile
            breakpoints: {
                640: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                } // Desktop
            },
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            speed: 1000,
        });

        // Event Delegation for hover
        const wrapper = document.querySelector('.swiper-wrapper');

        wrapper.addEventListener('mouseover', (e) => {
            const slide = e.target.closest('.swiper-slide-active');
            if (slide) {
                const overlay = slide.querySelector('.content-overlay');
                const infoBox = slide.querySelector('.article-info-box');
                gsap.to(overlay, {
                    y: 0,
                    duration: 0.7,
                    ease: "expo.out"
                });
                gsap.to(infoBox, {
                    opacity: 0,
                    y: 20,
                    duration: 0.5
                });
            }
        });

        wrapper.addEventListener('mouseout', (e) => {
            const slide = e.target.closest('.swiper-slide');
            if (slide) {
                const overlay = slide.querySelector('.content-overlay');
                const infoBox = slide.querySelector('.article-info-box');
                gsap.to(overlay, {
                    y: '101%',
                    duration: 0.5,
                    ease: "expo.in"
                });
                gsap.to(infoBox, {
                    opacity: 1,
                    y: 0,
                    duration: 0.5
                });
            }
        });

        swiper.on('slideChangeTransitionStart', function() {
            gsap.to('.content-overlay', {
                y: '101%',
                duration: 0.4
            });
            gsap.to('.article-info-box', {
                opacity: 1,
                y: 0,
                duration: 0.4
            });
        });
    </script>

    {{-- leadership --}}
    <script>
        // --- 1. INITIAL REVEAL ---
        gsap.registerPlugin(ScrollTrigger);
        let leadershipTL = gsap.timeline({
            scrollTrigger: {
                trigger: "#leadership-section",
                start: "top 75%",
                toggleActions: "play none none none"
            }
        });

        leadershipTL.from(".founder-image", {
                opacity: 0,
                x: -50,
                duration: 1,
                ease: "power2.out"
            })
            .from(".reveal-text", {
                opacity: 0,
                y: 30,
                duration: 0.8,
                stagger: 0.15
            }, "-=0.5");

        // --- 2. FULL WIDTH READ MORE ---
        const readMoreBtn = document.getElementById('read-more-btn');
        const extraContent = document.getElementById('extra-content');
        const btnText = readMoreBtn.querySelector('.btn-text');
        let isOpen = false;

        readMoreBtn.addEventListener('click', () => {
            if (!isOpen) {
                gsap.to(extraContent, {
                    height: "auto",
                    opacity: 1,
                    duration: 1.2,
                    ease: "expo.inOut",
                    onComplete: () => ScrollTrigger.refresh() // Recalculate scroll positions
                });
                btnText.innerText = "Read Less";
                isOpen = true;
            } else {
                gsap.to(extraContent, {
                    height: 0,
                    opacity: 0,
                    duration: 0.8,
                    ease: "expo.inOut",
                    onComplete: () => ScrollTrigger.refresh()
                });
                btnText.innerText = "Read More";
                isOpen = false;
            }
        });

        // --- 3. IMAGE TILT ---
        const tiltWrapper = document.querySelector('.image-tilt-wrapper');
        const xSetter = gsap.quickTo(tiltWrapper, "rotateY", {
            duration: 0.4,
            ease: "power2.out"
        });
        const ySetter = gsap.quickTo(tiltWrapper, "rotateX", {
            duration: 0.4,
            ease: "power2.out"
        });

        tiltWrapper.addEventListener('mousemove', (e) => {
            const {
                left,
                top,
                width,
                height
            } = tiltWrapper.getBoundingClientRect();
            const xPercent = (e.clientX - (left + width / 2)) / (width / 2);
            const yPercent = (e.clientY - (top + height / 2)) / (height / 2);
            xSetter(xPercent * 8);
            ySetter(yPercent * -8);
        });

        tiltWrapper.addEventListener('mouseleave', () => {
            xSetter(0);
            ySetter(0);
        });
    </script>

    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                }
            });
        }, {
            threshold: 0.2
        });

        document.querySelectorAll('.fade-up, .fade-left, .fade-right')
            .forEach(el => observer.observe(el));
    </script>

    <script>
        const timelineObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('vertical-timeline-element--visible');
                }
            });
        }, {
            threshold: 0.2
        });

        document.querySelectorAll('.vertical-timeline-element')
            .forEach(el => timelineObserver.observe(el));
    </script>

    <script>
        var swiper = new Swiper(".cinematicSwiper", {
            // 'auto' allows slides to have different widths based on CSS
            slidesPerView: "auto",
            centeredSlides: true, // Optional: Centers the active slide
            spaceBetween: 20, // Gap between slides
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            // Optional: ensure smooth scrolling on touch devices
            freeMode: true,
        });
        document.addEventListener("DOMContentLoaded", () => {
            const cinematicSwiper = new Swiper(".cinematicSwiper", {
                slidesPerView: "auto", // Allows cards to have dynamic widths
                spaceBetween: 0, // Handled by margin-right in CSS
                grabCursor: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        });
    </script>

    <script>
        function switchTab(tabName) {
            // 1. Get elements
            const contactTab = document.getElementById('tab-contact');
            const careerTab = document.getElementById('tab-career');
            const contactBtn = document.getElementById('tabBtn-contact');
            const careerBtn = document.getElementById('tabBtn-career');

            // 2. Hide both forms by default
            contactTab.classList.add('hidden');
            contactTab.classList.remove('block');
            careerTab.classList.add('hidden');
            careerTab.classList.remove('block');

            // 3. Reset both buttons to the inactive style (gray, transparent border)
            const inactiveStyle =
                "pb-3 text-xl font-bold uppercase tracking-wide border-b-2 border-transparent text-gray-400 hover:text-white transition-colors cursor-pointer";
            contactBtn.className = inactiveStyle;
            careerBtn.className = inactiveStyle;

            // 4. Show the selected form and apply the active style to the clicked button
            const activeStyle =
                "pb-3 text-xl font-bold uppercase tracking-wide border-b-2 border-red-800 text-white transition-colors cursor-pointer";

            if (tabName === 'contact') {
                contactTab.classList.add('block');
                contactTab.classList.remove('hidden');
                contactBtn.className = activeStyle;
            } else if (tabName === 'career') {
                careerTab.classList.add('block');
                careerTab.classList.remove('hidden');
                careerBtn.className = activeStyle;
            }
        }
    </script>
@endpush
