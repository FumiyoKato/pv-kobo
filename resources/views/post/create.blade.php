<x-app-layout>

    <div class="min-h-screen bg-[#f5f5f0]">
        <div class="max-w-4xl mx-auto p-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-xl font-normal">{{ Auth::user()->name }}</h1>
                <div>
                    <a href="{{ route('dashboard') }}">
                        <x-primary-button class="mr-2">
                            一覧へ戻る
                        </x-primary-button>
                    </a>
                    <a href="{{ route('dashboard') }}">
                        <x-primary-button>
                            マイページ
                        </x-primary-button>
                    </a>
                </div>
            </div>

            <form method="POST" action="{{ route('post.store') }}">
                @csrf

                <div class="border-2 border-[#000080] bg-white p-6">
                    <div class="space-y-6">
                        <div class="border-2 border-[#000080] bg-[#f0f0f5] p-4">
                            <div class="mb-4 flex items-center gap-4">
                                <label class="w-24">予測単位名</label>
                                <input type="text" name="forecast_unit_name" class="w-full bg-white border border-gray-300 p-2" placeholder="発電所名・発電所群名・BG名" value="{{ old('forecast_unit_name') }}">
                                @error('forecast_unit_name')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="grid grid-cols-2 gap-8">
                                <div class="space-y-2">
                                    <div class="flex items-center gap-2">
                                        <label class="w-24">設備容量</label>
                                        <input type="text" name="pv_capacity" id="pv_capacity" class="w-36 bg-white border border-gray-300 p-2" onblur="this.value = formatNumber(this.value); this.dispatchEvent(new Event('input'))" value="{{ old('pv_capacity') }}">
                                        <span>[kW]</span>
                                        @error('pv_capacity')
                                            <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="w-24">PCS容量</label>
                                        <input type="text" name="pcs_capacity" id="pcs_capacity" class="w-36 bg-white border border-gray-300 p-2" onblur="this.value = formatNumber(this.value); this.dispatchEvent(new Event('input'))" value="{{ old('pcs_capacity') }}">
                                        <span>[kW]</span>
                                        @error('pcs_capacity')
                                            <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="w-24">PCS変換効率</label>
                                        <input type="text" name="pcs_efficiency" class="w-36 bg-white border border-gray-300 p-2" placeholder="90~99" value="{{ old('pcs_efficiency') }}">
                                        <span>[%]</span>
                                        @error('pcs_efficiency')
                                            <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="w-24">ロス率</label>
                                        <input type="text" name="loss_rate" class="w-36 bg-white border border-gray-300 p-2" placeholder="0~20" value="{{ old('loss_rate') }}">
                                        <span>[%]</span>
                                        @error('loss_rate')
                                            <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <div class="flex items-center gap-2">
                                        <label class="w-24">設置方位</label>
                                        <input type="text" name="direction" class="w-36 bg-white border border-gray-300 p-2" placeholder="1~360" value="{{ old('direction') }}">
                                        <span>[度]</span>
                                        @error('direction')
                                            <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="w-24">設置角度</label>
                                        <input type="text" name="angle" class="w-36 bg-white border border-gray-300 p-2" placeholder="0~90" value="{{ old('angle') }}">
                                        <span>[度]</span>
                                        @error('angle')
                                            <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="w-24">緯度(10進法)</label>
                                        <input type="text" name="latitude" class="w-36 bg-white border border-gray-300 p-2" placeholder="23.0~47.0" value="{{ old('latitude') }}">
                                        <span>[度]</span>
                                        @error('latitude')
                                            <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="w-24">経度(10進法)</label>
                                        <input type="text" name="longitude" class="w-36 bg-white border border-gray-300 p-2" placeholder="123.0~147.0" value="{{ old('longitude') }}">
                                        <span>[度]</span>
                                        @error('longitude')
                                            <div class="text-red-600">{{ $message }}</div>
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