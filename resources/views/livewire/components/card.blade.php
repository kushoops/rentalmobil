<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <img class="rounded-t-lg" src="{{ env('APP_URL').'/storage/images/cars/'.$gambar }}" alt="" />
    <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $mobil }}</h5>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Rp. {{ $harga }}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Kami menyediakan unit {{ $mobil }} untuk kebutuhan perjalanan dengan supir dan bahan bakar atupun lepas kunci</p>
        <a href="{{ env('APP_URL').'/booking/'.$mobil }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Booking
        </a>
    </div>
</div>
