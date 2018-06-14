@extends('layouts.app')

@section('content')
<div id="app" class="w-full max-w-sm">
    <div class="bg-white shadow-md rounded px-8 pt-8 pb-8 mb-8">
        <ul class="list-reset" v-cloak>
            <draggable :list="list">
                <li v-for="(item, index) in list" class="border-blue-lighter border-dashed border-b-2 p-3 px-2 text-blue" :class="{'border-t-2': index == 0}">
                    @{{ index + 1 }}. @{{ item }}
                    
                    <svg class="dragArea float-right h-4 hover:text-blue text-blue-lighter cursor-move" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g class="fill-current" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="icon-shape"><path d="M4.20710678,17.2071068 L7,20 L0,20 L0,13 L2.79289322,15.7928932 L7.12132034,11.4644661 L8.53553391,12.8786797 L4.20710678,17.2071068 Z M15.7928932,2.79289322 L13,0 L20,0 L20,7 L17.2071068,4.20710678 L12.8786797,8.53553391 L11.4644661,7.12132034 L15.7928932,2.79289322 Z M15.7928932,17.2071068 L13,20 L20,20 L20,13 L17.2071068,15.7928932 L12.8786797,11.4644661 L11.4644661,12.8786797 L15.7928932,17.2071068 Z M4.20710678,2.79289322 L7,0 L0,0 L0,7 L2.79289322,4.20710678 L7.12132034,8.53553391 L8.53553391,7.12132034 L4.20710678,2.79289322 Z" id="Combined-Shape"></path></g></g>
                    </svg>
                </li>
            </draggable>
        </ul>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/sortable/1.4.2/Sortable.min.js"></script>
<script src="https://cdn.rawgit.com/David-Desmaisons/Vue.Draggable/master/dist/vuedraggable.min.js"></script>
<script>
var list = @json($list);

new Vue({
    el: "#app",

    data: {
        list: list
    },

    watch: {
        list(list) {
            axios.put('/api/lists', { list }, { headers: { 'X-CSRF-TOKEN': this.csrfToken } });
        }
    }
});
</script>
@endsection