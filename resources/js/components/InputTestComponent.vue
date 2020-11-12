<template>
    <div>
        <h2>Add a new car</h2>
        <form @submit="postCar" method="post">
            <label>Car Title:</label>
            <input type="text" v-model="car.title" required />
            <button type="submit">Save</button>
        </form>
        <div>
            <h4>Preview Car</h4>
            <p>Car title: {{car.title}}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "InputTestComponent",
    data() {
        return {
            car: {
                title: ""
            }
        }
    },
    methods:{
        postCar(e)
        {
            console.warn(this.car);
            axios.post('api/cars', this.car)
                .then((result) => {
                    console.log(result);
                })
            e.preventDefault();
        }
    }
}
</script>

<style scoped>

</style>
