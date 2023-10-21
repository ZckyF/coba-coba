<template>
  <v-container>
    <v-row>
      <v-col cols="12" sm="12" md="4">
        <v-text-field label="Old Password" dense :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :type="show1 ? 'text' : 'password'" prepend-icon=" mdi-lock-outline" @click:append="show1 = !show1"></v-text-field>
      </v-col>
      <v-col cols="12" sm="12" md="4">
        <v-text-field label="New Password" dense :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'" :type="show2 ? 'text' : 'password'" prepend-icon=" mdi-lock-outline" @click:append="show2 = !show2"></v-text-field>
      </v-col>
      <v-col cols="12" sm="12" md="4">
        <v-text-field label="Confirm Password" dense :append-icon="show3 ? 'mdi-eye' : 'mdi-eye-off'" :type="show3 ? 'text' : 'password'" prepend-icon=" mdi-lock-outline" @click:append="show3 = !show3"></v-text-field>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      show1: false,
      show2: false,
      show3: false,
    };
  },
  methods: {
    toggleShowPassword(inputNum) {
      if (inputNum === 1) {
        this.show1 = !this.show1;
      } else if (inputNum === 2) {
        this.show2 = !this.show2;
      } else if (inputNum === 3) {
        this.show3 = !this.show3;
      }
    },
  },
};
</script>

<style></style>
