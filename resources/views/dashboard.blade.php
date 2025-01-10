<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ダッシュボード
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">登録済み予測単位</h3>

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <a href="{{ route('post.create') }}">
                            <x-primary-button>
                                予測単位を新規登録
                            </x-primary-button>
                        </a>
                    </div>

                    @if($forecastUnits->isEmpty())
                        <p>予測単位はまだ登録されていません。</p>
                    @else
                        <div class="w-full overflow-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">予測単位名</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">設備容量 [kW]</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PCS容量 [kW]</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PCS変換効率 [%]</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ロス率 [%]</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">設置方位 [度]</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">設置角度 [度]</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">緯度 [度]</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">経度 [度]</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">初回登録日</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">登録内容更新日</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($forecastUnits as $forecastUnit)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $forecastUnit->forecast_unit_name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ number_format($forecastUnit->pv_capacity, 1) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ number_format($forecastUnit->pcs_capacity, 1) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $forecastUnit->pcs_efficiency }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $forecastUnit->loss_rate }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $forecastUnit->direction }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $forecastUnit->angle }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ number_format($forecastUnit->latitude, 2) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ number_format($forecastUnit->longitude, 2) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $forecastUnit->created_at->format('Y/m/d H:i:s') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $forecastUnit->updated_at->format('Y/m/d H:i:s') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>