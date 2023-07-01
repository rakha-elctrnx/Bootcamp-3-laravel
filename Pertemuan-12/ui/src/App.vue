<template>
  <NavbarUtama :nama="nama" angka="31"/>
  <br>
  <h1>Halo {{ nama }}</h1>
  <img alt="Vue logo" src="./assets/logo.png">
  <HelloWorld msg="Welcome to Bagas Website" :db="database"/>
  <br>
  <div class="w-50 container input-group">
    <input class="form-control" type="text" v-model="nama">
    <button class="btn btn-primary" @click="test()">Test</button>
  </div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import NavbarUtama from './components/NavbarUtama.vue';

export default {
  name: 'App',
  components: {
    HelloWorld,
    NavbarUtama
  },
  data(){
    return {
      nama: 'Bagas',
      database: [
        {
          nama: 'Rissa',
          umur: 20
        },
        {
          nama: 'Bagas',
          umur: 21
        }
      ]
    }
  },
  methods: {
    test() {
      alert('Halo ' + this.nama)
    }
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin: 10px;
}
</style>
