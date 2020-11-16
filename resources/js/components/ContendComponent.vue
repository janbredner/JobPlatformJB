<template>
    <div>
        <div class="text-blue-500">
            {{selectedContend}}
        </div>

        <home v-if= "this.selectedContend == 'home'"></home>
        <tests v-if="this.selectedContend == 'tests'"></tests>
        <car-all-cars v-if="this.selectedContend == 'all-cars'"></car-all-cars>

    </div>
</template>

<script>
export default {
    name: "ContendComponent",
    props: {
        selectedContend: {
            type:String,
            default: "ups"
        },
    }
}
</script>
