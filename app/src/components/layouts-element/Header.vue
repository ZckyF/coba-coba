<template>
  <header class="px-8 pt-5">
    <h1 class="mb-5 font-weight-bold">
      {{ page }}
    </h1>
    <v-divider style="border: 1px solid; border-radius: 50px" :style="$vuetify.theme.dark ? 'color: rgba(234, 234, 234, 0.35)' : 'color: rgba(66, 66, 66, 0.35)'"></v-divider>
  </header>
</template>

<script>
export default {
  props: ['page'],
};
</script>

<style></style>
