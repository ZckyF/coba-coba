<template>
  <v-card class="ma-10">
    <v-data-table class="mx-3" :headers="header" :items="lists" sort-by="number" :search="search">
      <template v-slot:top>
        <v-toolbar flat>
          <SearchDataTable @search-changed="setSearch" />
          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" max-width="800" scrollable>
            <template v-slot:activator="{ on }">
              <GradientButton text="Add Business Category" icon="mdi-plus" @click="openDialog" v-on="on" />
            </template>
            <v-card class="montserrat">
              <v-card-title>
                <span class="text-h5">{{ formTitle }}</span>
              </v-card-title>

              <v-card-text class="pa-10">
                <FormBusinessCategories :editedItem="editedItem" />
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <SingleButton text="back" icon="mdi-arrow-left" color="backbtn" @click="close" />
                <SingleButton text="Save" icon="mdi-content-save" color="accbtn" @click="save" />
              </v-card-actions>
            </v-card>
          </v-dialog>
          <AlertDialog text="Are you sure want to delete this business category?" textSubmit="Delete" v-model="dialogDelete" @confirm="deleteItemConfirm" @close="closeDelete" />
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
import FormBusinessCategories from './FormBusinessCategories.vue';
import GradientButton from '@/components/buttons/GradientButton.vue';
import SingleButton from '@/components/buttons/SingleButton.vue';
import AlertDialog from '@/components/alerts/AlertDialog.vue';
import Actions from '@/components/tables/Actions.vue';
import DataNotAvailable from '@/components/no-data/DataNotAvailable.vue';
import SearchDataTable from '@/components/tables/SearchDataTable.vue';
export default {
  name: 'Outlets',
  components: { FormBusinessCategories, GradientButton, SingleButton, AlertDialog, Actions, DataNotAvailable, SearchDataTable },
  data: () => ({
    search: '',
    dialog: false,
    dialogDelete: false,
    header: [
      { text: '#', value: 'number' },
      { text: 'Name', align: 'start', value: 'name' },
      { text: 'Actions', align: 'center', value: 'actions', sortable: false },
    ],
    lists: [],
    editedIndex: -1,
    editedItem: {
      name: '',
    },
    defaultItem: {
      name: '',
    },
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'Add Business Category' : 'Edit Business Category';
    },
  },

  methods: {
    // initialize() {
    //   this.lists = [
    //     {
    //       number: '1',
    //       name: 'Warung',
    //     },
    //     {
    //       number: '2',
    //       name: 'Restoran',
    //     },
    //   ];
    // },

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
        this.lists.push({ number: nextNumber, name: this.editedItem.name });
      }
      this.close();
    },

    generateNextNumber() {
      const highestNumber = this.lists.reduce((max, item) => (parseInt(item.number) > max ? parseInt(item.number) : max), 0);
      return highestNumber + 1;
    },
  },
};
</script>

<style></style>
