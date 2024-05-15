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

    <style type="text/tailwindcss">
        @layer components {
            .li-benefits {
                @apply font-medium text-base text-stream-dark capitalize;
            }

            .pricing-card {
                @apply flex flex-col p-[30px] bg-white rounded-2xl w-full lg:w-[330px] md:max-w-max lg:max-w-[330px];
            }
        }
    </style>
</head>

<body class="bg-stream-dark">

    <div class="relative">
        <div class="hidden lg:block fixed">
            <img src="{{ asset('stream/assets/images/banner.png') }}" class="max-h-screen" alt="stream" />
        </div>
    </div>
    <div class="grid md:grid-cols-12 font-poppins relative pb-20">

        <!-- Ornament -->
        <span class="fixed -z-10 top-0">
            <img src="{{ asset('stream/assets/images/pricing_ornament.svg') }}" class="h-screen w-screen"
                alt="stream" />
        </span>
        <!-- ./ -->

        <div class="col-span-12 col-start-1 lg:col-start-2 xl:col-start-4">
            <div class="px-5 lg:px-[60px] pt-[30px] relative">
                <!-- jika user sudah login maka ada profilenya -->
                @if (auth()->user())
                    @include('member.layouts.navbar')
                @endif

                <div class="pt-[85px] flex flex-col items-center gap-5">
                    <p class="text-sky-300 text-base font-semibold">
                        START TODAY
                    </p>
                    <div class="font-bold text-white text-4xl lg:text-[45px] text-center capitalize leading-snug">
                        Up Your Imagination
                    </div>

                    <!-- Card Content -->
                    <div class="mt-[70px] flex justify-center gap-[40px] flex-wrap">
                        <!-- Card -->
                        <div class="pricing-card">
                            <p class="text-stream-dark font-medium text-base">
                                {{ ucwords($standart->name) }}
                            </p>
                            <div class="text-3xl text-stream-dark font-semibold my-1">
                                Rp {{ number_format($standart->price) }}
                            </div>
                            <p class="text-sm text-stream-gray">
                                /bulan
                            </p>
                            <hr class="my-[30px]">

                            <!-- item benefits -->
                            <div class="flex flex-col gap-6">
                                <!-- benefits -->
                                <div class="flex items-center justify-between gap-3">
                                    <span class="li-benefits">
                                        {{ $standart->max_users }} Users Limits
                                    </span>
                                    <img src="{{ asset('stream/assets/images/ic_check.svg') }}" alt="stream" />
                                </div>
                                <!-- benefits -->
                                <div class="flex items-center justify-between gap-3">
                                    <span class="li-benefits">
                                        720 & 1080 full HD
                                    </span>
                                    <img src="{{ asset('stream/assets/images/ic_check.svg') }}" alt="stream" />
                                </div>
                                <!-- benefits -->
                                <div class="flex items-center justify-between gap-3">
                                    <span class="li-benefits">
                                        TV & Laptop Streaming
                                    </span>
                                    <img src="{{ asset('stream/assets/images/ic_check.svg') }}" alt="stream" />
                                </div>
                                <!-- benefits -->
                                <div class="flex items-center justify-between gap-3">
                                    <span class="li-benefits">
                                        180 Movies Available
                                    </span>
                                    <img src="{{ asset('stream/assets/images/ic_check.svg') }}" alt="stream" />
                                </div>
                                <!-- benefits -->
                                <div class="flex items-center justify-between gap-3">
                                    <span class="li-benefits">
                                        24 Origin Countries
                                    </span>
                                    <img src="{{ asset('stream/assets/images/ic_check.svg') }}" alt="stream" />
                                </div>
                            </div>

                            <form action="{{ route('member.transaction.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="package_id" value="{{ $standart->id }}">
                                <button type="submit"
                                    class="mt-10 py-4 px-6 block bg-indigo-600 rounded-full text-center">
                                    <span class="text-white text-base font-semibold">
                                        Subscribe
                                        Now
                                    </span>
                                </button>
                            </form>
                        </div>
                        <!-- Card -->
                        <div class="pricing-card">
                            <p class="text-stream-dark font-medium text-base">
                                {{ ucwords($gold->name) }}
                            </p>
                            <div class="text-3xl text-stream-dark font-semibold my-1">
                                Rp {{ number_format($gold->price) }}
                            </div>
                            <p class="text-sm text-stream-gray">
                                /bulan
                            </p>
                            <hr class="my-[30px]">

                            <!-- item benefits -->
                            <div class="flex flex-col gap-6">
                                <!-- benefits -->
                                <div class="flex items-center justify-between gap-3">
                                    <span class="li-benefits">
                                        {{ $gold->max_users }} Users Limits
                                    </span>
                                    <img src="{{ asset('stream/assets/images/ic_check.svg') }}" alt="stream" />
                                </div>
                                <!-- benefits -->
                                <div class="flex items-center justify-between gap-3">
                                    <span class="li-benefits">
                                        Up to 8K Quality
                                    </span>
                                    <img src="{{ asset('stream/assets/images/ic_check.svg') }}" alt="stream" />
                                </div>
                                <!-- benefits -->
                                <div class="flex items-center justify-between gap-3">
                                    <span class="li-benefits">
                                        All Platforms Streaming
                                    </span>
                                    <img src="{{ asset('stream/assets/images/ic_check.svg') }}" alt="stream" />
                                </div>
                                <!-- benefits -->
                                <div class="flex items-center justify-between gap-3">
                                    <span class="li-benefits">
                                        900+ Movies Available
                                    </span>
                                    <img src="{{ asset('stream/assets/images/ic_check.svg') }}" alt="stream" />
                                </div>
                                <!-- benefits -->
                                <div class="flex items-center justify-between gap-3">
                                    <span class="li-benefits">
                                        120 Origin Countries
                                    </span>
                                    <img src="{{ asset('stream/assets/images/ic_check.svg') }}" alt="stream" />
                                </div>
                            </div>

                            <form action="{{ route('member.transaction.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="package_id" value="{{ $gold->id }}">
                                <button type="submit"
                                    class="mt-10 py-4 px-6 block bg-indigo-600 rounded-full text-center">
                                    <span class="text-white text-base font-semibold">
                                        Subscribe
                                        Now
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('stream/assets/script/script.js') }}"></script>
</body>

</html>
