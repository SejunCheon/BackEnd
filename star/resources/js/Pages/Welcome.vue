<template>
    <v-app>
        <Main />

        <div
            class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0"
        >
            <div
                v-if="canLogin"
                class="hidden fixed top-0 right-0 px-6 py-4 sm:block"
            >
                <inertia-link
                    v-if="$page.props.user"
                    href="/posts"
                    class="text-sm text-gray-700 underline px-4"
                >
                    Main
                </inertia-link>

                <inertia-link
                    v-if="$page.props.user"
                    href="/dashboard"
                    class="text-sm text-gray-700 underline"
                >
                    Dashboard
                </inertia-link>

                <template v-else>
                    <inertia-link
                        :href="route('login')"
                        class="text-sm text-gray-700 underline"
                    >
                        Login
                    </inertia-link>

                    <inertia-link
                        v-if="canRegister"
                        :href="route('register')"
                        class="ml-4 text-sm text-gray-700 underline"
                    >
                        Register
                    </inertia-link>
                </template>
            </div>

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="100"
                        height="100"
                        fill="currentColor"
                        class="bi bi-apple"
                        viewBox="0 0 16 16"
                    >
                        <path
                            d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282z"
                        />
                        <path
                            d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282z"
                        />
                    </svg>
                </div>

                <div
                    class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg"
                >
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                    class="w-8 h-8 text-gray-500"
                                >
                                    <path
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                    ></path>
                                </svg>
                                <div
                                    class="ml-4 text-lg leading-7 font-semibold"
                                >
                                    <a
                                        href="https://laravel.com/docs"
                                        class="underline text-gray-900 dark:text-white"
                                        >Documentation</a
                                    >
                                </div>
                            </div>

                            <div class="ml-12">
                                <div
                                    class="mt-2 text-gray-600 dark:text-gray-400 text-sm"
                                >
                                    Laravel has wonderful, thorough
                                    documentation covering every aspect of the
                                    framework. Whether you are new to the
                                    framework or have previous experience with
                                    Laravel, we recommend reading all of the
                                    documentation from beginning to end.
                                </div>
                            </div>
                        </div>

                        <div
                            class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l"
                        >
                            <div class="flex items-center">
                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                    class="w-8 h-8 text-gray-500"
                                >
                                    <path
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
                                    ></path>
                                    <path
                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"
                                    ></path>
                                </svg>
                                <div
                                    class="ml-4 text-lg leading-7 font-semibold"
                                >
                                    <a
                                        href="https://laracasts.com"
                                        class="underline text-gray-900 dark:text-white"
                                        >Laracasts</a
                                    >
                                </div>
                            </div>

                            <div class="ml-12">
                                <div
                                    class="mt-2 text-gray-600 dark:text-gray-400 text-sm"
                                >
                                    Laracasts offers thousands of video
                                    tutorials on Laravel, PHP, and JavaScript
                                    development. Check them out, see for
                                    yourself, and massively level up your
                                    development skills in the process.
                                </div>
                            </div>
                        </div>

                        <div
                            class="p-6 border-t border-gray-200 dark:border-gray-700"
                        >
                            <div class="flex items-center">
                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                    class="w-8 h-8 text-gray-500"
                                >
                                    <path
                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                                    ></path>
                                </svg>
                                <div
                                    class="ml-4 text-lg leading-7 font-semibold"
                                >
                                    <a
                                        href="https://laravel-news.com/"
                                        class="underline text-gray-900 dark:text-white"
                                        >Laravel News</a
                                    >
                                </div>
                            </div>

                            <div class="ml-12">
                                <div
                                    class="mt-2 text-gray-600 dark:text-gray-400 text-sm"
                                >
                                    Laravel News is a community driven portal
                                    and newsletter aggregating all of the latest
                                    and most important news in the Laravel
                                    ecosystem, including new package releases
                                    and tutorials.
                                </div>
                            </div>
                        </div>

                        <div
                            class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l"
                        >
                            <div class="flex items-center">
                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                    class="w-8 h-8 text-gray-500"
                                >
                                    <path
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                                <div
                                    class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white"
                                >
                                    Vibrant Ecosystem
                                </div>
                            </div>

                            <div class="ml-12">
                                <div
                                    class="mt-2 text-gray-600 dark:text-gray-400 text-sm"
                                >
                                    Laravel's robust library of first-party
                                    tools and libraries, such as
                                    <a
                                        href="https://forge.laravel.com"
                                        class="underline"
                                        >Forge</a
                                    >,
                                    <a
                                        href="https://vapor.laravel.com"
                                        class="underline"
                                        >Vapor</a
                                    >,
                                    <a
                                        href="https://nova.laravel.com"
                                        class="underline"
                                        >Nova</a
                                    >, and
                                    <a
                                        href="https://envoyer.io"
                                        class="underline"
                                        >Envoyer</a
                                    >
                                    help you take your projects to the next
                                    level. Pair them with powerful open source
                                    libraries like
                                    <a
                                        href="https://laravel.com/docs/billing"
                                        class="underline"
                                        >Cashier</a
                                    >,
                                    <a
                                        href="https://laravel.com/docs/dusk"
                                        class="underline"
                                        >Dusk</a
                                    >,
                                    <a
                                        href="https://laravel.com/docs/broadcasting"
                                        class="underline"
                                        >Echo</a
                                    >,
                                    <a
                                        href="https://laravel.com/docs/horizon"
                                        class="underline"
                                        >Horizon</a
                                    >,
                                    <a
                                        href="https://laravel.com/docs/sanctum"
                                        class="underline"
                                        >Sanctum</a
                                    >,
                                    <a
                                        href="https://laravel.com/docs/telescope"
                                        class="underline"
                                        >Telescope</a
                                    >, and more.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="flex justify-center mt-4 sm:items-center sm:justify-between"
                >
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                class="-mt-px w-5 h-5 text-gray-400"
                            >
                                <path
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                ></path>
                            </svg>

                            <a
                                href="https://laravel.bigcartel.com"
                                class="ml-1 underline"
                            >
                                Shop
                            </a>

                            <svg
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                class="ml-4 -mt-px w-5 h-5 text-gray-400"
                            >
                                <path
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                ></path>
                            </svg>

                            <a
                                href="https://github.com/sponsors/taylorotwell"
                                class="ml-1 underline"
                            >
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div
                        class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0"
                    >
                        Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                    </div>
                </div>
            </div>
        </div>
    </v-app>
