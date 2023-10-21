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
                <FormUsers :editedItem="editedItem" />
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <SingleButton text="back" icon="mdi-arrow-left" color="backbtn" @click="close" />
                <SingleButton text="Save" icon="mdi-content-save" color="accbtn" @click="save" />
              </v-card-actions>
            </v-card>
          </v-dialog>
          <AlertDialog text="Are you sure want to delete this user?" textSubmit="Delete" v-model="dialogDelete" @confirm="deleteItemConfirm" @close="closeDelete" />>
        </v-toolbar>
      </template>
      <template v-slot:[`item.actions`]="{ item }">
        <Actions blockColor="btn-block" editColor="btn-edit" deleteColor="btn-delete" @edit="editItem(item)" @delete="deleteItem(item)" />
      </template>
      <template v-slot:no-data>
        <DataNotAvailable />
      </template>
    </v-data-table>
  </v-card>
</template>

<script>
import FormUsers from './FormUsers.vue';
import GradientButton from '@/components/buttons/GradientButton.vue';
import SingleButton from '@/components/buttons/SingleButton.vue';
import Actions from '@/components/tables/Actions.vue';
import DataNotAvailable from '@/components/no-data/DataNotAvailable.vue';
import AlertDialog from '@/components/alerts/AlertDialog.vue';
import SearchDataTable from '@/components/tables/SearchDataTable.vue';

export default {
  name: 'Outlets',
  components: { GradientButton, SingleButton, FormUsers, Actions, DataNotAvailable, AlertDialog, SearchDataTable },
  data: () => ({
    search: '',
    dialog: false,
    dialogDelete: false,
    categories: ['apa aja', 'hotel'],
    header: [
      { text: '#', value: 'number' },
      { text: 'Name', align: 'start', value: 'name' },
      { text: 'Email', value: 'email' },
      { text: 'Status', value: 'status' },
      { text: 'Outlet', value: 'outlet' },
      { text: 'Actions', align: 'center', value: 'actions', sortable: false },
    ],
    lists: [],
    editedIndex: -1,
    editedItem: {
      name: '',
      email: '',
      phone: '',
      password: '',
      outlet: '',
      status: '',
    },
    defaultItem: {
      name: '',
      email: '',
      phone: '',
      password: '',
      outlet: '',
      status: '',
    },
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'Add User' : 'Edit User';
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
          email: 'jl lorem',
          status: 'Active',
          outlet: 'Mpok Daus',
        },
        {
          number: '2',
          name: 'adrian',
          email: 'jl ipsum',
          status: 'Active',
          outlet: 'Daeng',
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
        this.editedItem.status = 'Active';
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
