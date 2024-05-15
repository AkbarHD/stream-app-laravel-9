<!-- Navbar -->
<div class="flex justify-between items-center">
    <div class="flex flex-col gap-[10px]">
        <div class="font-bold text-[32px] text-white">
            @yield('title')
        </div>
        <p class="mb-0 text-stream-gray text-base">@yield('title-description')</p>
    </div>
    <div class="flex items-center gap-[26px]">
        <span class="text-white text-base">Welcome, {{ auth()->user()->name }}</span>
        <!-- user avatar -->
        <div class="collapsible-dropdown flex flex-col gap-2 relative">
            <a href="#!" class="outline outline-2 outline-stream-gray p-[6px] rounded-full w-[60px] dropdown-button"
                data-target="#dropdown-stream">
                <img src="{{ asset('stream/assets/images/photo.png') }}" class="rounded-full object-cover w-full"
                    alt="stream" />
            </a>
            <div class="bg-white rounded-2xl text-stream-dark font-medium flex flex-col gap-1 absolute z-[999] right-0 top-[80px] min-w-[180px] hidden overflow-hidden"
                id="dropdown-stream">
                <a href="dashboard.html" class="transition-all hover:bg-sky-100 p-4">Watch</a>
                <a href="#!" class="transition-all hover:bg-sky-100 p-4">Settings</a>
                <a href="{{ route('member.logout') }}" class="transition-all hover:bg-sky-100 p-4">Sign Out</a>
            </div>
        </div>
    </div>
</div>
<!-- /Navbar -->
