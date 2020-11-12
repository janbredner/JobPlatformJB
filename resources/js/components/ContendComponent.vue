<template>
    <div>
        <h1>Vue.js Tests</h1>

        <h2>Input Test</h2>
        <h3>Simple input and save Test (save a car)</h3>
        <input-test></input-test>
        <h2>Component Tests</h2>
        <h3>Nested Test</h3>
        <nested-test></nested-test>

        <h3>Probs Test</h3>
        <probs-test content-test="probsTestItem Nr1"></probs-test>
        <probs-test content-test="probsTestItem Nr2"></probs-test>
        <probs-test content-test="probsTestItem Nr3"></probs-test>

        <h3>clickerComponent</h3>
        <clicker></clicker>
        <clicker></clicker>
        <clicker></clicker>
        <h2>API Tests</h2>
        <h3>load Data from api</h3>
        <example-component></example-component>
    </div>
</template>

<script>
export default {
    name: "ContendComponent"
}
</script>

<style scoped>

</style>
