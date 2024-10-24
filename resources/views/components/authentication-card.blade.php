<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative">
    <div class="absolute inset-0" style="background-image: url('images/background3.jpg'); background-size: cover; background-position: center; filter: blur(8px);"></div>
    
    <div class="relative z-10">
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg relative z-10" style="background-color: rgb(255, 242, 204,0.6);border: 3px solid rgb(0, 153, 0);">
        {{ $slot }}
    </div>
</div>