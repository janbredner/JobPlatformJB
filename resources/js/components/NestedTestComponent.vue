<template>
    <div>
        <probs-test v-for="content in contents" :content-test="content"></probs-test>
    </div>
</template>

<script>
export default {
name: "NestedTestComponent",
    data: function(){
        return {
            contents: ['Das', 'ist' , 'ein', 'nested', 'test']
        };
    }
}
</script>

