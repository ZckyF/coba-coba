<template>
  <v-dialog v-model="value" max-width="600" class="rounded-xl">
    <v-card>
      <v-card-text class="text-center">
        <v-icon class="alert my-5" size="75">mdi-alert-outline</v-icon>
      </v-card-text>
      <v-card-text class="text-h5 text-center font-weight-medium montserrat"> {{ text }} </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn class="mb-5 mr-5 px-3 backbtn" large @click="close">Cancel</v-btn>
        <v-btn class="mb-5 px-3 white--text" large color="#E53935" @click="confirm">{{ textSubmit }}</v-btn>
        <v-spacer></v-spacer>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  props: {
    text: String,
    value: Boolean,
    textSubmit: String,
  },
  methods: {
    close() {
      this.$emit('close');
    },
    confirm() {
      this.$emit('confirm');
    },
  },
};
</script>
