<template>
  <div class="home">
    <h1>Products</h1>
    <hr>
    <div class="product d-flex gap-2">
      <div v-for="data in datas" :key="data" class="card" style="width: 18rem;">
        <img :src="'http://localhost:8000/images/' + data.foto" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">{{ data.nama }}</h5>
          <small>{{ data.harga }}</small>
          <p class="card-text">{{data.desc}}</p>
          <a href="#" class="btn btn-primary">Checkout</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'HomeView',
  data() {
    return {
      datas: []
    }
  },
  mounted() {
    axios
      .get('http://localhost:8000/api/product/list')
      .then(response => (
        this.datas = response.data.data
      ))
  }
}
</script>

<style>

</style>
