<template>
  <v-app :class="$vuetify.theme.dark ? 'background-color-black' : 'background-color-white'">
    <v-card class="elevation-20 ma-auto" width="500" max-width="95%" height="500" max-height="90%">
      <v-container class="px-10">
        <v-card-text>
          <h1 class="text-center mt-10">Login</h1>
          <h3 class="font-weight-regular text-center mt-5">Welcome to Barqun POS</h3>
          <v-text-field density="compact" label="Email" prepend-inner-icon="mdi-email-outline" variant="outlined" class="mt-16"></v-text-field>
          <v-text-field :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :type="show1 ? 'text' : 'password'" prepend-inner-icon=" mdi-lock-outline" label="Password" class="mt-3" @click:append="show1 = !show1"></v-text-field>
          <router-link to="forgot-password" class="mt-1">Forgot Password</router-link>
          <v-btn to="/outlets" class="font-weight-bold mt-5" block large> Login</v-btn>
        </v-card-text>
      </v-container>
    </v-card>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      step: 1,
      show1: false,
      password: 'Password',
    };
  },
  props: {
    source: String,
  },
};
</script>
<style scoped>
.v-btn {
  background-image: linear-gradient(to right, #3d76e7, #1fb5be) !important;
  color: white;
  border-radius: 10px;
}

.v-card {
  border-radius: 15px;
}
</style>
