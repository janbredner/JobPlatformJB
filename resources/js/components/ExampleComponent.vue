<template>
    <div>
        <h1>Cars</h1>
        <div v-if="cars.length>0">
        <table border="1px">
            <tr>
                <td>ID</td>
                <td>Title</td>
            </tr>
            <tr v-for="car in cars" v-bind:key="car.id">
                <td>{{ car.id }}</td>
                <td>{{ car.title }}</td>
            </tr>
        </table>
        </div>
    </div>
</template>
<script>
    export default {
        data: function(){
            return {
                isFetching: true,
                cars: []
            };
        },
        created(){
            this.loadCars();
            console.log('created');
        },
        async mounted() {
            await this.waitForMe;
            console.log('Component mounted.')
        },

        methods: {
            loadCars: function(){
                this.waitForMe = axios.get('api/cars')
                .then((response) => {
                    this.cars = response.data;
                    //this.cars = JSON.parse(JSON.stringify(response.data));
                    //console.log(response.data, 'response.data');
                    console.log(this.cars, 'this.cars');
                    //console.log('------------------------------------------', JSON.parse(JSON.stringify(response.data)));
                    }
                )
                .catch(error => {
                    console.error('failed: ' + error);
                });
            },
        }
    }
</script>
