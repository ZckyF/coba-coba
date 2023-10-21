<template>
    <v-radio-group :label="label">
        <v-radio label="Yes" value=true color="#3d76e7"></v-radio>
        <v-radio label="No" value=false color="#3d76e7"></v-radio>
    </v-radio-group>
</template>

<script>
export default {
    props: {
        label: String,
    }

}
</script>

<style>

</style>