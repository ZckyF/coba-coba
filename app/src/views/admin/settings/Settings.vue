<template>
  <div>
    <Header page="Settings" />
    <CardSettings />
  </div>
</template>

<script>
import Header from '@/components/layouts-element/Header.vue';
import CardSettings from './CardSettings.vue';
export default {
  components: { Header, CardSettings },
};
</script>

<style></style>
