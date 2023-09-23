<div x-cloak class="flex">
    <div
        @click="sideBarOpen=false"
        :class="$data['sideBarOpen'] ? 'clock' : 'hidden'"
        class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"
    ></div>

    <div
        :class="$data['sideBarOpen'] ? 'translate-x-0 ease-in' : '-translate-x-full ease-out'"
        @class([
            'flex flex-col h-screen bg-primary-700 fixed inset-y-0 left-0 z-30',
            'w-60 px-4 py-8 transition duration-200',
            'transform lg:translate-x-0 lg:relative lg:inset-0'
        ])
    >
        <a href="{{ route('dashboard') }}">
            <img 
                src="{{ asset('img/logo.png') }}" 
                alt="Logo GStocks"
                class="w-60 mx-auto mb-7"
            />
        </a>

        <nav class="flex flex-col justify-between h-full">
            <div class="space-y-2">
                <x-sidebar.menu 
                    name="Dashboard"
                    route-name="dashboard"
                    icon="home"
                />

                <x-sidebar.menu 
                    name="Meus Ativos"
                    route-name="stocks.index"
                    icon="chart-bar"
                />
            </div>

            <div class="flex flex-col gap-4">
                <div class="w-full border-b border-primary-900"></div>

                <x-sidebar.menu 
                    name="Logout"
                    route-name="logout"
                    icon="logout"
                />
            </div>
        </nav>

    </div>
</div>