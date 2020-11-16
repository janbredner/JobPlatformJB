<template>
    <button @click="setContend" class="block p-2 hover:bg-green-800 hover:text-green-100 focus:text-green-100 focus:outline-none focus:border-none focus:bg-green-800">Tests</button>
</template>

<script>
export default {
    name: "MenueTestsComponent",
    methods:{
        setContend(){
            this.$emit('setContend', 'tests');
        }
    }
}
</script>
