@extends('livewire.dashboard')
@section('content')
<div x-data="{click:false}" class=" flex flex-col">
    <div class="md:pl-60 w-full flex-wrap flex flex-row justify-center " > @if(session()->has('success')) <div
        x-data="{success:true}" x-show="success"
        class="w-1/3 h-1/7 top-10 left-50 z-50 fixed bg-green-100 border border-green-400 text-green-700 px-4 py-3  rounded"
        role="alert">
        <strong class="font-bold">New watch registered!</strong>
        <span class="block sm:inline"></span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" @click="success=false" role="button"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path
                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
            </svg>
        </span>
    </div>
    @endif
    <form wire:submit.prevent="addwatch" class="w-4/5 mt-40 mb-10">
        <div class="flex flex-wrap -mx-3 justify-center mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-first-name">
                    Watch Name
                </label>
                <input x-ref="watchname" wire:model.blur="watchname" @keyup="click=false"
                    class="appearance-none block w-full bg-gray-200 text-gray-400 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="watch-name" type="text" placeholder="Jane">
                <p x-show="click && $refs.watchname.value==''" class="text-red-500 text-xs italic">Please fill out this
                    field.</p>
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-last-name">
                    Watch Price
                </label>
                <input x-ref="watchprice" wire:model.blur="watchprice" @keyup="click=false"
                    class="appearance-none block w-full bg-gray-200 text-gray-800 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="watch-pricee" min="0" step="any" type="number" placeholder="">
                <p x-show="click && $refs.watchname.value!=''&& $refs.watchprice.value==''"
                    class="text-red-500 text-xs italic">Please fill out this field.</p>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-password">
                    Description
                </label>
                <textarea x-ref="description" wire:model.blur="description" @keyup="click=false"
                    class="appearance-none block w-full bg-gray-200 text-gray-800 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="description" type="password" placeholder=""></textarea>
                <p x-show="click && $refs.watchname.value!='' && $refs.watchprice.value!='' && $refs.description.value==''"
                    class="text-red-500 text-xs italic">Please fill out this field.</p>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-city">
                    Cover image
                </label>
                <div class="flex flex-col flex-grow mb-3">
                    <div class="flex flex-col flex-grow mb-3">
                        <div x-data="{ files: null }" id="FileUpload"
                            class="block w-full py-2 px-3 relative bg-white appearance-none border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray">
                            <input type="file" wire:model.blur="coverimage"
                                class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
                                id="coverimage"
                                x-on:change="files = $event.target.files; console.log($event.target.files);"
                                x-on:dragover="$el.classList.add('active')"
                                x-on:dragleave="$el.classList.remove('active')"
                                x-on:drop="$el.classList.remove('active')">
                            <template x-if="files !== null">
                                <div class="flex flex-col space-y-1">
                                    <template x-for="(_,index) in Array.from({ length: files.length })">
                                        <div class="flex flex-row items-center space-x-2">
                                            <template x-if="files[index].type.includes('image/')"><i
                                                    class="far fa-file-image fa-fw"></i></template>
                                            <span class="font-medium text-gray-900"
                                                x-text="files[index].name">Uploading</span>
                                            <span class="text-xs self-end text-gray-500"
                                                x-text="files[index].size">...</span>
                                        </div>
                                    </template>
                                </div>
                            </template>
                            <template x-if="files === null">
                                <div class="flex flex-col space-y-2 items-center justify-center">
                                    <i class="fas fa-cloud-upload-alt fa-3x text-currentColor"></i>
                                    <p class="text-gray-700">Drag your files here or click in this area.</p>
                                    <a href="javascript:void(0)"
                                        class="flex items-center mx-auto py-2 px-4 text-white text-center font-medium border border-transparent rounded-md outline-none bg-red-700">Select
                                        a file</a>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-zip">
                    Upload more Images
                </label>
                <div class="flex flex-col flex-grow mb-3">
                    <div class="flex flex-col flex-grow mb-3">
                        <div x-data="{ file:null  }" id="FileUpload"
                            class="block w-full py-2 px-3 relative bg-white appearance-none border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray">
                            <input type="file" multiple id="restimages" wire:model.blur="otherphotos"
                                class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
                                x-on:change="file = $event.target.files; console.log($event.target.files);"
                                x-on:dragover="$el.classList.add('active')"
                                x-on:dragleave="$el.classList.remove('active')"
                                x-on:drop="$el.classList.remove('active')">
                            <template x-if="file !== null">
                                <div class="flex flex-col space-y-1">
                                    <template x-for="(_,index) in Array.from({ length: file.length })">
                                        <div class="flex flex-row items-center space-x-2">
                                            <template x-if="file[index].type.includes('image/')"><i
                                                    class="far fa-file-image fa-fw"></i></template>
                                            <span class="font-medium text-gray-900"
                                                x-text="file[index].name">Uploading</span>
                                            <span class="text-xs self-end text-gray-500"
                                                x-text="file[index].size">...</span>
                                        </div>
                                    </template>
                                </div>
                            </template>
                            <template x-if="file === null">
                                <div class="flex flex-col space-y-2 items-center justify-center">
                                    <i class="fas fa-cloud-upload-alt fa-3x text-currentColor"></i>
                                    <p class="text-gray-700">Drag your files here or click in this area.</p>
                                    <a href="javascript:void(0)"
                                        class="flex items-center mx-auto py-2 px-4 text-white text-center font-medium border border-transparent rounded-md outline-none bg-red-700">Select
                                        a file</a>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
            <div x-data="{ uploading: false}" class="flex flex-row mt-2 ml-3">
                <input x-show="uploading" type="submit" id="sbt" @click="click=true" value="Add watch"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            </div>
    </form>
</div>
<script>
    window.onclick = function () {
        const elements = document.querySelectorAll("input");
        elements.forEach(element => {
            if (element?.hasAttribute("readonly")) {
                element.removeAttribute("readonly");
            }
        });
        document.getElementById('description')?.hasAttribute("readonly") &&
            document.getElementById('description').removeAttribute("readonly");
    };

</script>
@endSection