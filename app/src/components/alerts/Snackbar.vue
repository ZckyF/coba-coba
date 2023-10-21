<template>
  <v-snackbar v-model="showSnackbar" app elevation="24" top right :color="color">
    <v-icon left>{{ icon }}</v-icon> <span class="font-weight-bold">{{ message }}</span>
    <template v-slot:action="{ attrs }">
      <span color="white" style="cursor: pointer" text v-bind="attrs" @click="closeSnackbar"><v-icon left>mdi-close</v-icon></span>
    </template>
  </v-snackbar>
</template>

<script>
export default {
  props: {
    message: String,
    icon: String,
    color: String,
  },
  data() {
    return {
      showSnackbar: false,
    };
  },
  methods: {
    show() {
      this.showSnackbar = true;
    },
    closeSnackbar() {
      this.showSnackbar = false;
    },
  },
};
</script>
