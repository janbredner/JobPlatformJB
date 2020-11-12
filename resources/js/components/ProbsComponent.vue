<template>
    <div>
        <i>
            <h4 >{{contentTest}}</h4>
        </i>
    </div>
</template>


<script>
export default {
    name: "ProbsComponent",
    props: {
        contentTest: {
            type:String,
        },
    }
}
</script>

