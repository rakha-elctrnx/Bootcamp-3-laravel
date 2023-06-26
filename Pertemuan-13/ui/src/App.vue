<template>
  <NavbarRoot />
  <div class="container pt-4">
    <router-view/>
  </div>
</template>

<script>
  import NavbarRoot from '@/components/NavbarRoot.vue';

  export default {
    name: 'App',
    components: {
      NavbarRoot
    }
  }
</script>
