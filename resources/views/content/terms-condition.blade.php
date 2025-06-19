@extends('layout.headerFooter')

@section('content')
    <section class="mt-28 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:flex sm:items-start lg:px-6 lg:py-16">
            <!-- Back Button -->
            <button class="sm:mb-4 sm:me-16" onclick="history.back()">
                <svg class="h-8 w-8 text-gray-800 sm:h-16 sm:w-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m14 8-4 4 4 4" />
                </svg>
            </button>

            <!-- Content Section -->
            <div class="w-full rounded-3xl bg-lightblue px-12 py-11 shadow-lg">
                {{-- Alumni Details --}}
                <div class="mb-7 text-cyan">
                    <h1 class="text-xl">Terms of Service</h1>
                    <h2 class="mb-6 text-xl">Effective Date: March 21, 2025</h2>
                    <p class="text-base">Welcome to Pokari ("we," "our," or "us"). By accessing and using our website
                        pokari.trpl.space ("Website"), you agree to comply with and be bound by these Terms of Service
                        ("Terms"). If you do not agree to these Terms, please do not use our Website.</p>
                </div>
                <div class="space-y-6 text-cyan">
                    <div>
                        <h3 class="text-xl">1. General Information</h3>
                        <p>Pokari is an online platform designed to connect alumni and students, providing job listings and
                            company information. This Website is intended for individual use and is not associated with any
                            business entity.</p>
                    </div>
                    <div>
                        <h3 class="text-xl">2. User Accounts</h3>
                        <ul class="ms-2 list-inside list-disc">
                            <li>Users can register and log in using Google Login.</li>
                            <li>By creating an account, you agree to provide accurate and up-to-date information, including
                                name, email, job title, and password.</li>
                            <li>There are no age restrictions for using this Website.</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl">3. Data and Privacy</h3>
                        <ul class="ms-2 list-inside list-disc">
                            <li>We do not collect or track users' data using digital analytics software.</li>
                            <li>We do not use Facebook Pixel, retargeting, or any third-party advertising tools.</li>
                            <li>We do not display ads on our Website.</li>
                            <li>We use Sessions to manage user logins and preferences.</li>
                            <li>We do not send newsletters or promotional emails.</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl">4. Payments and Transactions</h3>
                        <p>Pokari does not process online payments or any form of financial transactions.</p>
                    </div>
                    <div>
                        <h3 class="text-xl">5. User Responsibilities</h3>
                        <ul class="ms-2 list-inside list-disc">
                            <li>Users must ensure that the information provided on their profiles is correct.</li>
                            <li>Any misuse, unauthorized access, or attempt to disrupt the Website may result in account
                                suspension or termination.</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl">6. Limitation of Liability</h3>
                        <ul class="ms-2 list-inside list-disc">
                            <li>We provide this Website "as is" without any warranties or guarantees.</li>
                            <li>We are not responsible for any errors, inaccuracies, or service interruptions.</li>
                            <li>We are not liable for any damages resulting from the use of our Website.</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl">7. Contact Information</h3>
                        <p>For any questions or concerns regarding these Terms, you can contact us at pokari@gmail.com.</p>
                    </div>
                    <div>
                        <h3 class="text-xl">8. Modifications to Terms</h3>
                        <p>We reserve the right to modify these Terms at any time. Any changes will be effective immediately
                            upon posting on this page. Continued use of the Website after any modifications indicates your
                            acceptance of the revised Terms.</p>
                    </div>
                    <p>Thank you for using Pokari</p>
                </div>
            </div>
        </div>
    </section>
@endsection
