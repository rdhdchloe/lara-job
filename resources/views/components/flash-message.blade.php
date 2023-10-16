@if(session()->has('message'))
  <div x-data="{show: true}" x-init="setTimeout(()=>show=false, 3000)" x-show="show" class="fixed transform left-1/2 -translate-x-1/2 max-w-xl mx-auto rounded-md bg-green-50 p-4">
    <div class="flex">
      <div class="flex-shrink-0">
        <x-heroicon-o-check-circle class="text-green-400"/>
      </div>
      <div class="ml-3">
        <p class="text-sm font-medium text-green-800">{{session('message')}}</p>
      </div>
    </div>
  </div>
@endif
