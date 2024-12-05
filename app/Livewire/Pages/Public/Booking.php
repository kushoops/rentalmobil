<?php

namespace App\Livewire\Pages\Public;

use App\Models\Car;
use App\Models\Platno;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking as ModelsBooking;

#[Layout('layouts.public')]
class Booking extends Component
{
    public $gambar;
    public $nama;
    public $telp;
    public $email;
    public $alamat;
    public $tglmulaisewa;
    public $tglakhirsewa;
    public $mobil;
    public $driver = '1';
    public $platno;
    public $platnos;
    public $total = 0;
    public $pembayaran='BANK BNI';
    public $harga;

    public function createBooking()
    {
        $this->validate([
            'platno' => 'required'
        ]);

        ModelsBooking::create([
            'userid' => Auth::id(),
            'nama' => $this->nama,
            'telp' => $this->telp,
            'email' => $this->email,
            'alamat' => $this->alamat,
            'tglmulaisewa' => $this->tglmulaisewa,
            'tglakhirsewa' => $this->tglakhirsewa,
            'mobil' => $this->mobil,
            'platno' => $this->platno,
            'driver' => '1' ? true : false,
            'total' => $this->total,
            'pembayaran' => $this->pembayaran,
        ]);
        $created = date('m/d/Y', time());
        return redirect("https://api.whatsapp.com/send?phone=6282139243441&text=Saya%20sudah%20booking%20mobil%20{$this->mobil}%20dengan%20plat%20nomor%20{$this->platno}%20pada%20{$created}");
    }

    public function setTotal()
    {
        if ($this->tglakhirsewa && $this->tglmulaisewa) {
            $durasi = (strtotime($this->tglakhirsewa)-strtotime($this->tglmulaisewa))/86400;
            if($this->driver == '1') {
                $this->total = ($durasi*$this->harga)+($durasi*150000);
            }else if($this->driver == '0') {
                $this->total = ($durasi*$this->harga);
            }
        }
    }

    public function mount($mobil)
    {
        $this->gambar = Car::where('mobil',$mobil)->get()[0]['gambar'];
        $this->nama = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->platnos = Platno::join('cars', 'platnos.mobil', '=', 'cars.mobil')->select('platnos.*', 'cars.gambar', 'cars.harga')->where([['platnos.mobil', '=', $this->mobil], ['platnos.ready', '=', true]])->orderBy('mobil','asc')->get();
        $this->mobil = $mobil;
        $this->harga = Car::where('mobil',$mobil)->get()[0]['harga'];
    }

    public function render()
    {
        return view('livewire.pages.public.booking');
    }
}
