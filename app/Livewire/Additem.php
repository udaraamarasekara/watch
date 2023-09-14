<?php

namespace App\Livewire;

use App\Models\Watch;
use App\Models\WatchCoverImage;
use App\Models\WatchImage;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use DB;
class Additem extends Component
{
    use WithFileUploads;
    public $watchname,$watchprice,$description,$coverimage;
    public $otherphotos=[];

    public function render()
    {
        return view('livewire.additem');
    }
    public function addwatch()
    {
       $this->validate(['watchname'=>'required','watchprice'=>'required','description'=>'required','coverimage'=>'required','otherphotos'=>'required']);
      try
       {
       DB::beginTransaction();
       $watch = Watch::create(['name'=>$this->watchname,'price'=>$this->watchprice,'description'=>$this->description]); 
       $imageName = time() . '.' . $this->coverimage->extension();
       Storage::disk('public')->putFileAs('watchesCoverImages',$this->coverimage,$imageName );
       WatchCoverImage::create(['watch_id'=>$watch->id,'image'=>$imageName]);
       if(WatchCoverImage::where('watch_id',$watch->id)->count()==2)
       {
          WatchCoverImage::create(['watch_id'=>$watch->id,'image'=>$imageName]);
       }
       $i=0;
       foreach($this->otherphotos as $photo)
       {
        $imageName = time() .$i. '.' . $photo->extension(); 
        Storage::disk('public')->putFileAs('watches',$photo,$imageName);
        WatchImage::create(['watch_id'=>$watch->id,'image'=>$imageName]);
       
        $i++;
       }
       if(WatchImage::where('watch_id',$watch->id)->count()==2)
       {
         WatchImage::create(['watch_id'=>$watch->id,'image'=>$imageName]);
       }
       session()->flash('success','You add new watch');
       DB::commit();
      }
      catch(Exception $e)
      {
        DB::rollBack();
      }
    }
}
