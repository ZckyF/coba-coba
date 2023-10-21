<template>
  <v-navigation-drawer v-model="drawer" :mini-variant.sync="mini" permanent app>
    <v-list flat class="mb-15">
      <v-list-item class="mt-3">
        <v-img :src="$vuetify.theme.dark ? '/image/logo-barqun-white.png' : '/image/logo-barqun-black.png'" height="25" width="25" max-height="25" max-width="25"></v-img>
        <v-list-item-title class="font-weight-bold ml-7" style="font-size: 13px">Barqun POS</v-list-item-title>
        <v-btn icon @click.stop="mini = !mini"><v-icon>mdi-chevron-left</v-icon></v-btn>
      </v-list-item>
    </v-list>

    <v-list dense nav shaped>
      <v-list-item-group class="font-weight-medium">
        <v-list-item :active-class="$vuetify.theme.dark ? 'activeDark' : 'activeLight'" class="mb-2" to="/outlets">
          <v-list-item-icon>
            <v-icon>mdi-sort-variant</v-icon>
          </v-list-item-icon>
          <v-list-item-title><h4>Outlets</h4></v-list-item-title>
        </v-list-item>

        <v-list-group :active-class="$vuetify.theme.dark ? 'activeDark' : 'activeLight'" class="mb-2" prepend-icon="mdi-file-document-multiple-outline">
          <template v-slot:activator>
            <v-list-item-title><h4>Reports</h4></v-list-item-title>
          </template>
          <v-list-item subheader to="/taxes-report">
            <v-list-item-icon>
              <v-icon>mdi-percent-outline</v-icon>
            </v-list-item-icon>
            <v-list-item-title><h4>Taxes</h4></v-list-item-title>
          </v-list-item>
          <v-list-item to="cash-report">
            <v-list-item-icon>
              <v-icon>mdi-cash</v-icon>
            </v-list-item-icon>
            <v-list-item-title><h4>Cash</h4></v-list-item-title>
          </v-list-item>
          <v-list-item to="/customers-report">
            <v-list-item-icon>
              <v-icon>mdi-account-group-outline</v-icon>
            </v-list-item-icon>
            <v-list-item-title><h4>Customers</h4></v-list-item-title>
          </v-list-item>
        </v-list-group>

        <v-list-group class="mb-2" prepend-icon="mdi-database-outline" :active-class="$vuetify.theme.dark ? 'activeDark' : 'activeLight'">
          <template v-slot:activator>
            <v-list-item-title><h4>Master</h4></v-list-item-title>
          </template>
          <v-list-item to="business-categories">
            <v-list-item-icon>
              <v-icon>mdi-plus</v-icon>
            </v-list-item-icon>
            <v-list-item-title><h4>Business Categories</h4></v-list-item-title>
          </v-list-item>
          <v-list-item to="taxes">
            <v-list-item-icon>
              <v-icon>mdi-percent-outline</v-icon>
            </v-list-item-icon>
            <v-list-item-title><h4>Taxes</h4></v-list-item-title>
          </v-list-item>
        </v-list-group>
        <v-list-item :active-class="$vuetify.theme.dark ? 'activeDark' : 'activeLight'" class="mb-2" to="/users">
          <v-list-item-icon>
            <v-icon>mdi-account-outline</v-icon>
          </v-list-item-icon>
          <v-list-item-title><h4>Users</h4></v-list-item-title>
        </v-list-item>
      </v-list-item-group>

      <div class="bawah">
        <v-divider></v-divider>

        <v-list-item to="/profile" class="mt-10 mb-2" :active-class="$vuetify.theme.dark ? 'activeDark' : 'activeLight'">
          <v-list-item-avatar size="auto" min-height="15" min-width="15" max-height="30" max-width="30">
            <v-img src="https://randomuser.me/api/portraits/women/85.jpg"></v-img>
          </v-list-item-avatar>
          <v-list-item-title class="ml-1"><h4>Sandra Adams</h4></v-list-item-title>
        </v-list-item>

        <v-list-item to="/settings" class="mb-2" :active-class="$vuetify.theme.dark ? 'activeDark' : 'activeLight'">
          <v-list-item-icon>
            <v-icon>mdi-cog-outline</v-icon>
          </v-list-item-icon>
          <v-list-item-title style="margin-left: -5px"><h4>Settings</h4></v-list-item-title>
        </v-list-item>

        <v-list-item @click="logout" class="mb-2">
          <v-list-item-icon>
            <v-icon>mdi-logout</v-icon>
          </v-list-item-icon>
          <v-list-item-title style="margin-left: -5px"><h4>Logout</h4></v-list-item-title>
        </v-list-item>
      </div>
      <AlertDialog text="Are you sure want to logout ?" textSubmit="Yes" v-model="dialogLogout" @close="closeLogout" @confrim="logout" />
    </v-list>
  </v-navigation-drawer>
</template>

<script>
import AlertDialog from '../alerts/AlertDialog.vue';
export default {
  components: { AlertDialog },
  data() {
    return {
      drawer: true,
      mini: true,
      mini: true,
      dialogLogout: false,
    };
  },
  methods: {
    logout() {
      this.dialogLogout = !this.dialogLogout;
    },
    deleteItemConfirm() {
      this.closeDelete();
    },
    closeLogout() {
      this.dialogLogout = false;
    },
  },
};
</script>

<style>
.bawah {
  position: fixed;
  bottom: 0;
  right: 0;
  left: 0;
  padding-left: 5px;
  padding-right: 12px;
  padding-bottom: 35px;
}

.activeLight {
  background: linear-gradient(to right, #3d76e7, #1fb5be) !important;
  /* background: linear-gradient(to right, #1565c0, #0097a7) !important; */
  color: white !important;
  /* border-radius: 10px 40px 40px 10px !important; */
}
.activeDark {
  background: linear-gradient(to right, #1565c0, #0097a7) !important;
  color: white !important;
}
.activeLight i.v-icon,
.activeDark i.v-icon {
  color: white;
}
</style>
