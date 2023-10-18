<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listings.create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg p-12">
                <form action="{{ route('listings.store') }}" method="post">
                    @csrf 
                
                <div class="space-y-12">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="flex-center bg-red-50 text-red-500 px-3 py-2 font-semibold rounded-lg mt-3">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    
                  <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
                    <div>
                      <h2 class="text-base font-semibold leading-7 text-gray-900">会社・求人情報</h2>
                    </div>
                
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                      <div class="sm:col-span-4">
                        <label for="title" class="form-label">タイトル</label>
                        <div class="mt-1">
                          <input id="title" name="title" type="title" autocomplete="title" value="{{ old('title') }}" class="form-input">
                        </div>
                      </div>
                      <div class="sm:col-span-3">
                        <label for="location" class="form-label">地域</label>
                        <div class="mt-1">
                          <select id="location" name="location" autocomplete="location" value="{{ old('location') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            @include('listings.prefectures')
                          </select>
                        </div>
                      </div>
                  
                      <div class="sm:col-span-3">
                        <label for="company" class="form-label">会社名</label>
                        <div class="mt-1">
                          <input type="text" name="company" id="company" autocomplete="company" value="{{ old('company') }}" class="form-input" placeholder="株式会社 〇〇">
                        </div>
                      </div>
                  
                      <div class="sm:col-span-3">
                        <label for="position" class="form-label">ポジション</label>
                        <div class="mt-1">
                          <input type="text" name="position" id="position" autocomplete="position" value="{{ old('position') }}" class="form-input" placeholder="サーバーサイドエンジニ">
                        </div>
                      </div>
                  
                      <div class="sm:col-span-3">
                        <label for="salary" class="form-label">給与・賞与</label>
                        <div class="mt-1">
                          <input type="text" name="salary" id="salary" autocomplete="salary" value="{{ old('salary') }}" class="form-input" placeholder="300万〜500万">
                        </div>
                      </div>
                  
                      <div class="col-span-full">
                        <label for="url" class="form-label">URL</label>
                        <div class="mt-1">
                          <input type="text" name="url" placeholder="https://www.example.com" id="url" autocomplete="url" value="{{ old('url') }}" class="form-input">
                        </div>
                      </div>
                  
                  
                    </div>
                  </div>
              
                  <div class="grid grid-cols-1 gap-x-8 my-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
                    <div>
                      <h2 class="text-base font-semibold leading-7 text-gray-900">業務内容・メモ</h2>
                    </div>

                    
                    <div class="max-w-2xl space-y-10 md:col-span-2">
                      <textarea id="description" name="description" rows="10" class="form-input" placeholder="業務内容・メモを入力する">{{ old('description') }}</textarea>
                    </div>

                    <div class="mt-8">
                      <label for="tags" class="form-label">タグ</label>
                    </div>
  
                      
                    <div class="max-w-2xl space-y-10 md:col-span-2 mt-1 md:mt-8">
                      <input id="tags" name="tags" rows="10" class="tagify form-input" placeholder="[Enter]キーで区切って入力してください" value="{{ old('tags') }}">
                    </div>
                  </div>

                </div>
            
                <div class="mt-6 flex items-center justify-end gap-x-6">
                  <a href="{{ route('listings.index')}}" class="text-sm font-semibold leading-6 text-gray-900">キャンセル</a>
                  <button type="submit" class="action-btn">登録する</button>
                </div>
            
                </form>
            </div>
        </div>
    </div>
</x-app-layout>



