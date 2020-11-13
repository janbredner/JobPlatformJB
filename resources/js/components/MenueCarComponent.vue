<template>
    <div class="relative">
        <button @click="isOpen = !isOpen" class="relative z-10 block p-2 hover:bg-green-800 hover:text-green-100 focus:text-green-100 focus:outline-none focus:border-none focus:bg-green-800">
            Cars
        </button>
        <button v-if="isOpen" @click="isOpen = false " tabindex="-1" class="fixed inset-0 h-full w-full bg-black opacity-25 cursor-default"></button>
        <div v-if="isOpen" class="absolute top-auto right-0 w-32 bg-green-300">
            <button class="block w-full text-right p-2 hover:bg-green-800 hover:text-green-100 focus:text-green-100 focus:outline-none focus:border-none focus:bg-green-800">All Cars</button>
            <button class="block w-full text-right p-2 hover:bg-green-800 hover:text-green-100 focus:text-green-100 focus:outline-none focus:border-none focus:bg-green-800">Create a Car</button>
        </div>

    </div>
</template>

<script>
export default {
    name: "MenueCarComponent",
    data() {
        return{
            isOpen: false
        }
    },
    created(){
        const handleEscape = (e) => {
            if (e.key === 'Esc' || e.key === 'Escape'){
                this.isOpen = false
            }
        }

        document.addEventListener('keydown', handleEscape)

        this.$once('hook:beforeDestroy', () => {
            document.removeEventListener('keydown', handleEscape)
        })
    }
}
</script>
