<x-app-layout>


    {{-- <div>
        <h1>テスト</h1>
    </div> --}}


{{-- 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ＰＶ予測セルフ工房') }}
        </h2>
    </x-slot> --}}

    <div class="relative" style="height: 732px;">
        <img src="{{ asset('img/PV_kobo.jpg') }}" alt="PV予測セルフ工房" class="w-full h-full object-cover">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="bg-white bg-opacity-75 p-8 rounded-lg text-center">
                <h1 class="text-4xl font-bold text-gray-800 mb-2">ＰＶ予測セルフ工房</h1>
                <p class="text-sm text-gray-700 mb-1">設備情報をセルフで予測初期設定</p>
                <p class="text-sm text-gray-700">圧倒的安価な太陽光発電予測サービス</p>
            </div>
        </div>
    </div>

</x-app-layout>