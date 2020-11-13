<template>
    <header class="bg-green-800">
        <div class="uppercase tracking-wide text-3xl text-green-100 font-bold py-4 px-6">
            {{title}}
        </div>
        <menue></menue>
    </header>
</template>

<script>
export default {
    name: "HeaderComponent",
    data() {
        return {
            title: 'A Nice Job Portal'
        }
    }
}
</script>

<style scoped>

</style>
