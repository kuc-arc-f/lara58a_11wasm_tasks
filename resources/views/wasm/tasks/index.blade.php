@extends('layouts.app')
@section('title', 'タスク一覧')

@section('content')
{{ link_to_route('wasm_tasks.create', 'Create' ,null, ['class' => 'btn btn-primary']) }}
<hr />

<div class="tasks_index_wrap">
    <h3>WASM task - index</h3>
    <hr />
    <ul id="ul_post_wrap">
    </ul>
</div>

<!-- -->

<!-- -->
<script type="module">
import init, * as wasm from '/pkg/wasm_crud_1.js';
var task_items = [];

var TaskIndex = {
    get_items: async function(){
        await axios.get("/api/apitasks/get_tasks").then(res =>  {
            task_items = res.data
        })
        this.dispRow();
    },
    dispRow: async function(){
        await init();
        if(task_items instanceof Array){
//            console.log(task_items );
            task_items.map(function(object, index){
                wasm.task_row("ul_post_wrap", String(object.title), String(object.id));
            })
        }
    },
}
//
$(function(){
    TaskIndex.get_items();
});
</script> 
<!-- -->
<style>
.tasks_index_wrap .div_post_wrap{
    padding : 8px;
}
.div_post_wrap hr{
    height: 1px;
    background-color: #000;
    border: none;
    margin-bottom : 0px;
}
</style>

@endsection
