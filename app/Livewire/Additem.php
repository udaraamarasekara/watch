<?php

namespace App\Livewire;

use App\Models\Watch;
use App\Models\WatchCoverImage;
use App\Models\WatchImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class Additem extends Component
{
    use WithFileUploads;
    public $watchname,$watchprice,$description,$coverimage,$otherphotos;
    public function render()
    {
        return view('livewire.additem');
    }

    public function addwatch()
    {
       $watch = Watch::create(['name'=>$this->watchname,'price'=>$this->watchprice,'description'=>$this->description]); 
       $imageName = time() . '.' . $this->coverimage->extension();
       Storage::disk('public')->put('watches/' , $this->coverimage);
       WatchCoverImage::create(['watch_id'=>$watch->id,'image'=>$this->coverimage->getClientOriginalName()]);
       foreach($this->otherphotos as $photo)
       {
        $imageName = time() . '.' . $photo->extension(); 
        Storage::disk('public')->put('watchesCoverImages/', $photo);
        WatchImage::create(['watch_id'=>$watch->id,'image'=>$photo->getClientOriginalName()]);
       }
    }
}
