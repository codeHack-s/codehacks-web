<div class="drawer w-0 md:w-64 md:drawer-open">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="">

    </div>
    <div class="z-40 drawer-side">
        <label for="my-drawer" class="drawer-overlay"></label>

        <div class="menu overflow-clip p-4 pt-[70px] w-64 h-full bg-base-100 border-r border-gray-500 text-base-content gap-3 flex flex-col justify-start items-start">
            <!-- App Logo -->

            <div class="flex items-center w-full justify-center gap-4">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block p-2 w-[100px] fill-current text-gray-800" />
                </a>
            </div>

            <!-- Sidebar content here -->
            <a class="side" href="{{ route('dashboard') }}" >
                <i class="fa-solid fa-home-lg"></i>
                <div class="">
                    Dashboard
                </div>
            </a>

            <a class="side" href="" >
                <i class="fa-solid fa-graduation-cap"></i>
                <div class="">
                    Courses
                </div>
            </a>

            <a class="side" href="" >
                <i class="fa-regular fa-circle-play"></i>
                <div class="">
                    Videos
                </div>
            </a>

            <a class="side" href="" >
                <i class="fa-regular fa-calendar"></i>
                <div class="">
                    Events
                </div>
            </a>

            <a class="side" href="" >
                <i class="fa-solid fa-circle-nodes"></i>
                <div class="">
                    Connect
                </div>
            </a>

            <a class="side" href="{{ route('profile.edit') }}" >
                <i class="fa-regular fa-circle-user"></i>
                <div class="">
                    Account
                </div>
            </a>

            <!--Light Mode-->

            <div class="side">
                <!-- Dark Mode Switch -->
                <label class="swap swap-rotate">
                    <!-- this hidden checkbox controls the state -->
                    <input class="hidden" id="theme-switch" type="checkbox"/>

                    <!-- sun icon -->
                    <svg class="swap-on fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/>
                    </svg>

                    <!-- moon icon -->
                    <svg class="swap-off fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"/>
                    </svg>
                </label>

                <span id="theme-button">
                    Change Mode
                </span>

                <script>

                    const fetchUrl = "{{ route('get-theme') }}"
                    const setUrl = "{{ route('set-theme') }}"
                    // Function to set the theme in session

                    const setThemeInSession = (theme) => {
                        fetch(setUrl, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({theme}),
                        })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Failed to set theme in session.');
                                }
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    };

                    // Function to get the theme from session
                    const getThemeFromSession = () => {
                        return fetch(fetchUrl, {
                            method: 'GET',
                        })
                            .then(response => {
                                if (response.ok) {
                                    return response.json();
                                } else {
                                    throw new Error('Failed to get theme from session.');
                                }
                            })
                            .then(data => {
                                return data.theme;
                            })
                            .catch(error => {
                                console.error(error);
                                return 'light';
                            });
                    };

                    // Function to apply the saved theme
                    const applySavedTheme = () => {
                        getThemeFromSession().then(savedTheme => {
                            const html = document.querySelector('html');
                            const themeSwitch = document.querySelector('#theme-switch');

                            html.setAttribute('data-theme', savedTheme);

                            themeSwitch.checked = savedTheme === 'dark';
                            /*
                            if (savedTheme === 'dark') {
                                themeSwitch.checked = true; // Check the switch
                            } else {
                                themeSwitch.checked = false; // Uncheck the switch
                            }
                            */
                        });
                    };

                    // Get the theme switch checkbox
                    const themeSwitch = document.querySelector('#theme-switch');

                    // Add a change event listener to the theme switch
                    themeSwitch.addEventListener('change', () => {
                        const html = document.querySelector('html');

                        if (themeSwitch.checked) {
                            // If the switch is checked (dark mode)
                            html.setAttribute('data-theme', 'dark');
                            setThemeInSession('dark'); // Save the theme in session
                        } else {
                            // If the switch is not checked (light mode)
                            html.setAttribute('data-theme', 'light');
                            setThemeInSession('light'); // Save the theme in session
                        }
                    });

                    const themeButton = document.querySelector('#theme-button');

                    themeButton.addEventListener('click', () => {
                        const html = document.querySelector('html');
                        const currentTheme = html.getAttribute('data-theme');

                        if (currentTheme === 'dark') {
                            html.setAttribute('data-theme', 'light');
                            setThemeInSession('light'); // Save the theme in session
                        } else {
                            html.setAttribute('data-theme', 'dark');
                            setThemeInSession('dark'); // Save the theme in session
                        }
                    });

                    // Apply the saved theme when the page loads
                    window.addEventListener('load', () => {
                        applySavedTheme();
                    });

                </script>

            </div>

        </div>
    </div>
</div>
