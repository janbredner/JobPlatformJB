<template>
    <div class="w-full flex sticky top-0 bg-green-300 text-green-800">
        <menue-home @setContend="setContend"></menue-home>
        <button class="block p-2 hover:bg-green-800 hover:text-green-100 focus:text-green-100 focus:outline-none focus:border-none focus:bg-green-800">Jobs</button>
        <button class="block p-2 hover:bg-green-800 hover:text-green-100 focus:text-green-100 focus:outline-none focus:border-none focus:bg-green-800">Companies</button>
        <menue-car></menue-car>
        <menue-test @setContend="setContend"></menue-test>
        <button class="block p-2 absolute right-0 hover:bg-green-800 hover:text-green-100 focus:text-green-100 focus:outline-none focus:border-none focus:bg-green-800">My Profile</button>
    </div>
</template>

<script>
export default {
    name: "MenueComponent",
    methods: {
        setContend(contend){
            this.$emit('setContend', contend);
        }
    }
}
</script>
