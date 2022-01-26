<template>
  <form class="form-signin" @submit.prevent="onSubmit">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <input v-model="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <input v-model="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>
</template>

<script>

export default {
  data() {
    return {
      email:'',
      password:''
    }
  },
  methods:{
      onSubmit() {
      const requestOptions = {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({'password': this.password, 'email': this.email})
      };
        self =this;
        fetch("http://localhost:8000/node/api/login", requestOptions).then(function (result){
        result.text().then(function (text) {
          switch (result.status){
            case 200:
              window.localStorage.setItem('Authorization', result.headers.get("Authorization"));
              window.localStorage.setItem('Refresh', result.headers.get("Refresh"));
              self.$store.dispatch("fetchAuth");
              self.$router.push('/');
              break;
            default:
              alert('Error: '+text);
          }
        });
      });
    }
  }

}
</script>

<style scoped>

</style>