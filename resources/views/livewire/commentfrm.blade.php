<div class="flex justify-center">
<form wire:submit.prevent="addComment" class="w-4/5 mt-40 mb-10">
       
       <div class="flex flex-wrap ml-2 mb-6">
           <div class="w-full px-3">
               <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-password">
               Your comment
               </label>
               <textarea x-ref="message" wire:model.blur="message" required
                   class="appearance-none block w-full bg-gray-200 text-gray-800 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    placeholder=""></textarea>
           </div>
       </div>
       
           <div  class="flex flex-row mt-2 ml-5">
               <input   type="submit" @click="click=true" value="Add comment"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
           </div>
   </form>
</div>


