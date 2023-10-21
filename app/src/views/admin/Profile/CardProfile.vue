<template>
  <v-card class="ma-10">
    <v-row>
      <v-col cols="12" md="3" sm="12">
        <v-img src="https://randomuser.me/api/portraits/women/85.jpg" height="200" width="200" class="ma-10 ml-16 profile">
          <span class="icon-image">
            <v-icon size="50" color="white">mdi-image-edit</v-icon>
          </span>
        </v-img>
      </v-col>
      <v-col cols="12" md="8" sm="12">
        <v-row class="mt-4 mx-10">
          <v-col cols="12" md="6">
            <p class="font-weight-bold" :style="$vuetify.theme.dark ? 'color:#EAEAEA' : 'color: #424242'">Name</p>
            <v-text-field placeholder="Name" single-line outlined dense></v-text-field>
          </v-col>
          <v-col cols="12" md="6">
            <p class="font-weight-bold" :style="$vuetify.theme.dark ? 'color:#EAEAEA' : 'color: #424242'">Email</p>
            <v-text-field placeholder="Email" single-line outlined dense></v-text-field>
          </v-col>
          <v-col cols="12" md="6">
            <p class="font-weight-bold" :style="$vuetify.theme.dark ? 'color:#EAEAEA' : 'color: #424242'">Phone</p>
            <v-text-field placeholder="Phone" single-line outlined dense></v-text-field>
          </v-col>
          <v-col cols="12" md="6">
            <v-dialog v-model="dialog" max-width="1000" persistent>
              <template v-slot:activator="{ on }">
                <GradientButton text="Change Password" icon="mdi-pencil-outline" class="mt-10" @click="openDialog" v-on="on" />
              </template>
              <v-card>
                <v-card-title> Change Password </v-card-title>

                <v-card-text class="pa-10">
                  <FormChangePassword />
                </v-card-text>

                <v-card-actions>
                  <v-spacer></v-spacer>
                  <SingleButton text="back" icon="mdi-arrow-left" color="backbtn" @click="close" />
                  <SingleButton text="Save" icon="mdi-content-save" color="accbtn" @click="save" />
                </v-card-actions>
              </v-card>
            </v-dialog>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
    <v-divider class="ma-5"></v-divider>
    <SingleButton class="ml-5" text="Save" icon="mdi-content-save" color="accbtn" @click="showSnackbar" />
    <Snackbar ref="snackbar" icon="mdi-check" message="Successfully update data" color="success" />
  </v-card>
</template>

<script>
import FormChangePassword from './FormChangePassword.vue';
import GradientButton from '@/components/buttons/GradientButton.vue';
import SingleButton from '@/components/buttons/SingleButton.vue';
import Snackbar from '@/components/alerts/Snackbar.vue';

export default {
  components: { GradientButton, SingleButton, Snackbar, FormChangePassword },
  data: () => ({
    snackbar: false,
    dialog: false,
    show1: false,
    show2: false,
    show3: false,
    password: 'Password',
  }),
  watch: {
    dialog(val) {
      val || this.close();
    },
  },
  methods: {
    openDialog() {
      this.dialog = true;
    },
    close() {
      this.dialog = false;
    },
    showSnackbar() {
      this.$refs.snackbar.show();
    },
  },
};
</script>

<style>
.profile {
  cursor: pointer;
}

.profile:hover .icon-image {
  top: 0;
  opacity: 1;
  transition: top 0.5s ease, opacity 0.3s ease;
}

.icon-image {
  position: absolute;
  display: flex;
  justify-content: center;
  font-size: 2rem;
  background-color: rgba(0, 0, 0, 0.7);
  width: 100%;
  height: 100%;
  top: 100%;
  transition: top 0.5s ease, opacity 0.3s ease;
  opacity: 0;
}
</style>
