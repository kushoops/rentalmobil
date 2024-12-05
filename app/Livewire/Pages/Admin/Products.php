<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Car;
use App\Models\Platno;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.admin')]
class Products extends Component
{
    use WithFileUploads;

    public $search='';
    public $id;
    public $gambarLama;
    public $gambar;
    public $mobil;
    public $harga;
    public $tipe;
    public $platno;
    public $cars;

    public function createCar()
    {
        $this->validate([ 
            'gambar' => 'max:1024',
        ]);
        $array = explode('.', $this->gambar->getClientOriginalName());
        $generateNewName = Str::slug(reset($array)).'-'.time().'.'.end($array);
        $uploaded = $this->gambar->storeAs(path: 'public/images/cars', name: $generateNewName);

        if($uploaded) {
            Car::create([
                'gambar' => $generateNewName,
                'mobil' => $this->mobil,
                'harga' => $this->harga,
            ]);

            return redirect()->route('admin.products');
        }
    }
    
    public function createPlatno()
    {
        $this->validate([
            'mobil' => 'required'
        ]);

        Platno::create([
            'mobil' => $this->mobil,
            'platno' => $this->platno,
        ]);

        return redirect()->route('admin.products');
        
    }

    public function toggleReady($id, $ready)
    {
        if($ready) {
            Platno::where('id',$id)->update(['ready' => false]);
        }else {
            Platno::where('id',$id)->update(['ready' => true]);
        }
    }

    public function editProduct($id)
    {
        $platno = Platno::where('id',$id)->get()[0];
        $this->id = $platno['id'];
        $this->mobil = $platno['mobil'];
        $this->platno = $platno['platno'];
    }

    public function updateProduct()
    {
        Platno::where('id',$this->id)->update([
            'mobil' => $this->mobil,
            'platno' => $this->platno,
        ]);

        return redirect()->route('admin.products');
    }

    public function deleteProduct($id)
    {
        Platno::where('id', $id)->delete();
        $this->mount();
    }

    public function mount()
    {
        $this->cars = Car::orderBy('mobil','asc')->get();
    }

    public function render()
    {
        return view('livewire.pages.admin.products', [
            'platnos' => Platno::join('cars', 'cars.mobil', '=', 'platnos.mobil')->select('platnos.*', 'cars.gambar', 'cars.harga')->where([
                ['platnos.mobil', 'like', '%'.$this->search.'%'],
            ])->orWhere([
                ['platnos.platno', 'like', '%'.$this->search.'%'],
            ])->orderBy('mobil','asc')->get()
        ]);
    }
}
