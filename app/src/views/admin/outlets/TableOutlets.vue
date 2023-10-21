<template>
  <v-card class="ma-10">
    <v-data-table class="mx-3" :headers="header" :items="lists" sort-by="number" :search="search">
      <template v-slot:top>
        <v-toolbar flat color="transparent">
          <SearchDataTable @search-changed="setSearch" />
          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" max-width="1000" scrollable>
            <template v-slot:activator="{ on }">
              <GradientButton text="Add Outlet" icon="mdi-plus" @click="openDialog" v-on="on" />
            </template>
            <v-card class="montserrat">
              <v-card-title>
                {{ formTitle }}
              </v-card-title>
              <v-divider class="mr-10 ml-5" style="border: 1px solid; border-radius: 50px" :style="$vuetify.theme.dark ? 'color: rgba(234, 234, 234, 0.65)' : 'color: rgba(66, 66, 66, 0.55)'"></v-divider>

              <v-card-text class="pa-10">
                <FormOutlets :editedItem="editedItem" />
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <SingleButton text="back" icon="mdi-arrow-left" color="backbtn" @click="close" />
                <SingleButton text="Save" icon="mdi-content-save" color="accbtn" @click="save" />
              </v-card-actions>
            </v-card>
          </v-dialog>
          <AlertDialog text="Are you sure want to delete this outlets?" textSubmit="Delete" v-model="dialogDelete" @confirm="deleteItemConfirm" @close="closeDelete" />
        </v-toolbar>
      </template>
      <template v-slot:[`item.actions`]="{ item }">
        <Actions enterColor="btn-enter" editColor="btn-edit" deleteColor="btn-delete" @edit="editItem(item)" @delete="deleteItem(item)" />
      </template>
      <template v-slot:no-data>
        <DataNotAvailable />
      </template>
    </v-data-table>
  </v-card>
</template>

<script>
import FormOutlets from './FormOutlets.vue';
import GradientButton from '@/components/buttons/GradientButton.vue';
import SingleButton from '@/components/buttons/SingleButton.vue';
import Actions from '@/components/tables/Actions.vue';
import DataNotAvailable from '@/components/no-data/DataNotAvailable.vue';
import AlertDialog from '@/components/alerts/AlertDialog.vue';
import SearchDataTable from '@/components/tables/SearchDataTable.vue';

export default {
  name: 'Outlets',
  components: { GradientButton, SingleButton, FormOutlets, Actions, DataNotAvailable, AlertDialog, SearchDataTable },
  data: () => ({
    search: '',
    dialog: false,
    dialogDelete: false,
    categories: ['apa aja', 'hotel'],
    header: [
      { text: '#', value: 'number' },
      { text: 'Name', align: 'start', value: 'name' },
      { text: 'Address', value: 'address' },
      { text: 'Phone', value: 'phone' },
      { text: 'Category', value: 'category' },
      { text: 'Validity', value: 'validity' },
      { text: 'Actions', align: 'center', value: 'actions', sortable: false },
    ],
    lists: [],
    editedIndex: -1,
    editedItem: {
      name: '',
      address: '',
      phone: '',
      category: '',
      tax: '',
      namaWajibPajak: '',
      alamatWajibPajak: '',
      nopd: '',
      npwpd: '',
      pajakNota: '',
      memoDapur: '',
      printNota: '',
      openTime: '',
      isOpen: '',
      validity: '',
    },
    defaultItem: {
      name: '',
      address: '',
      phone: '',
      category: '',
      tax: '',
      namaWajibPajak: '',
      alamatWajibPajak: '',
      nopd: '',
      npwpd: '',
      pajakNota: '',
      memoDapur: '',
      printNota: '',
      openTime: '',
      isOpen: '',
      validity: '',
    },
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'Add Outlet' : 'Edit Outlet';
    },
  },

  watch: {
    dialog(val) {
      val || this.close();
    },
    dialogDelete(val) {
      val || this.closeDelete();
    },
  },

  created() {
    this.initialize();
  },

  methods: {
    initialize() {
      this.lists = [
        {
          number: '1',
          name: 'test',
          address: 'jl lorem',
          phone: '088975567',
          category: 'apa aja',
          tax: '',
          namaWajibPajak: '',
          alamatWajibPajak: '',
          nopd: '',
          npwpd: '',
          pajakNota: 'true',
          memoDapur: '',
          printNota: '',
          openTime: '',
          isOpen: true,
          validity: '01-01-2001',
        },
        {
          number: '2',
          name: 'adrian',
          address: 'jl ipsum',
          phone: '088975567',
          category: 'hotel',
          tax: '',
          namaWajibPajak: '',
          alamatWajibPajak: '',
          nopd: '',
          npwpd: '',
          pajakNota: '',
          memoDapur: '',
          printNota: '',
          openTime: '',
          isOpen: false,
          validity: '01-01-2999',
        },
      ];
    },
    setSearch(newSearch) {
      this.search = newSearch;
    },
    openDialog() {
      this.dialog = true;
    },
    editItem(item) {
      this.editedIndex = this.lists.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem(item) {
      this.editedIndex = this.lists.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialogDelete = true;
    },

    deleteItemConfirm() {
      this.lists.splice(this.editedIndex, 1);
      this.closeDelete();
    },

    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    closeDelete() {
      this.dialogDelete = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    save() {
      if (this.editedIndex > -1) {
        Object.assign(this.lists[this.editedIndex], this.editedItem);
      } else {
        const nextNumber = this.generateNextNumber();
        this.editedItem.number = nextNumber;
        this.lists.push(this.editedItem);
      }
      this.close();
    },
    generateNextNumber() {
      const highestNumber = this.lists.reduce((max, item) => (parseInt(item.number) > max ? parseInt(item.number) : max), 0);
      return highestNumber + 1;
    },
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
