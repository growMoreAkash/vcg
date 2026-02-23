<div class="fixed w-full top-0 z-30">
    <div
        class="bg-[#fffcfd] xxsm:h-[120px] sm:h-[100px] h-[90px] w-full flex justify-between items-center relative z-20">
        <!-- Hamburger -->
        <div class=" bg-gray-200 hover:bg-red-900 text-gray-800 hover:text-white rounded-xl flex justify-center items-center cursor-pointer w-15 ml-6 h-15 p-3"
            id="navMenuOpen">
            <button class="xxsm:text-5xl sm:text-3xl text-2xl  cursor-pointer">
                <i class="ri-menu-2-line"></i>
            </button>
        </div>


        <!-- Logo -->
        <a href="/" class="">
            <img src="{{ asset('logo(1).png') }}" alt="Logo" class="xxsm:w-68 sm:w-30 w-24">
        </a>

        <!-- Right Icons -->
        <div class="flex xxsm:gap-4 sm:gap-3 gap-1 xxsm:mr-10 sm:mr-6 mr-4">
            {{-- <a
                href="https://www.google.com/maps/dir/24.8973351,92.8857747/Rabdan+Academy,+VH92%2BJQP,+Chapra,+Assam+788806/@24.8882843,92.8874055,2749m/data=!3m1!1e3!4m8!4m7!1m0!1m5!1m1!1s0x374e2d7a0de10c33:0xffd2a89877fda28!2m2!1d92.5519247!2d24.8691438?entry=ttu&g_ep=EgoyMDI2MDEyOC4wIKXMDSoASAFQAw%3D%3D">
                <i class="ri-map-pin-line xxsm:text-4xl sm:text-3xl text-xl h-6 text-gray-600"></i>
            </a>
            <a href="https://wa.me/8473919145?text=Hi%20!!" target="_blank" rel="noopener noreferrer">
                <i class="ri-phone-line xxsm:text-4xl sm:text-3xl text-xl h-6 text-gray-600"></i>
            </a> --}}
            <button id="navSearchOpen" class="xxsm:text-4xl sm:text-3xl text-xl text-gray-600 h-6 cursor-pointer">
                <i class="ri-search-line"></i>
            </button>
        </div>

        <!-- MAIN MENU -->
        <div id="navMenuPanel"
            class="bg-white sm:w-[400px] w-[90%] h-screen absolute left-0 top-0 
            transition-transform duration-500 ease-in-out z-30 
            flex flex-col justify-start items-start pt-25 overflow-y-auto overflow-x-hidden -translate-x-[100%]">
            <button id="navMenuClose" class="text-2xl cursor-pointer text-gray-400 hover:text-red-900 absolute top-7 left-10">
                <i class="ri-close-line"></i>
            </button>

            <div class="flex flex-col w-full px-9 font-medel">
                <div class="w-full">
                    <a href="/"
                        class="relative flex items-center justify-between text-gray-600 cursor-pointer p-3 overflow-hidden group">

                        <div
                            class="absolute top-0 left-0 h-full w-0 bg-red-900 transition-all duration-[400ms] ease-in-out group-hover:w-full -z-10">
                        </div>

                        <div class="relative z-10 transition-colors duration-[200ms] group-hover:text-white">
                            <h1 class="text-md font-medium">Home</h1>
                        </div>
                    </a>

                    <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div>
                </div>
                <div>
                    <div class="relative flex items-center justify-between p-3 overflow-hidden group cursor-pointer">

                        <div
                            class="absolute top-0 left-0 h-full w-0 bg-red-900 transition-all duration-[400ms] ease-in-out group-hover:w-full -z-10">
                        </div>

                        <div
                            class="relative z-10 transition-colors duration-[200ms] text-gray-600 group-hover:text-white">
                            <h1 class="text-md">Services</h1>
                        </div>

                        <button
                            class="relative z-10 text-md cursor-pointer text-gray-400 transition-colors duration-[200ms] group-hover:text-white nav-submenu-open"
                            data-submenu="services">
                            <i class="ri-arrow-right-s-line"></i>
                        </button>
                    </div>

                    <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div>
                </div>

                <div>
                    <div class="relative flex items-center justify-between p-3 overflow-hidden group cursor-pointer">

                        <div
                            class="absolute top-0 left-0 h-full w-0 bg-red-900 transition-all duration-[400ms] ease-in-out group-hover:w-full -z-10">
                        </div>

                        <div
                            class="relative z-10 transition-colors duration-[200ms] text-gray-600 group-hover:text-white">
                            <h1 class="text-md">Coverage</h1>
                        </div>

                        <button
                            class="relative z-10 text-md cursor-pointer text-gray-400 transition-colors duration-[200ms] group-hover:text-white nav-submenu-open"
                            data-submenu="admission">
                            <i class="ri-arrow-right-s-line"></i>
                        </button>
                    </div>

                    <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div>
                </div>

                <div>
                    <a href="/case-studies"
                        class="relative flex items-center justify-between p-3 overflow-hidden group cursor-pointer">

                        <div
                            class="absolute top-0 left-0 h-full w-0 bg-red-900 transition-all duration-[400ms] ease-in-out group-hover:w-full -z-10">
                        </div>

                        <div
                            class="relative z-10 transition-colors duration-[200ms] text-gray-600 group-hover:text-white">
                            <h1 class="text-md">Case Studies</h1>
                        </div>

                    </a>

                    <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div>
                </div>

                <div>
                    <a href="/insight-hub"
                        class="relative flex items-center justify-between p-3 overflow-hidden group cursor-pointer">

                        <div
                            class="absolute top-0 left-0 h-full w-0 bg-red-900 transition-all duration-[400ms] ease-in-out group-hover:w-full -z-10">
                        </div>

                        <div
                            class="relative z-10 transition-colors duration-[200ms] text-gray-600 group-hover:text-white">
                            <h1 class="text-md font-medium">Insight Hub</h1>
                        </div>

                    </a>

                    <div class="sm:my-6 my-4  w-full"></div>
                </div>


            </div>

            <div
                class="bg-[#eae4e5] relative bottom-0 w-full h-full min-h-[350px] flex flex-col justify-center items-center">
                <img src="{{ asset('logo(1).png') }}" class="sm:w-[150px] w-[50px] mx-auto pt-3" alt="Logo">
                <div class="text-gray-600 flex gap-9 justify-center items-center">
                    <a href="https://www.facebook.com/academyrabdan/"><i
                            class="ri-facebook-fill cursor-pointer"></i></a>
                    <i class="ri-linkedin-box-fill cursor-pointer"></i>
                    <i class="ri-instagram-fill cursor-pointer"></i>
                    <i class="ri-twitter-x-line cursor-pointer"></i>
                    <i class="ri-youtube-fill cursor-pointer"></i>
                </div>
                <div class="flex justify-center items-center gap-5 mt-6">
                    <i class="ri-mail-line text-gray-600 text-xl mt-1"></i>
                    <h1>contact@vortexconsultgroup.com</h1>
                </div>
                <div class="mt-5 font-medel">
                    <input type="email" placeholder="Enter your email" class="bg-white py-2 px-2 sm:w-54 w-40">
                    <button
                        class="bg-black text-white py-2 px-3 cursor-pointer hover:bg-white hover:text-black hover:border-l-1">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>

        <!-- DROPDOWN MENU -->
        <div id="navMenuDropdown"
            class="bg-white sm:w-[400px] w-[90%] h-screen absolute left-0 top-0 
    transition-transform duration-500 ease-in-out z-30 
    flex justify-start items-start pt-12 px-9 overflow-y-auto overflow-x-hidden -translate-x-[100%]">

            <div class="w-full">
                <div class="flex items-center gap-3 mb-6">
                    <div class="flex justify-center items-center gap-3 bg-gray-700 text-gray-100 hover:text-gray-700 hover:bg-gray-300  rounded-md px-2 py-1 cursor-pointer"
                        id="navDropdownBack">
                        <button class=" text-xl">
                            <i class="ri-arrow-left-line"></i>
                        </button>
                        <div id="navDropdownPath" class="text-sm ">Menu</div>
                    </div>
                    <button id="navDropdownClose" class="ml-auto text-2xl cursor-pointer">
                        <i class="ri-close-line"></i>
                    </button>
                </div>

                <div class="flex flex-col w-full font-medel">

                    <!-- SERVICES SUBMENU -->
                    <div class="nav-submenu-panel hidden" data-submenu="services">
                        <div class="flex items-center justify-between">
                            <a href="/services/strategy" class="cursor-pointer">
                                <h1 class="text-md text-gray-600">Strategy</h1>
                            </a>
                            <button class="text-md cursor-pointer text-gray-400 nav-submenu-open"
                                data-submenu="services-strategy">
                                <i class="ri-arrow-right-s-line"></i>
                            </button>
                        </div>
                        <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div>

                        <div class="flex items-center justify-between">
                            <a href="/services/m&a" class="cursor-pointer">
                                <h1 class="text-md text-gray-600">M &amp; A</h1>
                            </a>
                            <button class="text-md cursor-pointer text-gray-400 nav-submenu-open"
                                data-submenu="services-ma">
                                <i class="ri-arrow-right-s-line"></i>
                            </button>
                        </div>
                        {{-- <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div> --}}
                    </div>

                    <!-- COVERAGE SUBMENU -->
                    <div class="nav-submenu-panel hidden" data-submenu="admission">
                        <a href="/services/coverage">
                            <h1 class="text-md text-gray-600">Industry Coverage</h1>
                        </a>
                        <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div>

                        <a href="/services/geographiccoverage">
                            <h1 class="text-md text-gray-600">Geographical Coverage</h1>
                        </a>
                        <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div>
                    </div>

                    <!-- SERVICES > STRATEGY -->
                    <div class="nav-submenu-panel hidden" data-submenu="services-strategy">
                        <a href="/services/strategy/corporate-business-unit-strategy">
                            <h1 class="text-md text-gray-600">Corporate &amp; Business Unit Strategy</h1>
                        </a>
                        <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div>
                        <a href="/services/strategy/market-entry-strategy">
                            <h1 class="text-md text-gray-600">Market Entry Strategy</h1>
                        </a>
                        <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div>
                        <a href="/services/strategy/strategic-wargaming">
                            <h1 class="text-md text-gray-600">Strategic Wargaming</h1>
                        </a>
                        <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div>
                        <a href="/services/strategy/competitive-benchmarking-analytics">
                            <h1 class="text-md text-gray-600">Competitive Benchmarking and Analytics</h1>
                        </a>
                        <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div>
                        <a href="/services/strategy/customer-channel-strategy">
                            <h1 class="text-md text-gray-600">Customer &amp; Channel Strategy</h1>
                        </a>
                        {{-- <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div> --}}
                    </div>

                    <!-- SERVICES > M&A -->
                    <div class="nav-submenu-panel hidden" data-submenu="services-ma">
                        <a href="/services/ma/ma-strategy">
                            <h1 class="text-md text-gray-600">M&amp;A Strategy</h1>
                        </a>
                        <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div>
                        <a href="/services/ma/target-screening">
                            <h1 class="text-md text-gray-600">Target Screening</h1>
                        </a>
                        <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div>
                        <a href="/services/ma/commercial-due-diligence">
                            <h1 class="text-md text-gray-600">Commercial Due Diligence</h1>
                        </a>
                        <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div>
                        <a href="/services/ma/shareholder-value-management">
                            <h1 class="text-md text-gray-600">Shareholder Value Management</h1>
                        </a>
                        <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div>
                        <a href="/services/ma/portfolio-strategy">
                            <h1 class="text-md text-gray-600">Portfolio Strategy</h1>
                        </a>
                        {{-- <div class="border-b-1 sm:my-6 my-4 border-gray-300 w-full"></div> --}}
                    </div>

                </div>
            </div>
        </div>


        <!-- OVERLAYS -->
        <div id="navOverlayMenu" class="fixed inset-0 bg-black/20 z-[5] hidden"></div>
        <div id="navOverlayDropdown" class="fixed inset-0 bg-black/20 z-[5] hidden"></div>

        <!-- SEARCH OVERLAY (minimal) -->
        <div id="navSearchOverlay" class="fixed inset-0 bg-black/30 z-[40] hidden">
            <div class="absolute inset-0 flex items-start justify-center pt-24">
                <div class="bg-white w-[90%] sm:w-[500px] p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Search</h3>
                        <button id="navSearchClose" class="text-gray-400 text-2xl">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                    <input type="text" placeholder="Type to search..."
                        class="w-full border border-gray-300 px-4 py-3 text-lg outline-none focus:border-red-800">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        const menuPanel = document.getElementById('navMenuPanel');
        const menuOpen = document.getElementById('navMenuOpen');
        const menuClose = document.getElementById('navMenuClose');
        const dropdownPanel = document.getElementById('navMenuDropdown');
        const dropdownClose = document.getElementById('navDropdownClose');
        const dropdownBack = document.getElementById('navDropdownBack');
        const dropdownPath = document.getElementById('navDropdownPath');
        const overlayMenu = document.getElementById('navOverlayMenu');
        const overlayDropdown = document.getElementById('navOverlayDropdown');
        const submenuButtons = document.querySelectorAll('.nav-submenu-open');
        const submenuPanels = document.querySelectorAll('.nav-submenu-panel');

        const searchOpen = document.getElementById('navSearchOpen');
        const searchClose = document.getElementById('navSearchClose');
        const searchOverlay = document.getElementById('navSearchOverlay');

        const openMenu = () => {
            menuPanel.classList.remove('-translate-x-[100%]');
            overlayMenu.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        };

        const closeMenu = () => {
            menuPanel.classList.add('-translate-x-[100%]');
            overlayMenu.classList.add('hidden');
            dropdownPanel.classList.add('-translate-x-[100%]');
            overlayDropdown.classList.add('hidden');
            document.body.style.overflow = 'auto';
        };

        const submenuTitles = {
            services: 'Services',
            admission: 'Coverage',
            'services-strategy': 'Services / Strategy',
            'services-ma': 'Services / M&A'
        };

        const dropdownStack = [];

        const updateDropdownView = (key) => {
            submenuPanels.forEach(panel => {
                panel.classList.toggle('hidden', panel.dataset.submenu !== key);
            });
            dropdownPath.textContent = submenuTitles[key] || 'Menu';
        };

        const openDropdown = (key) => {
            if (!key) return;
            dropdownPanel.classList.remove('-translate-x-[100%]');
            overlayDropdown.classList.remove('hidden');
            dropdownStack.push(key);
            updateDropdownView(key);
        };

        const closeDropdown = () => {
            dropdownPanel.classList.add('-translate-x-[100%]');
            overlayDropdown.classList.add('hidden');
            dropdownStack.length = 0;
            dropdownPath.textContent = 'Menu';
        };

        const goBackDropdown = () => {
            dropdownStack.pop();
            const previous = dropdownStack[dropdownStack.length - 1];
            if (previous) {
                updateDropdownView(previous);
            } else {
                closeDropdown();
            }
        };

        const openSearch = () => {
            searchOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        };

        const closeSearch = () => {
            searchOverlay.classList.add('hidden');
            document.body.style.overflow = 'auto';
        };

        menuOpen.addEventListener('click', openMenu);
        menuClose.addEventListener('click', closeMenu);
        overlayMenu.addEventListener('click', closeMenu);

        submenuButtons.forEach(btn => {
            btn.addEventListener('click', () => openDropdown(btn.dataset.submenu));
        });

        dropdownClose.addEventListener('click', closeDropdown);
        dropdownBack.addEventListener('click', goBackDropdown);
        overlayDropdown.addEventListener('click', closeDropdown);

        searchOpen.addEventListener('click', openSearch);
        searchClose.addEventListener('click', closeSearch);
        searchOverlay.addEventListener('click', (e) => {
            if (e.target === searchOverlay) closeSearch();
        });
    })();
</script>
