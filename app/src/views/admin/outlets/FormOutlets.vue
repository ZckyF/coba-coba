<template>
  <v-form ref="form" lazy-validation>
    <v-container>
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            prepend-icon="mdi-store-outline"
            v-model="editedItem.name"
            label="Outlet Name"
            :rules="[(v) => !!v || 'This field must be filled!']"
          ></v-text-field>
        </v-col>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="editedItem.phone"
            @keypress="filter(event)"
            label="Phone"
            prepend-icon="mdi-phone"
            :rules="[(v) => !!v || 'This field must be filled!']"
          ></v-text-field>
        </v-col>
        <v-col cols="12" sm="12" md="12">
          <v-textarea
            outlined
            auto-grow
            no-resize
            prepend-inner-icon="mdi-map-marker-outline"
            v-model="editedItem.address"
            label="Address"
            :rules="[(v) => !!v || 'This field must be filled!']"
          ></v-textarea>
        </v-col>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="editedItem.tax"
            @keypress="filter(event)"
            label="Tax (%)"
            prepend-icon="mdi-percent-outline"
            :rules="[(v) => !!v || 'This field must be filled!']"
          ></v-text-field>
        </v-col>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="editedItem.namaWajibPajak"
            label="Nama Wajib Pajak"
            prepend-icon="mdi-store-outline"
            :rules="[(v) => !!v || 'This field must be filled!']"
          ></v-text-field>
        </v-col>
        <v-col cols="12" sm="12" md="12">
          <v-textarea
            outlined
            auto-grow
            no-resize
            prepend-inner-icon="mdi-map-marker-outline"
            v-model="editedItem.alamatWajibPajak"
            label="Alamat Wajib Pajak"
            :rules="[(v) => !!v || 'This field must be filled!']"
          ></v-textarea>
        </v-col>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="editedItem.nopd"
            label="NOPD"
            prepend-icon="mdi-file-percent-outline"
            :rules="[(v) => !!v || 'This field must be filled!']"
          ></v-text-field>
        </v-col>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="editedItem.npwpd"
            label="NPWPD"
            prepend-icon="mdi-file-percent-outline"
            :rules="[(v) => !!v || 'This field must be filled!']"
          ></v-text-field>
        </v-col>
        <v-col cols="12" sm="6" md="6">
          <v-select
            v-model="editedItem.category"
            :items="categories"
            label="Kategori Usaha Wajib Pajak"
            prepend-icon="mdi-shape-outline"
            :rules="[(v) => !!v || 'This field must be filled!']"
          ></v-select>
        </v-col>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="editedItem.openTime"
            label="Open Time"
            prepend-icon="mdi-store-clock-outline"
            :rules="[(v) => !!v || 'This field must be filled!']"
          ></v-text-field>
        </v-col>
        <v-col cols="12" sm="3" md="3">
          <v-radio-group
            v-model="editedItem.pajakNota"
            label="Tampilkan Pajak Nota"
            prepend-icon="mdi-file-percent-outline"
            :rules="[(v) => !!v || 'This field must be filled!']"
          >
            <v-radio label="Yes" value="true" color="#3d76e7"></v-radio>
            <v-radio label="No" value="false" color="#3d76e7"></v-radio>
          </v-radio-group>
        </v-col>
        <v-col cols="12" sm="3" md="3">
          <v-radio-group
            v-model="editedItem.memoDapur"
            label="Print Memo Dapur"
            prepend-icon="mdi-printer-outline"
            :rules="[(v) => !!v || 'This field must be filled!']"
          >
            <v-radio label="Yes" value="true" color="#3d76e7"></v-radio>
            <v-radio label="No" value="false" color="#3d76e7"></v-radio>
          </v-radio-group>
        </v-col>
        <v-col cols="12" sm="3" md="3">
          <v-radio-group
            v-model="editedItem.printNota"
            label="Print Nota"
            prepend-icon="mdi-printer-outline"
            :rules="[(v) => !!v || 'This field must be filled!']"
          >
            <v-radio label="Yes" value="true" color="#3d76e7"></v-radio>
            <v-radio label="No" value="false" color="#3d76e7"></v-radio>
          </v-radio-group>
        </v-col>
        <v-col cols="12" sm="3" md="3">
          <v-radio-group
            v-model="editedItem.isOpen"
            label="Status (Open / Closed)"
            prepend-icon="mdi-clock-outline"
            :rules="[(v) => !!v || 'This field must be filled!']"
          >
            <v-radio label="Open" value="true" color="#3d76e7"></v-radio>
            <v-radio label="Closed" value="false" color="#3d76e7"></v-radio>
          </v-radio-group>
        </v-col>
      </v-row>
    </v-container>
  </v-form>
</template>

<script>
export default {
  props: {
    editedItem: {
      type: Object,
      required: true,
    },
  },
  methods: {
    filter: function (evt) {
      evt = evt ? evt : window.event;
      let expect = evt.target.value.toString() + evt.key.toString();

      if (!/^[-+]?[0-9]*\.?[0-9]*$/.test(expect)) {
        evt.preventDefault();
      } else {
        return true;
      }
    },
  },
};
</script>

<style></style>
