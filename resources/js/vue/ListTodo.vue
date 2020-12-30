<template>
<div class="flex w-full px-6 mt-2">
    <div
        :class ="[item.completed ? 'bg-indigo-500' : 'bg-indigo-200']"
        class="flex w-full bg-indigo-400 justify-between rounded-lg h-12 items-center px-4 shadow-md"
    >
        <div>
            <input 
                type="checkbox" 
                class="rounded-full"
                v-model="item.completed"
                @change="completeTodo()"
            />
            <input 
                type="text" 
                class="ml-2 bg-transparent outline-none font-medium text-white"
                v-model="item.todo"
                v-on:keyup.enter="renameTodo()"
                :class ="[item.completed ? 'line-through text-gray-300' : '']"
            />
        </div>
        <div>
            <button 
                class="flex focus:outline-none"
                @click="deleteToDo()"
                >
                <svg class="w-6 h-6" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['item'],
    methods: {
        renameTodo(){
            axios.put('/api/item/' + this.item.id, {
                item: this.item
            })
            .then(response => {
                if(response.status == 200){
                    this.$emit('fetchList');
                }
            })
            .catch(error => {
                console.log(error);
            })
        },
        deleteToDo(){
            axios.delete('/api/item/' + this.item.id)
            .then(response => {
                if(response.status == 200){
                    this.$emit('fetchList');
                }
            })
            .catch(error => {
                console.log(error);
            })
        },
        completeTodo(){
            axios.put('/api/item/' + this.item.id, {
                item: this.item
            })
            .then(response => {
                if(response.status == 200){
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