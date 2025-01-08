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
                <div>
                    <x-primary-button class="mr-2">
                        一覧へ戻る
                    </x-primary-button>
                    <x-primary-button>
                        マイページ
                    </x-primary-button>
                </div>
            </div>

            <!-- Main Form Card -->
            <form method="POST" action="{{ route('post.store') }}">
                @csrf
        
                <div class="border-2 border-[#000080] bg-white p-6">
                    <div class="space-y-6">
                        <!-- Prediction Unit Form - First Instance -->
                        <div class="border-2 border-[#000080] bg-[#f0f0f5] p-4">
                            <div class="mb-4 flex items-center gap-4">
                                <label class="w-24">予測単位名</label>
                                <input 
                                    type="text"
                                    name="forecast_unit_name" 
                                    class="w-full bg-white border border-gray-300 p-2"
                                    placeholder="発電所名・発電所群名・BG名">
                            </div>

                            <div class="grid grid-cols-2 gap-8">
                                <!-- Left Column -->
                                <div class="space-y-2">
                                    <div class="flex items-center gap-2">
                                        <label class="w-24">設備容量</label>
                                        <input 
                                            type="text" 
                                            name="pv_capacity" 
                                            id="pv_capacity" 
                                            class="w-36 bg-white border border-gray-300 p-2"
                                            onblur="this.value = formatNumber(this.value); this.dispatchEvent(new Event('input'))">
                                        <span>[kW]</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="w-24">PCS容量</label>
                                        <input 
                                            type="text" 
                                            name="pcs_capacity" 
                                            id="pcs_capacity" 
                                            class="w-36 bg-white border border-gray-300 p-2"
                                            onblur="this.value = formatNumber(this.value); this.dispatchEvent(new Event('input'))">
                                        <span>[kW]</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="w-24">PCS変換効率</label>
                                        <input 
                                            type="text" 
                                            name="pcs_efficiency" 
                                            class="w-36 bg-white border border-gray-300 p-2"
                                            placeholder="90~99">
                                        <span>[%]</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="w-24">ロス率</label>
                                        <input 
                                            type="text" 
                                            name="loss_rate" 
                                            class="w-36 bg-white border border-gray-300 p-2"
                                            placeholder="0~20">
                                        <span>[%]</span>
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="space-y-2">
                                    <div class="flex items-center gap-2">
                                        <label class="w-24">設置方位</label>
                                        <input 
                                            type="text" 
                                            name="direction" 
                                            class="w-36 bg-white border border-gray-300 p-2"
                                            placeholder="1~360">
                                        <span>[度]</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="w-24">設置角度</label>
                                        <input 
                                            type="text" 
                                            name="angle" 
                                            class="w-36 bg-white border border-gray-300 p-2"
                                            placeholder="0~90">
                                        <span>[度]</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="w-24">緯度(10進法)</label>
                                        <input 
                                            type="text" 
                                            name="latitude" 
                                            class="w-36 bg-white border border-gray-300 p-2"
                                            placeholder="23.0~47.0">
                                        <span>[度]</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="w-24">経度(10進法)</label>
                                        <input 
                                            type="text" 
                                            name="longitude" 
                                            class="w-36 bg-white border border-gray-300 p-2"
                                            placeholder="123.0~147.0">
                                        <span>[度]</span>    
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add Button -->
                        <div class="flex justify-center">
                            <x-primary-button>
                                保存
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Footer Buttons -->
            <div class="flex justify-end gap-4 mt-6">
                <x-primary-button>
                    予測単位追加
                </x-primary-button>
            </div>
        </div>
    </div>
</x-app-layout>
