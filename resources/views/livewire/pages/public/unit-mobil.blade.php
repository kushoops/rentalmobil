<div>
    <h2 class="mb-2 text-center">Rental Mobil</h2>
    <div class="mb-2 grid gap-2 grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($cars as $car)
        <livewire:components.card gambar="{{ $car['gambar'] }}" mobil="{{ $car['mobil'] }}" harga="{{ $car['harga'] }}" deskripsi="Kami menyediakan unit mobil untuk perjalanan dengan supir dan bahan bakar"/>
        @endforeach
    </div>
</div>
