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
                    <h1 class="text-xl">Privacy Policy</h1>
                    <h2 class="mb-6 text-xl">Effective Date: March 21, 2025</h2>
                    <p class="text-base">Welcome to Pokari (pokari.trpl.space). Your privacy is important to us. This
                        Privacy Policy explains
                        how we collect, use, and protect your personal information when you use our platform.</p>
                </div>
                <div class="space-y-6 text-cyan">
                    <div>
                        <h3 class="text-xl">1. Information We Collect</h3>
                        <p>We collect the following personal information when you register and use Pokari:</p>
                        <ul class="ms-2 list-inside list-disc">
                            <li>Name</li>
                            <li>Email</li>
                            <li>Job Title</li>
                            <li>Description</li>
                        </ul>
                        <p>We do not collect any other personal data beyond what is required for platform
                            functionality.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl">2. How We Use Your Information</h3>
                        <p>Your personal information is used solely for the following purposes:</p>
                        <ul class="ms-2 list-inside list-disc">
                            <li>Providing access to the platform</li>
                            <li>Identifying users within the system</li>
                            <li>Ensuring secure authentication through Google Login</li>
                        </ul>
                        <p>We do not use your information for advertising, retargeting, or analytics tracking.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl">3. Data Protection and Security</h3>
                        <p>We take appropriate measures to secure your personal data. We use session-based authentication to
                            manage user access. Your information is stored securely and is not shared with third parties.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl">4. Third-Party Services</h3>
                        <ul class="ms-2 list-inside list-disc">
                            <li>We use Google Login for authentication.</li>
                            <li>We do not use Facebook Pixel, retargeting tools, digital analytics software, or advertising
                                services.</li>
                            <li>Pokari does not process payments online or collect financial information.</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl">5. Communication and Contact</h3>
                        <ul class="ms-2 list-inside list-disc">
                            <li>We do not send newsletters or promotional emails.</li>
                            <li>If you have any concerns or inquiries, you can contact us at pokari@gmail.com.</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl">6. Changes to This Policy</h3>
                        <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page with
                            an updated effective date.</p>
                    </div>
                    <p>By using Pokari, you agree to the terms of this Privacy Policy. If you do not agree, please
                        discontinue use of the platform.</p>
                    <p>For further questions, contact us at pokari@gmail.com.</p>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
