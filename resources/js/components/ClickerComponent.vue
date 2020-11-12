<template>
    <div>
        count: <button @click="count++">{{count}}</button>
    </div>
</template>

<script>
export default {
name: "click-counter",
    mounted(){
        console.log('counterMount');
    },
    data () {
        return {
            count: 1
        };
    }
}
</script>

