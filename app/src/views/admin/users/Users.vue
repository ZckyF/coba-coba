<template>
  <div>
    <Header page="Users" />
    <TableUsers />
  </div>
</template>
<script>
import Header from '@/components/layouts-element/Header.vue';
import TableUsers from './TableUsers.vue';

export default {
  name: 'Home',
  components: { Header, TableUsers },
};
</script>
