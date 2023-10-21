<template>
  <div>
    <Header page="Profile" />
    <CardProfile />
  </div>
</template>
<script>
import CardProfile from './CardProfile.vue';
import Header from '@/components/layouts-element/Header.vue';

export default {
  name: 'profile',
  components: { CardProfile, Header },
};
</script>

<style>
.profile {
  border-radius: 25px;
}
</style>
