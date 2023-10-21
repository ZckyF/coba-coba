<template>
  <footer class="">
    <v-divider style="border: 1px solid; border-radius: 50px" :style="$vuetify.theme.dark ? 'color: rgba(234, 234, 234, 0.35)' : 'color: rgba(66, 66, 66, 0.35)'"></v-divider>
    <p class="pl-5 font-weight-bold pb-2 pt-5" style="font-size: 12px">
      Copyright © 2023
      <a href="https://new.barqun.com/" target="_blank" class="text-decoration-none text-blue">Barqun Point of Sales.</a>
    </p>
  </footer>
</template>

<script>
export default {};
</script>

<style scoped>
footer {
  position: absolute;
  bottom: 0;
  width: 100%;
}
</style>
