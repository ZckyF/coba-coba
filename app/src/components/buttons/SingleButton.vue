<template>
  <v-btn :class="color + ' montserrat mb-5'" text @click="emitClickEvent">
    <v-icon left>{{ icon }}</v-icon>
    {{ text }}
  </v-btn>
</template>

<script>
export default {
  props: ['text','icon','color',],
  methods: {
    emitClickEvent() {
      this.$emit('click'); // Emit event click ketika tombol ditekan
    },
  },
};
</script>

<style></style>
