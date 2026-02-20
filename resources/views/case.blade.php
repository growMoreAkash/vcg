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

        /* Essential for Parallax */
        .parallax-wrapper {
            position: relative;
            overflow: hidden;
            /* Clips the moving image */
        }

        .parallax-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 140%;
            /* Taller than container to allow room to move */
            object-fit: cover;
            will-change: transform;
        }

        #typing-text {
            border-right: 2px solid;
            padding-right: 5px;
        }
    </style>
@endpush

@section('content')
    <section class="w-full relative bg-white overflow-x-hidden">

        <div class="relative h-[80vh] w-full">
            <img src="{{ asset('b1.png') }}" class="w-full h-full object-cover" alt="Hero Background">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="absolute top-[40%] left-[5%] text-white max-w-3xl z-10">
                <h1 class="text-4xl italic mb-6">
                    We offer
                    <span id="typing-text" class="text-red-600"></span>
                </h1>

                <p class="text-lg mb-6">
                    Empowering your business with strategic insights and data-driven solutions to navigate complex market
                    landscapes.
                </p>

                <button
                    class="bg-red-800 px-8 py-4 text-xl font-bold cursor-pointer hover:bg-white hover:text-red-800 transition">
                    Know More
                </button>
            </div>
        </div>

        <div class="my-20 px-10 flex flex-col items-center gap-10 text-center max-w-5xl mx-auto">
            <h1 class="text-5xl font-semibold text-gray-900">Our Strategic Expertise</h1>
            <p class="text-gray-600 text-lg">
                Vortex Consulting Group supports clients in crafting competitive strategies through the following core
                pillars.
            </p>
        </div>

<div class="relative w-[80%] mb-14">

  <input 
    type="text" 
    placeholder="Search"
    class="w-full h-14 bg-transparent outline-none 
           pr-6 text-right placeholder:text-red-900
           border-r-2 border-red-900"
  />

  <!-- Bottom full border -->
  <div class="absolute bottom-0 left-0 w-full border-b-2 border-red-900"></div>

  <!-- Top shorter border -->
  <div class="absolute top-0 right-0 w-[85%] border-t-2 border-red-900"></div>

</div>





        <div class="flex flex-col gap-24 pb-40">

            <div
                class="scroll-box parallax-wrapper w-full relative left-70 h-69 bg-red-950 ml-auto rounded-l-full shadow-2xl flex items-center">
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800"
                    class="parallax-img opacity-40" alt="Strategy">
                <div class="relative z-10 px-20 text-white">
                    <h2 class="text-4xl font-bold box-text opacity-0">Market Entry Strategy</h2>
                    <p class="pr-70 mt-4 pl-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero hic corrupti sunt fugiat quasi minus rem cumque, ut dignissimos repellendus assumenda est quod quas sed nisi quibusdam quaerat minima non excepturi officiis. Sapiente voluptate mollitia alias asperiores neque accusantium, quibusdam est consectetur eaque dolor praesentium doloremque hic delectus ipsam nulla.
                    </p>
                    <button type="submit" class="mt-4 ml-7 cursor-pointer bg-white text-red-950 px-4 py-1 rounded-md hover:bg-red-950 hover:text-white transition">Read More</button>
                </div>
            </div>
            <div
                class="scroll-box parallax-wrapper w-full relative left-70 h-69 bg-red-950 ml-auto rounded-l-full shadow-2xl flex items-center">
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800"
                    class="parallax-img opacity-40" alt="Strategy">
                <div class="relative z-10 px-20 text-white">
                    <h2 class="text-4xl font-bold box-text opacity-0">Market Entry Strategy</h2>
                    <p class="pr-70 mt-4 pl-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero hic corrupti sunt fugiat quasi minus rem cumque, ut dignissimos repellendus assumenda est quod quas sed nisi quibusdam quaerat minima non excepturi officiis. Sapiente voluptate mollitia alias asperiores neque accusantium, quibusdam est consectetur eaque dolor praesentium doloremque hic delectus ipsam nulla.
                    </p>
                    <button type="submit" class="mt-4 ml-7 cursor-pointer bg-white text-red-950 px-4 py-1 rounded-md hover:bg-red-950 hover:text-white transition">Read More</button>
                </div>
            </div>
            <div
                class="scroll-box parallax-wrapper w-full relative left-70 h-69 bg-red-950 ml-auto rounded-l-full shadow-2xl flex items-center">
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800"
                    class="parallax-img opacity-40" alt="Strategy">
                <div class="relative z-10 px-20 text-white">
                    <h2 class="text-4xl font-bold box-text opacity-0">Market Entry Strategy</h2>
                    <p class="pr-70 mt-4 pl-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero hic corrupti sunt fugiat quasi minus rem cumque, ut dignissimos repellendus assumenda est quod quas sed nisi quibusdam quaerat minima non excepturi officiis. Sapiente voluptate mollitia alias asperiores neque accusantium, quibusdam est consectetur eaque dolor praesentium doloremque hic delectus ipsam nulla.
                    </p>
                    <button type="submit" class="mt-4 ml-7 cursor-pointer bg-white text-red-950 px-4 py-1 rounded-md hover:bg-red-950 hover:text-white transition">Read More</button>
                </div>
            </div>



        </div>

    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            gsap.registerPlugin(ScrollTrigger);

            /* 1. TYPING EFFECT */
            const words = ["Customer Strategy", "Competitive Analytics", "Strategic Wargaming", "Market Entry"];
            let wordIndex = 0,
                charIndex = 0,
                isDeleting = false;
            const typingElement = document.getElementById("typing-text");

            function typeEffect() {
                const currentWord = words[wordIndex];
                typingElement.textContent = isDeleting ? currentWord.substring(0, charIndex - 1) : currentWord
                    .substring(0, charIndex + 1);
                charIndex = isDeleting ? charIndex - 1 : charIndex + 1;

                if (!isDeleting && charIndex === currentWord.length) {
                    setTimeout(() => isDeleting = true, 2000);
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    wordIndex = (wordIndex + 1) % words.length;
                }
                setTimeout(typeEffect, isDeleting ? 50 : 100);
            }
            typeEffect();

            /* 2. GSAP SCROLL ANIMATIONS */
            gsap.utils.toArray(".scroll-box").forEach((box) => {
                const img = box.querySelector(".parallax-img");
                const text = box.querySelector(".box-text");

                // Container Scale and Slide Effect
                gsap.from(box, {

                    x: 0,
                });
                gsap.to(box, {
                    scrollTrigger: {
                        trigger: box,
                        start: "top 90%",
                        end: "top 20%",
                        scrub: 1,
                    },
                    x: -60, // Slides out slightly
                    scale: 1.09,
                    ease: "power2.out"
                });

                // The Parallax Effect: Move image vertically at a different rate
                gsap.fromTo(img, {
                    y: "-20%"
                }, {
                    y: "20%",
                    ease: "none",
                    scrollTrigger: {
                        trigger: box,
                        start: "top bottom",
                        end: "bottom top",
                        scrub: true
                    }
                });

                // Text Reveal
                gsap.to(text, {
                    scrollTrigger: {
                        trigger: box,
                        start: "top 70%",
                        end: "top 40%",
                        scrub: 1,
                    },
                    opacity: 1,
                    x: 30,
                    ease: "power1.out"
                });
            });
        });
    </script>
@endpush
