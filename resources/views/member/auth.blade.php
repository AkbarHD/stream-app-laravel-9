<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stream</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");
    </style>

    <script src="{{ asset('stream/assets/script/tailwind-config.js') }}"></script>
</head>

<body class="bg-stream-dark">

    <div class="relative">
        <div class="hidden lg:block fixed">
            <img src="{{ asset('stream/assets/images/banner.png') }}" class="max-h-screen" alt="stream" />
        </div>
    </div>

    <div class="grid md:grid-cols-12 font-poppins relative pb-20 pt-8 mx-auto max-w-screen overflow-hidden">

        <!-- Ornament -->
        <span class="fixed -z-10 top-0">
            <img src="{{ asset('stream/assets/images/pricing_ornament.svg') }}" class="h-screen w-screen"
                alt="stream" />
        </span>
        <!-- ./ -->

        <div class="col-span-12 col-start-1 lg:col-start-2 xl:col-start-4">
            <div class="pt-[30px] relative">
                <!-- Logo -->
                <div class=" flex flex-row justify-center items-center">
                    <a href="/" class="block">
                        <img src="{{ asset('stream/assets/images/stream.svg') }}" alt="stream" />
                    </a>
                </div>

                <div class="pt-[85px] flex flex-col items-center gap-5 px-3">
                    <p class="text-sky-300 text-base font-semibold">
                        WELCOME BACK
                    </p>
                    <div class="font-bold text-white text-4xl lg:text-[45px] text-center capitalize leading-snug">
                        Watch New Movie
                    </div>

                    <!-- Form login -->
                    <section class="w-11/12 max-w-[460px]">
                        <form action="{{ route('member.login.auth') }}" method="POST"
                            class="mt-[70px] flex flex-col bg-white p-[30px] rounded-2xl gap-6">
                            @csrf
                            <div class="form-input flex flex-col gap-3">
                                <label for="email" class="text-base font-medium text-stream-dark">Email
                                    Address</label>
                                <input type="text" name="email"
                                    class="rounded-full py-3 pr-3 pl-6 text-stream-dark placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base focus:outline-indigo-600 input-stream"
                                    placeholder="Your email address" value="{{ old('email') }}" />
                                @error('email')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-input flex flex-col gap-3">
                                <label for="password" class="text-base font-medium text-stream-dark">Password</label>
                                <input type="password" name="password"
                                    class="rounded-full py-3 pr-3 pl-6 text-stream-dark placeholder:text-stream-gray placeholder:font-normal font-medium outline-stream-gray outline outline-1 text-base focus:outline-indigo-600 input-stream"
                                    placeholder="Your password" value="{{ old('password') }}" />
                                @error('password')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            @error('credentials')
                                <div style="color: red; margin: auto">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="bg-indigo-600 rounded-full py-3 mt-4 text-center">
                                <span class="font-semibold text-white text-base">Continue</span>
                            </button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('stream/assets/script/script.js') }}"></script>

</body>

</html>
