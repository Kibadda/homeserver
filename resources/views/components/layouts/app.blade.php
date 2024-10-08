<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..600&display=swap" rel="stylesheet">

        <title>{{ $title ?? 'Page Title' }}</title>

        @vite('resources/css/app.css')

        @fluxStyles
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800 antialiased">
        <flux:sidebar sticky stashable class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <flux:brand href="#" logo="https://fluxui.dev/img/demo/logo.png" name="Acme Inc." class="px-2 dark:hidden" />
            <flux:brand href="#" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="Acme Inc." class="px-2 hidden dark:flex" />

            <!-- <flux:input as="button" variant="filled" placeholder="Search..." icon="magnifying-glass" /> -->

            <flux:navlist variant="outline">
                <flux:navlist.item icon="home" href="/">Home</flux:navlist.item>
                <flux:navlist.item icon="home" href="/boards">Kanban</flux:navlist.item>
                <!-- <flux:navlist.item icon="inbox" badge="12" href="#">Inbox</flux:navlist.item> -->
                <!-- <flux:navlist.item icon="document-text" href="#">Documents</flux:navlist.item> -->
                <!-- <flux:navlist.item icon="calendar" href="#">Calendar</flux:navlist.item> -->

                <!-- <flux:navlist.group expandable heading="Favorites" class="hidden lg:grid"> -->
                <!--     <flux:navlist.item href="#">Marketing site</flux:navlist.item> -->
                <!--     <flux:navlist.item href="#">Android app</flux:navlist.item> -->
                <!--     <flux:navlist.item href="#">Brand guidelines</flux:navlist.item> -->
                <!-- </flux:navlist.group> -->
            </flux:navlist>

            <flux:spacer />

            <!-- <flux:navlist variant="outline"> -->
            <!--     <flux:navlist.item icon="cog-6-tooth" href="#">Settings</flux:navlist.item> -->
            <!--     <flux:navlist.item icon="information-circle" href="#">Help</flux:navlist.item> -->
            <!-- </flux:navlist> -->

            @auth
                <flux:separator />

                <flux:navlist variant="outline">
                    <form action="/logout" method="POST">
                        @csrf
                        <flux:navlist.item icon="lock-closed" type="submit">Logout</flux:navlist.item>
                    </form>
                </flux:navlist>
            @endauth
        </flux:sidebar>

        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />
        </flux:header>

        <flux:main>
            {{ $slot }}
        </flux:main>

        @fluxScripts
    </body>
</html>
