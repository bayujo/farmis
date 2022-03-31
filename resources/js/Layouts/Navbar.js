import React from 'react';
import { Link } from '@inertiajs/inertia-react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCow } from '@fortawesome/free-solid-svg-icons'

export default function Navbar() {
    return (
        <section className="relative w-full px-8 text-gray-700 bg-white body-font">
            <div className="container flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
                <Link href="/" className="relative z-10 flex items-center w-auto text-2xl font-extrabold leading-none text-black select-none"><FontAwesomeIcon icon={faCow} className='pr-[0.5rem]'/>farmis.</Link>
                <nav className="top-0 left-0 z-0 flex items-center justify-center w-full h-full py-5 -ml-0 space-x-5 text-base md:-ml-5 md:py-0 md:absolute">
                    <Link href="/" className="relative font-medium leading-6 text-gray-600 transition duration-150 ease-out hover:text-gray-900" x-data="{ hover: false }">
                        <span className='block'>Home</span>
                    </Link>
                    <Link href="" className="relative font-medium leading-6 text-gray-600 transition duration-150 ease-out hover:text-gray-900" x-data="{ hover: false }">
                        <span className='block'>Features</span>
                    </Link>
                    <Link href="" className="relative font-medium leading-6 text-gray-600 transition duration-150 ease-out hover:text-gray-900" x-data="{ hover: false }">
                        <span className='block'>Pricing</span>
                    </Link>
                    <Link href="" className="relative font-medium leading-6 text-gray-600 transition duration-150 ease-out hover:text-gray-900" x-data="{ hover: false }">
                        <span className='block'>Blog</span>
                    </Link>
                </nav>
            </div>
        </section>
    )
}