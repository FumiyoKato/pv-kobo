<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            予測設定
        </h2>
    </x-slot>

    <div class="min-h-screen bg-[#f5f5f0]">
        <div class="max-w-4xl mx-auto p-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-xl font-normal">{{ Auth::user()->name }}</h1>
                <x-primary-button>
                    マイページ
                </x-primary-button>
            </div>

            <!-- Main Form Card -->
            <div class="border-2 border-[#000080] bg-white p-6">
                <div class="space-y-6">
                    <!-- Prediction Unit Form - First Instance -->
                    <div class="border-2 border-[#000080] bg-[#f0f0f5] p-4">
                        <div class="mb-4">
                            <input 
                                type="text" 
                                class="w-full bg-white border border-gray-300 p-2"
                                placeholder="予測単位(発電所・発電所群)名">
                        </div>

                        <div class="grid grid-cols-2 gap-8">
                            <!-- Left Column -->
                            <div class="space-y-2">
                                <div class="flex items-center gap-2">
                                    <label class="w-24">設備容量</label>
                                    <input type="text" class="w-24 bg-white border border-gray-300 p-2">
                                    <span>[kW]</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <label class="w-24">PCS容量</label>
                                    <input type="text" class="w-24 bg-white border border-gray-300 p-2">
                                    <span>[kW]</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <label class="w-24">PCS変換効率</label>
                                    <input type="text" class="w-24 bg-white border border-gray-300 p-2">
                                    <span>[%]</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <label class="w-24">ロス率</label>
                                    <input type="text" class="w-24 bg-white border border-gray-300 p-2">
                                    <span>[%]</span>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="space-y-2">
                                <div class="flex items-center gap-2">
                                    <label class="w-24">設置方位</label>
                                    <input type="text" class="w-24 bg-white border border-gray-300 p-2">
                                    <span>[度]</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <label class="w-24">設置角度</label>
                                    <input type="text" class="w-24 bg-white border border-gray-300 p-2">
                                    <span>[度]</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <label class="w-24">緯度</label>
                                    <input type="text" class="w-24 bg-white border border-gray-300 p-2">
                                </div>
                                <div class="flex items-center gap-2">
                                    <label class="w-24">経度</label>
                                    <input type="text" class="w-24 bg-white border border-gray-300 p-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Button -->
                    <div class="flex justify-center">
                        <x-primary-button>
                            予測単位追加
                        </x-primary-button>
                    </div>
                </div>
            </div>

            <!-- Footer Buttons -->
            <div class="flex justify-end gap-4 mt-6">
                <x-primary-button>
                    一覧へ戻る
                </x-primary-button>
                <x-primary-button>
                    保存
                </x-primary-button>
            </div>
        </div>
    </div>
</x-app-layout>
