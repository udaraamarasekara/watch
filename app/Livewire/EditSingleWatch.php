<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Watch;
use App\Models\WatchCoverImage;
use App\Models\WatchImage;
use Exception;
 use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use DB;
class EditSingleWatch extends Component
{
    use WithFileUploads;
    public $watchname,$watchprice,$description,$coverimage,$id,$newcoverimage,$sold,$admin_sold;
    public $otherphotos=[];
    public $newotherphotos=[];
    public function render()
    {
       $watch=Watch::find($this->id);    
       $this->watchname=$watch->name;
       $this->watchprice=$watch->price;
       $this->sold=$watch->sold?$watch->sold:0;
       $this->admin_sold=$watch->admin_sold?$watch->admin_sold:0;
       $this->description=$watch->description;
       $this->coverimage=$watch->coverimage->image; 
       foreach($watch->images as $image)
       {
         $this->otherphotos[]=$image->image;
       }
       return view('livewire.edit-single-watch');
    }

   

    public function deleteWatchCoverImages($image)
    {
      try
      {
        DB::beginTransaction();
          if (file_exists(public_path('watchesCoverImages/'.$image))){
            $filedeleted = unlink(public_path('watchesCoverImages/'.$image));
            if ($filedeleted) {
              WatchImage::where('image',$image)->delete();
            }
        } else {
            echo 'Unable to delete the given file';
        }
        DB::commit();

      } 
      catch(Exception $e)
      {
        DB::rollBack();

      } 
    }
    public function editwatch()
    {
       $this->validate(['watchname'=>'required','watchprice'=>'required','description'=>'required']);
      try
       {
       DB::beginTransaction();
      
       $watch = Watch::find($this->id)->update(['name'=>$this->watchname,'price'=>$this->watchprice,'description'=>$this->description,'sold'=>$this->sold]); 
       if($this->newcoverimage)
       {
        $this->deleteWatchCoverImages(Watch::find($this->id)->coverimage->image); 
        $imageName = time() . '.' . $this->newcoverimage->extension();
        Storage::disk('public')->putFileAs('watchesCoverImages',$this->newcoverimage,$imageName );
        
        if(!WatchCoverImage::where('watch_id',$this->id)->first())
        {
          WatchCoverImage::create(['watch_id'=>$watch->id,'image'=>$imageName]);
       
          if(WatchCoverImage::where('watch_id',$watch->id)->count()==2)
          {
             WatchCoverImage::create(['watch_id'=>$watch->id,'image'=>$imageName]);
          }
        }else
        {
          WatchCoverImage::where('watch_id',$this->id)->update(['image'=>$imageName]);

        }
        
       }
    
       $i=0;
       foreach($this->newotherphotos as $photo)
       {
        $imageName = time() .$i. '.' . $photo->extension(); 
        Storage::disk('public')->putFileAs('watches',$photo,$imageName);
        WatchImage::create(['watch_id'=>$this->id,'image'=>$imageName]);
       
        $i++;
       }
       if(WatchImage::where('watch_id',$this->id)->count()==2)
       {
         WatchImage::create(['watch_id'=>$this->id,'image'=>$imageName]);
       }
       session()->flash('success','You add new watch');
       DB::commit();
      }
      catch(Exception $e)
      {  
        DB::rollBack();
      }
    }

    public function navigate($url)
    {
     return $this->redirect($url, navigate: true);
    }
}
