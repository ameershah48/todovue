<template>
    <div>
        <div v-for="(item, index) in items" :key="index">
            <list-todo 
                :item="item"
                v-on:fetchList="$emit('fetchList')"
            />
        </div>
    </div>
</template>

<script>
import ListTodo from './ListTodo.vue'

export default {
  components: { ListTodo },
    props: ['items']
}
</script>