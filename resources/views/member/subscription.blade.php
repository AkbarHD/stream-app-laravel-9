@extends('member.layouts.base')

@section('title', 'Subscription')

@section('title-description', 'Our selected movies for your mood')

@section('content')

    <!-- Subscription Stat -->
    <div class="flex items-center gap-3">
        <img src="{{ asset('stream/assets/images/ic_subscription.svg') }}" alt="">
        <div class="flex flex-col gap-2">
            <div class="text-white text-[22px] font-semibold">
                {{ ucwords($user_premium->Package->name) }}
            </div>
            <div class="flex items-center gap-[10px]">
                <div class="progress-bar w-[248px] h-[6px] bg-softpur rounded-full">
                    <div class="progress bg-[#22C58B] w-[113px] h-full rounded-full"></div>
                </div>
                <div class="text-stream-gray text-sm">
                    11 / 30 days
                </div>
            </div>
        </div>
    </div>
    <!-- /Subscription Stat -->

    <!-- Benefits -->
    <div class="flex flex-col gap-6 font-medium text-base text-white -mt-[10px] px-[18px]">
        <div class="flex gap-4 items-center">
            <img src="{{ asset('stream/assets/images/ic_check-dark.svg') }}" alt="">
            <span> {{ $user_premium->Package->max_users }} Users Limits</span>
        </div>
        <div class="flex gap-4 items-center">
            <img src="{{ asset('stream/assets/images/ic_check-dark.svg') }}" alt="">
            <span>Up to 8K Quality</span>
        </div>
        <div class="flex gap-4 items-center">
            <img src="{{ asset('stream/assets/images/ic_check-dark.svg') }}" alt="">
            <span>All Platforms Streaming</span>
        </div>
        <div class="flex gap-4 items-center">
            <img src="{{ asset('stream/assets/images/ic_check-dark.svg') }}" alt="">
            <span>900+ Movies Available</span>
        </div>
        <div class="flex gap-4 items-center">
            <img src="{{ asset('stream/assets/images/ic_check-dark.svg') }}" alt="">
            <span>120 Origin Countries</span>
        </div>
    </div>
    <!-- /Benefits -->

    <!-- Action Button -->
    <div class="flex flex-col gap-[14px] max-w-max">
        <a href="#!" class="py-[13px] px-[58px] bg-[#5138ED] rounded-full text-center">
            <span class="text-white font-semibold text-base">
                Make a Renewal
            </span>
        </a>
        <a href="#!"
            class="py-[13px] px-[58px] outline outline-1 outline-stream-gray outline-offset-[-3px] rounded-full text-center">
            <span class="text-stream-gray font-normal text-base">
                Change Plan
            </span>
        </a>
    </div>
    <!-- /Action Button -->

    <!-- Stop Subscribe -->
    <div class="rounded-2xl bg-[#19152E] p-[30px] w-max">
        <div class="text-xl text-red-500 font-semibold">
            Danger Zone
        </div>
        <p class="text-base text-white leading-[30px] max-w-[500px] mt-3 mb-[30px]">
            If you wish to stop subscribe our movies please continue
            by clicking the button below. Make sure that you have read our
            terms & conditions beforehand.
        </p>
        <a href="#!" class="px-[19px] py-[13px] bg-[#FE4848] rounded-full text-center">
            <span class="text-white font-semibold text-base">
                Stop Subscribe
            </span>
        </a>
    </div>
    <!-- /Stop Subscribe -->
@endsection
