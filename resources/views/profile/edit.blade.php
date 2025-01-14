<x-app-layout>
    <div class="min-h-screen bg-[#f5f5f0]">
        <div class="max-w-4xl mx-auto p-8">
            <div class="flex justify-start items-center mb-6">
                <h1 class="text-xl font-normal">マイページ</h1>
            </div>

            <div class="space-y-6">
                {{-- ユーザー情報閲覧領域 --}}
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-4">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold">【アカウント】</span>
                                <span class="text-lg">{{ $user->name }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold">【ログインID (email)】</span>
                                <span class="text-lg">{{ $user->email }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold">【配信先メールアドレス】</span>
                                <span class="text-lg">{{ $user->delivery_email }}</span>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold">【事業者住所】</span>
                                <span class="text-lg">{{ $user->address }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold">【ご連絡先電話番号】</span>
                                <span class="text-lg">{{ $user->phone }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold">【ご担当者】</span>
                                <span class="text-lg">{{ $user->name_incharge }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ユーザー情報更新領域 (email) --}}
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-2 border-[#000080]">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                {{-- パスワード更新領域 --}}
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-2 border-[#000080]">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                {{-- 配信先メールアドレス更新領域 (delivery_email) --}}
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-2 border-[#000080]">
                    <div class="max-w-xl">
                        @include('profile.partials.update-delivery_email-form')
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>