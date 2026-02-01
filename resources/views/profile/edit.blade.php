<x-app-layout>
    <div class="py-4 bg-gray-100 min-h-screen">
        <div class="max-w-[95%] mx-auto sm:px-4">
            
            <div class="flex justify-between items-center mb-3">
                <h2 class="text-lg font-extrabold text-blue-900 flex items-center gap-2 uppercase tracking-tighter">
                    <i class="fa-solid fa-user-gear text-sm"></i> Pengaturan Akun
                </h2>
                <a href="{{ url('/') }}" class="bg-white border border-gray-200 text-gray-700 px-3 py-1 rounded-lg text-[10px] font-bold shadow-sm hover:bg-gray-50 flex items-center gap-1">
                    <i class="fa-solid fa-arrow-left"></i> Peta Utama
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-3 items-start">
                
                <div class="lg:col-span-5">
                    <div class="p-4 bg-white shadow-md rounded-xl border border-gray-100">
                        <div class="border-b border-gray-50 pb-2 mb-4">
                            <h3 class="text-sm font-bold text-blue-900 flex items-center gap-2">
                                <i class="fa-solid fa-id-card text-yellow-500 text-xs"></i> Profil
                            </h3>
                        </div>
                        <div class="scale-95 origin-top">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7 space-y-3">
                    <div class="p-4 bg-white shadow-md rounded-xl border border-gray-100">
                        <div class="border-b border-gray-50 pb-2 mb-4">
                            <h3 class="text-sm font-bold text-blue-900 flex items-center gap-2">
                                <i class="fa-solid fa-lock text-yellow-500 text-xs"></i> Keamanan
                            </h3>
                        </div>
                        <div class="scale-95 origin-top">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="p-3 bg-red-50 shadow-sm rounded-xl border border-red-100 flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
                            <div>
                                <h3 class="text-[10px] font-bold text-red-700 uppercase">Hapus Akun</h3>
                                <p class="text-[9px] text-red-400">Tindakan tidak bisa dibatalkan.</p>
                            </div>
                        </div>
                        <div class="scale-75 origin-right">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>

            </div>

            <p class="text-center text-gray-400 text-[8px] mt-4 font-bold uppercase tracking-[0.2em]">
                © 2026 ANGGO - Garut Online
            </p>
        </div>
    </div>
</x-app-layout>