</template>

<style scoped>
.bg-gray-100 {
    background-color: #f7fafc;
    background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
}

.border-gray-200 {
    border-color: #edf2f7;
    border-color: rgba(237, 242, 247, var(--tw-border-opacity));
}

.text-gray-400 {
    color: #cbd5e0;
    color: rgba(203, 213, 224, var(--tw-text-opacity));
}

.text-gray-500 {
    color: #a0aec0;
    color: rgba(160, 174, 192, var(--tw-text-opacity));
}

.text-gray-600 {
    color: #718096;
    color: rgba(113, 128, 150, var(--tw-text-opacity));
}

.text-gray-700 {
    color: #4a5568;
    color: rgba(74, 85, 104, var(--tw-text-opacity));
}

.text-gray-900 {
    color: #1a202c;
    color: rgba(26, 32, 44, var(--tw-text-opacity));
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-gray-800 {
        background-color: #2d3748;
        background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
    }

    .dark\:bg-gray-900 {
        background-color: #1a202c;
        background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
    }

    .dark\:border-gray-700 {
        border-color: #4a5568;
        border-color: rgba(74, 85, 104, var(--tw-border-opacity));
    }

    .dark\:text-white {
        color: #fff;
        color: rgba(255, 255, 255, var(--tw-text-opacity));
    }

    .dark\:text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }
}
</style>

<script>
import Main from "@/Pages/Main.vue";
export default {
    props: {
        posts: String,
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
    components: { Main },
};
</script>
