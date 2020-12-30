<template>
    <div>
        <div class="flex-col w-full">

            <todo-add 
                v-on:fetchList="fetchList()"
            />

            <div class="w-full px-8 my-4">
                <h1 class="text-gray-300 text-xs font-medium">TO DO</h1>
            </div>
            
            <view-list 
                :items="todoItems"
                v-on:fetchList="fetchList()"
            />

            <div class="w-full px-8 my-4">
                <h1 class="text-gray-300 text-xs font-medium">COMPLETED</h1>
            </div>

             <view-list 
                :items="completeItems"
                v-on:fetchList="fetchList()"
            />

         
        </div>
    </div>
</template>

<script>
import TodoAdd from './TodoAdd.vue'
import ViewList from './ViewList.vue'

export default {
   data: function() {
       return {
           todoItems: [],
           completeItems: []
       }
   },
   components: { TodoAdd, ViewList },
   methods: {
      getTodo(){
          axios.get('api/items/todo')
          .then(response => {
              this.todoItems = response.data
          })
          .catch(error => {
              console.log(error);
          })
      },
      getComplete(){
          axios.get('api/items/completed')
          .then(response => {
              this.completeItems = response.data
          })
          .catch(error => {
              console.log(error);
          })
      },
      fetchList(){
        this.getTodo();
        this.getComplete();
      }
  },
  created() {
      this.fetchList();
  }
    
}
</script>