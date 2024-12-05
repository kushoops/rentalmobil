<div>
    <form wire:submit="createBooking">
        <input wire:model="nama" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Lengkap" required />
        <input wire:model="telp" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nomor Telepon" required />
        <input wire:model="email" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="E-email" required />
        <input wire:model="alamat" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Alamat" required />

        <select wire:change="setTotal" wire:model="driver" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <option value="1">Rental Mobil dan Driver</option>
            <option value="0">Rental Mobil Lepas Kunci</option>
        </select>
        <input wire:change="setTotal" wire:model="tglmulaisewa" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tanggal Mulai Sewa" required />
        <input wire:change="setTotal" wire:model="tglakhirsewa" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tanggal Akhir Sewa" required />
        <img src="{{ env('APP_URL').'/storage/images/cars/'.$gambar }}" alt="">
        <h3>{{ $mobil }}</h3>
        <select wire:model.live="platno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <option>Pilih plat nomor</option>
            @foreach ($platnos as $plat)
                <option value="{{ $plat['platno'] }}">{{ $plat['platno'] }}</option>
            @endforeach
        </select>
        @error('platno') <span class="error">{{ $message }}</span> @enderror
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Info Rental
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Durasi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga/Sewa
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Harga
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $mobil }} - {{ $platno }}
                        </th>
                        <td class="px-6 py-4">
                            {{ (strtotime($this->tglakhirsewa)-strtotime($this->tglmulaisewa))/86400 }} Hari
                        </td>
                        <td class="px-6 py-4">
                            Rp. {{ $harga }}
                        </td>
                        <td class="px-6 py-4">
                            Rp. {{ ((strtotime($this->tglakhirsewa)-strtotime($this->tglmulaisewa))/86400) * $harga }}
                        </td>
                    </tr>
                    @if ($this->driver == '1')
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Driver
                        </th>
                        <td class="px-6 py-4">
                            {{ (strtotime($this->tglakhirsewa)-strtotime($this->tglmulaisewa))/86400 }} Hari
                        </td>
                        <td class="px-6 py-4">
                            Rp. 150000
                        </td>
                        <td class="px-6 py-4">
                            Rp. {{ ((strtotime($this->tglakhirsewa)-strtotime($this->tglmulaisewa))/86400) * 150000 }}
                        </td>
                    </tr>
                    @endif
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Total Sewa
                        </th>
                        <td class="px-6 py-4">
                            
                        </td>
                        <td class="px-6 py-4">
                            
                        </td>
                        <td class="px-6 py-4">
                            Rp. {{ $total }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex items-center">
            <input wire:model="pembayaran" id="default-radio-1" type="radio" value="BANK BNI" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">BANK BNI</label>
        </div>
        <div class="flex items-center">
            <input wire:model="pembayaran" checked id="default-radio-2" type="radio" value="BANK BRI" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">BANK BRI</label>
        </div>
        <div class="flex items-center">
            <input wire:model="pembayaran" id="default-radio-3" type="radio" value="BANK MANDIRI" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-radio-3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">BANK MANDIRI</label>
        </div>
        <div class="flex items-center">
            <input wire:model="pembayaran" checked id="default-radio-4" type="radio" value="BANK BCA" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-radio-4" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">BANK BCA</label>
        </div>
        <div class="flex items-center">
            <input wire:model="pembayaran" checked id="default-radio-5" type="radio" value="BANK BTN" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-radio-5" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">BANK BTN</label>
        </div>
        <button type="submit">Bayar</button>
    </form>
</div>
