<template>
  <div class="hello">
    <h1>{{ msg }}</h1>
    <h3>Mari Belajar Vue js Bersama</h3>
  </div>
  <br>
  <div class="w-50 container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Umur</th>
        </tr>
      </thead>
      <tbody v-for="(data, index) in db" :key="index">
        <tr>
          <th scope="row">{{ index + 1 }}</th>
          <td>{{ data.nama }}</td>
          <td>{{ data.umur }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  props: {
    msg: String,
    db: Array
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1 {
  color: red;
}
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
