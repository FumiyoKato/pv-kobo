<x-app-layout>

    <div class="min-h-screen bg-[#f5f5f0]">
        <div class="max-w-full md:max-w-4xl mx-auto p-6 md:p-8">
            <div class="flex flex-wrap justify-between items-center mb-6">
                <h1 class="text-lg md:text-xl font-normal w-full md:w-auto text-center md:text-left mb-4 md:mb-0">予測単位新規登録</h1>
                <div class="w-full md:w-auto flex justify-center md:justify-end">
                    <a href="{{ route('dashboard') }}">
                        <x-primary-button class="mr-2">
                            予測単位一覧へ戻る
                        </x-primary-button>
                    </a>
                </div>
            </div>


            <form method="POST" action="{{ route('post.store') }}">
                @csrf

                <div class="border-2 border-[#000080] bg-white p-4 md:p-6">
                    <div class="space-y-6">
                        <div class="border-2 border-[#000080] bg-[#f0f0f5] p-4">
                            <div class="mb-4 flex flex-wrap items-center gap-2 md:gap-4">
                                <label class="w-full md:w-24 text-sm md:text-base">予測単位名</label>
                                <input type="text" name="forecast_unit_name" class="w-full md:flex-1 bg-white border border-gray-300 p-2 text-sm md:text-base" placeholder="発電所名・発電所群名・BG名" value="{{ old('forecast_unit_name') }}">
                                @error('forecast_unit_name')
                                    <div class="text-red-600 text-sm">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="space-y-4 md:space-y-0 md:grid md:grid-cols-2 md:gap-8">
                                <div class="space-y-4">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <label class="w-full md:w-24 text-sm md:text-base">設備容量</label>
                                        <div class="flex flex-1 items-center gap-2">
                                            <input type="text" name="pv_capacity" id="pv_capacity" class="w-full md:w-36 bg-white border border-gray-300 p-2 text-sm md:text-base" onblur="this.value = formatNumber(this.value); this.dispatchEvent(new Event('input'))" value="{{ old('pv_capacity') }}">
                                            <span class="text-sm md:text-base shrink-0">[kW]</span>
                                        </div>
                                        @error('pv_capacity')
                                            <div class="text-red-600 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="flex flex-wrap items-center gap-2">
                                        <label class="w-full md:w-24 text-sm md:text-base">PCS容量</label>
                                        <div class="flex flex-1 items-center gap-2">
                                            <input type="text" name="pcs_capacity" id="pcs_capacity" class="w-full md:w-36 bg-white border border-gray-300 p-2 text-sm md:text-base" onblur="this.value = formatNumber(this.value); this.dispatchEvent(new Event('input'))" value="{{ old('pcs_capacity') }}">
                                            <span class="text-sm md:text-base shrink-0">[kW]</span>
                                        </div>
                                        @error('pcs_capacity')
                                            <div class="text-red-600 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="flex flex-wrap items-center gap-2">
                                        <label class="w-full md:w-24 text-sm md:text-base">PCS変換効率</label>
                                        <div class="flex flex-1 items-center gap-2">
                                            <input type="text" name="pcs_efficiency" class="w-full md:w-36 bg-white border border-gray-300 p-2 text-sm md:text-base" placeholder="90~99" value="{{ old('pcs_efficiency') }}">
                                            <span class="text-sm md:text-base shrink-0">[%]</span>
                                        </div>
                                        @error('pcs_efficiency')
                                            <div class="text-red-600 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="flex flex-wrap items-center gap-2">
                                        <label class="w-full md:w-24 text-sm md:text-base">ロス率</label>
                                        <div class="flex flex-1 items-center gap-2">
                                            <input type="text" name="loss_rate" class="w-full md:w-36 bg-white border border-gray-300 p-2 text-sm md:text-base" placeholder="0~20" value="{{ old('loss_rate') }}">
                                            <span class="text-sm md:text-base shrink-0">[%]</span>
                                        </div>
                                        @error('loss_rate')
                                            <div class="text-red-600 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <label class="w-full md:w-24 text-sm md:text-base">設置方位</label>
                                        <div class="flex flex-1 items-center gap-2">
                                            <input type="text" name="direction" class="w-full md:w-36 bg-white border border-gray-300 p-2 text-sm md:text-base" placeholder="1~360" value="{{ old('direction') }}">
                                            <span class="text-sm md:text-base shrink-0">[度]</span>
                                        </div>
                                        @error('direction')
                                            <div class="text-red-600 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="flex flex-wrap items-center gap-2">
                                        <label class="w-full md:w-24 text-sm md:text-base">設置角度</label>
                                        <div class="flex flex-1 items-center gap-2">
                                            <input type="text" name="angle" class="w-full md:w-36 bg-white border border-gray-300 p-2 text-sm md:text-base" placeholder="0~90" value="{{ old('angle') }}">
                                            <span class="text-sm md:text-base shrink-0">[度]</span>
                                        </div>
                                        @error('angle')
                                            <div class="text-red-600 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="flex flex-wrap items-center gap-2">
                                        <label class="w-full md:w-24 text-sm md:text-base">緯度(10進法)</label>
                                        <div class="flex flex-1 items-center gap-2">
                                            <input type="text" name="latitude" class="w-full md:w-36 bg-white border border-gray-300 p-2 text-sm md:text-base" placeholder="23.0~47.0" value="{{ old('latitude') }}">
                                            <span class="text-sm md:text-base shrink-0">[度]</span>
                                        </div>
                                        @error('latitude')
                                            <div class="text-red-600 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="flex flex-wrap items-center gap-2">
                                        <label class="w-full md:w-24 text-sm md:text-base">経度(10進法)</label>
                                        <div class="flex flex-1 items-center gap-2">
                                            <input type="text" name="longitude" class="w-full md:w-36 bg-white border border-gray-300 p-2 text-sm md:text-base" placeholder="123.0~147.0" value="{{ old('longitude') }}">
                                            <span class="text-sm md:text-base shrink-0">[度]</span>
                                        </div>
                                        @error('longitude')
                                            <div class="text-red-600 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <x-primary-button>
                                保存
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function formatNumber(num) {
            // 数値でない場合は空文字列を返す
            if (isNaN(num) || num === '') {
                return '';
            }

            // 整数と小数に分割する
            let parts = num.toString().split('.');

            // 整数部分にカンマを追加
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');

            // もし元の値が整数なら、小数部分を追加しない
            if(parts.length === 1) {
                return parts[0];
            } else {
                return parts.join('.');
            }
        }
    </script>
</x-app-layout>