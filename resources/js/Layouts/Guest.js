import React from 'react';
import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/inertia-react';

export default function Guest({ children }) {
    return (
        <body>
            <section>
                <div class="w-full px-8 py-60 xl:px-8">
                    <div class="max-w-5xl mx-auto">
                        <div class="flex flex-col items-center md:flex-row">
                            <div class="w-full space-y-5 md:w-3/5 md:pr-16">
                                <p class="font-medium text-blue-500 uppercase">Building Businesses</p>
                                <h2 class="text-2xl font-extrabold leading-none text-black sm:text-3xl md:text-5xl">
                                    Changing The Way People Do Business.
                                </h2>
                                <p class="text-xl text-gray-600 md:pr-16">Learn how to engage with your visitors and teach them about your mission. We're revolutionizing the way customers and businesses interact.</p>
                            </div>
                            <div class="w-full mt-16 md:mt-0 md:w-2/5">
                                <div class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                                    {children}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </body>
        
    );
}
