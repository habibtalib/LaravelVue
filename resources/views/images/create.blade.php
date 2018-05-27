@extends('layouts.app')

@section('content')
<div id="app" class="w-full max-w-sm">
    <div v-if="image" class="flex mb-8 rounded shadow-md" v-cloak>
        <img class="w-full h-full" :src="'{{ asset('storage') }}/' + image" />
    </div>
    <div v-else class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-8">
        <div v-if="uploading" class="flex flex-col items-center" v-cloak>
            <div class="bg-blue-lightest h-2 h-3 rounded self-start w-full mt-2 mb-4">
                <div :style="{width: percentage + '%'}" class="bg-blue-lighter h-full rounded-l-full"></div>
            </div>    
            <span class="font-black font-sans text-blue-darker text-lg">@{{ percentage }} %</span>
        </div>
        <form v-else @submit.prevent="upload" method="post" action="{{ url('/images') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="mb-6">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="image">Image</label>
                <input ref="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="image" type="file" name="image">
            </div>
        
            <div class="flex items-center justify-center">
                <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">Upload</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
new Vue({
    el: "#app",

    data: {
        image: null,
        uploading: false,
        percentage: 0,
    },

    computed: {
        csrfToken() {
            return document.head.querySelector('meta[name="csrf-token"]');
        },
    },

    methods: {
        upload() {
            const image = this.$refs.image.files[0];
            if (image) {
                this.uploading = true;
                const data = new FormData();
                data.append('image', image);
                axios.post('/api/images', data, {
                    headers: { 'X-CSRF-TOKEN': this.csrfToken },
                    onUploadProgress: (progressEvent) => {
                        this.percentage = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                    },
                }).then(({ data }) => {
                    this.image = data.path;
                    this.uploading = false;
                }).catch(_ => {
                    this.uploading = false;
                });
            }
        },
    },
});
</script>
@endsection