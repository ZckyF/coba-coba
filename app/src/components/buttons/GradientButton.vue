<template>
  <v-btn dark :class="$vuetify.theme.dark ? 'btn-dark' : 'btn' + ' mb-2 mr-5'" @click="emitClickEvent">
    <v-icon left>{{ icon }}</v-icon>
    {{ text }}
  </v-btn>
</template>

<script>
export default {
  props: {
    text: String,
    icon: String,
  },
  methods: {
    emitClickEvent() {
      this.$emit('click'); // Emit event click ketika tombol ditekan
    },
  },
};
</script>
