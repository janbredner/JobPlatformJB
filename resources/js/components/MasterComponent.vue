<template>
    <div>
        <headerc></headerc>
        <menue @setContend="setContend"></menue>
        <contentc :selected-contend = this.selectedContend ></contentc>
        <footerc></footerc>
    </div>
</template>

<script>
export default {
    name: "MasterComponent",
    data() {
        return {
            selectedContend: "home"
        }
    },
    methods:{
        increaseCounter(){
            this.test++;
        },
        setContend(contend){
            this.selectedContend = contend;
        }
    }
}
</script>
