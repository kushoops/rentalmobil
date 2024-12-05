<div>
    <h1 class="mb-4 text-2xl font-bold">Bookings</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Lenkap
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mobil
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Driver
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Plat Nomor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Booking
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $booking['nama'] }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $booking['mobil'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $booking['driver'] ? 'Ya' : 'Tidak' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $booking['platno'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $booking['created_at']->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4">
                        <div x-data="{modalIsOpen: false}">
                            <button @click="modalIsOpen = true" type="button" class="font-medium text-gray-900 hover:underline">Show</button>
                            <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" @keydown.esc.window="modalIsOpen = false" @click.self="modalIsOpen = false" class="fixed inset-0 z-30 flex w-full items-center justify-center bg-black/20 p-4 pb-8 backdrop-blur-md lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
                                <!-- Modal Dialog -->
                                <form x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex w-screen max-w-lg flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
                                    <!-- Dialog Header -->
                                    <div class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                                        <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">Detail Booking</h3>
                                        <button @click="modalIsOpen = false" aria-label="close modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- Dialog Body -->
                                    <div class="p-4 overflow-y-scroll max-h-96"> 
                                        <div class="mb-4">
                                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                                            <input value="{{ $booking['nama'] }}" disabled type="text" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div class="mb-4">
                                            <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon</label>
                                            <input value="{{ $booking['telp'] }}" disabled type="number" id="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div class="mb-4">
                                            <label for="tipe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                            <input value="{{ $booking['email'] }}" disabled type="text" id="tipe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div class="mb-4">
                                            <label for="platno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                            <input value="{{ $booking['alamat'] }}" disabled type="text" id="platno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div class="mb-4">
                                            <label for="platno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Mulai Sewa</label>
                                            <input value="{{ $booking['tglmulaisewa'] }}" disabled type="text" id="platno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div class="mb-4">
                                            <label for="platno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Akhir Sewa</label>
                                            <input value="{{ $booking['tglakhirsewa'] }}" disabled type="text" id="platno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div class="mb-4">
                                            <label for="platno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobil</label>
                                            <input value="{{ $booking['mobil'] }}" disabled type="text" id="platno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div class="mb-4">
                                            <label for="platno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plat Nomor</label>
                                            <input value="{{ $booking['platno'] }}" disabled type="text" id="platno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div class="mb-4">
                                            <label for="platno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Driver</label>
                                            <input value="{{ $booking['driver'] ? 'Ya' : 'Tidak' }}" disabled type="text" id="platno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div class="mb-4">
                                            <label for="platno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Metode Pembayaran</label>
                                            <input value="{{ $booking['pembayaran'] }}" disabled type="text" id="platno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div class="mb-4">
                                            <label for="platno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total</label>
                                            <input value="Rp. {{ $booking['total'] }}" disabled type="text" id="platno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
