<div x-data="{ show: true }"
     x-init="setTimeout( () => show =false, 4000)"
     x-show="show"
     class="fixed bottom-3 right-3 bg-blue-500 px-2 py-4 rounded-xl text-sm text-white">
    <p>
    <p>
        {{ session('success') }}
    </p>
    </p>
</div>
