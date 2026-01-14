<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine JS -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-900 text-white">

    <div class="min-h-full" x-data="{ mobileMenu: false }">

        <!-- NAVBAR -->
        <nav class="bg-gray-800/50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">

                    <!-- LEFT -->
                    <div class="flex items-center">
                        <img class="h-8 w-8"
                            src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                            alt="Logo">

                        <div class="hidden md:block ml-10">
                            <div class="flex space-x-4">
                                <a href="lihatpost" class="bg-gray-950/50 px-3 py-2 rounded-md text-sm">Tabel</a>
                                <a href="#"
                                    class="px-3 py-2 rounded-md text-sm text-gray-300 hover:bg-white/5">Edit</a>
                                <a href="#"
                                    class="px-3 py-2 rounded-md text-sm text-gray-300 hover:bg-white/5">Projects</a>
                                <a href="#"
                                    class="px-3 py-2 rounded-md text-sm text-gray-300 hover:bg-white/5">Calendar</a>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="hidden md:flex items-center space-x-4">

                        <!-- Notification -->
                        <button class="p-1 text-gray-400 hover:text-white">
                            🔔
                        </button>

                        <!-- Profile Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open">
                                <img class="h-8 w-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e" alt="">
                            </button>

                            <div x-show="open" @click.outside="open = false"
                                class="absolute right-0 mt-2 w-48 rounded-md bg-gray-800 shadow-lg">

                                <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-700">Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-700">Settings</a>

                                <!-- ✅ LOGOUT BENAR -->
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-700">
                                        Logout
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- MOBILE BUTTON -->
                    <div class="md:hidden">
                        <button @click="mobileMenu = !mobileMenu" class="p-2 text-gray-400 hover:text-white">
                            ☰
                        </button>
                    </div>
                </div>
            </div>

            <!-- MOBILE MENU -->
            <div x-show="mobileMenu" class="md:hidden px-2 pt-2 pb-3 space-y-1">
                <a href="#" class="block px-3 py-2 bg-gray-950/50 rounded-md">Dashboard</a>
                <a href="#" class="block px-3 py-2 rounded-md text-gray-300 hover:bg-white/5">Team</a>
                <a href="#" class="block px-3 py-2 rounded-md text-gray-300 hover:bg-white/5">Projects</a>
                <a href="#" class="block px-3 py-2 rounded-md text-gray-300 hover:bg-white/5">Calendar</a>
            </div>
        </nav>

        <!-- HEADER -->
        <header class="bg-gray-800 border-b border-white/10">
            <div class="mx-auto max-w-7xl px-4 py-6">
                <h1 class="text-3xl font-bold">Dashboard</h1>
            </div>
        </header>

        <!-- CONTENT -->
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6">
                <div class="rounded-lg bg-gray-800 p-6">
                    <p>Konten kamu di sini 🚀</p>
                </div>
            </div>
        </main>

    </div>

</body>

</html>
