<template>
  <form class="form-signin" @submit.prevent="sendData">
    <h1 class="h3 mb-3 font-weight-normal">Please register</h1>
    <input v-model="username" class="form-control" placeholder="Name" required autofocus>
    <input v-model="email" type="email" class="form-control" placeholder="Email address" required autofocus>
    <input v-model="password" type="password" class="form-control" placeholder="Password" required>
    <input v-model="repeat_password" type="password" class="form-control" placeholder="Repeat Your Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Registrate</button>
  </form>
</template>

<script>

export default {
  data(){
    return {
      username: '',
      email:'',
      password:'',
      repeat_password:''
    }
  },
  methods:{
    sendData() {
      const requestOptions = {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({'username': this.username, 'password': this.password, 'email': this.email, 'repeat_password': this.repeat_password })
      };
      self =this;
      fetch("http://localhost:8000/node/api/register", requestOptions).then(function (result){
        result.text().then(function (text) {
          switch (result.status){
            case 200:
              self.$router.push('/login');
              break;
            case 400:
              alert('Error: '+text);
              break;
            default:
              console.log('Server error. +text');
          }
        });
      });
    }
  }


}
</script>
