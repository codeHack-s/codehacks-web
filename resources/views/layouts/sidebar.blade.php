<div class="drawer">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <!-- Page content here -->
    </div>
    <div class="z-40 drawer-side">
        <label for="my-drawer" class="drawer-overlay"></label>
        <div class="menu p-4 pt-[100px] w-64 h-full bg-base-200 text-base-content gap-4 flex flex-col justify-start items-start">
            <!-- Sidebar content here -->

            <a class="side" href="{{ route('courses.index') }}" >
                <i class="fa-solid fa-graduation-cap"></i>
                <div class="">
                    Courses
                </div>
            </a>

            <a class="side" href="{{ route('lessons.index') }}" >
                <i class="fa-regular fa-circle-play"></i>
                <div class="">
                    Lessons
                </div>
            </a>

            <a class="side" href="{{ route('events.index') }}" >
                <i class="fa-regular fa-calendar"></i>
                <div class="">
                    Events
                </div>
            </a>

            <a class="side" href="{{ route('connect.index') }}" >
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

        </div>
    </div>
</div>
