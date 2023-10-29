<?php

namespace App\Livewire;
use App\Models\WatchImage;
use Livewire\Component;
use Exception;
use DB;
use Livewire\WithPagination;

class EditSingleWatchImages extends Component
{    
    use WithPagination;

    public $id;
    public function render()
    {
       $data= WatchImage::where('watch_id',$this->id)->paginate(10);
        return view('livewire.edit-single-watch-images',['data'=>$data]);
    }

    public function deleteWatchImages($image)
    {
      try
      {
        DB::beginTransaction();
          if (file_exists(public_path('watches/'.$image))){
            $filedeleted = unlink(public_path('watches/'.$image));
            if ($filedeleted) {
              WatchImage::where('image',$image)->delete();
            }
        }
        DB::commit();

      } 
      catch(Exception $e)
      {
        DB::rollBack();
      } 
    }
}
