<template>
<div class="flex w-full p-6 items-center">
    <div class="w-full">
        <input
            v-model="item.todo"
            type="text" 
            class="bg-indigo-600 h-12 rounded-full w-full px-6 placeholder-gray-200 font-medium text-white outline-none shadow-lg" 
            placeholder="Add Item...">    
    </div>
    <div class="-ml-10">
        <button 
            @click="addTodo()"
            class="flex items-center w-8 bg-indigo-900 rounded-full focus:outline-none">
            <svg class="w-full" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
</div>
</template>

<script>
export default {
    data: function () {
        return {
            item: {
                todo: ""
            }
        }
    },
    methods: {
        addTodo(){
            if(this.item.todo == ""){
                return;
            }
            axios.post('/api/item/store', {
                item: this.item
            })
            .then(response => {
                if(response.status == 201){
                    this.item.todo = "";
                    this.$emit('fetchList');
                }
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>